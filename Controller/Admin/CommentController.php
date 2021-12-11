<?php
include('Middleware/Authenticantion.php');

class CommentController
{
    public static function index()
    {
        $action = filter_input(INPUT_POST, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_GET, 'action');
            if (empty($action)) {
                $action = 'list-comment';
            }
        }
        switch ($action) {
            case 'list-comment':
                if (isset($_SESSION['auth'])) {
                    $categories = Category::getcate();
                    include('View/Admin/Comment/index.php');
                    break;
                }
                include('View/Admin/Auth/login.php');
                break;
            case 'delete':
                break;
            default:
                break;
        }
    }
}