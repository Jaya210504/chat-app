<?php
session_start(); //  MUST be at top

include("includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();

        //  DEBUG: Show DB & entered password
        echo "Password from DB: " . $user['password'] . "<br>";
        echo "Entered: " . $password . "<br>";
        echo "Verify Result: ";
        var_dump(password_verify($password, $user['password']));
        echo "<br>";

        if (password_verify($password, $user['password'])) {
            //  Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            //  Redirect to chatroom
            header("Location: chatroom.php");
            exit();
        } else {
            echo " Invalid password.";
        }
    } else {
        echo " User not found.";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
