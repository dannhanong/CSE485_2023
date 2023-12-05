<?php
    include "..\connection.php";
    try{
        if(isset($_POST['btAdd'])){
            $name = $_POST['txtName'];
    
            $sql = "INSERT INTO `tacgia`(`ten_tgia`) VALUES ('$name')";
    
    
            if(!empty($name)){
                if($conn->query($sql) === true){
                    header("Location: ../author.php");
                    exit();
                }
            }else{
                throw new Exception("Tên tác giả không được để trống.");
            }
        }
    }catch(Exception $e){
        $error_message = $e->getMessage();
    }
    $conn=null;
?>

<?php include '../Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">THÊM TÁC GIẢ</h3>
                <form action="" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtName" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success" name="btAdd">
                        <a href="../author.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include '../Components/admin_footer.php'?>