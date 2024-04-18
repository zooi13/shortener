<?php
session_start();
require_once "app/Services/DB.php";
require_once "app/Services/UsersDB.php";

$db = new DB();

$login = $_POST['login'];
$password = md5($_POST['password']);

$id = UsersDB::loginUser($db, $login, $password);
$res = [];
if ($id === []){
    $res = 'error';
    echo $res;
}else{
    $_SESSION['user_id'] = $id[0]['id'];
    $res = $id[0]['id'];
    echo $res;
//    var_dump($arr);
}