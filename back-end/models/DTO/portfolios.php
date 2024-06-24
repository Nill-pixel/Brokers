<?php

class PortfoliosDTO
{
  public $id;
  public $client_id;
  public $employee_id;
  public $created_at;
  public $updated_at;

  public function __construct($client_id, $employee_id)
  {
    $this->client_id = $client_id;
    $this->employee_id = $employee_id;
  }
}
