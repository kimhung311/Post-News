<?php

class Category
{
    public static function getcate()
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM categories";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
            exit();
        }
    }

    public static function add($name, $paren_id = 0, $user_id)
    {
        $db = Database::getDB();
        try {
            $query = "INSERT INTO categories(name, paren_id, user_id)
                        VALUES (:name, :paren_id, :user_id)";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':paren_id', $paren_id);
            $statement->bindValue(':user_id', $user_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Data error  ";
            exit();
        }
    }

    public static function editCategories($id)
    {
        $db = Database::getDB();
        try {
            $query = "SELECT *  
                    FROM categories
                    WHERE id = :id ";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Data error: $error_message";
            exit();
        }
    }

    public static function getChildren($paren_id)
    {
        $db = Database::getDB();
        try {
            $query = "SELECT *  
                    FROM categories
                    WHERE paren_id = " . $paren_id;
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Data error: $error_message";
            exit();
        }
    }

    public static function updatecategory($id, $name, $paren_id, $user_id)
    {
        $db = Database::getDB();
        try {
            $query = "UPDATE categories
                    SET name = :name , paren_id = :paren_id, user_id = :user_id
                    WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':paren_id', $paren_id);
            $statement->bindValue(':user_id', $user_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Data error update database: " . $error_message;
            exit();
        }
    }


    public static function deletecategory($id)
    {
        $db = Database::getDB();
        try {
            $query = " DELETE FROM  categories
                        WHERE id = :id ";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Data error ";
            exit();
        }
    }
}