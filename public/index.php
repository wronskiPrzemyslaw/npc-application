<?php
// włączenie raportowania błędów w pliku .env
if(!getenv('DEBUG')) { error_reporting(0); }

require __DIR__ . '/../bootstrap/start.php';
Dotenv::load(__DIR__ . '/../');
require __DIR__ . '/../bootstrap/db.php';
require __DIR__ . '/../routes.php';

$match = $router->match();

list($controller, $method) = explode("@", $match['target']);

if(is_callable([$controller, $method])) {
	$object = new $controller;
	call_user_func_array([$object, $method], [$match['params']]);
} else {
	echo "Nie można znaleźć metody kontrollera";
	exit();
}
