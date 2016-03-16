<?php
$router->map('GET', '/', 'Wronski\Controllers\PageController@index', 'home');
$router->map('GET', '/login', 'Wronski\Controllers\PageController@getLogin', 'getLogin');
$router->map('GET', '/contact/[i:id]', 'Wronski\Controllers\PageController@singleContact', 'singleContact');

$router->map('GET', '/create', 'Wronski\Controllers\ContactController@create', 'createContact');
$router->map('POST', '/create', 'Wronski\Controllers\ContactController@store', 'storeContact');
$router->map('GET', '/edit/[i:id]', 'Wronski\Controllers\ContactController@edit', 'editContact');
$router->map('POST', '/update/[i:id]', 'Wronski\Controllers\ContactController@update', 'updateContact');
$router->map('GET', '/delete/[i:id]', 'Wronski\Controllers\ContactController@delete', 'deleteContact');



$router->map('GET', '/[*]', 'Wronski\Controllers\Controller@get404', '404');
