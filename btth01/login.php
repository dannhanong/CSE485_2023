<?php
include './Backend/DB.php';
include 'Components/header_login.php';

try {
    $db = new DB();
    $db->connect();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tk = $_POST['txtUser'];
        $mk = $_POST['txtPass'];

        // Sử dụng câu lệnh chuẩn bị để ngăn chặn SQL injection
        $result = $db->selectData('users', '*', 'username = ?', [$tk]);

        if ($result && count($result) == 1) {
            $user = $result[0];

            // Sử dụng password_verify để so sánh mật khẩu một cách an toàn
            if (password_verify($mk, $user['pass'])) {
                header("Location: index.php");
                exit();
            } else {
                $error_message = 'Mật khẩu sai, kiểm tra lại!';
            }
        } else {
            $error_message = 'Tài khoản sai, kiểm tra lại!';
        }
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
} finally {
    // Đóng kết nối cơ sở dữ liệu
    if (isset($db)) {
        $db->close();
    }
}
?>

<main class="container mt-5 mb-5">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtUser" ><i class="fas fa-user"></i></span>
                        <input type="text" id="1" name="txtUser" class="form-control" placeholder="username" >
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                        <input type="password" id="2" name="txtPass" class="form-control" placeholder="password" >
                    </div>
                    
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-end login_btn">
                    </div>
                    <br> <br>
                    <span id="erorDi" style="text-align: center; color: red"><?php echo isset($error_message) ? $error_message : ''; ?></span>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center ">
                    Don't have an account?<a href="#" class="text-warning text-decoration-none">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#" class="text-warning text-decoration-none">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'Components/footer.php'?>
