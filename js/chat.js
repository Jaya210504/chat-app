//  Connect to WebSocket server
const socket = new WebSocket("ws://localhost:8080");

//  Listen for incoming messages from server
socket.onmessage = (event) => {
    const data = JSON.parse(event.data);
    const chatBox = document.getElementById("chat-box");

    //  Create and show message
    const msg = document.createElement("p");
    msg.innerHTML = `<strong>${data.username}</strong> (${data.time}): ${data.message}`;
    chatBox.appendChild(msg);
    chatBox.scrollTop = chatBox.scrollHeight; // Scroll to bottom
};

//  Send message to server and save to DB
function sendMessage() {
    const input = document.getElementById("messageInput");
    const message = input.value.trim();

    if (message !== "") {
        //  Prepare data for WebSocket
        const data = {
            username: username, // username comes from PHP in chatroom.php
            message: message
        };

        //  Send to WebSocket
        socket.send(JSON.stringify(data));

        //  Save message to database using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "api/save-message.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("message=" + encodeURIComponent(message));

        //  Clear input box
        input.value = "";
    }
}
