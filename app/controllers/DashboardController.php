<?php

require_once __DIR__ . '/../daos/BillDAO.php';
require_once __DIR__ . '/../daos/DashboardDAO.php';

class DashboardController {
  private $dashboardDAO;
  private $billDAO;

  public function __construct() {
    $this->dashboardDAO = new DashboardDAO();
    $this->billDAO = new BillDAO();
  }

  public function index() {
    $bills = $this->billDAO->findAllByUserId($_SESSION['user_id']);
    $balance = $this->dashboardDAO->balance($_SESSION['user_id']);

    $data = [
      'bills' => $bills,
      'balance' => $balance
    ];

    return Template::render('dashboard', $data);
  }
}
