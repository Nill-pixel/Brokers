<?php

class EmployeeCommissionDTO
{
  public $id;
  public $employee_id;
  public $month;
  public $year;
  public $commission_amount;
  public $created_at;
  public $updated_at;

  public function __construct($employee_id, $month, $year, $commission_amount)
  {
    $this->employee_id = $employee_id;
    $this->month = $month;
    $this->year = $month;
    $this->commission_amount = $commission_amount;
  }
}
