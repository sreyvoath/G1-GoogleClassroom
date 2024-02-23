<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/trainer-student' => 'controllers/students/student.controller.php',
    '/trainer-review' => 'controllers/reviews/review.controller.php',
<<<<<<< HEAD
    // '/trainer-classroom' => 'controllers/classroom/classroom.controller.php',
=======
    '/trainer-classroom' => 'controllers/trainers/assignment.controller.php',
>>>>>>> f743324a97dc4c30f5f9641fd6679547ccdb9d8a
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require "layouts/teacher/header.php";
require "layouts/teacher/navbar.php";
require $page;
require "layouts/teacher/footer.php";