<?php

require_once __DIR__ . '/../daos/BillDAO.php';

class DashboardController {
  public function index() {
    $billDAO = new BillDAO();
    $bills = $billDAO->findAllByUserId($_SESSION['user_id']);

    $data = [
      'bills' => $bills
    ];

    return Template::render('dashboard', $data);
  }
}
