<?php
<<<<<<< HEAD:btth01/admin/author.php
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
=======
    session_start();
    ob_start();
    include "..\connection.php";
    $sqlSelect = "select * from tacgia";
    $stmt = $conn->prepare($sqlSelect); 
    $stmt->execute();

    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    $_SESSION['soAu'] = count($kq);
    $conn=null;
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

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="addAuthor.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th>Hình ảnh tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php  
                            if(isset($kq) && (count($kq) > 0)){
                                $i=1;
                                foreach($kq as $item){
                                    echo'<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$item['ten_tgia'].'</td>
                                            <td>'.$item['hinh_tgia'].'</td>
                                            <td><a href="edit_author.php?id='.$item['ma_tgia'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                            <td><a href="deleteAuthor.php?id='.$item['ma_tgia'].'"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>';
                                        
                                    $i++;
                                }
                            }
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
>>>>>>> 2a66270ebc11f302fef34c4a59db8debc06a7f85:btth01/admin/author/author.php
