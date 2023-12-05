<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485","root","");
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $sqlSelect = "SELECT * from tacgia where ma_tgia = $id";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->execute();
    $result = $stmt->fetch();
    }catch(PDOException $e){
        echo $e->getMessage();
    }      
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $author_id = $_POST["txtCatId"];
    $author_name = $_POST["txtCatName"];

    $sql = "UPDATE tacgia SET ten_tgia = '$author_name' WHERE ma_tgia = $author_id";
    $conn->exec($sql);

    header("Location: ../author.php");
    exit();
}
?>
<?php include '../Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="edit_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtCatId" readonly value="<?php echo $id; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtCatName" value="<?php echo $result['ten_tgia']; ?>">
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="../author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include '../Components/admin_footer.php'?>