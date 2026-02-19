<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;
    
    public function __construct() {
        // Lees .env file
        if (file_exists(__DIR__ . '/../.env')) {
            $env = parse_ini_file(__DIR__ . '/../.env');
            $this->host = $env['DB_HOST'];
            $this->db_name = $env['DB_NAME'];
            $this->username = $env['DB_USER'];
            $this->password = $env['DB_PASS'];
        } else {
            die("Error: .env file not found");
        }
    }
    
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            if ($_ENV['APP_ENV'] === 'production') {
                error_log($e->getMessage());
                die("Database connection failed");
            } else {
                die("Connection error: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
?>