<?php

require_once __DIR__ . '/../daos/UserDAO.php';

class AuthService {
  private $userDAO;

  public function __construct() {
    $this->userDAO = new UserDAO();
  }

  public function login($email, $password) {
    $user = $this->userDAO->findByEmail($email);

    if ($user && $user->validatePassword($password)) {
      return $user;
    }

    return null;
  }
}
