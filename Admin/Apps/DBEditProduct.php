<?php

include '../Apps/DBConnection.php';
$id = $_POST['txtId'];
$name = $_POST['txtName'];
$cate = $_POST['slCate'];
$brand = $_POST['slBrand'];
$Price = $_POST['txtPrice'];
$des = $_POST['txtDes'];
$img = $_POST['txtImg'];
if ($name == NULL || $Price == NULL || $des == NULL || $img == NULL) {
    header('location:../Form/addProduct.php?id=' . $id);
} else {
    $sql = "UPDATE tbl_products SET name='$name',category_id='$cate',brand_id='$brand',price=$Price,des ='$des',img ='$img' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        ?>
        <script>
            window.alert('Success');
            window.location.assign('../Form/dataProduct.php');
        </script>
        <?php

    } else {
        header('location:../Form/addProduct.php?id=' . $id);
    }
} 