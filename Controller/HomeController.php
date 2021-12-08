<?php
class HomeController
{
    public static function home()
    {
        $action = filter_input(INPUT_POST, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_GET, 'action');
            if (empty($action)) {
                $action = 'home';
            }
        }
        switch ($action) {
            case 'home':
                $categories = Category::getcate();
                // $admin = Admin::getadmin();

                // var_dump($categories);
                include('View/Home/home.php');
                break;
            default:
                include('View/error/error_404.php');
                exit();
                break;
        }
    }
}
HomeController::home();