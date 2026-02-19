<?php
session_start();
require_once __DIR__ . '/../../middleware/cors.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/validation.php';
require_once __DIR__ . '/../../helpers/response.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    Response::unauthorized();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Response::error('Method not allowed', 405);
}

// Get POST data
$username = $_POST['username'] ?? '';
$bio = $_POST['bio'] ?? '';

// Validate input
$errors = [];

if (!Validator::required($username)) {
    $errors['username'] = 'Username is required';
} elseif (!Validator::length($username, 3, 50)) {
    $errors['username'] = 'Username must be between 3 and 50 characters';
} elseif (!Validator::username($username)) {
    $errors['username'] = 'Username can only contain letters, numbers, and underscores';
}

if (!empty($errors)) {
    Response::validationError($errors);
}

try {
    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);
    $user->id = $_SESSION['user_id'];
    $user->username = $username;
    $user->bio = $bio;
    $user->profile_picture = ''; // Handle file upload separately
    
    // Handle profile picture upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        if (Validator::image($_FILES['profile_picture'])) {
            $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
            $filename = 'profile_' . $user->id . '_' . time() . '.' . $extension;
            $uploadPath = UPLOAD_PATH . $filename;
            
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadPath)) {
                $user->profile_picture = $filename;
            }
        } else {
            Response::error('Invalid image file');
        }
    }
    
    if ($user->update()) {
        // Update session
        $_SESSION['username'] = $username;
        
        Response::success('Profile updated successfully', [
            'user' => $user->getById($user->id)
        ]);
    } else {
        Response::serverError('Failed to update profile');
    }
    
} catch (Exception $e) {
    Response::serverError('An error occurred. Please try again.');
}
?>
