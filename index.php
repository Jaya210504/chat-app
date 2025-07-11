<?php session_start(); 
include("includes/db_connect.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ $email = $_POST['email']; $password = $_POST['password']; 
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?"); 
$stmt->bind_param("s", $email); $stmt->execute(); 
$res = $stmt->get_result();
 if ($res->num_rows === 1) 
 { $user = $res->fetch_assoc(); 
 if (password_verify($password, $user['password'])) 
 { $_SESSION['user_id'] = $user['id']; 
 $_SESSION['username'] = $user['username']; 
 header("Location: chatroom.php"); 
 exit(); 
 } else 
 { echo "Invalid password."; } } 
 else { echo "User not found."; } } ?>
 <form method="POST">
    Email: <input type="email" name="email" required><br>Password: 
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
