<?php
print_r($_POST);

if (empty($_POST["name"])) {
    die("Tên là bắt buộc");
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Cần có email hợp lệ");
}

if (strlen($_POST["password"]) < 8) {
    die("Mật khẩu phải có ít nhất 8 ký tự");
}

if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Mật khẩu phải chứa ít nhất một chữ cái");
}

if (! preg_match("/[0-9]/", $_POST["password"])) {
    die("Mật khẩu phải chứa ít nhất một số");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Mật khẩu phải trùng khớp");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sss",
    $_POST["name"],
    $_POST["email"],
    $password_hash
);

if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
} else {

    if ($mysqli->errno === 1062) {
        die("email đã được sử dụng");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
