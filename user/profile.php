
<?php session_start();
    error_reporting(0);
    include("common/config.php");
    if(strlen($_SESSION['login'])==0){ 
        header('location:index.php');
    }else {
        $query=mysqli_query($con,"select * from users where email='".$_SESSION['login']."'");
        $row=mysqli_fetch_array($query);
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date( 'd-m-Y h:i:s A', time () );
        if(!empty($_GET['message'])) {
            $msg = $_GET['message'];
            unset($_GET['messsage']);
        }
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $alamat = $_POST['alamat'];
            $kecamatan = $_POST['kecamatan'];
            $kodePos = $_POST['kodePos'];
            $input = mysqli_query($con, "update users set name='$name', alamat='$alamat', kecamatan='$kecamatan',kodePos='$kodePos' where email='".$_SESSION['login']."'");
            if($input){
                $msg="Profil Anda berhasil diupdate.";
                header("location:profile.php?message=$msg");
            }else{
                $error= "Profile gagal diupdate";
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
                        <li class="active">
                            <a href="profile.php">Profile</a>
                        </li>
                        <li>
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
			                	<h2><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['name']);?>'s Profile</h2>
			                    <p>
			                    	Selalu perbaharui data diri Anda untuk kelancaran pengaduan dan penggunaan <strong>Pusat Aduan Tobasa</strong>
			                    </p>
			                </div>
			            </div>
                    </div>
                </div>
                <div class="bg-dark">
                    <div class="container" style="padding: 20px">
                        <div class="text-center" style="background:white">
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
                            <form method="post" name="profile" style="text-align:left;padding:20px;">
                            <div class="form-row">
                                <div class="form-group col-md-7 text-dark" style="padding:20px;">
                                    <label><strong>Tanggal Registrasi</strong></label>
                                    <input type="text" class="form-control" name="regdate"  readonly value="<?php echo htmlentities($row['regDate'])?>" style="margin-bottom:5px;border:none">
                                    <label><strong>Email</strong></label>
                                    <input type="email" class="form-control" name="email" placeholder="email" readonly value="<?php echo htmlentities($row['email'])?>"style="margin-bottom:5px;border:none">
                                    <label><strong>NIK</strong></label>
                                    <input type="text" class="form-control" name="NIK" placeholder="NIK" readonly value="<?php echo htmlentities($row['nik'])?>" style="margin-bottom:5px;border:none">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama lengkap" value="<?php echo htmlentities($row['name']);?>" style="margin-bottom:5px;border:none;background:">
                                    <label for="alamat"><strong>Alamat</strong></label>
                                    <textarea type="text" class="form-control" name="alamat" style="margin-bottom:5px;border:none"><?php echo htmlentities($row['alamat']); ?></textarea>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kecamatan"><strong>Kecamatan</strong></label>
                                            <select name="kecamatan" class="form-control" style="border:none">
                                                <option value="<?php echo htmlentities($row['kecamatan']);?>"><?php echo htmlentities($st=$row['kecamatan']);?></option>
                                                <?php 
                                                    $kecquery=mysqli_query($con,"select nama from kecamatan ");
                                                    while ($kec=mysqli_fetch_array($kecquery)) {
                                                    if($kec['nama']==$st){
                                                        continue;
                                                    }else{?>
                                                        <option value="<?php echo htmlentities($kec['nama']);?>"><?php echo htmlentities($kec['nama']);?></option>
                                                    <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="kabupaten"><strong>Kabupaten</strong></label>
                                            <input type="text" class="form-control" style="border:none" name="kabupaten" value="<?php echo htmlentities($row['kabupaten'])?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="kodepos"><strong>Kode Pos</strong></label>
                                            <input type="text" class="form-control" name="kodePos" style="border:none" value="<?php echo htmlentities($row['kodePos']);?>">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <div class="form-group col-md-5 text-center" style="  background: linear-gradient(to right, #00b4db, #0083b0);margin: auto auto">
                                    <br><br><br>
                                    <label style="color:white;font-size:30px;font-weight:bold;letter-spacing:3px;margin-bottom:10px;">Foto Profil</label><br>
                                        <?php 
                                            $photo=$row['image'];
                                            if($photo==""): ?>
                                                <img width="196" heigth="196" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                                                <div class="col section-bottom-button wow fadeInUp">
                                                    <a class="btn btn-primary btn-customized-2" href="photo.php" role="button">
                                                        <i class="fas fa-paperclip"></i> Upload Foto
                                                    </a>
                                                </div>
                                            <?php else:?>
                                                <img src="userpicture/<?php echo htmlentities($photo);?>" style="width:50%;height:300px;border-radius:50%"><br>
                                                <div class="col section-bottom-button wow fadeInUp">
                                                    <a class="btn btn-primary btn-customized-2 " href="photo.php" role="button">
                                                        <i class="fas fa-paperclip"></i> Update Foto
                                                    </a>
                                                </div>
                                            <?php endif;?>
                                    <br><br><br>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>   
                </div>
		        <footer class="footer-container">
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