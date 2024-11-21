<?php
require "../app/models/User.php";
require "../app/controllers/UserController.php";
require "../app/models/Post.php";
require "../app/controllers/PostController.php";

use app\controllers\UserController;
use app\controllers\PostController;

// Get URI without query string
$url = strtok($_SERVER["REQUEST_URI"], '?');

// Split URL into array
$uriArray = explode("/", $url);

if (empty($uriArray[1])) {
    require './views/add-posts.html';
    exit;
}

// User-related routes
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->getUsers();
}

if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/users.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $userController->saveUser();
}

if ($uriArray[1] === 'add-users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/add-users.html';
}

// Post-related routes
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->getPosts();
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/posts.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->savePost();
}

if ($uriArray[1] === 'add-posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/add-posts.html';
}
