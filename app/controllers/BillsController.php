<?php

require_once __DIR__ . '/../daos/BillDAO.php';
require_once __DIR__ . '/../daos/TagDAO.php';
require_once __DIR__ . '/../models/Bill.php';

class BillsController {
  private $billDAO;
  private $tagDAO;

  public function __construct() {
    $this->billDAO = new BillDAO();
    $this->tagDAO = new TagDAO();
  }

  public function create() {
    $tags = $this->tagDAO->getAllTags();

    return Template::render('bill_create', ['tags' => $tags]);
  }

  public function store() {
    $data = $_POST;
    $bill = new Bill(
      null,
      $data['title'],
      $data['amount'],
      $data['due_date'],
      isset($data['paid']) ? true : false,
      $_SESSION['user_id'],
      []
    );

    $this->billDAO->create($bill, $data['tags']);

    header('Location: /dashboard');
    exit;
  }

  public function edit($id) {
    // TODO: Implement edit method
  }

  public function update($id) {
    // TODO: Implement update method
  }

  public function destroy($id) {
    $this->billDAO->destroy($id);

    header('Location: /dashboard');
    exit;
  }
}
