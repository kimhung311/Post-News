<?php

class Post
{
    public static function getpost()
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM posts";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Lỗi không tìm thấy data" . $error_message;
            exit();
        }
    }
    public static function addpost($name, $category_id, $user_id, $title, $content, $description, $picture, $image_detail)
    {
        $db = Database::getDB();
        try {
            $query = "INSERT INTO  posts(name, category_id, user_id, title, content, description, picture, image_detail)
            VALUE( :name, :category_id, :user_id, :title, :content, :description, :picture, :image_detail)";
            // name	category_id	user_id	title	content	description	picture	image_detail

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':category_id', $category_id);
            $statement->bindValue(':user_id', $user_id);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':content', $content);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':picture', $picture);
            $statement->bindValue(':image_detail', $image_detail);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Error Database: " . $error_message;
            exit();
        }
    }

    public static function post_detail($id)
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM posts WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Error Database Post Detail: " . $error_message;
            exit();
        }
    }
}