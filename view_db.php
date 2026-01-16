<?php
// Simple database viewer script
require 'db_connect.php';

echo "<h1>Database Contents</h1>";

try {
    $stmt = $conn->query('SELECT id, full_name, email, created_at FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($users) > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Created At</th></tr>";
        
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['created_at']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        echo "<p><strong>Total users:</strong> " . count($users) . "</p>";
    } else {
        echo "<p>No users found in the database.</p>";
    }
    
} catch(PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

echo "<p><a href='index.html'>Back to Form</a></p>";
?>
