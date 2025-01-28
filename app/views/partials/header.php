<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-Shop</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/products">Products</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="/products/create">Add Product</a></li>
                    <li><a href="/profile">Profile</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="/profile/settings"><span class="glyphicon glyphicon-user"></span> <?php echo htmlspecialchars($_SESSION['user']); ?></a></li>
                    <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php else: ?>
                    <li><a href="/auth/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="/auth/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php if (isset($error)): ?>
    <div class="container">
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($success)): ?>
    <div class="container">
        <div class="alert alert-success">
            <?php echo htmlspecialchars($success); ?>
        </div>
    </div>
<?php endif; ?>