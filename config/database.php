<?php

function getDatabaseConnection() {
  $dbFile = __DIR__ . '/../storage/database.sqlite';

  $pdo = new PDO('sqlite:' . $dbFile);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  return $pdo;
}
