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

    $sanitizedPassword = htmlspecialchars($password);
    $user = $this->authService->login($email, $sanitizedPassword);

    if ($user) {
      $_SESSION['user_id'] = $user->getId();
      $_SESSION['user_email'] = $user->getEmail();

      header('Location: /dashboard');
      exit();
    } else {
      // TODO: Flash messages
      echo 'Usuário ou senha inválidos';
    }
  }
}
