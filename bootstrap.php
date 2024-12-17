<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

session_start();

require_once 'config/database.php';
require_once __DIR__ . '/app/helpers/SessionMiddleware.php';
$app = require_once 'config/routes.php';

$currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
sessionMiddleware($currentRoute);

echo $app();
