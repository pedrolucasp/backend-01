<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'config/database.php';
$app = require_once 'config/routes.php';

echo $app();
