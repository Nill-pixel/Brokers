<?php
require_once './models/DAO/client_current_account.php';
require_once './models/DTO/client_current_account.php';
require_once './config/SessionManager.php';
header('Content-Type:application/json');
class ClientCurrentAccountController
{
  private $client_current_account;
  private $endpoint;
  private $method;
  private $session_manager;
  public function __construct()
  {
    $this->client_current_account = new ClientCurrentAccountDAO();
    $this->session_manager = new SessionManager();
    $this->endpoint = $_SERVER['PATH_INFO'];
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

  public function processRequest()
  {
    header('Content-Type: application/json');

    switch ($this->method) {
      case 'POST':
        if ($this->endpoint === '/client/deposit') {
          $data = json_decode(file_get_contents('php://input'), true);
          $amount = $data['amount'];

          $result = $this->client_current_account->deposit_widraw($amount);
          if ($result) {
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
