<?php
session_start();
require_once __DIR__ . '/../../middleware/cors.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/validation.php';
require_once __DIR__ . '/../../helpers/response.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Response::error('Method not allowed', 405);
}

// Get POST data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
$errors = [];

if (!Validator::required($email)) {
    $errors['email'] = 'Email is required';
} elseif (!Validator::email($email)) {
    $errors['email'] = 'Invalid email format';
}

if (!Validator::required($password)) {
    $errors['password'] = 'Password is required';
}

if (!empty($errors)) {
    Response::validationError($errors);
}

// Check database
try {
    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);
    $user->email = $email;
    
    if ($user->emailExists()) {
        // Verify password
        if (password_verify($password, $user->password)) {
            // Set session
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
            $_SESSION['last_activity'] = time();
            
            Response::success('Login successful', [
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email
                ]
            ]);
        } else {
            Response::error('Invalid email or password', 401);
        }
    } else {
        Response::error('Invalid email or password', 401);
    }
    
} catch (Exception $e) {
    Response::serverError('An error occurred. Please try again.');
}
?>
