<?php
class User {
    private $conn;
    private $table = 'users';
    
    public $id;
    public $username;
    public $email;
    public $password;
    public $profile_picture;
    public $bio;
    public $created_at;
    public $updated_at;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Create new user
    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (username, email, password, created_at) 
                  VALUES (:username, :email, :password, NOW())";
        
        $stmt = $this->conn->prepare($query);
        
        // Hash password
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        
        // Bind parameters
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Check if email exists and get user data
    public function emailExists() {
        $query = "SELECT id, username, email, password, profile_picture, bio, created_at 
                  FROM " . $this->table . " 
                  WHERE email = :email 
                  LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->profile_picture = $row['profile_picture'];
            $this->bio = $row['bio'];
            $this->created_at = $row['created_at'];
            return true;
        }
        return false;
    }
    
    // Check if username exists
    public function usernameExists() {
        $query = "SELECT id FROM " . $this->table . " 
                  WHERE username = :username 
                  LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }
    
    // Get user by ID
    public function getById($id) {
        $query = "SELECT id, username, email, profile_picture, bio, created_at, updated_at 
                  FROM " . $this->table . " 
                  WHERE id = :id 
                  LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
    
    // Update user profile
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET username = :username, 
                      bio = :bio, 
                      profile_picture = :profile_picture,
                      updated_at = NOW()
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':bio', $this->bio);
        $stmt->bindParam(':profile_picture', $this->profile_picture);
        $stmt->bindParam(':id', $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Update password
    public function updatePassword($newPassword) {
        $query = "UPDATE " . $this->table . " 
                  SET password = :password,
                      updated_at = NOW()
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Get all users (for admin panel)
    public function getAllUsers() {
        $query = "SELECT id, username, email, profile_picture, created_at 
                  FROM " . $this->table . " 
                  ORDER BY created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Delete user
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
