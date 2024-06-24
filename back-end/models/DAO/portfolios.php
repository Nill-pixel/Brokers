<?php
require_once './config/DB/db.php';

class PortfoliosDAO
{
  private $pdo;

  function __construct()
  {
    $this->pdo = DB::getConnection();
  }

  function create(PortfoliosDTO $portfolios)
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
