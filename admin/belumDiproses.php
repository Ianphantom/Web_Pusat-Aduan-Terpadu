<?php 
    session_start();
    error_reporting(0);
    include("common/config.php");
    if(strlen($_SESSION['login'])==0){ 
        header('location:index.php');
    }else {
        // $query=mysqli_query($con,"select * from users where email='".$_SESSION['login']."'");
		// $row=mysqli_fetch_array($query)
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pusat Aduan Terpadu</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Pusat Aduan Terpadu Tobasa</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li><a href="dashboard.php">Admin </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="settings.php">Pengaturan Akun</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active">
                                    <a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a>
                                </li>
                                <li>
                                    <a class="collapsed" data-toggle="collapse" href="#togglePages">
                                    <i class="menu-icon icon-bullhorn"></i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                    </i>Aduan </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <?php 
                                            $q1 = mysqli_query($con, "SELECT count(nomor_komplain) as jumlah FROM daftar_komplain where status IS NULL"); 
                                            $adn1 = mysqli_fetch_array($q1); 
                                            $q2 =  mysqli_query($con, "SELECT count(nomor_komplain) as jumlah FROM daftar_komplain where status='Sedang diproses'");
                                            $adn2 = mysqli_fetch_array($q2);
                                            $q3 =  mysqli_query($con, "SELECT count(nomor_komplain) as jumlah FROM daftar_komplain where status='Closed'");
                                            $adn3 = mysqli_fetch_array($q3);
                                        ?>
                                        <li><a href="belumDiproses.php"><i class="icon-inbox"></i>Belum Diproses <b class="label red pull-right"><?php echo htmlentities($adn1['jumlah']) ?></b></a></li>
                                        <li><a href="sedangDiproses.php"><i class="icon-inbox"></i>Sedang Diproses <b class="label red pull-right"><?php echo htmlentities($adn2['jumlah']) ?></b></a></li>
                                        <li><a href="selesai.php"><i class="icon-inbox"></i>Selesai <b class="label green pull-right"><?php echo htmlentities($adn3['jumlah']) ?></b></a></li>
                                    </ul>
                                </li>
                                <?php 
                                    $query = mysqli_query($con, "SELECT count(id) as jumlah FROM users");
                                    $rowuser =mysqli_fetch_array($query);
                                ?>
                                <li>
                                    <a href="pengguna.php"><i class="menu-icon icon-inbox"></i>Pengguna<b class="label green pull-right"><?php echo htmlentities($rowuser['jumlah']) ?></b> </a>
                                </li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li>
                                    <a href="kecamatan.php"><i class="menu-icon icon-bold"></i>Tambah Kecamatan </a>
                                </li>
                                <li>
                                    <a href="kategori.php"><i class="menu-icon icon-book"></i>Tambah Kategori </a>
                                </li>
                                <li>
                                    <a href="subkategori.php"><i class="menu-icon icon-paste"></i>Tambah Sub-Kategory </a>
                                </li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li>
                                    <a href="userlogin.php"><i class="menu-icon icon-paste"></i>User Login Log </a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a>
                                </li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                        <div class="module">
                                <div class="module-head">
                                    <h3>Aduan Belum Diproses</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nomor Komplain</th>
                                                <th>Masalah</th>
                                                <th>Kecamatan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $q4 = mysqli_query($con, "SELECT * FROM daftar_komplain where status IS NULL"); 
                                                while($row = mysqli_fetch_array($q4)){?>
                                                <tr>
                                                    <td><?php echo htmlentities($row['nomor_komplain']) ?></td>
                                                    <td><?php echo htmlentities($row['masalah']) ?></td>
                                                    <td><?php echo htmlentities($row['kecamatan']) ?></td>
                                                    <td>
                                                        <?php 
                                                            if($row['status']==NULL){ ?>
                                                                <button type="button" class="btn btn-danger">Belum Diproses</button>
                                                            <?php } 
                                                        ?>
                                                    </td>
                                                    <td><a href="complaintDetail.php?kode=<?php echo htmlentities($row['nomor_komplain']) ?>"><button type="button" class="btn btn-primary">Details</button></a></td>
                                                </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2020 - Pusat Aduan Tobasa </b>All rights reserved.
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
</html>
<?php } ?>