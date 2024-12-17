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
    $tags = $this->tagDAO->getAllTagsFromUser($_SESSION['user_id']);

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
    $bill = $this->billDAO->getBillById($id);
    $tags = $this->tagDAO->getAllTagsFromUser($_SESSION['user_id']);
    $billTags = $this->billDAO->getTagsByBillId($id);

    $tagIds = array_map(function($tag) {
      return $tag->id;
    }, $billTags);

    if ($bill) {
      return Template::render('bill_edit', [
        'bill' => $bill,
        'tags' => $tags,
        'tagIds' => $tagIds
      ]);
    } else {
      // TODO: Properly handle this shit
      echo "Bill not found.";
    }
  }

  public function update($id) {
    $data = $_POST;
    $title = $data['title'];
    $amount = $data['amount'];
    $dueDate = $data['due_date'];
    $tags = $data['tags'] ?? [];

    if (empty($title) || empty($amount) || empty($dueDate)) {
      // TODO: Flash messages
      echo "All fields are required.";

      return;
    }

    $this->billDAO->updateBill($id, $title, $amount, $dueDate, $tags);

    header('Location: /dashboard');
    exit;
  }

  public function destroy($id) {
    $this->billDAO->destroy($id);

    header('Location: /dashboard');
    exit;
  }
}
