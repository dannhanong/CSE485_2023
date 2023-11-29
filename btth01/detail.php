<?php include 'Components/header.php' ?>
<main class="container mt-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <?php foreach ($song as $song) : ?>
        <?php foreach ($tacgia as $tacgia) : ?>
            <?php foreach ($titleToImage as $key => $imageUrl) : ?>
                <?php if ($key == $title) : ?>
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <img src="<?= $imageUrl ?>" class="img-fluid" alt="...">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="card-title mb-2">
                                <a href="#" class="text-decoration-none"><?= $song['tieude'] ?></a>
                            </h5>

                            <p class="card-text"><span class="fw-bold">Tên bài hát: </span><?= $song['ten_bhat'] ?></p>
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
<?php include 'Components/footer.php' ?>