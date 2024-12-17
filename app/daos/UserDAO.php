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

  public function create(User $user) {
    $sql = 'INSERT INTO users (username, email, encrypted_password) VALUES (:username, :email, :encrypted_password)';


    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':username', $user->getUserName());
    $stmt->bindValue(':email', $user->getEmail());
    $stmt->bindValue(':encrypted_password', $user->getEncryptedPassword());
    $stmt->execute();

    $user->setId($this->db->lastInsertId());

    return $user;
  }
}
