<?php
require_once "app/Services/DB.php";
require_once "app/Services/UsersDB.php";

$db = new DB();

$login = $_POST['login'];
$password = md5($_POST['password']);

UsersDB::registerUser($db, $login, $password);

Header ("Location: /login");
exit();