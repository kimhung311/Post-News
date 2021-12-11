<?php
class AdminController
{

    public static function index()
    {
        $action = filter_input(INPUT_POST, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_GET, 'action');
            if (empty($action)) {
                $action = 'login';
            }
        }

        switch ($action) {
            case 'index':  // show list tài khoản admin chỉ có người tối cao mới được xem
                $user = Admin::getadmin();
                include('View/Admin/List-admin/index.php');
                break;
            case 'login': // đăng nhâp  form Admin
                if (isset($_SESSION['user'])) {
                    $user = Admin::getadmin();
                    include('View/Admin/List-admin/index.php');
                } else {
                    include('View/Admin/Auth/login.php');
                }
                break;
            case 'submit': // đăng nhập
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password');
                $login = Admin::checklogin($email, $password);
                if (!empty($login)) { // check login   và xử lý lưu id  email password vào SESSION
                    $_SESSION['user'] = [
                        'id' => $login['id'],
                        'email' => $email,
                        'name' => $login['name'],
                        'avatar' => $login['avatar'],
                        'role_id' => $login['role_id'],
                        'password' => $password,
                        'type' => $login['type'],
                        'address' => $login['address'],
                        'phone' => $login['phone'],
                    ];

                    $admin = Admin::getadmin();
                    echo '<script language="javascript">';
                    echo 'alert("LOGIN SUCCESSFUL");';
                    echo '</script>';
                    // include('View/Admin/List-admin/index.php');
                    header('Location: .?controller=admin&action=index');
                    break;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("ERROR EMAIL OR PASSWORD")';
                    echo '</script>';
                }
                header('Location: .?controller=admin&action=login');
                break;
            case 'logout': // đăng xuất 
                session_destroy();  // thoát khoải đăng nhập
                header('Location: .?controller=admin&action=login');
                exit;
                break;
            case 'register':
                include('View/Admin/Auth/register.php');
                break;
            case 'add':  //lưu tài khoản vừa tạo vào db
                $role_id = filter_input(INPUT_POST, 'role_id');
                $name = filter_input(INPUT_POST, 'name');
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'password');
                $avatar = filter_input(INPUT_POST, 'avatar');
                $type = filter_input(INPUT_POST, 'type');
                $address = filter_input(INPUT_POST, 'address');
                $phone = filter_input(INPUT_POST, 'phone');
                Admin::addadmin($role_id, $name, $email, $password, $avatar, $type, $address, $phone);
                $admin = Admin::getadmin();
                header('Location: .?controller=admin&action=login');
                echo '<script language="javascript">';
                echo 'alert("REGISTER SUCCESSFUL");';
                echo '</script>';
                break;
            case 'change-password':
                if ($_SESSION['user']['id']) {
                    $id = filter_input(INPUT_GET, 'id');
                    $admin = Admin::getidchangepass($id);
                    include('View/Admin/Auth/change_password.php');
                    exit();
                }
                break;
            case 'add-change-password':
                $id = filter_input(INPUT_GET, 'id');
                if (!empty($id)) {
                    $id = filter_input(INPUT_POST, 'id');
                    $currentPassword = password_hash(filter_input(INPUT_POST, 'current_password'), PASSWORD_BCRYPT);
                    $new_password = password_hash(filter_input(INPUT_POST, 'new_password'), PASSWORD_BCRYPT);
                    $cfPassword = filter_input(INPUT_POST, 'cf_password');
                    // $admin = Admin::getAdminById($id);
                    if ($admin['password'] != $currentPassword) {
                        return false;
                    }
                    // Admin::updatePassword($id, $new_password);
                    include('View/Admin/all.php');
                }
                exit;
                break;
            default:
                include('View/Error/error_404.php');
                exit();
        }
    }
}
AdminController::index();