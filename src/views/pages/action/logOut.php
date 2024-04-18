<?php
session_start();
$_SESSION = [];
Header ("Location: /");
exit();