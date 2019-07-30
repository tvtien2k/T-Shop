<?php

include 'DBConnection.php';

$id = $_POST['txtId'];
$name = $_POST['txtName'];
$id_cate = $_POST['slCate'];
$id_brand = $_POST['slBrand'];
$price = $_POST['txtPrice'];
$des = $_POST['txtDes'];
$img = $_POST['txtImg'];

if ($id == NULL || $name == NULL || $price == NULL || $des == NULL || $img == NULL) {
    ?>
    <script>
        window.alert('ERROR');
        history.back();
    </script>
    <?php

} else {
    $sql = "INSERT INTO tbl_products (id,name,category_id,brand_id,price,des,img) VALUES('$id','$name','$id_cate','$id_brand',$price,'$des','$img')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
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
            history.back();
        </script>
        <?php

    }
} 