<?php
require_once "class/exercisesClass.php"; // Đường dẫn đúng với exercisesClass

if (isset($_GET['pdfId'])) {
    $pdfId = $_GET['pdfId'];

    // Khởi tạo đối tượng exercisesClass
    $exercise = new exercisesClass();

    // Gọi truy vấn trực tiếp để lấy dữ liệu theo pdfId
    $sql = "SELECT * FROM exercises WHERE pdfId = '$pdfId'";
    $file = $exercise->Database->select($sql)->fetch_assoc();

    if ($file) {
        $file_path = '../uploads/' . $file['pdfName']; // Sử dụng pdfName từ bảng exercises
        if (file_exists($file_path)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $file['exercisesName'] . '.pdf"');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid file ID.";
    }
} else {
    echo "No file ID provided.";
}
