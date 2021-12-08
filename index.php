<?php
@session_start();
include('Router/index.php');

$controller = filter_input(INPUT_GET, 'controller');
if (empty($controller)) {
    $controller = 'admin';
}

switch ($controller) {
    case 'admin':
        include('Controller/Admin/AdminController.php');
        break;
    case 'home':
        include('Controller/HomeController.php');
        break;
    case 'post':
        include('Controller/Admin/PostController.php');
        break;
    case 'category':
        include('Controller/Admin/CategoryController.php');
        break;
    case 'user':
        include('Controller/Admin/UserController.php');
        break;
    case 'comment':
        include('Controller/Admin/CommentController.php');
        break;
    default:
        include('View/error/error_404.php');
        exit();
        break;
}