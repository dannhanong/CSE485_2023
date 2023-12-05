
<?php include '../Backend/DB.php';
include 'Components/admin_header.php';
$db = new DB();
    $db->connect();

?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Người dùng</a>
                        </h5>

                        <h5 class="h1 text-center">
                            <?php echo $db -> countData("users")?>
                        </h5>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Thể loại</a>
                        </h5>

                        <h5 class="h1 text-center">
                            <?php if(isset($_SESSION['soCat'])) echo $_SESSION['soCat'] ?>
                        <?php echo $db -> countData("theloai")?>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Tác giả</a>
                        </h5>
                        <h5 class="h1 text-center">
                            <?php if(isset($_SESSION['soAu'])) echo $_SESSION['soAu'] ?>
                        <?php echo $db -> countData("tacgia")?>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Bài viết</a>
                        </h5>

                        <h5 class="h1 text-center">
                            <?php if(isset($_SESSION['soAr'])) echo $_SESSION['soAr'] ?>
                        <?php echo $db -> countData("baiviet")?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'Components/admin_footer.php'?>
