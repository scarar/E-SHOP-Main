<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    private $userModel;
    private $maxLoginAttempts = 5;
    private $lockoutTime = 900; // 15 minutes

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if (isset($_SESSION['user'])) {
            $this->redirect('/');
        }

        if ($this->isPost()) {
            try {
                $this->validateCSRF();
                
                // Verify CAPTCHA
                include(__DIR__ . '/../../vendor/securimage-master/securimage.php');
                $securimage = new \Securimage();
                
                if ($securimage->check($this->getPost('captcha_code')) === false) {
                    throw new \Exception('The security code entered was incorrect.');
                }

                // Check login attempts
                $ipAddress = $_SERVER['REMOTE_ADDR'];
                $attemptKey = "login_attempts_{$ipAddress}";
                $lockoutKey = "login_lockout_{$ipAddress}";
                
                if (isset($_SESSION[$lockoutKey]) && time() < $_SESSION[$lockoutKey]) {
                    throw new \Exception('Too many login attempts. Please try again later.');
                }

                $username = $this->getPost('username');
                $password = $this->getPost('password');

                $user = $this->userModel->authenticate($username, $password);

                if (!$user) {
                    $_SESSION[$attemptKey] = ($_SESSION[$attemptKey] ?? 0) + 1;
                    
                    if ($_SESSION[$attemptKey] >= $this->maxLoginAttempts) {
                        $_SESSION[$lockoutKey] = time() + $this->lockoutTime;
                        unset($_SESSION[$attemptKey]);
                        throw new \Exception('Too many login attempts. Please try again later.');
                    }
                    
                    throw new \Exception('Invalid username or password.');
                }

                // Reset login attempts on successful login
                unset($_SESSION[$attemptKey]);
                unset($_SESSION[$lockoutKey]);

                if ($user['2fa_enabled']) {
                    $_SESSION['2fa_pending'] = $user['username'];
                    $this->redirect('/auth/2fa');
                }

                $_SESSION['user'] = $user['username'];
                $this->redirect('/');
            } catch (\Exception $e) {
                $this->view('auth/login', [
                    'error' => $e->getMessage(),
                    'old' => ['username' => $this->getPost('username')]
                ]);
            }
        } else {
            $this->view('auth/login', [
                'csrf_token' => $this->generateCSRFToken()
            ]);
        }
    }

    public function twoFactorAuth() {
        if (!isset($_SESSION['2fa_pending'])) {
            $this->redirect('/login');
        }

        if ($this->isPost()) {
            try {
                $this->validateCSRF();
                
                $user = $this->userModel->findByUsername($_SESSION['2fa_pending']);
                
                if (!$user) {
                    throw new \Exception('User not found.');
                }

                // Verify PGP message
                include(__DIR__ . '/../../vendor/pgp-2fa-master/pgp-2fa.php');
                $pgp = new \PGP2FA();
                
                if (!$pgp->compare($this->getPost('decrypted_code'))) {
                    throw new \Exception('Invalid 2FA code.');
                }

                $_SESSION['user'] = $user['username'];
                unset($_SESSION['2fa_pending']);
                
                $this->redirect('/');
            } catch (\Exception $e) {
                $this->view('auth/2fa', [
                    'error' => $e->getMessage(),
                    'pgp_message' => $pgp->encryptSecret($user['public_key'])
                ]);
            }
        } else {
            $user = $this->userModel->findByUsername($_SESSION['2fa_pending']);
            
            include(__DIR__ . '/../../vendor/pgp-2fa-master/pgp-2fa.php');
            $pgp = new \PGP2FA();
            $pgp->generateSecret();
            
            $this->view('auth/2fa', [
                'csrf_token' => $this->generateCSRFToken(),
                'pgp_message' => $pgp->encryptSecret($user['public_key'])
            ]);
        }
    }

    public function register() {
        if (isset($_SESSION['user'])) {
            $this->redirect('/');
        }

        if ($this->isPost()) {
            try {
                $this->validateCSRF();
                
                // Verify CAPTCHA
                include(__DIR__ . '/../../vendor/securimage-master/securimage.php');
                $securimage = new \Securimage();
                
                if ($securimage->check($this->getPost('captcha_code')) === false) {
                    throw new \Exception('The security code entered was incorrect.');
                }

                $data = [
                    'username' => $this->getPost('username'),
                    'password' => $this->getPost('password'),
                    'email' => $this->getPost('email')
                ];

                // Validate password confirmation
                if ($data['password'] !== $this->getPost('password_confirmation')) {
                    throw new \Exception('Password confirmation does not match.');
                }

                $this->userModel->createUser($data);
                
                $this->redirect('/login');
            } catch (\Exception $e) {
                $this->view('auth/register', [
                    'error' => $e->getMessage(),
                    'old' => [
                        'username' => $this->getPost('username'),
                        'email' => $this->getPost('email')
                    ]
                ]);
            }
        } else {
            $this->view('auth/register', [
                'csrf_token' => $this->generateCSRFToken()
            ]);
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}