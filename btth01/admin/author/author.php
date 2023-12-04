<?php include '../Components/admin_header.php'?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="author2.php" class="btn btn-success">Thêm mới</a>
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
                        <tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Sandy</td>
                             <td><img src="đường dẫn đến hình ảnh của Sandy" alt="Hình ảnh của Sandy"></td>
                             <td>
    <a href="edit_author.php?id=1"><i class="fa-solid fa-pen-to-square"></i></a>
</td>
<td>
    <a href="#" onclick="confirmDelete(1)"><i class="fa-solid fa-trash"></i></a>
</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Lê Trung Ngân</td>
                            <td><img src="đường dẫn đến hình ảnh của Lê Trung Ngân" alt="Hình ảnh của Lê Trung Ngân"></td>
                            <td>
    <a href="edit_author.php?id=1"><i class="fa-solid fa-pen-to-square"></i></a>
</td>
<td>
    <a href="#" onclick="confirmDelete(1)"><i class="fa-solid fa-trash"></i></a>
</td>

                        </tr>
   
                        </tr>
                        
                        <!-- Thêm các dòng dữ liệu khác tương tự -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(authorId) {
            if (confirm('Bạn có chắc muốn xóa không?')) {
                window.location.href = 'delete_author.php?id=' + authorId;
            }
        }
    </script>

