<?php
    include_once "..\connection.php";
    $sqlSelect = "SELECT * from baiviet";
    $stmt=$conn->prepare($sqlSelect);
    $stmt->execute();
    $kq = $stmt->fetchAll();
    $_SESSION['soAr'] = count($kq);
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
                        <a class="nav-link " href="../author/author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
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
                <a href="article2.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tên bài</th>
                            <th>Mã thể loại</th>
                            <th>Tóm tắt</th>
                            <th>Nội dung</th>
                            <th>Mã tác giả</th>
                            <th>Ngày viết</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($kq as $item){
                            
                            echo '<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$item['tieude'].'</td>
                                    <td>'.$item['ten_bhat'].'</td>
                                    <td>'.$item['ma_tloai'].'</td>
                                    <td>'.$item['tomtat'].'</td>
                                    <td>'.$item['noidung'].'</td>
                                    <td>'.$item['ma_tgia'].'</td>
                                    <td>'.$item['ngayviet'].'</td>
                                    <td><a href="edit_article.php?id='.$item['ma_bviet'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="deleteArticle.php?id='.$item['ma_bviet'].'"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>';
                            $i++;
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