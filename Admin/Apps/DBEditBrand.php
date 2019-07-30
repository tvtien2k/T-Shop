<?php

include '../Apps/DBConnection.php';
$id=$_POST['txtId'];
$name=$_POST['txtName'];
if ($name==NULL) {
    header('location:../Form/addBrand.php?id='.$id);
}else {
    $sql="UPDATE tbl_brands SET name='$name' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?>
        <script>
        window.alert('Success');
        window.location.assign('../Form/dataBrand.php');
        </script>
        <?php
    }
} 