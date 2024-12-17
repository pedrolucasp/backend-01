<?php

class Bill extends Base {
  private $title;
  private $amount;
  private $dueDate;
  private $paid;

  private $userId;
  private $tags;

  public function __construct($id, $title, $amount, $dueDate, $paid, $userId, $tags) {
    $this->id = $id;
    $this->title = $title;
    $this->amount = $amount;
    $this->dueDate = $dueDate;
    $this->paid = $paid;
    $this->userId = $userId;
    $this->tags = $tags;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getAmount() {
    return $this->amount;
  }

  public function getDueDate() {
    return $this->dueDate;
  }

  public function isPaid() {
    return $this->paid;
  }

  public function setAmount($amount) {
    $this->amount = $amount;
  }

  public function setDueDate($dueDate) {
    $this->dueDate = $dueDate;
  }

  public function setPaid($paid) {
    $this->paid = $paid;
  }

  public function getUserId() {
    return $this->userId;
  }

  public function getTags() {
    return $this->tags;
  }

  public function setTags($tags) {
    $this->tags = $tags;
  }

  public function toArray() {
    return [
      'amount' => $this->amount,
      'dueDate' => $this->dueDate,
      'paid' => $this->paid
    ];
  }
}
