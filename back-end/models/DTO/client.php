<?php
class ClientDTO
{
  public $name;
  public $email;
  public $password;
  public $created_at;
  public $updated_at;
  public function __construct($name, $email, $password)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}
