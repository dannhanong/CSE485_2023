<?php
<<<<<<< HEAD:btth01/admin/edit_author.php
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
=======
    include_once "../connection.php";
    $id = $_GET['id'];
    if(isset($_POST['txttentacgia'])){
        $name = $_POST['txttentacgia'];
        $sqlUpdate = "UPDATE tacgia SET `ten_tgia`='$name' where `ma_tgia`='$id'";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->execute();
        $conn=null;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../article/article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
>>>>>>> 2a66270ebc11f302fef34c4a59db8debc06a7f85:btth01/admin/author/edit_author.php

<body>
    <?php include 'Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
<<<<<<< HEAD:btth01/admin/edit_author.php
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
=======
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="" method="POST">

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txttentacgia" value="">
>>>>>>> 2a66270ebc11f302fef34c4a59db8debc06a7f85:btth01/admin/author/edit_author.php
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" name="btSave" value="Lưu lại" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include 'Components/admin_footer.php'?>
</body>
</html>
