<?php

// TODO: Usar um autoload aqui
require_once '../app/controllers/HelloController.php';
require_once '../app/controllers/AuthController.php';

return function() {
  $uri = trim($_SERVER['REQUEST_URI'], '/');
  $method = $_SERVER['REQUEST_METHOD'];

  // TODO: Meio burro isso
  if ($uri === '') {
    return (new HelloController())->index();
  } elseif ($uri === 'login' && $method === 'POST') {
    return (new AuthController())->login();
  } elseif ($uri === 'login') {
    return (new HelloController())->login();
  } elseif ($uri === 'register') {
    return (new HelloController())->register();
  }

  http_response_code(404);
  return '404 Not Found';
};
