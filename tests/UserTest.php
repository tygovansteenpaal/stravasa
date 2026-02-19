<?php
// Simple Test for User Model
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserTest {
    private $db;
    private $user;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }
    
    public function testCreateUser() {
        echo "Testing User Creation...\n";
        
        $this->user->username = 'test_user_' . time();
        $this->user->email = 'test_' . time() . '@example.com';
        $this->user->password = 'password123';
        
        if ($this->user->create()) {
            echo "✓ User created successfully\n";
            return true;
        } else {
            echo "✗ User creation failed\n";
            return false;
        }
    }
    
    public function testEmailExists() {
        echo "Testing Email Exists...\n";
        
        $this->user->email = 'admin@example.com';
        
        if ($this->user->emailExists()) {
            echo "✓ Email found\n";
            return true;
        } else {
            echo "✗ Email not found\n";
            return false;
        }
    }
    
    public function testGetById() {
        echo "Testing Get User By ID...\n";
        
        $userData = $this->user->getById(1);
        
        if ($userData) {
            echo "✓ User retrieved: " . $userData['username'] . "\n";
            return true;
        } else {
            echo "✗ User retrieval failed\n";
            return false;
        }
    }
    
    public function runAllTests() {
        echo "\n=== Running User Tests ===\n\n";
        
        $results = [
            'create' => $this->testCreateUser(),
            'emailExists' => $this->testEmailExists(),
            'getById' => $this->testGetById()
        ];
        
        echo "\n=== Test Results ===\n";
        $passed = array_sum($results);
        $total = count($results);
        echo "Passed: $passed/$total tests\n\n";
    }
}

// Run tests if executed directly
if (php_sapi_name() === 'cli') {
    $test = new UserTest();
    $test->runAllTests();
}
?>
