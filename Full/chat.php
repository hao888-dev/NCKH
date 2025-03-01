<?php
include 'in/head.php';
?>
<?php
include 'in/navv.php';
?>


<body>



    <!-- Chat Box -->
    <div class="container mt-4">
        <h3 class="text-center">Kênh Thảo Luận</h3>
        <div class="chat-box" id="chatBox">
            <!-- Tin nhắn sẽ hiển thị ở đây -->
        </div>
        <div class="mt-3">
            <input type="text" id="chatInput" class="form-control" placeholder="Nhập tin nhắn...">
            <button class="btn btn-primary mt-2" onclick="sendMessage()">Gửi</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            let input = document.getElementById("chatInput");
            let chatBox = document.getElementById("chatBox");
            if (input.value.trim() !== "") {
                let message = document.createElement("div");
                message.classList.add("alert", "alert-secondary", "mt-2");
                message.textContent = "Bạn: " + input.value;
                chatBox.appendChild(message);
                chatBox.scrollTop = chatBox.scrollHeight;
                input.value = "";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>