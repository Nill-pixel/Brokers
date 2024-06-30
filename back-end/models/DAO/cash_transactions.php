<?php
require_once './config/DB/db.php';
/**
 * @property CashTransationDAO $this
 */
class CashTransationDAO
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }
  public function saveTransation($portfolio_id, $amount, $type)
  {
    $created = (new DateTime())->setTimestamp(time());
    $createdString = $created->format('Y-m-d H:i:s');

    $stm = $this->pdo->prepare("INSERT INTO cash_transactions(portfolio_id, type, amount, transaction_date, created_at) VALUES (:portfolio_id, :type, :amount, :transation_date, NOW())");
    $stm->bindParam(":portfolio_id", $portfolio_id);
    $stm->bindParam(":type", $type);
    $stm->bindParam(":amount", $amount);
    $stm->bindParam(":transation_date", $createdString);
    $stm->execute();

    return true;
  }
}
