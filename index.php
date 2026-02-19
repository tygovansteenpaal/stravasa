<?php
session_start();
require_once 'config/config.php';

// Redirect to appropriate page based on login status
if (isset($_SESSION['user_id'])) {
    header('Location: pages/dashboard.php');
} else {
    header('Location: login.php');
}
exit();
?>
