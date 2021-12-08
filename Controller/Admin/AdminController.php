<?php
class AdminController
{

    public static function index()
    {
        $action = filter_input(INPUT_POST, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_GET, 'action');
            if (empty($action)) {
                $action = 'index';
            }
        }
        switch ($action) {
            case 'index':  // show list tài khoản admin chỉ có người tối cao mới được xem
                // $admin = Admin::getadmin();
                include('View/Admin/List-admin/index.php');
                break;
            case 'login': // đăng nhâp Admin
                include('View/Admin/Auth/login.php');
                break;
            case 'register':  // tạo khoản user
                include('View/Admin/Auth/register.php');
                break;
            case 'submit':
                // $email = filter_input(INPUT_POST, 'email');
                // $password = filter_input(INPUT_POST, 'password');
                // $logIn = Admin::checklogin($email, $password);
                // if (!empty($logIn)) {
                //     $_SESSION['auth'] = [
                //         'id' => $logIn['id'],
                //         'email' => $email,
                //         'password' => $password
                //     ];
                //     $admin = Admin::getadmin();
                //     include('View/Admin/all.php');
                //     break;
                // } else {
                //     echo '<script language="javascript">';
                //     echo 'alert("ERROR EMAIL OR PASSWORD")';
                //     echo '</script>';
                // }
                // include('View/Admin/Auth/login.php');
                // break;
            case 'add':  //lưu tài khoản vừa tạo vào db
                // $name = filter_input(INPUT_POST, 'name');
                // $email = filter_input(INPUT_POST, 'email');
                // $password = filter_input(INPUT_POST, 'password');
                // Admin::addadmin($name, $email, $password);
                // $admin = Admin::getadmin();
                // include('View/Admin/Login.php');
                // break;
            case 'logout':  // đăng xuất tài khoản
                session_destroy();
                include('View/Admin/Login.php');
                exit;
                break;
                // case 'change-password':
                //     if ($_SESSION['auth']['id']) {
                //         $id = filter_input(INPUT_GET, 'id');
                //         $admin = Admin::getAdminById($id);
                //         include('View/Admin/change_password.php');
                //     }
                //     break;
                // case 'post-change-password':
                //     $id = filter_input(INPUT_GET, 'id');
                //     if (!empty($id)) {
                //         $id = filter_input(INPUT_POST, 'id');
                //         $currentPassword = password_hash(filter_input(INPUT_POST, 'current_password'), PASSWORD_BCRYPT);
                //         $new_password = password_hash(filter_input(INPUT_POST, 'new_password'), PASSWORD_BCRYPT);
                //         $cfPassword = filter_input(INPUT_POST, 'cf_password');
                //         $admin = Admin::getAdminById($id);
                //         if ($admin['password'] != $currentPassword) {
                //             return false;
                //         }
                //         Admin::updatePassword($id, $new_password);
                //         include('View/Admin/all.php');
                //     }
                //     exit;
                //     break;
            default:
                // include('View/Home/Error/error_404.php');
                exit();
        }
    }
}
AdminController::index();