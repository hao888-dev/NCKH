<?php
include 'class/dictoryClass.php';
$dictoryClass = new DirectoryClass;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
    $dictoryId = $_GET['dictoryId'];
$delete_dictory = $dictoryClass->delete_dictory($dictoryId);
if ($delete_dictory) {
    $data = json_encode([
        'success' => true,
    ]);
    echo $data;
}
?>