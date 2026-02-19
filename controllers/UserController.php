<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $db;
    private $user;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }
    
    // Show user profile
    public function showProfile() {
        // Get user data
        $userData = $this->user->getById($_SESSION['user_id']);
        
        if (!$userData) {
            header('Location: ../login.php');
            exit();
        }
        
        require_once __DIR__ . '/../views/profile/index.view.php';
    }
    
    // Show edit profile page
    public function editProfile() {
        // Get user data
        $userData = $this->user->getById($_SESSION['user_id']);
        
        if (!$userData) {
            header('Location: ../login.php');
            exit();
        }
        
        require_once __DIR__ . '/../views/profile/edit.view.php';
    }
}
?>
