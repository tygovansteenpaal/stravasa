<?php
// Simple Test for Authentication
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthTest {
    private $db;
    private $user;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }
    
    public function testLogin() {
        echo "Testing Login...\n";
        
        $this->user->email = 'admin@example.com';
        
        if ($this->user->emailExists()) {
            $testPassword = 'password123';
            if (password_verify($testPassword, $this->user->password)) {
                echo "✓ Login successful\n";
                return true;
            } else {
                echo "✗ Password verification failed\n";
                return false;
            }
        } else {
            echo "✗ User not found\n";
            return false;
        }
    }
    
    public function testPasswordHash() {
        echo "Testing Password Hashing...\n";
        
        $password = 'testpassword';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        if (password_verify($password, $hash)) {
            echo "✓ Password hash and verify working\n";
            return true;
        } else {
            echo "✗ Password hash verification failed\n";
            return false;
        }
    }
    
    public function testSessionHandling() {
        echo "Testing Session Handling...\n";
        
        $_SESSION['test_user_id'] = 1;
        $_SESSION['test_username'] = 'test';
        
        if (isset($_SESSION['test_user_id']) && isset($_SESSION['test_username'])) {
            echo "✓ Session variables set successfully\n";
            unset($_SESSION['test_user_id']);
            unset($_SESSION['test_username']);
            return true;
        } else {
            echo "✗ Session handling failed\n";
            return false;
        }
    }
    
    public function runAllTests() {
        echo "\n=== Running Auth Tests ===\n\n";
        
        $results = [
            'login' => $this->testLogin(),
            'passwordHash' => $this->testPasswordHash(),
            'sessionHandling' => $this->testSessionHandling()
        ];
        
        echo "\n=== Test Results ===\n";
        $passed = array_sum($results);
        $total = count($results);
        echo "Passed: $passed/$total tests\n\n";
    }
}

// Run tests if executed directly
if (php_sapi_name() === 'cli') {
    $test = new AuthTest();
    $test->runAllTests();
}
?>
