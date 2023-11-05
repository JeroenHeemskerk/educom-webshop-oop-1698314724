<?php

class UserService
{

    public static function authenticateUser($user, $password)
    {
        return trim($user['password']) == $password;
    }


    public static function doesEmailExist($email)
    {
        require_once('database-connection.php');
        $result = DatabaseConnection::findUserByEmail($email);

        return $result != null;
    }
}
