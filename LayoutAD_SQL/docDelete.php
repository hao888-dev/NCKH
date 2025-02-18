<?php
include 'class/docClass.php';
$docClass = new DocClass;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
    $docId = $_GET['docId'];
$delete_doc = $docClass->delete_doc($docId);
if ($delete_doc) {
    $data = json_encode([
        'success' => true,
    ]);
    echo $data;
}
?>