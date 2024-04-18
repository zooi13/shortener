<?php
require_once "app/Services/DB.php";
require_once "app/Services/LinksDB.php";
require_once "views/pages/action/helper.php";
$db = new DB();


$redirectLink = LinksDB::getLink(substr($_GET['q'], 1), $db);

if ($redirectLink === false){
    Header ("Location: 404");
    exit();
}else{
    if ($redirectLink['action'] === 0){
        Header ("Location: 404");
        exit();
    }else{
        $redirectLink = $redirectLink['url'];
        LinksDB::countUpgrade($redirectLink, $db);
        Header ("Location: http://$redirectLink");
        exit();
    }
}