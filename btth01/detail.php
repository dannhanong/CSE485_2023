<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                </div>
            </div>
        </nav>

<?php include 'Components/header.php';
         try{
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485","root","");
          
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $title = urldecode($_GET['title']);
        $sql = "SELECT ten_bhat,tomtat,tieude FROM baiviet WHERE ten_bhat = '$title'";
        $sql2 =  "SELECT ten_tgia FROM tacgia WHERE ma_tgia = (select ma_tgia from baiviet where ten_bhat = '$title')";
        $stmt2 = $conn->prepare($sql2);
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt2 = $conn->query($sql2);

        $song = $stmt->fetchAll();
        $tacgia = $stmt2->fetchAll();
        $titleToImage = [
            'Lòng mẹ' => 'images/songs/longme.jpg',
            'Cây và gió' => 'images/songs/cayvagio.jpg',
            'Ôi Cuộc Sống Mến Thương' => 'images/songs/csmt.jpg',
            'Nơi tình yêu bắt đầu' => 'images/songs/noitinhyeubatdau.jpg',
            'Phôi pha' => 'images/songs/phoipha.jpg'
            
        ];
?>
    
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <?php foreach($song as $song): ?>
            <?php foreach($tacgia as $tacgia): ?>
                <?php foreach ($titleToImage as $key => $imageUrl) : ?>
                     <?php if ($key == $title) : ?>
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <img src="<?= $imageUrl ?>" class="img-fluid" alt="...">
                        </div>
                        <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="#" class="text-decoration-none" ><?= $song['tieude']?></a>
                        </h5>
                            
                        <p class="card-text"><span class="fw-bold" >Tên bài hát: </span><?= $song['ten_bhat'] ?></p>
                        <p class="card-text"><span class="fw-bold">Tóm tắt: </span><?= $song['tomtat'] ?></p>
                        <p class="card-text"><span class="fw-bold">Nội dung: </span><?= $song['tomtat'] ?></p>

                            <p class="card-text"><span class=" fw-bold">Tác giả: </span><?= $tacgia['ten_tgia'] ?></p>

                        </div>     
                    </div> 
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
              
    </main>
    <?php include 'Components/footer.php'?>
