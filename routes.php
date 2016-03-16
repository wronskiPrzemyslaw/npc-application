<?php
$router->map('GET', '/', 'Wronski\Controllers\PageController@index', 'home');
$router->map('GET', '/login', 'Wronski\Controllers\PageController@getLogin', 'getLogin');



$router->map('GET', '/[*]', 'Wronski\Controllers\PageController@get404', '404');
