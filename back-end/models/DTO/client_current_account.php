<?php
class ClientCurrentAccountsDTO
{
  public $id;
  public $client_id;
  public $balance;
  public $created_at;
  public $updated_at;

  public function __construct($client_id, $balance)
  {
    $this->client_id = $client_id;
    $this->balance = $balance;
  }
}
