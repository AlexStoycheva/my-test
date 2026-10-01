<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> · <?= e(SITE_NAME) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="index.php"><?= e(SITE_NAME) ?></a>
        <nav>
            <?php foreach (NAV_ITEMS as $slug => $label): ?>
                <a href="index.php?page=<?= e($slug) ?>"
                   class="<?= $slug === $page ? 'active' : '' ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>
<main class="container">
