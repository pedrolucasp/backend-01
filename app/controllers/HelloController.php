<?php

require_once __DIR__ . '/../helpers/Template.php';

class HelloController {
  public function index() {
    $data = [
      'title' => 'Dinheiro - Pagina Inicial',
      'appName' => 'Dinheiro',
      'message' => 'Essa é uma menasgem teste'
    ];

    echo Template::render('home', $data);
  }
}
