<?php

class User {
  private $id;
  private $name;
  private $email;
  private $encryptedPassword;

  public function __construct($id, $name, $email, $encryptedPassword) {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->encryptedPassword = $encryptedPassword;
  }

  public function validatePassword($password) {
    return password_verify($password, $this->encryptedPassword);
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getEmail() {
    return $this->email;
  }
}
