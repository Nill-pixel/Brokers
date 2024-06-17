<?php
class ClientDTO
{
  public $firstName;
  public $lastName;
  public $email;
  public $password;
  public $created_at;
  public $updated_at;
  public function __construct($firstName, $lastName, $email, $password)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}
