<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Tag.php';

class TagDAO {
  private $db;

  public function __construct() {
    $this->db = getDatabaseConnection();
  }

  public function getAllTagsFromUser($userId) {
    $sql = 'SELECT * FROM tags WHERE user_id = :user_id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();

    $tagsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($tagsData) {
      $tags = [];

      foreach ($tagsData as $tagData) {
        $tags[] = new Tag($tagData['id'], $tagData['name'], $tagData['user_id']);
      }

      return $tags;
    } else {
      return [];
    }
  }

  public function getTagById($id) {
    $sql = 'SELECT * FROM tags WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $tagData = $stmt->fetch(PDO::FETCH_OBJ);

    if ($tagData) {
      return new Tag($tagData->id, $tagData->name, $tagData->user_id);
    } else {
      return null;
    }
  }

  public function save(Tag $tag) {
    $sql = "INSERT INTO tags (name, user_id) VALUES (:name, :user_id)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':name', $tag->getName());
    $stmt->bindValue(':user_id', $tag->getUserId());

    $stmt->execute();
  }

  public function updateTag($id, $name) {
    $sql = 'UPDATE tags SET name = :name WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }


  public function delete($id) {
    $sql = "DELETE FROM tags WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
  }
}

