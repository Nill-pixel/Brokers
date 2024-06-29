<?php
class PortFolioStocksDTO
{
  public $id;
  public $portfolio_id;
  public $stock_id;
  public $quantity;
  public $transaction_value;
  public $created_at;
  public $updated_at;

  public function __construct($portfolio_id, $stock_id, $quantity, $transaction_value)
  {
    $this->portfolio_id = $portfolio_id;
    $this->stock_id = $stock_id;
    $this->quantity = $quantity;
    $this->transaction_value = $transaction_value;
  }
}
