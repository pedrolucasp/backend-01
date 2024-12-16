<?php

require_once __DIR__ . '/../services/AuthService.php';

class AuthController {
  private $authService;

  public function __construct() {
    $this->authService = new AuthService();
  }

  public function login() {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cryptographicPassword = password_hash($password, PASSWORD_DEFAULT);

    $user = $this->authService->login($email, $cryptographicPassword);

    if ($user) {
      //$_SESSION['user_id'] = $user['id'];
      echo 'Usuário logado com sucesso';
    } else {
      echo 'Usuário ou senha inválidos';
    }
  }
}
