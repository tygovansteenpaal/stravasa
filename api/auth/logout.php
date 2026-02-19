<?php
session_start();
require_once __DIR__ . '/../../middleware/cors.php';
require_once __DIR__ . '/../../helpers/response.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Response::error('Method not allowed', 405);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    Response::unauthorized();
}

// Destroy session
session_unset();
session_destroy();

Response::success('Logout successful');
?>
