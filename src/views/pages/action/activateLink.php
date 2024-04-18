<?php
require_once "app/Services/DB.php";
require_once "app/Services/LinksDB.php";

$db = new DB();

LinksDB::linkActivate($_POST['id'], $db);