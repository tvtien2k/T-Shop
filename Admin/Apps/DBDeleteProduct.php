<?php

include '../Apps/DBConnection.php';
$id=$_GET['id'];
$sql = "DELETE FROM tbl_products WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
    ?>
    <script>
    window.alert('Success');
    window.location.assign('../Form/dataProduct.php');
    </script>
    <?php
} else {
    ?>
    <script>
    window.alert('ERROR');
    window.location.assign('../Form/dataProduct.php');
    </script>
<?php
}
