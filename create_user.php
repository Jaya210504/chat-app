<?php
// Include DB connection
$conn = new mysqli("localhost", "root", "", "chat_app");

if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

$username = "jaya";
$email = "jaya@example.com";
$password = password_hash("123456", PASSWORD_DEFAULT); // encrypted

// Insert user
$stmt = $conn->prepare("INSERT INTO users (username, email, password, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "User inserted successfully with hashed password!";
} else {
    echo " Error: " . $stmt->error;
}
?>
