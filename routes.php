<?php

$router->map('GET', '/', 'Wronski\Controllers\PageController@index', 'home');
$router->map('GET', '/[*]', 'Wronski\Controllers\PageController@get404', '404');
