Real-Time Chat Application (PHP, MySQL, WebSocket)
Project Overview:
This is a real-time, multi-user chat application developed as part of a web development internship assignment. It allows users to register, log in, and participate in chat rooms with instant message delivery using WebSockets (Ratchet PHP library).
Features:
-	Secure user registration and login (hashed passwords)
-	Real-time messaging using WebSockets
-	Join and chat in public rooms
-	View past messages upon entering a room
-	Display active users (optional)
-	Show timestamps with each message
-	Typing indicator (optional)
-	XSS protection using htmlspecialchars()
-	Responsive UI for desktop and mobile
Tech Stack:
-	Frontend: HTML, CSS, JavaScript
-	Backend: PHP, MySQL
-	Real-time Server: Ratchet WebSocket (PHP)
-	Database: MySQL
Folder Structure:
chat-app/
├── auth/ │
├── login.php
│   ├── logout.php
│   └── register.php
├── chat/
│   └── chatroom.php
├── includes/
│   └── db.php
├── ws-server/
│   └── server.php
├── sql/
│   └── chat_app.sql
├── css/
│   └── style.css
├── js/
│   └── main.js
├── index.php
├── login.php
├── register.php
├── README.md
└── composer.json
Database Setup:
1.	Create a new MySQL database named chat_app.
2.	Import the SQL file: sql/chat_app.sql.
Tables:
- users(id, username, email, password, created_at) - chat_rooms(id, name, description, created_at) - messages(id, room_id, user_id, message_text, timestamp)
Setup Instructions:
1.	Clone the Repository   git clone https://github.com/yourusername/chat-app.git    cd chat-app
2.	Update Database Configuration (includes/db.php)
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "chat_app";
   $conn = new mysqli($host, $user, $password, $database);
3.	Install Ratchet using Composer   cd ws-server    composer require cboden/ratchet
4.	Run the WebSocket Server   php ws-server/server.php
Keep this terminal open while using the chat app.
Sample Credentials:
| Username | Email         | Password |
|----------|---------------|----------|
| jaya     | jaya@gmail.com | 12345    | | anvi     | anvi@gmail.com | 12345    |
Notes:
-	Ensure ws-server/server.php is running before testing chat.
-	Tested on localhost at port 8080. - WebSocket URL: ws://localhost:8080
Developer:
Name: Jaya Gupta
Role: Web Developer Intern Submission Date: 11th July 2025
License:
This project is for educational and internship use only.
