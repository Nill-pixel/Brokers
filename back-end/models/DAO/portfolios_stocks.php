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
    $stm = $this->pdo->prepare("INSERT INTO portfolio_stocks(portfolio_id, stock_id, quantity, transaction_value, created_at) 
    VALUES ((SELECT id FROM portfolios WHERE id = :portfolio_id), :stock_id, :quantity, :transation_value, NOW()) 
    ON DUPLICATE KEY UPDATE quantity = quantity + :quantity");

    $stm->bindParam(":portfolio_id", $portFolioStocks->portfolio_id);
    $stm->bindParam(":stock_id", $portFolioStocks->stock_id);
    $stm->bindParam(":quantity", $portFolioStocks->quantity);
    $stm->bindParam(":transation_value", $portFolioStocks->transaction_value);
    $stm->execute();
    return true;
  }

  public function getJoin($portfolio_id)
  {
    $stm = $this->pdo->prepare("SELECT ps.stock_id, ps.quantity, ps.transaction_value FROM portfolio_stocks ps JOIN stock_quotes sq
    ON ps.stock_id = sq.stock_id WHERE ps.portfolio_id = :portfolio_id");
    $stm->bindParam(":portfolio_id", $portfolio_id);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
}
