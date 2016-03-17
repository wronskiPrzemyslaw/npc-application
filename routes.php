<?php
// ogólnodostępne
$router->map('GET', '/', 'Wronski\Controllers\PageController@index', 'home');
$router->map('GET', '/contact/[i:id]', 'Wronski\Controllers\PageController@singleContact', 'singleContact');
$router->map('GET', '/login', 'Wronski\Controllers\AuthController@getLogin', 'getLogin');
$router->map('POST', '/login', 'Wronski\Controllers\AuthController@postLogin', 'postLogin');

// dostępne po zalogowaniu
if(Wronski\Auth\LoggedIn::user()) {
$router->map('GET', '/logout', 'Wronski\Controllers\AuthController@logout', 'logout');
$router->map('GET', '/create', 'Wronski\Controllers\ContactController@create', 'createContact');
$router->map('POST', '/create', 'Wronski\Controllers\ContactController@store', 'storeContact');
$router->map('GET', '/edit/[i:id]', 'Wronski\Controllers\ContactController@edit', 'editContact');
$router->map('POST', '/update/[i:id]', 'Wronski\Controllers\ContactController@update', 'updateContact');
$router->map('POST', '/delete', 'Wronski\Controllers\ContactController@delete', 'deleteContact');
}

// strona błędu gdy z żadna z powyższych ścieżek nie pasuje
$router->map('GET', '/[*]', 'Wronski\Controllers\Controller@get404', '404');
