<?php
class ClientCurrentAccountDTO
{
  public $id;
  public $client_id;
  public $balance;
  public $created_at;
  public $updated_at;

  public function __construct($balance)
  {
    $this->balance = $balance;
  }
}
