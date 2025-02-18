<?php
include 'class/exercisesClass.php';
$exercisesClass = new exercisesClass;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
    $exercisesId = $_GET['exercisesId'];
$delete_exercises = $exercisesClass->delete_exercises($exercisesId);
if ($delete_exercises) {
    $data = json_encode([
        'success' => true,
    ]);
    echo $data;
}
?>