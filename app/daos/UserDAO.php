<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserDAO {
  private $db;

  public function __construct() {
    $this->db = getDatabaseConnection();
  }

  public function findByEmail($email) {
    $sql = 'SELECT * FROM users WHERE email = :email';

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
      return new User(
        $userData['id'],
        $userData['username'],
        $userData['email'],
        $userData['encrypted_password']
      );
    }

    return null;
  }
}
