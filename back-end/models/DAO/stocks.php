<?php
require_once './config/DB/db.php';
/**
 * @property StocksDAO $this
 */
class StocksDAO
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }
  public function getAll()
  {
    $stm = $this->pdo->prepare("SELECT * FROM stockes");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getById($id)
  {
    $stm = $this->pdo->prepare("SELECT * FROM stocks WHERE id = :id");
    $stm->bindParam(':id', $id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  public function getPrice($stock_id)
  {
    $stm = $this->pdo->prepare("SELECT price FROM stocks WHERE id = :stock_id");
    $stm->bindParam(":stock_id", $stock_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
  }
}
