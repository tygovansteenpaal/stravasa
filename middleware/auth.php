<?php
// Authentication Middleware
// Protects routes by checking if user is logged in

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Check if session is expired
if (defined('SESSION_LIFETIME')) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_LIFETIME)) {
        // Session expired
        session_unset();
        session_destroy();
        header('Location: ../login.php?expired=1');
        exit();
    }
    $_SESSION['last_activity'] = time();
}
?>
