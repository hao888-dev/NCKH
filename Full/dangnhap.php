<?php
session_start();


require_once 'config/config.php';
require_once 'lib/database.php';
require __DIR__ . "/vendor/autoload.php";


use Google\Client as GoogleClient;
use Google\Service\Oauth2;

$client = new GoogleClient();
$client->setClientId("");
$client->setClientSecret("");
$client->setRedirectUri("http://localhost:3000/dangnhap.php");
$client->addScope('email');
$client->addScope('profile');

if (!isset($_GET["code"])) {

    header('Location: login.php?error=Login failed: No authorization code provided.');
    exit();
}

try {

    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $client->setAccessToken($token["access_token"]);


    $oauth = new Oauth2($client);
    $userinfo = $oauth->userinfo->get();


    $googleId = $userinfo->id;
    $name = $userinfo->name;
    $email = $userinfo->email;


    $database = new Database();


    $stmt = $database->prepare("SELECT * FROM users WHERE googleId = ? OR usersEm = ?");
    $stmt->bind_param("ss", $googleId, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();
        $_SESSION['usersId'] = $user['usersId'];
        $_SESSION['name'] = $user['usersName'];
        $_SESSION['email'] = $user['usersEm'];


        if (empty($user['googleId'])) {
            $updateStmt = $database->prepare("UPDATE users SET googleId = ? WHERE usersId = ?");
            $updateStmt->bind_param("si", $googleId, $user['usersId']);
            $updateStmt->execute();
        }
    } else {

        $insertStmt = $database->prepare("INSERT INTO users (usersName, usersEm, googleId) VALUES (?, ?, ?)");
        $insertStmt->bind_param("sss", $name, $email, $googleId);
        $insertResult = $insertStmt->execute();

        if ($insertResult) {
            $newUserStmt = $database->prepare("SELECT usersId, usersName, usersEm FROM users WHERE googleId = ?");
            $newUserStmt->bind_param("s", $googleId);
            $newUserStmt->execute();
            $newUserResult = $newUserStmt->get_result();
            $newUser = $newUserResult->fetch_assoc();

            $_SESSION['usersId'] = $newUser['usersId'];
            $_SESSION['name'] = $newUser['usersName'];
            $_SESSION['email'] = $newUser['usersEm'];
        } else {
            throw new Exception("Failed to register user in database.");
        }
    }

    header('Location: index.php?success=Logged in successfully!');
    exit();
} catch (Exception $e) {

    header('Location: login.php?error=' . urlencode('Google login failed: ' . $e->getMessage()));
    exit();
} catch (Exception $e) {

    header('Location: login.php?error=' . urlencode('An error occurred: ' . $e->getMessage()));
    exit();
}
