<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Simple router: ?page=about -> pages/about.php
$page = $_GET['page'] ?? 'home';
if (!array_key_exists($page, NAV_ITEMS)) {
    http_response_code(404);
    $page = '404';
}

$pageTitle = NAV_ITEMS[$page] ?? 'Page not found';

require __DIR__ . '/includes/header.php';
require __DIR__ . '/pages/' . $page . '.php';
require __DIR__ . '/includes/footer.php';
