<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class DashboardController {
    private $db;
    private $user;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }
    
    // Show dashboard
    public function index() {
        // Get user data
        $userData = $this->user->getById($_SESSION['user_id']);
        
        if (!$userData) {
            header('Location: ../login.php');
            exit();
        }
        
        // Get statistics (example data)
        $totalUsers = $this->getTotalUsers();
        $activeUsers = $this->getActiveUsers();
        $growth = 12;
        
        require_once __DIR__ . '/../views/dashboard/index.view.php';
    }
    
    // Get total users count
    private function getTotalUsers() {
        $query = "SELECT COUNT(*) as total FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    // Get active users count (example: users created in last 30 days)
    private function getActiveUsers() {
        $query = "SELECT COUNT(*) as total FROM users WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
?>
