<?php

session_start(); // Khởi động session


require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("YOURID");
$client->setClientSecret("YOURSECRETID");
$client->setRedirectUri("http://localhost:3000/dangnhap.php");


if (! isset($_GET["code"])) {

    exit("Login failed");
}

$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

$client->setAccessToken($token["access_token"]);

$oauth = new Google\Service\Oauth2($client);

$userinfo = $oauth->userinfo->get();

$_SESSION['user_name'] = $userinfo->name;
$_SESSION['user_email'] = $userinfo->email;

var_dump(
    $userinfo->email,
    $userinfo->familyName,
    $userinfo->givenName,
    $userinfo->name
);
