<?php

class EmpoyeeDTO
{
  public $name;
  public $email;
  public $password;
  public $admission_date;
  public $resignation_date;
  public $phone;
  public $base_salary;
  public $created_at;
  public $updated_at;

  public function __construct($name, $email, $password, $admission_date, $resignation_date, $phone, $base_salary)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->admission_date = $admission_date;
    $this->resignation_date = $resignation_date;
    $this->phone = $phone;
    $this->base_salary = $base_salary;
  }
}
