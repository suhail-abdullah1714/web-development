<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $full_name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic server-side validation
    if (empty($full_name) || empty($email) || empty($password)) {
        header("Location: index.html?status=error&message=All fields are required");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?status=error&message=Invalid email format");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: index.html?status=error&message=Passwords do not match");
        exit();
    }

    if (strlen($password) < 8) {
        header("Location: index.html?status=error&message=Password too short");
        exit();
    }

    // Check if email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkStmt->execute([$email]);
    
    if ($checkStmt->rowCount() > 0) {
        header("Location: index.html?status=error&message=Email already registered");
        exit();
    }

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
    
    try {
        $stmt->execute([$full_name, $email, $password_hash]);
        // Success
        header("Location: index.html?status=success");
    } catch(PDOException $e) {
        // Database error
        header("Location: index.html?status=error&message=Database error");
    }
} else {
    // Not a POST request
    header("Location: index.html");
}
?>
