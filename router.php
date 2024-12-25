<?php
include 'config.php';

function route($path)
{
    global $base_url;
    return rtrim($base_url, '/') . $path;
}
function asset($path)
{
    global $asset_url;
    return rtrim($asset_url, '/') . $path;
}

$uri = trim($_SERVER['REQUEST_URI']);
$uriParts = explode('?', $uri, 2);
$route = $uriParts[0];

$route = str_replace($base_url, '', $route);
$route = rtrim($route, '/');
$route = empty($route) ? '/' : $route;

if (strpos($route, '/admin') === 0) {
    // Admin
    $path = 'views/admin/pages';
    switch ($route) {
        case '/admin':
            $file = "{$path}/dashboard.php";
            break;
        case '/admin/gallery':
            $file = "{$path}/gallery.php";
            break;
        case '/admin/gallery-controller':
            $file = "controllers/admin/gallery-controller.php";
            break;
        case '/admin/facilities':
            $file = "{$path}/facilities.php";
            break;
        case '/admin/facilities-controller':
            $file = "controllers/admin/facilities-controller.php";
            break;
        case '/admin/reviews':
            $file = "{$path}/reviews.php";
            break;
        default:
            $file = "{$path}/dashboard.php";
            break;
    }
} else {
    // User
    $path = 'views/user/pages';
    switch ($route) {
        case '/':
            $file = "{$path}/beranda.php";
            break;
        case '/about-us':
            $file = "{$path}/about-us.php";
            break;
        case '/facilities':
            $file = "{$path}/facilities.php";
            break;
        case '/gallery':
            $file = "{$path}/gallery.php";
            break;
        case '/contact':
            $file = "{$path}/contact.php";
            break;
        case '/review':
            $file = "controllers/user/review-controller.php";
            break;
        default:
            $file = 'views/404.php'; // Halaman 404 jika route tidak ditemukan
            break;
    }
}

include $file;
