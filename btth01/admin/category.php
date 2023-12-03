<?php
session_start();
ob_start();
include '../Backend/DB.php';

try {
    $db = new DB();
    $db->connect();

    // Lấy dữ liệu từ CSDL
    $table = "theloai"; 
    $columns = "*"; 
    $condition = ""; 
    $result = $db->selectData($table, $columns, $condition);
    $_SESSION['soCat'] = mysqli_num_rows($result);
} catch (Exception $e) {
    $error_message = $e->getMessage();
}

// Đóng kết nối sau khi hoàn thành mọi thao tác
if (isset($db)) {
    $db->close();
}

?>

<?php include 'Components/admin_header.php'?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_category.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($error_message)): ?>
                        <tr>
                            <td colspan="4" class="text-danger"><?php echo $error_message; ?></td>
                        </tr>
                    <?php elseif ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <th scope="row"><?php echo $row['ma_tloai']; ?></th>
                                <td><?php echo $row['ten_tloai']; ?></td>
                                <td><a href="edit_category.php?id=<?php echo $row['ma_tloai']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="delete_category.php?id=<?php echo $row['ma_tloai']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Không có dữ liệu</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'Components/admin_footer.php'?>
