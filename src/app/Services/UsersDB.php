<?php
require_once "app/Services/DB.php";
class UsersDB
{
    public static function registerUser($db, $name, $password)
    {
        $params = [
            'name' => $name,
            'password' => $password,
        ];
        $db->query('INSERT INTO `users` ( name, password) VALUES ( :name, :password )', $params);
    }

    public static function loginUser($db, $name, $password)
    {
        $params = [
            'name' => $name,
            'password' => $password,
        ];
        return $db->query('SELECT id FROM `users` WHERE name = :name AND password = :password', $params);
    }

    public static function checkLogin($login, $db)
    {
        $params = [
            'name' => $login,
        ];
        $arr = $db->query('SELECT id FROM `users` WHERE name = :name', $params);
        if ($arr === []){
            return true;
        }else{
            return $arr[0]['id'];
        }
    }


}