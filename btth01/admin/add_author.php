<?php
include '../Backend/DB.php';

try {
    $db = new DB();
    $db->connect();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['txtCatName']) && !empty($_POST['txtCatName'])) {
            $ten_tgia = $_POST['txtCatName']; 

        // Kiểm tra xem trường hình ảnh có được gửi từ form không
        if (isset($_FILES['txtCatImage']) && $_FILES['txtCatImage']['error'] === UPLOAD_ERR_OK) {
            // Thực hiện lưu hình ảnh vào thư mục hoặc server
            $upload_directory = './images/uploads';
            $uploaded_file = $upload_directory . basename($_FILES['txtCatImage']['name']);

            if (move_uploaded_file($_FILES['txtCatImage']['tmp_name'], $uploaded_file)) {
                // Hình ảnh đã được tải lên thành công, bạn có thể cập nhật vào CSDL
                $hinh_tgia = basename($_FILES['txtCatImage']['name']);

                // Thực hiện truy vấn thêm dữ liệu
                $data = array('ten_tgia' => $ten_tgia, 'hinh_tgia' => $hinh_tgia);
                $table = "tacgia";
                $db->insertData($table, $data);
                
                // Chuyển hướng sau khi xử lý việc gửi form
                header("Location: author.php");
                exit;
            } else {
                throw new Exception("Lỗi khi tải lên hình ảnh.");
            }
        } else {
            // Nếu không có hình ảnh, thực hiện truy vấn thêm dữ liệu không có hình ảnh
            $data = array('ten_tgia' => $ten_tgia);
            $table = "tacgia";
            $db->insertData($table, $data);
            
            // Chuyển hướng sau khi xử lý việc gửi form
            header("Location: author.php");
            exit;
        }
    } else {
        throw new Exception("Tên tác giả không được để trống.");
    }
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
}

if (isset($db)) {
    $db->close();
}
?>



<?php include 'Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm tác giả</h3>
                <?php if (isset($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
                <form action="add_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtCatName" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatImage">Hình ảnh tác giả</span>
                    <input type="file" class="form-control" name="txtCatImage">
                </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include 'Components/admin_footer.php'?>
