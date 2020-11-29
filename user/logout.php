<?php 
    session_start();
    include("common/config.php");
    //date_default_timezone_set("Asia/Kolkata");
    //$ldate=date('d-m-Y h:i:s A', time());
    mysqli_query($con, "UPDATE userlog set logout=CURRENT_TIMESTAMP() where username='".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
    $_SESSION['login']="";
    session_unset();
?>
<script>
    document.location="../index.html";
</script>