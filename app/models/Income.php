<?php

class Income extends Base {
  const INCOME_TYPE_ONE_OFF = 'one_off';
  const INCOME_TYPE_REPEATABLE = 'repeatable';

  const RECURRENCE_PERIOD_MONTHLY = 'monthly';
  const RECURRENCE_PERIOD_WEEKLY = 'weekly';
  const RECURRENCE_PERIOD_YEARLY = 'yearly';

  private $title;
  private $amount;
  private $incomeType;
  private $recurrencePeriod;
  private $date;
  private $userId;

  public function __construct($id, $title, $amount, $incomeType, $recurrencePeriod, $date, $userId) {
    $this->id = $id;
    $this->title = $title;
    $this->amount = $amount;
    $this->incomeType = $incomeType;
    $this->recurrencePeriod = $recurrencePeriod;
    $this->date = $date;
    $this->userId = $userId;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getAmount() {
    return $this->amount;
  }

  public function getIncomeType() {
    return $this->incomeType;
  }

  public function getRecurrencePeriod() {
    return $this->recurrencePeriod;
  }

  public function getDate() {
    return $this->date;
  }

  public function getUserId() {
    return $this->userId;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function setAmount($amount) {
    $this->amount = $amount;
  }

  public function setIncomeType($incomeType) {
    $this->incomeType = $incomeType;
  }

  public function setRecurrencePeriod($recurrencePeriod) {
    $this->recurrencePeriod = $recurrencePeriod;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function setUserId($userId) {
    $this->userId = $userId;
  }

  public function getIncomeTypeLabel() {
    if ($this->incomeType === self::INCOME_TYPE_ONE_OFF) {
      return 'Único';
    } else {
      return 'Recorrente';
    }
  }

  public function getRecurrencePeriodLabel() {
    if ($this->recurrencePeriod === self::RECURRENCE_PERIOD_MONTHLY) {
      return 'Mensal';
    } elseif ($this->recurrencePeriod === self::RECURRENCE_PERIOD_WEEKLY) {
      return 'Semanal';
    } else {
      return 'Anual';
    }
  }
}
