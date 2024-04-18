<?php
session_start();
$displayLogin = '';
$displayLogout = 'display: none';
if (isset($_SESSION['user_id'])){
    $displayLogin = 'display: none';
    $displayLogout = '';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сократитель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container p-3">
    <ul class="nav nav-tabs justify-content-end">
        <li class="nav-item">
            <a class="nav-link <?php if ($activMenu === 'home'){echo 'active';}?>" aria-current="page" href="/">Сократить</a>
        </li>
        <li class="nav-item dropdown" style="<?=$displayLogin?>">
            <a class="nav-link dropdown-toggle <?php if ($activMenu === 'login'){echo 'active';}?>" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">Аккаунт</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/login">Авторизация</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/register">Регистрация</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown" style="<?=$displayLogout?>">
            <a class="nav-link dropdown-toggle <?php if ($activMenu === 'login'){echo 'active';}?>" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">Аккаунт</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/home">Мои ссылки</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="action/logOut">Выйти</a></li>
            </ul>
        </li>

    </ul>
</div>