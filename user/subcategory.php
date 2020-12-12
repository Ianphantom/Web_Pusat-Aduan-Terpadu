<?php
    include('common/config.php');
    if(!empty($_POST["category"])){
        $val=intval($_POST['category']);
        if(!is_numeric($val)){
 	    echo htmlentities("invalid industryid");exit;
    }else{
        $sub = mysqli_query($con,"SELECT * FROM subcategory WHERE id_category ='$val'");
        ?><option selected="selected">Pilih Subcategory </option><?php
        while($row=mysqli_fetch_array($sub)){
            ?>
                <option value="<?php echo htmlentities($row['jenis']); ?>"><?php echo htmlentities($row['jenis']); ?></option>
            <?php
        }
    }
}
?>