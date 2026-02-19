<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $user;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }
    
    // Show login page
    public function showLogin() {
        if (isset($_SESSION['user_id'])) {
            header('Location: pages/dashboard.php');
            exit();
        }
        require_once __DIR__ . '/../views/auth/login.view.php';
    }
    
    // Show register page
    public function showRegister() {
        if (isset($_SESSION['user_id'])) {
            header('Location: pages/dashboard.php');
            exit();
        }
        require_once __DIR__ . '/../views/auth/register.view.php';
    }
    
    // Show forgot password page
    public function showForgotPassword() {
        require_once __DIR__ . '/../views/auth/forgot-password.view.php';
    }
}
?>
