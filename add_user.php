<?php
$conn = new mysqli("localhost", "root", "", "chat_app");

$username = "raj";
$email = "raj@gmail.com";
$password = password_hash("123456", PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);
$stmt->execute();

echo " Raj added successfully!";
?>
