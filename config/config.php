<?php
// Application Configuration

// App Settings
define('APP_NAME', 'Stravasa');
define('APP_VERSION', '1.0.0');
define('APP_ENV', 'development'); // development, production

// Paths
define('BASE_PATH', dirname(__DIR__));
define('UPLOAD_PATH', BASE_PATH . '/assets/images/uploads/');

// URL Settings (update deze voor production)
define('BASE_URL', 'http://localhost/Stravasa'); // Pas aan naar je productie URL
define('ASSETS_URL', BASE_URL . '/assets/');

// Security
define('SESSION_LIFETIME', 3600); // 1 hour
define('PASSWORD_MIN_LENGTH', 6);

// File Upload Settings
define('MAX_FILE_SIZE', 5242880); // 5MB
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/png', 'image/gif']);

// Timezone
date_default_timezone_set('Europe/Amsterdam');

// Error Reporting
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?>
