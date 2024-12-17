<?php

class Tag extends Base {
  private $name;
  private $userId;

  public function __construct($id, $name, $userId) {
    $this->id = $id;
    $this->name = $name;
    $this->userId = $userId;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getUserId() {
    return $this->userId;
  }
}

