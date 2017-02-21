<?php
$servername = "sql6.freemysqlhosting.net";
$username = "sql6159246";
$password = "DBUUiG4F5U";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
