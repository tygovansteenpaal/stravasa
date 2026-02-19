# Setup Guide

## Prerequisites

Before you begin, ensure you have the following installed:
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (optional, for future dependencies)

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/stravasa.git
cd stravasa
```

### 2. Database Setup

#### Option A: Using phpMyAdmin
1. Open phpMyAdmin
2. Click "Import"
3. Select `database/migrations/create_users_table.sql`
4. Click "Go" to execute

#### Option B: Using MySQL Command Line
```bash
mysql -u root -p < database/migrations/create_users_table.sql
```

#### Optional: Import Demo Data
```bash
mysql -u root -p stravasa_db < database/seeds/users_seed.sql
```

Demo users (password: `password123`):
- admin@example.com
- john@example.com
- jane@example.com

### 3. Configure Database Connection

Edit `config/database.php`:

```php
private $host = "localhost";
private $db_name = "stravasa_db";
private $username = "root";
private $password = "your_password";
```

### 4. Configure Application Settings

Edit `config/config.php`:

```php
// Update base URL for your environment
define('BASE_URL', 'http://localhost/Stravasa');

// Set environment
define('APP_ENV', 'development'); // or 'production'
```

### 5. Set File Permissions

Make sure the uploads directory is writable:

**Linux/Mac:**
```bash
chmod 755 assets/images/uploads
```

**Windows:** Right-click folder → Properties → Security → Edit permissions

### 6. Apache Configuration

#### Option A: Using .htaccess (Recommended)
Create `.htaccess` in root directory:

```apache
RewriteEngine On
RewriteBase /Stravasa/

# Redirect to HTTPS (production only)
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Remove .php extension
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php [L]

# Protect sensitive files
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>

# Prevent directory listing
Options -Indexes
```

#### Option B: Using Virtual Host

Create a virtual host configuration:

```apache
<VirtualHost *:80>
    ServerName stravasa.local
    DocumentRoot "C:/xampp/htdocs/Stravasa"
    
    <Directory "C:/xampp/htdocs/Stravasa">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Add to hosts file: `127.0.0.1 stravasa.local`

### 7. Verify Installation

1. Open your browser
2. Navigate to `http://localhost/Stravasa`
3. You should be redirected to the login page

## Testing

Run the included tests:

```bash
php tests/UserTest.php
php tests/AuthTest.php
```

## Troubleshooting

### Issue: Database connection error
- Check your database credentials in `config/database.php`
- Ensure MySQL service is running
- Verify database exists: `SHOW DATABASES;`

### Issue: Page not found (404)
- Check Apache mod_rewrite is enabled
- Verify .htaccess file exists and is readable

### Issue: File upload not working
- Check upload directory permissions
- Verify `upload_max_filesize` in php.ini (minimum 5M)
- Check `post_max_size` in php.ini

### Issue: Session not working
- Check `session.save_path` in php.ini
- Ensure session directory is writable

## Deployment to Production

### 1. Update Configuration

```php
// config/config.php
define('APP_ENV', 'production');
define('BASE_URL', 'https://yourdomain.com');
```

### 2. Security Checklist

- [ ] Change database credentials
- [ ] Enable HTTPS
- [ ] Update CORS settings in `middleware/cors.php`
- [ ] Set strong session security
- [ ] Disable error display
- [ ] Enable rate limiting
- [ ] Regular backups

### 3. Performance Optimization

- Enable OPcache in php.ini
- Use CDN for Tailwind CSS (or compile locally)
- Optimize images
- Enable Gzip compression

## Support

For issues or questions, please open an issue on GitHub.
