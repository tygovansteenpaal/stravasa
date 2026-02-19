<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../middleware/auth.php';
require_once __DIR__ . '/../controllers/DashboardController.php';

$controller = new DashboardController();
$controller->index();
?>
