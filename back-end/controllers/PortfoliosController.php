<?php
require_once './models/DAO/portfolios.php';
require_once './models/DTO/portfolios.php';
header('Content-Type:application/json');
class PortfoliosController
{
  private $portfolios;
  private $endpoint;
  private $method;
  public function __construct()
  {
    $this->portfolios = new PortfoliosDAO();
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
        }
    }
  }
}
