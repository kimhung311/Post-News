<?php
class Comment
{
    public static function getcomment()
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM comments";
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
}