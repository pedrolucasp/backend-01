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

  public function register() {
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $passwdConfirmation = $_POST['password_confirmation'];

    if ($password != $passwdConfirmation) {
      // TODO: Flash messages
      echo 'As senhas não conferem';
      return;
    }

    if (empty($email) || empty($password) || empty($userName)) {
      throw new Exception("Email, username or password cannot be empty.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new Exception("Invalid email format.");
    }

    $cryptographicPassword = password_hash($password, PASSWORD_DEFAULT);
    $user = $this->authService->register($userName, $email, $cryptographicPassword);

    if ($user) {
      header('Location: /login');
      exit();
    } else {
      // TODO: Flash messages
      echo 'Erro ao cadastrar usuário';
    }
  }
}
