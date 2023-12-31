<?php
    $conn = new mysqli("localhost","root","","BTTH01_CSE485");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tk = $_POST['txtUser'];
        $mk = $_POST['txtPass'];

        $kiemTra = "SELECT kTraLogin (?, ?)";
        $stmt = $conn->prepare($kiemTra);

        // Gán giá trị cho prepared
        $stmt->bind_param('ss', $tk, $mk);
        $stmt->execute();

        // Lấy giá trị trả về
        $stmt->bind_result($giaTri);
        $stmt->fetch();

        $stmt->close();
        $conn->close();

        if($tk != '' && $mk != '' ){
            if($giaTri == 1){
                header("Location: admin");
                exit();
            }
            else if($giaTri==-1){
                echo "<script>alert('Mật khẩu sai, kiểm tra lại!');</script>";

            }
            elseif($giaTri==-2){
                echo "<script>alert('Tài khoản sai, kiểm tra lại!');</script>";
            }else{
                echo "<script>alert('Vui lòng kiểm tra lại thông tin đăng nhập!');</script>";
            }
        }
    }
include 'Components/header_login.php'?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
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
                        <form method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser" ><i class="fas fa-user"></i></span>
                                <input type="text" id="1" name="txtUser" class="form-control" placeholder="username" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="text" id="2" name="txtPass" class="form-control" placeholder="password" >
                            </div>
                            
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-end login_btn">
                            </div>
                            <br> <br>
                            <span id="erorDi" style="text-align: center; color: red"></span>
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