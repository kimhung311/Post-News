<?php
include('Middleware/Authenticantion.php');

class PostController
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
            case 'index':
                // var_dump(122);
                // die();
                $post = Post::getpost();
                include('View/Admin/Posts/index.php');
                break;
            case 'create':
                $categories = Category::getcate();
                $user = Admin::getadmin();
                $post = Post::getpost();
                include('View/Admin/Posts/create.php');
                break;
            case 'store':
                $name = filter_input(INPUT_POST, 'name');
                $category_id = filter_input(INPUT_POST, 'category_id');
                $user_id = filter_input(INPUT_POST, 'user_id');
                $title = filter_input(INPUT_POST, 'title');
                $content = filter_input(INPUT_POST, 'content');
                $description = filter_input(INPUT_POST, 'description');
                $picture = filter_input(INPUT_POST, 'picture');
                $image_detail = filter_input(INPUT_POST, 'image_detail');
                Post::addpost($name, $category_id, $user_id, $title, $content, $description, $picture, $image_detail);
                // $a = [$name, $category_id, $user_id, $title, $content, $description, $picture, $image_detail];
                // var_dump($a);
                // die();
                $post = Post::getpost();
                header('Location: .?controller=post&action=index');
                break;
            case 'post_detail':
                $id = filter_input(INPUT_GET, 'id');
                $post = Post::post_detail($id);
                // var_dump(1111);
                // exit();

                include('View/Admin/Posts/post_detail.php');
                break;
                // case 'edit':
                //     $id = filter_input(INPUT_GET, 'id');
                //     $categories = Category::getcate();
                //     $post =  Post::editpost($id);
                //     include('View/Admin/Post/edit.php');
                //     break;
                // case  'update':
                //     $id = filter_input(INPUT_POST, 'id');
                //     $category_id = filter_input(INPUT_POST, 'category_id');
                //     $author = filter_input(INPUT_POST, 'author');
                //     $title = filter_input(INPUT_POST, 'title');
                //     $maxdate = filter_input(INPUT_POST, 'maxdate');
                //     $information = filter_input(INPUT_POST, 'information');
                //     $summary = filter_input(INPUT_POST, 'summary');

                //     $image_dir_path = getcwd() . '/public/images/post';
                //     if (empty($_FILES['picture'])) {
                //         $picture = filter_input(INPUT_POST, 'old_picture');
                //     } else {
                //         $filename = $_FILES['picture']['name'];
                //         $source = $_FILES['picture']['tmp_name'];
                //         $target = $image_dir_path . '/' . $filename;
                //         $success = move_uploaded_file($source, $target);
                //         $picture = $filename;
                //     }

                //     $image_dir_path = getcwd() . '/public/images/post/image_detail';
                //     if (empty($_FILES['image_detail'])) {
                //         $image_detail = filter_input(INPUT_POST, 'image_detail');
                //     } else {
                //         $filename = $_FILES['image_detail']['name'];
                //         $source = $_FILES['image_detail']['tmp_name'];
                //         $target = $image_dir_path . '/' . $filename;
                //         $success = move_uploaded_file($source, $target);
                //         $image_detail = $filename;
                //     }
                //     Post::updatepost($id, $title, $author, $category_id, $maxdate, $information, $summary, $picture, $image_detail);
                //     $post = Post::getpost();
                //     header('Location: .?controller=postcontroller&action=index');
                //     break;
                // case 'delete':
                //     $id = filter_input(INPUT_GET, 'id');
                //     Post::delete($id);
                //     $post = Post::getpost();
                //     include('View/Admin/Post/index.php');
                //     break;
            default:
                include('View/error/error_404.php');
                exit();
                break;
        }
    }
}
PostController::index();