<?php
require_once './controllers/ClientController.php';

$clientController = new ClientController();
$clientController->processRequest();
