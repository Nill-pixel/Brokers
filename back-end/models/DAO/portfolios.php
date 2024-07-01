<?php
require_once './config/DB/db.php';

class PortfoliosDAO
{
  private $pdo;

  function __construct()
  {
    $this->pdo = DB::getConnection();
  }
  public function getById()
  {
    $employee_id = $_SESSION['employee_id'];
    $stm = $this->pdo->prepare("SELECT * FROM portfolios WHERE employee_id = :employee_id");
    $stm->bindParam(":employee_id", $employee_id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  public function getAll()
  {
    $stm = $this->pdo->prepare("SELECT * FROM portfolios");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function savePortfolio(PortfoliosDTO $portfolios)
  {
    $created = (new DateTime())->setTimestamp(time());
    $createdString = $created->format('Y-m-d H:i:s');

    $stmt = $this->pdo->prepare("INSERT INTO portfolios (client_id, employee_id, created_at) VALUES (:client_id, :employee_id, :created_at)");
    $stmt->bindParam(':client_id', $portfolios->client_id);
    $stmt->bindParam(':employee_id', $portfolios->employee_id);
    $stmt->bindParam(':created_at', $createdString);
    $stmt->execute();
    return $stmt;
  }
}
