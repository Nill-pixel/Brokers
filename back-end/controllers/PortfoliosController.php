<?php
require_once './models/DAO/portfolios.php';
require_once './models/DTO/portfolios.php';
require_once './models/DAO/cash_transactions.php';
require_once './models/DTO/cash_transactions.php';
require_once './models/DAO/client_current_account.php';
require_once './models/DTO/client_current_account.php';
require_once './models/DAO/employee_commissions.php';
require_once './models/DTO/employee_commissions.php';
require_once './models/DAO/portfolios_stocks.php';
require_once './models/DTO/portfolios_stocks.php';
require_once './models/DAO/portfolios_values.php';
require_once './models/DTO/portfolios_values.php';
require_once './models/DAO/stocks.php';
require_once './models/DTO/stocks.php';

header('Content-Type:application/json');
class PortfoliosController
{
  private $portfolios;
  private $client_current_account;
  private $cash_transaction;
  private $stocks;
  private $portfolios_values;
  private $portfolios_stocks;
  private $employee_commission;
  private $endpoint;
  private $method;
  public function __construct()
  {
    $this->client_current_account = new ClientCurrentAccountDAO();
    $this->portfolios = new PortfoliosDAO();
    $this->cash_transaction = new CashTransationDAO();
    $this->employee_commission = new EmployeeCommissionDAO();
    $this->stocks = new StocksDAO();
    $this->portfolios_values = new PortfoliosValuesDAO();
    $this->portfolios_stocks = new PortfoliosStocksDAO();
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
        } else if ($this->endpoint === '/portfolios/deposit') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];

          $client = $this->client_current_account->getByIdSession();
          $oldBalance = $client['balance'];

          $clientAmount = new ClientCurrentAccountDTO($amount);

          $portfolio = $this->portfolios->getById();
          $portfolio_id = $portfolio['id'];
          $type = 'deposit';

          $employee_id = $portfolio['employee_id'];
          $commission_amount = 0.01 * $clientAmount->balance;
          $clientAmount->balance -= $commission_amount;
          $clientAmount->balance += $oldBalance;

          $transation = $this->cash_transaction->saveTransation($portfolio_id, $clientAmount->balance, $type);
          $result = $this->client_current_account->deposit_widraw($clientAmount);



          if ($result && $transation) {
            echo json_encode(['success' => 'Your Deposit has been successfully processed.']);
          } else {
            echo json_encode(['error' => 'Error Deposit']);
          }
          echo json_encode($result);
        } else if ($this->endpoint === '/portfolios/withdraw') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];
          $clientAmount = new ClientCurrentAccountDTO($amount);

          $client = $this->client_current_account->getByIdSession();
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
        } else if ($this->endpoint === '/portfolios/stocks') {
          $data = json_decode(file_get_contents('php://input'), true);

          $quantity = $data['quantity'];
          $stock = $data['stock'];

          $portfolio = $this->portfolios->getById();
          $portfolio_id = $portfolio['id'];
          $client_id = $portfolio['client_id'];


          $client = $this->client_current_account->getById($client_id);
          $balance = $client['balance'];

          $stocks = $this->stocks->getById($stock);
          $price = $stocks['face_value'];
          $stock_id = $stocks['id'];

          $total = $price * $quantity;
          if ($total > $balance) {
            echo json_encode(['error' => 'Error buying stock']);
            throw new Exception("Saldo insuficiente na conta corrente");
          }

          $balance -= $total;
          $withdraw = $this->client_current_account->deposit_widraw_client_id($balance, $client_id);

          if (!$withdraw) {
            echo json_encode(['error' => 'Error buying stock']);
            throw new Exception("Erro de movimento na conta");
          }
          $portfolio_stock = new PortFolioStocksDTO($portfolio_id, $stock_id, $quantity, $total);
          $result = $this->portfolios_stocks->savePortfoliosStocks($portfolio_stock);

          if ($result) {
            echo json_encode(['success' => 'Your stock has been successfully processed.']);
          } else {
            echo json_encode(['error' => 'Error buying stock']);
          }
        }
    }
  }
}
