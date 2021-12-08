<?php
class Admin
{
    public static function getadmin()
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM admin ";
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
    public static function login($email, $password)
    {
        $db =  Database::getDB();
        try {
            $query = "SELECT * FROM admin WHERE email = '$email'and password = '$password";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
            exit();
        }
    }
}