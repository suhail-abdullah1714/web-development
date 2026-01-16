<?php
error_reporting(0); // Suppress default error output to handle exceptions nicely
mysqli_report(MYSQLI_REPORT_OFF); // Disable automatic exception throwing

echo "<h1>Database Connection Diagnostic v2</h1>";

$servername = "localhost";
$username = "root";

$passwords_to_try = ["", "root", "password", "123456"];
$success_password = null;
$conn = null;

// 1. Try connecting with different passwords
foreach ($passwords_to_try as $try_pass) {
    if ($try_pass === "") $display_pass = "(none)";
    else $display_pass = $try_pass;

    echo "<p>Attempting connection with password: <strong>$display_pass</strong> ... ";
    
    $conn = new mysqli($servername, $username, $try_pass);
    
    if (!$conn->connect_error) {
        echo "<span style='color:green'>SUCCESS!</span></p>";
        $success_password = $try_pass;
        break;
    } else {
        echo "<span style='color:red'>Failed</span> (" . $conn->connect_error . ")</p>";
    }
}

if ($success_password !== null) {
    echo "<h2>🎉 Solution Found!</h2>";
    if ($success_password === "") {
        echo "<p>Your database password is <strong>empty</strong>.</p>";
    } else {
        echo "<p>Your database password is: <strong>$success_password</strong></p>";
        echo "<p><strong>ACTION REQUIRED:</strong> Please open <code>db_connect.php</code> and change <code>\$password = '';</code> to <code>\$password = '$success_password';</code></p>";
    }

    // 2. Check Database Existence
    $dbname = "contact_form_db";
    if ($conn->select_db($dbname)) {
        echo "<p style='color:green'>Database '$dbname' exists.</p>";
        $conn->close();
    } else {
        echo "<p style='color:red'>Database '$dbname' NOT found.</p>";
        echo "<p><strong>Next Step:</strong> Import <code>database.sql</code> in phpMyAdmin.</p>";
    }
} else {
    echo "<h2>❌ Connection Failed</h2>";
    echo "<p>I tried common passwords (empty, root, etc.) and none worked.</p>";
    echo "<p><strong>Do you have a custom password for your MySQL root user?</strong></p>";
    echo "<p>If yes, please open <code>db_connect.php</code> and update the <code>\$password</code> variable manually.</p>";
}
?>
