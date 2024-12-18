<?php

require_once __DIR__ . '/../../config/database.php';

class DashboardDAO {
  private $db;

  public function __construct() {
    $this->db = getDatabaseConnection();
  }

  public function balance($userId) {
    $sql = 'SELECT
      (SELECT SUM(amount) FROM bills WHERE user_id = :user_id) AS total_expenses,
      (SELECT SUM(amount) FROM incomes WHERE user_id = :user_id) AS total_income';

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Calculate balance
    $balance = $result['total_income'] - $result['total_expenses'];

    return $balance;
  }
}
