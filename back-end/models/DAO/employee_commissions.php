<?php
require_once './config/DB/db.php';
/**
 * @property EmployeeCommissionDAO $this
 */
class EmployeeCommissionDAO
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = DB::getConnection();
  }
  public function getEmployeeCommission($employee_id)
  {
    $stm = $this->pdo->prepare("SELECT * FROM employee_commissions WHERE employee_id = :employee_id");
    $stm->bindParam(":employee_id", $employee_id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  public function saveEmployeeCommission(EmployeeCommissionDTO $employeeCommission)
  {
    $created = (new DateTime())->setTimestamp(time());
    $createdString = $created->format('Y-m-d H:i:s');
    $month = $created->format('m');
    $year = $created->format('Y');

    $stm = $this->pdo->prepare("INSERT INTO employee_commissions (employee_id, month, year, commission_amount, created_at) VALUES(:employee_id, :month, :year, :commission_amount, :created_at)");
    $stm->bindParam(":employee_id", $employeeCommission->employee_id);
    $stm->bindParam(":month", $month);
    $stm->bindParam(":year", $year);
    $stm->bindParam(":commission_amount", $employeeCommission->commission_amount);
    $stm->bindParam(":created_at", $createdString);
    $stm->execute();
    return true;
  }

  public function calculateCommission($employee_id)
  {
    $currentDate = new DateTime();
    // Primeiro dia do mês corrente
    $currentMonthFirstDay = $currentDate->modify('first day of this month')->format('Y-m-d');
    // Primeiro dia do mês anterior
    $previousMonthFirstDay = $currentDate->modify('-1 month')->format('Y-m-d');

    // Obter o valor das carteiras no primeiro dia do mês anterior
    $stmt = $this->pdo->prepare("
            SELECT SUM(total_value) as previous_value 
            FROM portfolio_values 
            WHERE portfolio_id IN (
                SELECT id FROM portfolios WHERE employee_id = :employee_id
            ) AND date = :previousMonthFirstDay
        ");
    $stmt->execute([
      'employee_id' => $employee_id,
      'previousMonthFirstDay' => $previousMonthFirstDay
    ]);
    $previousValue = $stmt->fetch(PDO::FETCH_ASSOC)['previous_value'];

    // Obter o valor das carteiras no primeiro dia do mês corrente
    $stmt = $this->pdo->prepare("
            SELECT SUM(total_value) as current_value 
            FROM portfolio_values 
            WHERE portfolio_id IN (
                SELECT id FROM portfolios WHERE employee_id = :employee_id
            ) AND date = :currentMonthFirstDay
        ");
    $stmt->execute([
      'employee_id' => $employee_id,
      'currentMonthFirstDay' => $currentMonthFirstDay
    ]);
    $currentValue = $stmt->fetch(PDO::FETCH_ASSOC)['current_value'];

    // Calcular o aumento no valor das carteiras
    $increase = $currentValue - $previousValue;

    // Calcular a comissão como 1% do aumento
    $commission = $increase * 0.01;

    return $commission;
  }
}
