<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/vendor/autoload.php";
$config = require __DIR__ . '/application/config/main.php';


$app = new Application();
$app->merge($config);
$app->route()->get($_GET);
