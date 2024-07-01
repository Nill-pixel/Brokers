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
    $stm = $this->pdo->prepare("
                INSERT INTO portfolio_values (portfolio_id, date, total_value, created_at, updated_at)
                VALUES (:portfolio_id, :date, :total_value, NOW(), NOW())
                ON DUPLICATE KEY UPDATE total_value = :total_value, updated_at = NOW()
            ");
    $stm->bindValue(':portfolio_id', $portFoliosValues->portfolio_id);
    $stm->bindValue(':date', $portFoliosValues->date);
    $stm->bindValue(':total_value', $portFoliosValues->total_value);
    $stm->execute();

    return true;
  }
}
