<?php

function getDatabaseConnection() {
  $pdo = new PDO('sqlite:storage/database.sqlite');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  return $pdo;
}
