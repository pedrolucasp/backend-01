<?php

// TODO: Usar um autoload aqui
require_once '../app/controllers/HelloController.php';

return function() {
  $uri = trim($_SERVER['REQUEST_URI'], '/');

  if ($uri === '') {
    return (new HelloController())->index();
  }

  http_response_code(404);
  return '404 Not Found';
};
