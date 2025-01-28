<?php $hide_sidebar = true; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/auth/login">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" 
                                   value="<?php echo htmlspecialchars($old['username'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="captcha">Security Code:</label>
                            <div class="captcha-container">
                                <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image">
                                <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">
                                    [ Different Image ]
                                </a>
                            </div>
                            <input type="text" class="form-control" id="captcha_code" name="captcha_code" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <div class="text-center" style="margin-top: 15px;">
                        <p>Don't have an account? <a href="/auth/register">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>