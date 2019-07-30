<?php

include '../Apps/DBConnection.php';
 
$id=$_POST['txtId1'];
$name=$_POST['txtName1'];
    
if ($id==NULL || $name==NULL) {
    ?>
    <script>
    window.alert('ERROR');
    history.back();
    </script>
    <?php
}else { 
    $sql="INSERT INTO tbl_brands VALUES('$id','$name')";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?>
        <script>
        window.alert('Success');
        window.location.assign('../Form/dataBrand.php');
        </script>
        <?php
    } else {
        ?>
        <script>
        window.alert('ERROR');
        history.back();
        </script>
        <?php
    }
} 