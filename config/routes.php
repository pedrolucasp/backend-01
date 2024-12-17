<?php

// TODO: Usar um autoload aqui
require_once '../app/controllers/HelloController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';
require_once '../app/controllers/BillsController.php';
require_once '../app/controllers/TagsController.php';

return function() {
  $uri = explode('?', trim($_SERVER['REQUEST_URI'], '/'))[0];
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

  // GET /bills
  } elseif ($uri === 'bills' && $method === 'GET') {
    return (new BillsController())->index();

  // GET /bills/create
  } elseif ($uri === 'bills/create' && $method === 'GET') {
    return (new BillsController())->create();

  // POST /bills/create
  } elseif ($uri === 'bills/create' && $method === 'POST') {
    return (new BillsController())->store();

  // GET /bills/edit/{id}
  } elseif (preg_match('/^bills\/edit\/(\d+)$/', $uri, $matches) && $method === 'GET') {
    return (new BillsController())->edit($matches[1]);

  // POST /bills/edit/{id}
  } elseif (preg_match('/^bills\/edit\/(\d+)$/', $uri, $matches) && $method === 'POST') {
    return (new BillsController())->update($matches[1]);

  // GET /bills/delete/{id}
  } elseif (preg_match('/^bills\/delete\/(\d+)$/', $uri, $matches) && $method === 'GET') {
    return (new BillsController())->destroy($matches[1]);

  // GET /tags
  } elseif ($uri === 'tags' && $method === 'GET') {
    return (new TagsController())->index();

  // GET /tags/create
  } elseif ($uri === 'tags/create' && $method === 'GET') {
    return (new TagsController())->create();

  // POST /tags/create
  } elseif ($uri === 'tags/create' && $method === 'POST') {
    return (new TagsController())->store();

  // GET /tags/edit/{id}
  } elseif (preg_match('/^tags\/edit\/(\d+)$/', $uri, $matches) && $method === 'GET') {
    return (new TagsController())->edit($matches[1]);

  // POST /tags/edit/{id}
  } elseif (preg_match('/^tags\/edit\/(\d+)$/', $uri, $matches) && $method === 'POST') {
    return (new TagsController())->update($matches[1]);

  // GET /tags/delete/{id}
  } elseif (preg_match('/^tags\/delete\/(\d+)$/', $uri, $matches) && $method === 'GET') {
    return (new TagsController())->destroy($matches[1]);

  // GET /logout
  } elseif ($uri === 'logout') {
    return (new AuthController())->logout();
  }

  http_response_code(404);
  return '404 Not Found';
};
