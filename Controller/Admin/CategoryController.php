<?php
include('Middleware/Authenticantion.php');
class CategoryController
{
    public static function index()
    {
        $action = filter_input(INPUT_POST, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_GET, 'action');
            if (empty($action)) {
                $action = 'list_category';
            }
        }
        switch ($action) {
            case 'list_category':
                // if (isset($_SESSION['auth'])) {
                $categories = Category::getcate();
                include('View/Admin/Categories/index.php');
                break;
                // }
                // include('View/Admin/login.php');
                break;
            case 'add':
                $user = Admin::getadmin();
                $categories = Category::getcate();
                // $user = User::getuser();
                include('View/Admin/Categories/create.php');
                break;
            case 'store':
                $name = filter_input(INPUT_POST, 'name');
                $paren_id = filter_input(INPUT_POST, 'paren_id');
                $user_id = filter_input(INPUT_POST, 'user_id');
                Category::add($name, $paren_id, $user_id);
                $categories = Category::getcate();
                header('Location: .?controller=category&action=list_category');
                exit();
                break;
            case 'edit':
                $id = filter_input(INPUT_GET, 'id');
                $category = Category::editCategories($id);
                $categories = Category::getcate();
                include('View/Admin/Categories/edit.php');
                break;
            case 'save':
                $id = filter_input(INPUT_POST, 'id');
                $name = filter_input(INPUT_POST, 'name');
                $paren_id = filter_input(INPUT_POST, 'paren_id');
                Category::updatecategory($id, $name, $paren_id, $user_id);

                $category = Category::getcate();
                header('Location: .?controller=category&action=list_category');
                break;
            case 'delete':
                $id = filter_input(INPUT_GET, 'id');
                Category::deletecategory($id);
                $category = Category::getcate();
                header('Location: .?controller=category&action=list_category');
                break;
            default:
                //code
                include('View/error/error_404.php');
                exit();
                break;
        }
    }
}
CategoryController::index();