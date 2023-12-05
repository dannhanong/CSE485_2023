<?php
    session_start();
    ob_start();
    include_once "./admin/connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tk = $_POST['txtUser'];
        $mk = $_POST['txtPass'];

        $kiemTra = "SELECT * FROM users WHERE `acc`=? AND `pass`=?";
        $stmt = $conn->prepare($kiemTra);

        // Gán giá trị cho prepared
        $stmt->bindParam(1, $tk, PDO::PARAM_STR);
        $stmt->bindParam(2, $mk, PDO::PARAM_STR);
        $stmt->execute();

        $giaTri = $stmt->fetchAll();

        if(count($giaTri) > 0){     
            $_SESSION['acc'] = $giaTri[0]['acc'];     
            $role = $giaTri[0]['role'];
            $_SESSION['role'] = $role;
            if($role == 1){
                header("Location: ./admin/index.php");
                exit;
            }else
                header("Location: index.php");
        }else{
            $message = "Thông tin đăng nhập không chính xác.";
        }
        if($tk == '' or $mk == ''){
            $message = "Vui lòng nhập đầy đủ thông tin.";
        }

        $stmt->closeCursor(); 
        $conn=null;
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
                        <form action="login.php" method="POST">
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
                            <div style="color: red; text-align: center;"><?php if(isset($message) && ($message!="" )){echo $message;} ?></div>
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