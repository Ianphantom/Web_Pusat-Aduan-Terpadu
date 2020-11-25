<?php
    session_start();
    error_reporting(0);
    include("common/config.php");
    if(isset($_POST['submit'])){
        $query = "SELECT * FROM users WHERE email='".$_POST['email']."' and password='".md5($_POST['password'])."'";
        $ret=mysqli_query($con,$query);
        $num=mysqli_fetch_array($ret);
        if($num>0){
            $extra="dashboard.php";
            $_SESSION['login']=$_POST['email'];
            $_SESSION['id']=$num['id'];
            $host=$_SERVER['HTTP_HOST'];
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=1;
            $q = "insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')";
            $log=mysqli_query($con,$q);
            $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            exit();
        }else{
            $_SESSION['login']=$_POST['username'];	
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=0;
            $q = "insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')";
            mysqli_query($con,$q);
            $error="Email atau password tidak valid";
            $extra="login.php";
        }
    }
    if(isset($_POST['change'])){
        $email=$_POST['email'];
        $nik=$_POST['nik'];
        $password=md5($_POST['password']);
        $q = "SELECT * FROM users WHERE email='$email' and nik='$nik'";
        $query=mysqli_query($con,$q);
        $num=mysqli_fetch_array($query);
        if($num>0){
            $qu = "update users set password='$password' WHERE email='$email' and nik='$nik' ";
            mysqli_query($con,$qu);
            $msg="Password telah diganti";
        }else{
            $error="email atau NIK tidak valid!";
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" href="/project/css/index.css">
        <link rel="stylesheet" href="/project/user/assets/user.css">
        <title>Pusat Aduan Terpadu</title>
        <script>
            function valid(){
                if(document.forgot.password.value!= document.forgot.confirmpassword.value){
                    alert("Password yang anda masukkan tidak sama  !!");
                    document.forgot.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <img src="/project/images/tobasa.png" width="50px" height="50px" style="margin-right: 10px;">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Pemerintah Kabupaten Tobasa</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../user/index.html">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../user/registration.php">SignUp</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.html#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <form class="form-login" name="login" method="post">
                            <h2 class="form-login-heading">Masuk Akun</h2>
                            <p style="color:red; padding: 1px; font-size:12px;">
                                <?php if($error){
                                    echo htmlentities($error);
                                }?>
                            </p>
                            <p style="color:green; padding: 1px; font-size:12px;">
                                <?php if($msg){
                                    echo htmlentities($msg);
                                }?>
                            </p>
                            <div class="login-wrap">
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Email"  required autofocus style="text-align: center;">
                                <br>
                                <input type="password" class="form-control" name="password" required placeholder="Masukkan Password" style="margin-bottom: 5px; text-align: center;">
                                <label class="checkbox">
                                    <span class="pull-right">
                                        <a data-toggle="modal" href="#myModal"> Lupa Password?</a>
                                    </span>
                                </label>
                                <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i>   LOGIN</button>
                                <hr class="divider my-4" />
                                <div class="registration">
                                    Belum punya sebuah akun?<br>
                                    <a class="text-info " href="registration.php">Buat Akun</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="modal" id="myModal"tabindex="-1" role="dialog">
        <form  class="form-login" name="forgot" method="post">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Lupa Password?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Lengkapi data-data berikut untuk mengganti password</p>
                    <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br >
                    <input type="text" name="nik" placeholder="Nomor NIK" autocomplete="off" class="form-control" required><br>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru" required ><br />
                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control unicase-form-control text-input" placeholder="Konfirmasi Password" required >                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>  
              </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    </body>
</html>