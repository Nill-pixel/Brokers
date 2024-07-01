<?php
require_once './config/DB/db.php';
/**
 * @property PortFoliosValuesDAO $this
 */
class PortFoliosValuesDAO
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }

  public function savePortfoliosValues(PortFoliosValuesDTO $portFoliosValues)
  {
    $stm = $this->pdo->prepare("INSERT INTO portfolio_values (portfolio_id, date, total_values) VALUES (:portfolio_id, :date, :total_values)");
    $stm->bindParam(":portfolios", $portFoliosValues->portfolio_id);
    $stm->bindParam(":date", $portFoliosValues->date);
    $stm->bindParam(":total_values", $portFoliosValues->total_value);
    $stm->execute();
  }
}
