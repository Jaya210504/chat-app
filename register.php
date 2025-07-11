<?php include("includes/db_connect.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ $username = $_POST['username']; 
$email = $_POST['email']; $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $password); $stmt->execute(); 
  echo "Registered. <a href='index.php'>Login</a>"; } ?>
  <form method="POST">
  Username: <input name="username"><br>
  Email: <input type="email" name="email"><br>
  Password: <input type="password" name="password">
  <br><button>Register</button>
</form>
