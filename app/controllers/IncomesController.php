<?php

require_once __DIR__ . '/../daos/IncomeDAO.php';
require_once __DIR__ . '/../models/Income.php';

class IncomesController {
  private $incomeDAO;

  public function __construct() {
    $this->incomeDAO = new IncomeDAO();
  }

  public function index() {
    $incomes = $this->incomeDAO->getIncomesByUser($_SESSION['user_id']);

    return Template::render('incomes', ['incomes' => $incomes]);
  }

  public function create() {
    return Template::render('income_create');
  }

  public function store() {
    $data = $_POST;

    $income = new Income(
      null,
      $data['title'],
      $data['amount'],
      $data['income_type'],
      $data['recurrence_period'],
      $data['date'],
      $_SESSION['user_id'],
    );

    $this->incomeDAO->create($income);

    header('Location: /incomes');
    exit;
  }

  public function edit($id) {
    $income = $this->incomeDAO->getIncomeById($id);

    return Template::render('income_edit', ['income' => $income]);
  }

  public function update($id) {
    $data = $_POST;

    $income = new Income(
      $id,
      $data['title'],
      $data['amount'],
      $data['income_type'],
      $data['recurrence_period'],
      $data['date'],
      $_SESSION['user_id'],
    );

    $this->incomeDAO->update($income);

    header('Location: /incomes');
    exit;
  }

  public function destroy($id) {
    $this->incomeDAO->destroy($id, $_SESSION['user_id']);

    header('Location: /incomes');
    exit;
  }
}
