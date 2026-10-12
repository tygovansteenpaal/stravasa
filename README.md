# Stravasa

A modern, secure PHP user management system with authentication, profile management, and a beautiful UI built with Tailwind CSS.

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

## ✨ Features

- 🔐 **Secure Authentication** - Login, registration, and session management
- 👤 **User Profiles** - View and edit user information
- 📊 **Dashboard** - Statistics and user activity overview
- 🎨 **Modern UI** - Beautiful interface with Tailwind CSS
- 📱 **Responsive Design** - Works perfectly on all devices
- 🔒 **Security** - Password hashing, SQL injection protection, XSS prevention
- 🚀 **RESTful API** - Clean API endpoints for all operations
- 📝 **Form Validation** - Client and server-side validation
- 📁 **File Uploads** - Profile picture upload capability

## 🛠 Tech Stack

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Frontend:** HTML5, JavaScript (ES6+)
- **Styling:** Tailwind CSS
- **Architecture:** MVC Pattern
- **API:** RESTful

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (optional)

## 🚀 Quick Start

### 1. Clone the Repository

```bash
git clone https://github.com/tygovansteenpaal/stravasa.git
cd stravasa
```

### 2. Import Database

Import the SQL file in phpMyAdmin or via command line:

```bash
mysql -u root -p < database/migrations/create_users_table.sql
```

### 3. Configure Database

Edit `config/database.php` with your database credentials:

```php
private $host = "localhost";
private $db_name = "stravasa_db";
private $username = "root";
private $password = "your_password";
```

### 4. Set Permissions

```bash
chmod 755 assets/images/uploads
```

### 5. Access the Application

Open your browser and navigate to:
```
http://localhost/stravasa
```

## 📖 Documentation

- [Setup Guide](docs/SETUP.md) - Detailed installation instructions
- [API Documentation](docs/API.md) - Complete API reference

## 🗂 Project Structure

```
stravasa/
├── config/              # Configuration files
├── controllers/         # Business logic
├── models/             # Database models
├── views/              # HTML templates
│   ├── auth/           # Authentication pages
│   ├── dashboard/      # Dashboard views
│   ├── profile/        # Profile pages
│   └── partials/       # Reusable components
├── api/                # API endpoints
│   ├── auth/           # Authentication APIs
│   └── user/           # User management APIs
├── middleware/         # Request middleware
├── helpers/            # Helper functions
├── assets/             # Static files
│   ├── css/            # Stylesheets
│   ├── js/             # JavaScript files
│   └── images/         # Images and uploads
├── database/           # Database files
│   ├── migrations/     # Database schema
│   └── seeds/          # Sample data
├── tests/              # Test files
└── docs/               # Documentation

```

## 🔐 Security Features

- Password hashing with bcrypt
- PDO prepared statements (SQL injection prevention)
- XSS protection with htmlspecialchars
- CSRF protection ready
- Session management
- Input validation and sanitization

## 🧪 Testing

Run the included tests:

```bash
php tests/UserTest.php
php tests/AuthTest.php
```

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is [MIT](LICENSE) licensed.


## 👨‍💻 Author

**Tygo van Steenpaal**

- GitHub: [@tygovansteenpaal](https://github.com/tygovansteenpaal)
- LinkedIn: [tygo-van-steen](https://www.linkedin.com/in/tygo-van-steen-37715a3a9)

## 🙏 Acknowledgments

- Tailwind CSS for the beautiful UI components
- PHP community for excellent documentation
- All contributors who help improve this project

## 📞 Support

For support, open an issue on GitHub or contact me via LinkedIn.

---

⭐ Star this repo if you find it helpful!
