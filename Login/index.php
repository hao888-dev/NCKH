<?php

require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("YOURID");
$client->setClientSecret("YOURSECRETID");
$client->setRedirectUri("http://localhost:3000/dangnhap.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Google Login</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>

  <div class="container">
    <a href="#">
      <div class="g-sign-in-button">
        <div class="content-wrapper">
          <div class="logo-wrapper">
            <img src="https://developers.google.com/identity/images/g-logo.png">
          </div>

          <a href="<?= $url ?>">
            <span class="text-container"> Sign in with Google</span>
          </a>



        </div>
      </div>
    </a>
  </div>


</body>

</html>