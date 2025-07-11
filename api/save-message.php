<?php session_start();
 include("../includes/db_connect.php"); 
 if (isset($_SESSION['user_id']) && isset($_POST['message'])) 
 { $msg = htmlspecialchars($_POST['message']); 
 $stmt = $conn->prepare("INSERT INTO messages (room_id, user_id, message_text) VALUES (1, ?, ?)");
  $stmt->bind_param("is", $_SESSION['user_id'], $msg); 
  $stmt->execute(); } ?>
