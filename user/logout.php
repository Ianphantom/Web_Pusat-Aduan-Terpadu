<?php 
    session_start();
    include("common/config.php");
    $_SESSION['login']="";
    date_default_timezone_set("Asia/Kolkata");
    $ldate=date('d-m-Y h:i:s A', time());
    mysqli_query($con, "UPDATE userlog set logout='$ldate' where username='".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
    session_unset();
?>
<script>
    document.location="../index.html";
</script>