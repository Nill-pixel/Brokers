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

  public function get()
  {
    $stm = $this->pdo->prepare("SELECT ct.id, ct.amount, ct.transaction_date, ct.type, c.firstName, c.lastName
    FROM cash_transactions ct JOIN portfolios p ON ct.portfolio_id = p.id JOIN clients c ON p.client_id = c.id WHERE c.id = :client_id 
    ORDER BY 
    ct.transaction_date DESC
    LIMIT 5");
    $stm->bindParam(':client_id', $_SESSION['client_id']);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  public function saveTransation($portfolio_id, $amount, $type)
  {
    $stm = $this->pdo->prepare("INSERT INTO cash_transactions(portfolio_id, type, amount, transaction_date, created_at) VALUES (:portfolio_id, :type, :amount, NOW(), NOW())");
    $stm->bindParam(":portfolio_id", $portfolio_id);
    $stm->bindParam(":type", $type);
    $stm->bindParam(":amount", $amount);
    $stm->execute();

    return true;
  }
}
