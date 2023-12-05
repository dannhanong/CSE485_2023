<?php
    include_once "./connection.php";
    $sqlSelect = "SELECT * from baiviet";
    $stmt=$conn->prepare($sqlSelect);
    $stmt->execute();
    $kq = $stmt->fetchAll();
    $_SESSION['soAr'] = count($kq);
    $conn=null;
?>

<?php include './Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="article/article2.php" class="btn btn-success">Thêm mới</a>
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
                                    <td><a href="article/edit_article.php?id='.$item['ma_bviet'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="article/deleteArticle.php?id='.$item['ma_bviet'].'"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php include './Components/admin_footer.php'?>