<?php
//Файл роутинга (регистрация страниц)
require_once "app/Services/Router.php";


Router::page('/', 'main');
Router::page('/home', 'home');
Router::page('/404', '404');
Router::page('/login', 'login');
Router::page('/register', 'register');

Router::page('/action/short', 'action/short');
Router::page('/action/checkLogin', 'action/checkLogin');
Router::page('/action/regUser', 'action/regUser');
Router::page('/action/logUser', 'action/logUser');
Router::page('/action/logOut', 'action/logOut');

Router::page('/action/deactivateLink', 'action/deactivateLink');
Router::page('/action/activateLink', 'action/activateLink');

Router::enable();