<?php  
    include('common/config.php');
    error_reporting(0);
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $nik = $_POST['nik'];
        $query = "insert into users(name,email,password,nik) values ('$name','$email','$password','$nik')";
        $q = mysqli_query($con, $query);
        $msg = "Anda telah berhasil melakukan pendaftaran, silahkan melakukan login"; 
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
            function availability(){
                $("#loaderIcon").show();
                jQuery.ajax({
                url: "availability.php",
                data:'email='+$("#email").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                    },error:function (){}
                });
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../user/">Login</a></li>
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
                            <h2 class="form-login-heading">Daftar Akun</h2>
                            <p style="color:#007bff; padding: 1px; font-size:12px;">
                                <?php if($msg){
                                    echo htmlentities($msg);
                                }?>
                            </p>
                            <div class="login-wrap">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required="required" autofocus><br>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required="required" onBlur="availability()">
                                <span id="user-availability-status1" style="font-size:12px;"></span><br>
                                <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
                                <input type="text" class="form-control" maxlength="16" name="nik" placeholder="NIK" required="required" autofocus>
                                <label for="NIK" class="align-items-left text-left" style="color:red;font-size:12px;text-align:left">*Khusus KTP Tobasa</label><br>
                                <button class="btn btn-theme btn-block"  type="submit" name="submit" id="submit"><i class="fa fa-user"></i> Register</button>
                                <hr class="divider my-4">
                                <div class="registration">
                                    Sudah punya akun??<br/><a class="" href="index.php">login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    </body>
</html>