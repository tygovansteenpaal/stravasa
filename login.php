<?php
session_start();
require_once 'config/config.php';
require_once 'controllers/AuthController.php';

$controller = new AuthController();
$controller->showLogin();
?>
