<?php

class EmpoyeeDTO
{
  public $name;
  public $admission_date;
  public $resignation_date;
  public $phone;
  public $base_salary;
  public $created_at;
  public $updated_at;

  public function __construct($name, $admission_date, $resignation_date, $phone, $base_salary)
  {
    $this->name = $name;
    $this->admission_date = $admission_date;
    $this->resignation_date = $resignation_date;
    $this->phone = $phone;
    $this->base_salary = $base_salary;
  }
}
