<?php
require_once './models/DAO/portfolios.php';
require_once './models/DTO/portfolios.php';
require_once './models/DAO/cash_transactions.php';
require_once './models/DTO/cash_transactions.php';
require_once './models/DAO/client_current_account.php';
require_once './models/DTO/client_current_account.php';
header('Content-Type:application/json');
class PortfoliosController
{
  private $portfolios;
  private $client_current_account;
  private $cash_transaction;
  private $endpoint;
  private $method;
  public function __construct()
  {
    $this->client_current_account = new ClientCurrentAccountDAO();
    $this->portfolios = new PortfoliosDAO();
    $this->cash_transaction = new CashTransationDAO();
    $this->endpoint = $_SERVER['PATH_INFO'];
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

  public function processRequest()
  {
    header('Content-Type: application/json');

    switch ($this->method) {
      case 'POST':
        if ($this->endpoint === '/portfolios') {
          $data = json_decode(file_get_contents('php://input'), true);
          $client_id = $data['client_id'];
          $employee_id = $data['employee_id'];

          $portfolio = new PortfoliosDTO($client_id, $employee_id);
          $result = $this->portfolios->create($portfolio);
          echo json_encode($result);
        } else if ($this->endpoint === '/client/deposit') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];

          $portfolio = $this->portfolios->getById();
          $portfolio_id = $portfolio['id'];
          $type = 'deposit';

          $transation = $this->cash_transaction->saveTransation($portfolio_id, $amount, $type);

          $result = $this->client_current_account->deposit_widraw($amount);
          if ($result && $transation) {
            echo json_encode(['success' => 'Your Deposit has been successfully processed.']);
          } else {
            echo json_encode(['error' => 'Error Deposit']);
          }
          echo json_encode($result);
        } else if ($this->endpoint === '/client/withdraw') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];

          $client = $this->client_current_account->getById();
          $oldBalance = $client['balance'];

          if ($amount <= $oldBalance) {
            $newBalance = $oldBalance - $amount;

            $result = $this->client_current_account->deposit_widraw($newBalance);
            if ($result) {
              echo json_encode(['success' => 'Your withdrawal has been successfully processed.']);
            } else {
              echo json_encode(['error' => 'Error withdrawal']);
            }
          } else {
            echo json_encode(['error' => 'Error Withdraw']);
          }
        }
    }
  }
}
