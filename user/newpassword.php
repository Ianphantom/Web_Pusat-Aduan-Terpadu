<?php session_start();
    error_reporting(0);
    include("common/config.php");
    if(strlen($_SESSION['login'])==0){ 
        header('location:index.php');
    }else {
        $query=mysqli_query($con,"select * from users where email='".$_SESSION['login']."'");
        $row=mysqli_fetch_array($query);
        if(isset($_POST['submit'])){
            $pass = md5($_POST['password']);
            if($row['password']==$pass){
                $newpass = md5($_POST['newpass']);
                mysqli_query($con, "update users set password='$newpass' where password='$pass'");
                $msg = "Password Andatelah diganti";
            }else{
                $error = "Password yang Anda masukkan tidak sesuai dengan password Anda";
            }
        }
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Pusat Aduan Masyarakat Tobasa</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript">
            function valid(){
                if(document.getElementById("newpass").value != document.getElementById("confirmpass").value){
                    alert("Password yang anda masukkan tidak sama  !!");
                    document.getElementById("confirmpass").focus();
                    return false;
                }
                return true;
            }
        </script>

    </head>

    <body>
    	<div class="wrapper">
			<nav class="sidebar">
				<div class="dismiss">
					<i class="fas fa-arrow-left"></i>
				</div>
                <div class="user-pic" style="text-align:center;">
                    <?php $pp=$row['image'] ?>
                        <img class=" img-fluid img-rounded"  src="userpicture/<?php echo htmlentities($pp)?>"
                        alt="User picture" >
                </div>
                <div class="sidebar-user container" style="margin-top: 15px;text-align:center">
                    <div class="user-info">
                        <span class="user-name">
                        <?php echo htmlentities($row['name'])?>
                        </span>
                        <span class="user-role">| User</span><br>
                        <span class="user-status"style="color:green">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                        </span>
                    </div>
                </div><br>
				
				<ul class="list-unstyled menu-elements">
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-archive"> </i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-cogs"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="profile.php">Profile</a>
                        </li>
                        <li class="active">
                            <a href="newpassword.php">Ganti Password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="complaint.php">
                        <i class="fa fa-book"></i>
                        <span>Buat Aduan</span>
                    </a>
                </li>
                <li>
                    <a href="history.php">
                        <i class="fa fa-tasks"></i>
                        <span>Riwayat Aduan</span>
                    </a>
                </li>
				</ul>
				
				<div>
					<a class="btn btn-primary btn-customized-3" href="logout.php" role="button">
	                    <i class="fas fa-user"></i> Log Out
	                </a>
				</div>
				
				<div class="dark-light-buttons">
					<a class="btn btn-primary btn-customized-4 btn-customized-dark" href="#" role="button">Dark</a>
					<a class="btn btn-primary btn-customized-4 btn-customized-light" href="#" role="button">Light</a>
				</div>
			
			</nav>
    		<div class="overlay"></div>
			<div class="content">
				<a class="btn btn-primary btn-customized open-menu" href="#" role="button">
                    <i class="fas fa-align-left"></i> <span>Menu</span>
                </a>
                <div class="section-4-container section-container section-container-image-bg" id="section-4">
			        <div class="container">
			            <div class="row">
			                <div class="col section-4 section-description wow fadeInLeftBig">
			                	<h2><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['name']);?>'s Password Reset</h2>
			                </div>
			            </div>
                    </div>
                </div>
                <div class="bg-light" style="margin:auto auto">
                    <div class="container" style="padding: 20px;">
                        <form method="post" name="profile" style="text-align:left;background:white;width:80%;margin:auto auto; box-shadow: 10px 10px 10px grey;">
                            <div class="text-center justify-content-center" style="background:white;">
                                <?php if($msg){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Selamat </strong><?php echo htmlentities($msg)?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                                <?php if($error){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Maaf </strong><?php echo htmlentities($error)?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-row" style="padding:20px">
                                <div class="form-group col-md-7 text-dark" style="padding:20px;">
                                    <form class="form-horizontal style-form" method="post" name="chng">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 col-sm-2 control-label">Current Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="newpass" name="newpass" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="confirmpass" name="confirmpass" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary"  onclick="return valid();">Ganti</button>
                                    </div>
                                </div>
                                <div class="form-group col-md-5 text-center" style="  background: linear-gradient(to right, #00b4db, #0083b0)">
                                    <img src="https://stories.freepiklabs.com/storage/12866/forgot-password-bro-2186.png">
                                </div>
                            </div>
                        </form>
                    </div>   
                </div>
		        <footer class="footer-container bg-light">
			        <div class="container">
			        	<div class="row">
		                    <div class="col">
		                    	&copy; Pemerintah Kabupaten Tobasa 2020 <a href="http://www.tobasamosirkab.go.id/">gov</a>.
		                    </div>
		                </div>
			        </div>
		        </footer>
	        </div>
        
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js" integrity="sha512-DfYvPq8dRtcMvBM5HQqofz2dx7bzKBsvWc5X1apElb28ekQIrH98r6iysAKss5QO6tbY6pRV6RNp2DHeZFy+Cw==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.1.18/jquery.backstretch.min.js" integrity="sha512-bXc1hnpHIf7iKIkKlTX4x0A0zwTiD/FjGTy7rxUERPZIkHgznXrN/2qipZuKp/M3MIcVIdjF4siFugoIc2fL0A==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js" integrity="sha512-2hIlk2fL+NNHkULe9gGdma/T5vSYk80U5tvAFSy3dGEl8XD4h2i6frQvHv5B+bm/Itmi8nJ6krAcj5FWFcBGig==" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
<?php } ?>