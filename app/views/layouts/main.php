<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title ?? 'E-Shop'; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <div class="container-fluid text-center main">
        <div class="row">
            <?php if (!isset($hide_sidebar)): ?>
                <div class="col-md-3 text-center sidebar">
                    <?php include __DIR__ . '/../partials/sidebar.php'; ?>
                </div>
                <div class="col-md-9 main-content">
                    <?php echo $content; ?>
                </div>
            <?php else: ?>
                <div class="col-md-12 main-content">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>