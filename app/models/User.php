<?php

require_once __DIR__ . '/Base.php';

class User extends Base {
  private $userName;
  private $email;
  private $encryptedPassword;

  public function __construct($id, $userName, $email, $encryptedPassword) {
    $this->id = $id;
    $this->userName = $userName;
    $this->email = $email;
    $this->encryptedPassword = $encryptedPassword;
  }

  public function validatePassword($password) {
    return password_verify($password, $this->encryptedPassword);
  }

  public function getId() {
    return $this->id;
  }

  public function getUserName() {
    return $this->userName;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getEncryptedPassword() {
    return $this->encryptedPassword;
  }
}
