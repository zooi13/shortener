<?php
require_once "app/Services/DB.php";
require_once "app/Services/LinksDB.php";

$db = new DB();

LinksDB::linkDeactivate($_POST['id'], $db);