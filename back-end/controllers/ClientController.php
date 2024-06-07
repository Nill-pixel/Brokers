<?php
require_once './models/DAO/client.php';
require_once './models/DTO/client.php';
require_once './config/SessionManager.php';
header('Content-Type:application/json');
class ClientController
{
  private $client;
  private $endpoint;
  private $method;
  private $session_manager;
  public function __construct()
  {
    $this->client = new ClientDAO();
    $this->session_manager = new SessionManager();
    $this->endpoint = $_SERVER['PATH_INFO'];
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

  public function processRequest()
  {
    header('Content-Type: application/json');

    switch ($this->method) {
      case 'GET':
        if ($this->endpoint === '/client') {
          $result = $this->client->getClient();
          echo json_encode($result);
        } else if (preg_match('/^\/client\/(\d+)$/', $this->endpoint, $matches)) {
          $id = $matches[1];
          $result = $this->client->getClientById($id);
          if ($result) {
            echo json_encode($result);
          } else {
            echo json_encode(['error' => 'Client update failed']);
          }
        } else if ($this->endpoint === '/session') {
          $result = $this->session_manager->isLogged();
          if ($result) {
            echo json_encode(['logged' => true]);
          } else {
            echo json_encode(['logged' => false]);
          }
        }
        break;
      case 'POST':
        if ($this->endpoint === '/client') {
          $data = json_decode(file_get_contents('php://input'), true);
          $name = $data['name'];
          $password = $data['password'];
          $email = $data['email'];

          $client = new ClientDTO($name, $email, $password);
          $result = $this->client->saveClient($client);
          echo json_encode($result);
        } else if ($this->endpoint === '/client/login') {
          $data = json_decode(file_get_contents('php://input'), true);
          $password = $data['password'];
          $email = $data['email'];

          $result = $this->client->loginClient($email, $password);

          if ($result) {
            echo json_encode(['client success login']);
          } else {
            echo json_encode(['error' => 'Client login failed']);
          }
        }
        break;
      case 'DELETE':
        if (preg_match('/^\/client\/(\d+)$/', $this->endpoint, $matches)) {
          $id = $matches[1];
          $result = $this->client->DeleteClient($id);
          if ($result) {
            echo json_encode(['client removed']);
          }
        }
        break;
      case 'PUT':
        if (!preg_match('/^\/client\/(\d+)$/', $this->endpoint, $matches)) {
          echo json_encode(['error' => 'Invalid client ID format']);
          return;
        }

        $id = (int) $matches[1]; // Ensure ID is an integer

        $data = json_decode(file_get_contents('php://input'), true);

        $errors = [];
        if (!isset($data['name'])) {
          $errors[] = 'Missing name field';
        }
        if (!isset($data['email'])) {
          $errors[] = 'Missing email field';
        }

        if (!empty($errors)) {
          echo json_encode(['errors' => $errors]);
          return;
        }

        $oldClient = $this->client->getClientById($id);
        if (!$oldClient) {
          echo json_encode(['error' => 'Client not found']);
          return;
        }

        if (isset($data['password']) && $data['password']) {
          $oldClient['password'] = $data['password'];
        }

        $clientData = array_merge($oldClient, $data);
        $client = new ClientDTO($clientData['name'], $clientData['email'], $clientData['password']);
        $result = $this->client->UpdateClient($client, $id);

        if ($result) {
          echo json_encode(['client updated']);
        } else {
          echo json_encode(['error' => 'Client update failed']);
        }
        break;
      default:
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
        break;
    }
  }
}
