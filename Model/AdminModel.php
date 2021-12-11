<?php
class Admin
{
    public static function getadmin()
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM user ";
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

    public static function checklogin($email, $password)
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM user where email = :email and password = :password";
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
    public static function addadmin($role_id, $name, $email, $password, $avatar = 'áđasad', $type = 'user', $address, $phone)
    {
        $db = Database::getDB();
        try {
            $query = "INSERT INTO user (role_id, name, email, password, avatar, type, address, phone) 
            VALUE(:role_id, :name, :email, :password, :avatar, :type, :address, :phone)";
            $statement = $db->prepare($query);
            $statement->bindValue(':role_id', $role_id);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':avatar', $avatar);
            $statement->bindValue(':type', $type);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':phone', $phone);
            $statement->execute();
            // $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
    public static function getidchangepass($id)
    {
        $db = Database::getDB();
        try {
            $query = "SELECT * FROM user WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "ERROR" . $error_message;
        }
    }
    public static function success_changpasss($id, $new_password)
    {
        $db = Database::getDB();
        try {
            $query = "UPDATE admin
                SET  password = :new_password
                WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            var_dump(11);
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $statement->bindValue(':new_password', $new_password);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
        }
        $error_message = $e->getMessage();
        echo "ERROR Password  Data" . $error_message;
        exit();
    }
}