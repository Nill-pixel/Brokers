<?php
require_once './config/DB/db.php';
/**
 * @property PortFoliosStocksDAO $this
 */
class PortFoliosStocksDAO
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }

  public function savePortfoliosStocks(PortFolioStocksDTO $portFolioStocks)
  {
    $stm = $this->pdo->prepare("INSERT INTO portfolio_stocks(portfolio_id, stock_id, quantity, transaction_value, created_at) VALUES (:portfolio_id, :stock_id, :quantity, :transation_value, NOW())");
    $stm->bindParam(":portfolio_id", $portFolioStocks->portfolio_id);
    $stm->bindParam(":stock_id", $portFolioStocks->stock_id);
    $stm->bindParam(":quantity", $portFolioStocks->quantity);
    $stm->bindParam(":transation_value", $portFolioStocks->transaction_value);
    $stm->execute();
    return true;
  }

  public function buyStock()
  {
  }
}
