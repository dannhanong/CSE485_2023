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
                header("Location: index.php");
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
    <script src="jquery-3.7.0.min.js"></script>
</head>
<body>
    

    <?php include 'Components/header/header_login.php'?>
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
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
