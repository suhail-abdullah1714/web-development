# User Registration Form

A beautiful, modern user registration form with SQLite database integration. Built with vanilla HTML, CSS, and JavaScript on the frontend, and PHP with SQLite on the backend.

## ✨ Features

- 🎨 **Modern UI Design** - Glassmorphic design with smooth animations and gradient backgrounds
- 🔐 **Secure Password Handling** - Passwords are hashed using PHP's `password_hash()` function
- ✅ **Client & Server Validation** - Comprehensive validation on both frontend and backend
- 💾 **SQLite Database** - Lightweight, file-based database with no configuration needed
- 📱 **Responsive Design** - Works seamlessly on desktop and mobile devices
- 🚀 **Zero Dependencies** - No external libraries or frameworks required

## 🛠️ Technologies Used

- **Frontend:**
  - HTML5
  - CSS3 (with animations and gradients)
  - Vanilla JavaScript

- **Backend:**
  - PHP 8+
  - PDO (PHP Data Objects)
  - SQLite 3

## 📋 Prerequisites

- PHP 8.0 or higher with SQLite extension enabled
- A web server (Apache, Nginx, or PHP's built-in server)

## 🚀 Quick Start

### 1. Clone the Repository

```bash
git clone https://github.com/suhail-abdullah1714/web-development.git
cd web-development
```

### 2. Initialize the Database

Visit the initialization script in your browser:

```
http://localhost:8000/init_db.php
```

This will create the `contact_form.db` SQLite database and the `users` table automatically.

### 3. Start the Application

#### Using PHP's Built-in Server:

```bash
php -S localhost:8000
```

#### Using XAMPP:

```bash
C:\xampp\php\php.exe -S localhost:8000
```

### 4. Open in Browser

Navigate to [http://localhost:8000](http://localhost:8000) to use the registration form.

## 📁 Project Structure

```
user-registration-form/
│
├── index.html          # Main registration form page
├── style.css           # Styling with modern design
├── script.js           # Client-side validation and animations
├── db_connect.php      # SQLite database connection
├── init_db.php         # Database initialization script
├── submit.php          # Form submission handler
├── view_db.php         # Database viewer (for testing)
├── contact_form.db     # SQLite database file (auto-generated)
└── README.md           # This file
```

## 📸 Screenshots

### Registration Form
![Registration Form](Screenshot_2026-01-16%20192101.png)

### Database View
![Database View](Screenshot_2026-01-16%20192119.png)

## 🔒 Security Features

- **Password Hashing**: All passwords are hashed using `PASSWORD_DEFAULT` algorithm
- **SQL Injection Protection**: Prepared statements with PDO prevent SQL injection
- **Input Sanitization**: Server-side validation and sanitization of all inputs
- **Email Validation**: Both client and server-side email format validation
- **Unique Email Constraint**: Database prevents duplicate email registrations

## 🧪 Testing

### View Registered Users

Visit [http://localhost:8000/view_db.php](http://localhost:8000/view_db.php) to see all registered users in the database.

### Validation Tests

The form validates:
- ✅ All fields are required
- ✅ Email format is valid
- ✅ Password is at least 8 characters
- ✅ Passwords match
- ✅ Email is unique (not already registered)

## 📚 Database Schema

### `users` Table

| Column         | Type     | Constraints                  |
|---------------|----------|------------------------------|
| id            | INTEGER  | PRIMARY KEY, AUTOINCREMENT   |
| full_name     | TEXT     | NOT NULL                     |
| email         | TEXT     | NOT NULL, UNIQUE             |
| password_hash | TEXT     | NOT NULL                     |
| created_at    | DATETIME | DEFAULT CURRENT_TIMESTAMP    |

## 🎯 Usage

1. **Fill out the registration form** with your details
2. **Submit the form** - the data is validated both client and server-side
3. **Success!** - You'll see a success message if registration is successful
4. **View users** - Navigate to `view_db.php` to see all registered users

## 🐛 Troubleshooting

### Database Connection Issues

If you encounter database errors:

1. Make sure the `contact_form.db` file has write permissions
2. Visit `init_db.php` to reinitialize the database
3. Check that SQLite extension is enabled in PHP (`php -m | grep sqlite`)

### PHP Not Found

If `php` command is not recognized:

- **Windows (XAMPP)**: Use full path `C:\xampp\php\php.exe`
- **macOS**: Install via Homebrew: `brew install php`
- **Linux**: Install via package manager: `sudo apt install php`

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

 file for details.


## 🙏 Acknowledgments

- Design inspiration from modern web design trends
- Built with best practices for security and user experience

---

**Note:** This project uses SQLite for simplicity and portability. For production use with high traffic, consider migrating to MySQL or PostgreSQL.



