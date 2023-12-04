<?php
    include_once "..\connection.php";

    if(isset($_POST['txtArTit']) && isset($_POST['txtArName']) && isset($_POST['txtTypeID']) && isset($_POST['txtTT']) 
        && isset($_POST['txtAuID']) && isset($_POST['txtArDay'])){
        $tit = $_POST['txtArTit'];
        $tenbaihat = $_POST['txtArName'];
        $matheloai = $_POST['txtTypeID'];
        $tomtat = $_POST['txtTT'];
        $matacgia = $_POST['txtAuID'];
        $ngayviet = $_POST['txtArDay'];
        $sqlInsert = "INSERT INTO baiviet (`tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `ma_tgia`, `ngayviet`) 
        values (?,?,?,?,?,?)";
        try {
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bindParam(1, $tit, PDO::PARAM_STR);
            $stmt->bindParam(2, $tenbaihat, PDO::PARAM_STR);
            $stmt->bindParam(3, $matheloai, PDO::PARAM_STR);
            $stmt->bindParam(4, $tomtat, PDO::PARAM_STR);
            $stmt->bindParam(5, $matacgia, PDO::PARAM_STR);
            $stmt->bindParam(6, $ngayviet, PDO::PARAM_STR);
            $stmt->execute();
            
            header("Location: article.php");
            exit();
        } catch (Exception $e) {
            die("Lỗi: " . $e->getMessage());
        }
        $conn=null;
    }
    
?>

<?php include '../Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm bài viết</h3>
                <form action="" method="POST">

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề bài hát</span>
                        <input type="text" class="form-control" name="txtArTit" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtArName" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mã thể loại</span>
                        <input type="text" class="form-control" name="txtTypeID" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="txtTT" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtAuID" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName"> Ngày viết</span>
                        <input type="text" class="form-control" name="txtArDay" value="">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include '../Components/admin_footer.php'?>