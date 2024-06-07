<?php
require_once './controllers/ClientController.php';
require_once './controllers/EmployeeController.php';

$clientController = new ClientController();
$clientController->processRequest();

$employeeController = new EmployeerController();
$employeeController->processRequest();
