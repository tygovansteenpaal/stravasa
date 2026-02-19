<?php
// Validation Helper Functions

class Validator {
    
    // Validate email
    public static function email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    // Validate string length
    public static function length($string, $min, $max = null) {
        $length = strlen($string);
        
        if ($length < $min) {
            return false;
        }
        
        if ($max !== null && $length > $max) {
            return false;
        }
        
        return true;
    }
    
    // Validate required field
    public static function required($value) {
        return !empty(trim($value));
    }
    
    // Validate username (alphanumeric and underscore only)
    public static function username($username) {
        return preg_match('/^[a-zA-Z0-9_]+$/', $username);
    }
    
    // Validate password strength
    public static function password($password) {
        // At least 6 characters
        if (strlen($password) < PASSWORD_MIN_LENGTH) {
            return false;
        }
        return true;
    }
    
    // Validate image file
    public static function image($file) {
        // Check if file was uploaded
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return false;
        }
        
        // Check file size
        if ($file['size'] > MAX_FILE_SIZE) {
            return false;
        }
        
        // Check file type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mimeType, ALLOWED_IMAGE_TYPES)) {
            return false;
        }
        
        return true;
    }
    
    // Sanitize string
    public static function sanitize($string) {
        return htmlspecialchars(strip_tags(trim($string)), ENT_QUOTES, 'UTF-8');
    }
    
    // Validate against SQL injection
    public static function sqlSafe($string) {
        // This is just a basic check, PDO prepared statements are the real protection
        $dangerous = ['--', ';', '/*', '*/', 'xp_', 'sp_', 'DROP', 'INSERT', 'DELETE', 'UPDATE'];
        foreach ($dangerous as $pattern) {
            if (stripos($string, $pattern) !== false) {
                return false;
            }
        }
        return true;
    }
}
?>
