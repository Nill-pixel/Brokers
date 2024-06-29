<?php
class CashTransationDTO
{
  public $id;
  public $portfolio_id;
  public $date;
  public $total_value;
  public $created_at;
  public $updated_at;

  public function __construct($portfolio_id, $date, $total_value)
  {
    $this->portfolio_id = $portfolio_id;
    $this->date = $date;
    $this->total_value = $total_value;
  }
}
