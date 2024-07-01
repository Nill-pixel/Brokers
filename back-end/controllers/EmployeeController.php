<?php
require_once './models/DAO/employee.php';
require_once './models/DTO/employee.php';
header('Content-Type:application/json');
class EmployeerController
{
  private $employee;
  private $endpoint;
  private $method;
  public function __construct()
  {
    $this->employee = new EmployeeDAO();
    $this->endpoint = $_SERVER['PATH_INFO'];
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

  public function processRequest()
  {
    header('Content-Type: application/json');

    switch ($this->method) {
      case 'GET':
        if ($this->endpoint === '/employee') {
          $result = $this->employee->getEmployee();
          echo json_encode($result);
        } else if (preg_match('/^\/employee\/(\d+)$/', $this->endpoint, $matches)) {
          $id = $matches[1];
          $result = $this->employee->getEmployeeById($id);
          echo json_encode([$result]);
        }
        break;
      case 'POST':
        if ($this->endpoint === '/employee') {
          $data = json_decode(file_get_contents('php://input'), true);
          $name = $data['name'];
          $email = $data['email'];
          $password = $data['password'];
          $admission_date = $data['admission_date'];
          $resignation_date = $data['resignation_date'];
          $phone = $data['phone'];
          $base_salary = $data['base_salary'];

          $employee = new EmpoyeeDTO($name, $email, $password, $admission_date, $resignation_date, $phone, $base_salary);
          $result = $this->employee->saveEmployee($employee);
          echo json_encode($result);
        } else if ($this->endpoint === '/employee/login') {
          $data = json_decode(file_get_contents('php://input'), true);
          $password = $data['password'];
          $email = $data['email'];

          $result = $this->employee->loginEmployee($email, $password);

          if ($result) {
            echo json_encode(['success' => 'Employee success login']);
          } else {
            echo json_encode(['error' => 'Employee login failed']);
          }
        }
    }
  }
}
