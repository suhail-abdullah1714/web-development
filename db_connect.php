<?php
// SQLite Database Connection using PDO
$db_file = __DIR__ . '/contact_form.db';

try {
    // Create connection to SQLite database
    $conn = new PDO('sqlite:' . $db_file);
    
    // Set error mode to exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Enable foreign keys (disabled by default in SQLite)
    $conn->exec('PRAGMA foreign_keys = ON;');
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
