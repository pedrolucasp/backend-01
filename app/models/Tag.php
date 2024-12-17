<?php

class Tag extends Base {
  private $name;

  public function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
}

