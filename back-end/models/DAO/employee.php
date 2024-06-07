<?php
require_once './config/DB/db.php';

class EmployeeDAO
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }

  public function getEmployee()
  {
    $stm = $this->pdo->prepare("SELECT * FROM employees");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getEmployeeById($id)
  {
    $stm = $this->pdo->prepare("SELECT * FROM employees WHERE id = :id");
    $stm->bindParam(":id", $id);
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function saveEmployee(EmpoyeeDTO $employeeDTO)
  {
    $created = (new DateTime())->setTimestamp(time());
    $createdString = $created->format('Y-m-d H:i:s');

    $stm = $this->pdo->prepare('INSERT INTO employees (name, admission_date, resignation_date, phone, base_salary, created_at) VALUES (:name, :admission_date, :resignation_date, :phone, :base_salary, :created_at)');
    $stm->bindParam(':name', $employeeDTO->name);
    $stm->bindParam(':admission_date', $employeeDTO->admission_date);
    $stm->bindParam(':resignation_date', $employeeDTO->resignation_date);
    $stm->bindParam(':phone', $employeeDTO->phone);
    $stm->bindParam(':base_salary', $employeeDTO->base_salary);
    $stm->bindParam(':created_at', $createdString);
    $stm->execute();

    return true;
  }
}
