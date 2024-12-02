<?php

$uri = trim($_SERVER['REQUEST_URI']); // Menghilangkan karakter '/' di awal dan akhir

$uriParts = explode('?', $uri, 2);
$route = $uriParts[0]; // Bagian rute tanpa query string

$route = str_replace('/pondok-gita', '', $route);
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
        default:
            $file = "{$path}/dashboard.php";
            break;
    }
} else {
    // User
    $path = 'views/user/pages';
    switch ($route) {
        case '/':
            $file = "{$path}/home.php";
            break;
        case '/about':
            $file = "{$path}/about.php";
            break;
        default:
            $file = 'views/404.php'; // Halaman 404 jika route tidak ditemukan
            break;
    }
}

include $file;
