<?php

require_once "app/Services/DB.php";
require_once "app/Services/UsersDB.php";

$db = new DB();

$res = UsersDB::checkLogin($_POST['login'], $db);

if ($res === true){
    echo '+';
}else{
    echo $res;
}