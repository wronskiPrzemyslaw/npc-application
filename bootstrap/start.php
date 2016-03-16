<?php
// Wczytanie pliku autoload composer
require __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new AltoRouter();