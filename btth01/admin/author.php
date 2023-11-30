<?php
include '../Backend/DB.php';

try {
    $db = new DB();
    $db->connect();

    
    // Thực hiện truy vấn lấy dữ liệu từ bảng tacgia
    $result = $db->selectData("tacgia");

    // Đóng kết nối sau khi lấy dữ liệu
    $db->close();
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>

<?php include 'Components/admin_header.php' ?>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_author.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã Tác Giả</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Hình ảnh tác giả</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <th scope="row"><?php echo $row['ma_tgia']; ?></th>
                                <td><?php echo $row['ten_tgia']; ?></td>
                                <td>
                                    <?php if (!empty($row['hinh_tgia'])): ?>
                                        <img src="<?php echo $row['hinh_tgia']; ?>" alt="Hình ảnh của <?php echo $row['ten_tgia']; ?>">
                                    <?php else: ?>
                                        <p>Không có hình ảnh</p>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="edit_author.php?id=<?php echo $row['ma_tgia']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="#"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Không có dữ liệu tác giả.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'Components/admin_footer.php' ?>
