<?php
include '../../Backend/DB.php';

try {
    $db = new DB();
    $db->connect();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        // Lấy mã thể loại từ tham số URL
        $ma_tloai = $_GET['id'];

        // Thực hiện truy vấn xóa dữ liệu
        $table = "theloai";
        $condition = "ma_tloai = $ma_tloai";
        $db->deleteData($table, $condition);
        
        // Chuyển hướng về trang danh sách thể loại
        header("Location: ../category.php");
        exit;
    } else {
        throw new Exception("Không có mã thể loại được chọn để xóa");
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
}


if (isset($db)) {
    $db->close();
}
?>

