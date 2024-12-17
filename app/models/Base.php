<?php

abstract class Base {
  protected $id;

  public function isPersisted() {
    return !empty($this->id);
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }
}
