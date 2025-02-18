<?php
session_start();

if (isset($_SESSION['user_name'])) {
    echo "Xin chào, " . htmlspecialchars($_SESSION['user_name']) . "!";
} else {
    echo "Bạn chưa đăng nhập.";
}
