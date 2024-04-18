<?php
session_start();
require_once "app/Services/DB.php";
require_once "app/Services/LinksDB.php";
require_once "views/pages/action/helper.php";

$db = new DB();
//var_dump($_POST);
$linkArr = parse_url($_POST['link']);
if (isset($linkArr['host'])){
    $host = $linkArr['host'];
}else{
    $host = '';
}
if (isset($linkArr['path'])){
    $path = $linkArr['path'];
}else{
    $path = '';
}
$link = $host . $path;

//Проверка на существование данной ссылки
if (LinksDB::checkUrl($link, $db)){
    //Сылку ещё не сокращали
    $url_key = null;
    while($url_key === null){
        $url_key_check = generateString();
        if (LinksDB::checkUrlKey($url_key_check, $db)){
            $url_key = $url_key_check;
        }
    }

    $userID = 0;
    if (isset($_SESSION['user_id'])){
        $userID = $_SESSION['user_id'];
    }

    $params = [
        'url' => $link,
        'url_key' => $url_key,
        'user_id' => $userID,
        'count' => 0,
        'action' => 1,
    ];
    $db->query('INSERT INTO `links` ( url, url_key, user_id, count, action ) VALUES ( :url, :url_key, :user_id, :count, :action )', $params);
}

$getLink = LinksDB::getShortLink($link, $db);

echo $getLink;