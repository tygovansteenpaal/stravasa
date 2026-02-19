<?php
// Response Helper Functions for API

class Response {
    
    // Success response
    public static function success($message, $data = null, $statusCode = 200) {
        http_response_code($statusCode);
        
        $response = [
            'success' => true,
            'message' => $message
        ];
        
        if ($data !== null) {
            $response['data'] = $data;
        }
        
        echo json_encode($response);
        exit();
    }
    
    // Error response
    public static function error($message, $statusCode = 400, $errors = null) {
        http_response_code($statusCode);
        
        $response = [
            'success' => false,
            'message' => $message
        ];
        
        if ($errors !== null) {
            $response['errors'] = $errors;
        }
        
        echo json_encode($response);
        exit();
    }
    
    // Validation error response
    public static function validationError($errors) {
        self::error('Validation failed', 422, $errors);
    }
    
    // Unauthorized response
    public static function unauthorized($message = 'Unauthorized access') {
        self::error($message, 401);
    }
    
    // Not found response
    public static function notFound($message = 'Resource not found') {
        self::error($message, 404);
    }
    
    // Server error response
    public static function serverError($message = 'Internal server error') {
        self::error($message, 500);
    }
    
    // Created response
    public static function created($message, $data = null) {
        self::success($message, $data, 201);
    }
}
?>
