<?php
include '../Backend/DB.php';

try {
    $db = new DB();
    $db->connect();
    
    $ma_tgia = isset($_GET['id']) ? $_GET['id'] : null;

// Truy vấn dữ liệu tác giả cần sửa
        $table = "tacgia";
        $columns = "*";
        $condition = "ma_tgia = $ma_tgia";
        $result = $db->selectData($table, $columns, $condition);

        // Kiểm tra nếu có dữ liệu
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ten_tgia = $row['ten_tgia'];
        } else {
            throw new Exception("Không tìm thấy dữ liệu tác giả");
        }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_FILE['txtCatName'])){
            $ten_tgia_moi = $_POST['txtCatName'];
        // Kiểm tra xem trường hình ảnh có được gửi từ form không
        if (isset($_FILES['txtCatImage']) && $_FILES['txtCatImage']['error'] === UPLOAD_ERR_OK) {
            // Thực hiện lưu hình ảnh vào thư mục hoặc server
            $upload_directory = './images/uploads';
            $uploaded_file = $upload_directory . basename($_FILES['txtCatImage']['name']);

            if (move_uploaded_file($_FILES['txtCatImage']['tmp_name'], $uploaded_file)) {
                // Hình ảnh đã được tải lên thành công, bạn có thể cập nhật vào CSDL
                $hinh_tgia = basename($_FILES['txtCatImage']['name']);
                // Cập nhật câu truy vấn UPDATE để bao gồm trường hình ảnh
                $data = array('ten_tgia' => $ten_tgia_moi, 'hinh_tgia' => $hinh_tgia);
                $table = "tacgia";
                $condition = "ma_tgia = $ma_tgia";
                $db->updateData($table, $data, $condition);
                
                header("Location: author.php");
                exit;
            } else {
                throw new Exception("Lỗi khi tải lên hình ảnh.");
            }
        } else {
                $data = array('ten_tgia' => $ten_tgia_moi);
                $table = "tacgia";
                $condition = "ma_tgia = $ma_tgia";
                $db->updateData($table, $data, $condition);
            header("Location: author.php");
            exit;
        }
    }
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
}

if (isset($db)) {
    $db->close();
}
?>

<body>
    <?php include 'Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form action="edit_author.php" method="post" enctype="multipart/form-data">
                    <!-- Form content -->
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtCatId" readonly value="<?php echo $ma_tgia; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtCatName" value="<?php echo $ten_tgia; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatImage">Hình ảnh tác giả</span>
                        <input type="file" class="form-control" name="txtCatImage">
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include 'Components/admin_footer.php'?>
</body>
</html>
