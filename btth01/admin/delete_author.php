<?php
include '../Backend/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $ma_tgia = $_GET['id'];

    try {
        $db = new DB();
        $db->connect();

        // Thực hiện truy vấn xóa dữ liệu tác giả
        $table = "tacgia";
        $condition = "ma_tgia = $ma_tgia";
        $db->deleteData($table, $condition);
        
        // Chuyển hướng về trang danh sách tác giả
        header("Location: author.php");
        exit;
    } catch (Exception $e) {
        throw new Exception("Xóa dữ liệu không thành công: " . $e->getMessage());
    }
} else {
    throw new Exception("Không có ID được cung cấp.");
}

if (isset($db)) {
    $db->close();
}
?>


