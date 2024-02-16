<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' => 'controllers/start/start.controller.php',
    '/user-signin' => 'controllers/signin/signin.controller.php',
    '/user-signup' => 'controllers/signup/signup.controller.php',
    '/user-signout' => 'controllers/signout/signout.controller.php',
    '/home' => 'controllers/home/home.controller.php',
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require $page;
