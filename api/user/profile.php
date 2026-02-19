<?php
session_start();
require_once __DIR__ . '/../../middleware/cors.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/response.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    Response::unauthorized();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    Response::error('Method not allowed', 405);
}

try {
    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);
    $userData = $user->getById($_SESSION['user_id']);
    
    if ($userData) {
        Response::success('Profile retrieved successfully', [
            'user' => $userData
        ]);
    } else {
        Response::notFound('User not found');
    }
    
} catch (Exception $e) {
    Response::serverError('An error occurred. Please try again.');
}
?>
