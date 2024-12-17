<?php

// TODO: Usar um autoload aqui
require_once '../app/controllers/HelloController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';

return function() {
  $uri = trim($_SERVER['REQUEST_URI'], '/');
  $method = $_SERVER['REQUEST_METHOD'];

  // TODO: Meio burro isso
  if ($uri === '') {
    return (new HelloController())->index();

  // POST /login
  } elseif ($uri === 'login' && $method === 'POST') {
    return (new AuthController())->login();

  // GET /login
  } elseif ($uri === 'login') {
    return (new HelloController())->login();

  // POST /register
  } elseif ($uri === 'register' && $method === 'POST') {
    return (new AuthController())->register();

  // GET /register
  } elseif ($uri === 'register') {
    return (new HelloController())->register();

  // GET /dashboard
  } elseif ($uri === 'dashboard') {
    return (new DashboardController())->index();

  // GET /logout
  } elseif ($uri === 'logout') {
    return (new AuthController())->logout();
  }

  http_response_code(404);
  return '404 Not Found';
};
