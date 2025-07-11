<?php
include("includes/auth.php");
include("includes/db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat Room</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #chat-box {
            border: 1px solid #ccc;
            padding: 10px;
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <a href="logout.php">Logout</a>

    <!-- Chat Messages -->
    <div id="chat-box">
        <?php
        $msgs = $conn->query("SELECT messages.*, users.username FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.timestamp ASC");
        while ($row = $msgs->fetch_assoc()) {
            $time = date("H:i", strtotime($row['timestamp']));
            $user = htmlspecialchars($row['username']);
            $text = htmlspecialchars($row['message_text']);
            echo "<p><strong>{$user}</strong> ({$time}): {$text}</p>";
        }
        ?>
    </div>

    <!-- Message Input -->
    <input type="text" id="messageInput" placeholder="Type a message" />
    <button onclick="sendMessage()">Send</button>

    <!-- Username passed to JS -->
    <script>
        const username = "<?php echo htmlspecialchars($_SESSION['username']); ?>";
    </script>

    <!-- JS Script -->
    <script src="js/chat.js"></script>

</body>
</html>
