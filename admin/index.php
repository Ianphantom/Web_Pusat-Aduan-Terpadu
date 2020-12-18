<?php
    session_start();
    error_reporting(0);
    include("common/config.php");
    if(isset($_POST['submit'])){
        $query = "SELECT * FROM adm WHERE username='".$_POST['username']."' and password='".md5($_POST['password'])."'";
        $ret=mysqli_query($con,$query);
        $num=mysqli_fetch_array($ret);
        if($num>0){
            $extra="dashboard.php";
            $_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$num['id'];
            $host=$_SERVER['HTTP_HOST'];
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=1;
            $q = "insert into admlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')";
            $log=mysqli_query($con,$q);
            $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            exit();
        }else{
            $_SESSION['login']=$_POST['username'];	
            $uip=$_SERVER['REMOTE_ADDR'];
            $status=0;
            $q = "insert into admlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')";
            mysqli_query($con,$q);
            $error="Email atau password tidak valid";
            $extra="login.php";
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Halaman Admin</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='' rel='stylesheet'>
        <style>.login,
        .image {
            min-height: 100vh
        }

        .bg-image {
            background-image: url('images/images.png.jpg');
            background-size: cover;
            background-position: center center
        }</style>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'></script>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-md-6 d-none d-md-flex bg-image"></div>
                <div class="col-md-6 bg-light">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 col-xl-6 mx-auto">
                                    <h3 class="display-4">Halaman Admin</h3> <br>
                                    <form class="form-login" name="login" method="post">
                                        <div class="form-group mb-3">
                                            <input id="inputEmail" type="text" placeholder="Email address" name="username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4"> 
                                        </div>
                                        <div class="form-group mb-3"> 
                                            <input id="inputPassword" type="password" placeholder="Password" required="" name="password" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br> 
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3"> <input id="customCheck1" type="checkbox" checked class="custom-control-input"> <label for="customCheck1" class="custom-control-label">Remember password</label> </div> 
                                        <button name="submit" type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">LOGIN</button>
                                        <div class="text-center d-flex justify-content-between mt-4">
                                            <p> OR &nbsp<a href="#" class="font-italic text-muted"> <u>-----</u></a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>