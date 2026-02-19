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
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
$errors = [];

if (!Validator::required($username)) {
    $errors['username'] = 'Username is required';
} elseif (!Validator::length($username, 3, 50)) {
    $errors['username'] = 'Username must be between 3 and 50 characters';
} elseif (!Validator::username($username)) {
    $errors['username'] = 'Username can only contain letters, numbers, and underscores';
}

if (!Validator::required($email)) {
    $errors['email'] = 'Email is required';
} elseif (!Validator::email($email)) {
    $errors['email'] = 'Invalid email format';
}

if (!Validator::required($password)) {
    $errors['password'] = 'Password is required';
} elseif (!Validator::password($password)) {
    $errors['password'] = 'Password must be at least 6 characters';
}

if (!empty($errors)) {
    Response::validationError($errors);
}

// Check database
try {
    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);
    
    // Check if email already exists
    $user->email = $email;
    if ($user->emailExists()) {
        Response::error('Email already registered', 400);
    }
    
    // Check if username already exists
    $user->username = $username;
    if ($user->usernameExists()) {
        Response::error('Username already taken', 400);
    }
    
    // Create user
    $user->username = $username;
    $user->email = $email;
    $user->password = $password;
    
    if ($user->create()) {
        Response::created('Registration successful', [
            'message' => 'You can now login with your credentials'
        ]);
    } else {
        Response::serverError('Failed to create user');
    }
    
} catch (Exception $e) {
    Response::serverError('An error occurred. Please try again.');
}
?>
