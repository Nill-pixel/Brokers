<?php
require_once './models/DAO/portfolios.php';
require_once './models/DTO/portfolios.php';
require_once './models/DAO/cash_transactions.php';
require_once './models/DTO/cash_transactions.php';
require_once './models/DAO/client_current_account.php';
require_once './models/DTO/client_current_account.php';
require_once './models/DAO/employee_commissions.php';
require_once './models/DTO/employee_commissions.php';
header('Content-Type:application/json');
class PortfoliosController
{
  private $portfolios;
  private $client_current_account;
  private $cash_transaction;
  private $employee_commission;
  private $endpoint;
  private $method;
  public function __construct()
  {
    $this->client_current_account = new ClientCurrentAccountDAO();
    $this->portfolios = new PortfoliosDAO();
    $this->cash_transaction = new CashTransationDAO();
    $this->employee_commission = new EmployeeCommissionDAO();
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
          $result = $this->portfolios->savePortfolio($portfolio);
          echo json_encode($result);
        } else if ($this->endpoint === '/client/deposit') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];

          $client = $this->client_current_account->getById();
          $oldBalance = $client['balance'];

          $clientAmount = new ClientCurrentAccountDTO($amount);

          $portfolio = $this->portfolios->getById();
          $portfolio_id = $portfolio['id'];
          $type = 'deposit';

          $employee_id = $portfolio['employee_id'];
          $commission_amount = 0.01 * $clientAmount->balance;
          $clientAmount->balance -= $commission_amount;
          $clientAmount->balance += $oldBalance;

          $employee_commission = new EmployeeCommissionDTO($employee_id, $commission_amount);

          $commission = $this->employee_commission->saveEmployeeCommission($employee_commission);
          $transation = $this->cash_transaction->saveTransation($portfolio_id, $clientAmount->balance, $type);
          $result = $this->client_current_account->deposit_widraw($clientAmount);

          $employee_amount = $this->employee_commission->getEmployeeCommission($employee_id);

          if ($employee_amount) {
            $employee_amount->balance += $commission_amount;
          }

          if ($result && $transation && $commission) {
            echo json_encode(['success' => 'Your Deposit has been successfully processed.']);
          } else {
            echo json_encode(['error' => 'Error Deposit']);
          }
          echo json_encode($result);
        } else if ($this->endpoint === '/client/withdraw') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];
          $clientAmount = new ClientCurrentAccountDTO($amount);

          $client = $this->client_current_account->getById();
          $oldBalance = $client['balance'];

          if ($clientAmount->balance <= $oldBalance) {
            $newBalance = $oldBalance - $clientAmount->balance;

            $clientAmount->balance = $newBalance;

            $portfolio = $this->portfolios->getById();
            $portfolio_id = $portfolio['id'];
            $type = 'withdrawal';

            $result = $this->client_current_account->deposit_widraw($clientAmount);
            $transation = $this->cash_transaction->saveTransation($portfolio_id, $clientAmount->balance, $type);
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
