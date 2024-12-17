<?php

function sessionMiddleware($currentRoute) {
  $publicRoutes = ['/login', '/register', '/'];

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if (isset($_SESSION['user_id']) && in_array($currentRoute, $publicRoutes)) {
    header('Location: /dashboard');
    exit;
  }

  if (!isset($_SESSION['user_id']) && !in_array($currentRoute, $publicRoutes)) {
    header('Location: /login');
    exit;
  }
}

