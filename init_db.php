<?php
// Database Initialization Script for SQLite
require 'db_connect.php';

try {
    // Create users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        full_name TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    
    $conn->exec($sql);
    
    echo "<h1>✅ Database Initialized Successfully!</h1>";
    echo "<p>SQLite database created at: <code>contact_form.db</code></p>";
    echo "<p>Table 'users' created with the following columns:</p>";
    echo "<ul>";
    echo "<li>id (INTEGER, PRIMARY KEY, AUTO INCREMENT)</li>";
    echo "<li>full_name (TEXT, NOT NULL)</li>";
    echo "<li>email (TEXT, NOT NULL, UNIQUE)</li>";
    echo "<li>password_hash (TEXT, NOT NULL)</li>";
    echo "<li>created_at (DATETIME, DEFAULT CURRENT_TIMESTAMP)</li>";
    echo "</ul>";
    echo "<p><a href='index.html'>Go to Form</a></p>";
    
} catch(PDOException $e) {
    echo "<h1>❌ Database Initialization Failed</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>
