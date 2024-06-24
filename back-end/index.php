<?php
require_once './controllers/ClientController.php';
require_once './controllers/EmployeeController.php';
require_once './controllers/PortfoliosController.php';

$clientController = new ClientController();
$clientController->processRequest();

$employeeController = new EmployeerController();
$employeeController->processRequest();

$portfoliosController = new PortfoliosController();
$portfoliosController->processRequest();
