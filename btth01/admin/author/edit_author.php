<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485","root","");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $author_id = $_POST["txtCatId"];
    $author_name = $_POST["txtCatName"];

    // Cập nhật thông tin tác giả trong cơ sở dữ liệu
    // $sql = "UPDATE authors SET author_name = '$author_name' WHERE author_id = $author_id";
    // mysqli_query($conn, $sql);

    // Điều hướng trở lại trang danh sách tác giả
    header("Location: author.php");
    exit();
}
?>
<?php include '../Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="process_update_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtCatId" readonly value="<?php echo $author_id; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtCatName" value="Khánh Ngọc">
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include '../Components/admin_footer.php'?>