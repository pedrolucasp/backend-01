<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Income.php';

class IncomeDAO {
  private $db;

  public function __construct() {
    $this->db = getDatabaseConnection();
  }

  public function create($income) {
      $sql = 'INSERT INTO incomes (user_id, title, amount, income_type, recurrence_period, date)
              VALUES (:user_id, :title, :amount, :income_type, :recurrence_period, :date)';

      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':user_id', $income->getUserId());
      $stmt->bindValue(':title', $income->getTitle());
      $stmt->bindValue(':amount', $income->getAmount());
      $stmt->bindValue(':income_type', $income->getIncomeType());
      $stmt->bindValue(':recurrence_period', $income->getRecurrencePeriod());
      $stmt->bindValue(':date', $income->getDate());

      return $stmt->execute();

      $incomeId = $this->db->lastInsertId();
      $income->setId($incomeId);

      return $income;
  }

  public function update($income) {
      $sql = 'UPDATE incomes SET title = :title, amount = :amount, income_type = :income_type,
              recurrence_period = :recurrence_period, date = :date WHERE id = :id AND user_id = :user_id';
      $stmt = $this->db->prepare($sql);

      $stmt->bindValue(':title', $income->getTitle());
      $stmt->bindValue(':amount', $income->getAmount());
      $stmt->bindValue(':income_type', $income->getIncomeType());
      $stmt->bindValue(':recurrence_period', $income->getRecurrencePeriod());
      $stmt->bindValue(':date', $income->getDate());
      $stmt->bindValue(':id', $income->getId());
      $stmt->bindValue(':user_id', $income->getUserId());

      return $stmt->execute();
  }

  public function getIncomesByUser($user_id) {
      $sql = 'SELECT * FROM incomes WHERE user_id = :user_id';
      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':user_id', $user_id);
      $stmt->execute();

      $incomes = [];

      while ($incomesData = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $incomes[] = new Income(
              $incomesData['id'],
              $incomesData['title'],
              $incomesData['amount'],
              $incomesData['income_type'],
              $incomesData['recurrence_period'],
              $incomesData['date'],
              $incomesData['user_id']
          );
      }

      return $incomes;
  }

  public function getIncomeById($id) {
      $sql = 'SELECT * FROM incomes WHERE id = :id';
      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':id', $id);
      $stmt->execute();

      $incomeData = $stmt->fetch(PDO::FETCH_ASSOC);

      return new Income(
          $incomeData['id'],
          $incomeData['title'],
          $incomeData['amount'],
          $incomeData['income_type'],
          $incomeData['recurrence_period'],
          $incomeData['date'],
          $incomeData['user_id']
      );
  }

  public function destroy($id, $user_id) {
      $sql = 'DELETE FROM incomes WHERE id = :id AND user_id = :user_id';
      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':user_id', $user_id);

      return $stmt->execute();
  }
}
