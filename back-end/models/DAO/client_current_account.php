<?php
require_once './config/DB/db.php';
/**
 * @property ClientCurrentAccountDAO $this
 */
class ClientCurrentAccountDAO
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }

  public function get()
  {
    $stm = $this->pdo->prepare("SELECT * FROM client_current_accounts");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById()
  {
    $client_id = $_SESSION['client_id'];
    $stm = $this->pdo->prepare("SELECT balance FROM client_current_accounts WHERE client_id = :client_id");
    $stm->bindParam(":client_id", $client_id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  public function deposit_widraw($balance)
  {
    $client_id = $_SESSION['client_id'];
    $stm = $this->pdo->prepare("UPDATE client_current_accounts SET balance = :balance WHERE client_id = :client_id");
    $stm->bindParam(":balance", $balance);
    $stm->bindParam(":client_id", $client_id);
    $stm->execute();


    return true;
  }
}
