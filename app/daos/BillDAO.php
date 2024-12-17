<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Bill.php';

class BillDAO {
  private $db;

  public function __construct() {
    $this->db = getDatabaseConnection();
  }

  public function findAllByUserId($userId) {
    $sql = 'SELECT b.*, GROUP_CONCAT(t.name, ", ") AS tags
            FROM bills b
            LEFT JOIN bill_tags bt ON b.id = bt.bill_id
            LEFT JOIN tags t ON bt.tag_id = t.id
            WHERE b.user_id = :user_id
            GROUP BY b.id';

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();

    $bills = [];

    while ($billData = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $bills[] = new Bill(
        $billData['id'],
        $billData['title'],
        $billData['amount'],
        $billData['due_date'],
        $billData['paid'],
        $billData['user_id'],
        $billData['tags']
      );
    }

    return $bills;
  }

  public function create(Bill $bill, $tagIds) {
    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare('
        INSERT INTO bills (title, amount, due_date, paid, user_id)
        VALUES (:title, :amount, :due_date, :paid, :user_id)
      ');

      $stmt->bindValue(':title', $bill->getTitle());
      $stmt->bindValue(':amount', $bill->getAmount());
      $stmt->bindValue(':due_date', $bill->getDueDate());
      $stmt->bindValue(':paid', $bill->isPaid());
      $stmt->bindValue(':user_id', $bill->getUserId());
      $stmt->execute();

      $billId = $this->db->lastInsertId();

      foreach ($tagIds as $tagId) {
        $stmt = $this->db->prepare('
          INSERT INTO bill_tags (bill_id, tag_id)
          VALUES (:bill_id, :tag_id)
        ');

        $stmt->bindParam(':bill_id', $billId);
        $stmt->bindParam(':tag_id', $tagId);
        $stmt->execute();
      }

      $this->db->commit();

      $bill->setId($billId);
      $bill->setTags($tagIds);

      return $bill;
    } catch (Exception $e) {
      $this->db->rollBack();
      throw $e;
    }
  }

  public function destroy($id) {
    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare('DELETE FROM bills WHERE id = :id');
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      $stmt = $this->db->prepare('DELETE FROM bill_tags WHERE bill_id = :bill_id');
      $stmt->bindParam(':bill_id', $id);
      $stmt->execute();

      $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollBack();
      throw $e;
    }
  }
}
