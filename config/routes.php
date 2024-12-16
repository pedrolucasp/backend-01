<?php

// TODO: Usar um autoload aqui
require_once '../app/controllers/HelloController.php';

return function() {
  $uri = trim($_SERVER['REQUEST_URI'], '/');

  // TODO: Meio burro isso
  if ($uri === '') {
    return (new HelloController())->index();
  } elseif ($uri === 'login') {
    return (new HelloController())->login();
  } elseif ($uri === 'register') {
    return (new HelloController())->register();
  }

  http_response_code(404);
  return '404 Not Found';
};
