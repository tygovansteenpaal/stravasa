# API Documentation

## Base URL
```
http://localhost/Stravasa/api
```

## Authentication

### Register
Create a new user account.

**Endpoint:** `POST /auth/register.php`

**Request Body:**
```json
{
  "username": "john_doe",
  "email": "john@example.com",
  "password": "password123"
}
```

**Success Response (201):**
```json
{
  "success": true,
  "message": "Registration successful",
  "data": {
    "message": "You can now login with your credentials"
  }
}
```

**Error Response (400):**
```json
{
  "success": false,
  "message": "Email already registered"
}
```

---

### Login
Authenticate a user and create a session.

**Endpoint:** `POST /auth/login.php`

**Request Body:**
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```

**Success Response (200):**
```json
{
  "success": true,
  "message": "Login successful",
  "data": {
    "user": {
      "id": 1,
      "username": "john_doe",
      "email": "john@example.com"
    }
  }
}
```

**Error Response (401):**
```json
{
  "success": false,
  "message": "Invalid email or password"
}
```

---

### Logout
End the user session.

**Endpoint:** `POST /auth/logout.php`

**Headers:**
- Requires active session

**Success Response (200):**
```json
{
  "success": true,
  "message": "Logout successful"
}
```

---

## User Management

### Get Profile
Retrieve the current user's profile.

**Endpoint:** `GET /user/profile.php`

**Headers:**
- Requires active session

**Success Response (200):**
```json
{
  "success": true,
  "message": "Profile retrieved successfully",
  "data": {
    "user": {
      "id": 1,
      "username": "john_doe",
      "email": "john@example.com",
      "profile_picture": "profile_1_1234567890.jpg",
      "bio": "Software developer and tech enthusiast",
      "created_at": "2026-01-15 10:30:00",
      "updated_at": "2026-02-19 14:20:00"
    }
  }
}
```

---

### Update Profile
Update user profile information.

**Endpoint:** `POST /user/update.php`

**Headers:**
- Requires active session
- Content-Type: multipart/form-data (for file uploads)

**Request Body:**
```json
{
  "username": "john_doe_updated",
  "bio": "Updated bio text",
  "profile_picture": "[file]"
}
```

**Success Response (200):**
```json
{
  "success": true,
  "message": "Profile updated successfully",
  "data": {
    "user": {
      "id": 1,
      "username": "john_doe_updated",
      "email": "john@example.com",
      "profile_picture": "profile_1_1234567890.jpg",
      "bio": "Updated bio text"
    }
  }
}
```

---

## Error Codes

| Code | Description |
|------|-------------|
| 200  | Success |
| 201  | Created |
| 400  | Bad Request |
| 401  | Unauthorized |
| 404  | Not Found |
| 405  | Method Not Allowed |
| 422  | Validation Error |
| 500  | Internal Server Error |

---

## Validation Rules

### Username
- Required
- 3-50 characters
- Only letters, numbers, and underscores
- Must be unique

### Email
- Required
- Valid email format
- Must be unique

### Password
- Required
- Minimum 6 characters

### Profile Picture
- Optional
- Max file size: 5MB
- Allowed formats: JPG, PNG, GIF

---

## Rate Limiting
Currently no rate limiting is implemented. Consider adding in production.

## CORS
CORS is enabled for all origins. Configure `middleware/cors.php` for production use.
