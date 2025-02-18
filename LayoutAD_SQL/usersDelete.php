<?php
include 'class/usersClass.php';
$usersClass = new usersClass;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
    $usersId = $_GET['usersId'];
$delete_users = $usersClass->delete_users($usersId);
if ($delete_users) {
    $data = json_encode([
        'success' => true,
    ]);
    echo $data;
}
?>