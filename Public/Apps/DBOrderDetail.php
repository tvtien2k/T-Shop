<?php

session_start();
include './ConnectionDB.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$cart = $_SESSION['cart'];

if ($_POST['submit'] == 'update') {
    foreach ($cart as $key => $value) {
        $pr = $cart[$key];
        $array_pr = explode(',', $pr);
        $id = $array_pr[0];
        $q = $array_pr[1];
        $id_post = $_POST["id_$key"];
        if ($id == $id_post) {
            $q_post = $_POST["quantity_$key"];
            $cart[$key] = "$id,$q_post";
        }
    }
    $_SESSION['cart'] = $cart;
    header('location:../cart.php');
}

if (isset($_GET['id'])) {
    foreach ($cart as $key => $value) {
        $pr = $cart[$key];
        $array_pr = explode(',', $pr);
        $id = $array_pr[0];
        $q = $array_pr[1];
        $id_get = $_GET['id'];
        if ($id == $id_get) {
            unset($cart[$key]);
        }
    }
    $_SESSION['cart'] = $cart;
    header('location:../cart.php');
}

if ($_POST['submit'] == 'Order') {
    if (isset($_SESSION['customer'])) {
        $date = date('d/m/Y-H:i:s');
        $id_cus = $_SESSION['customer'];
        $id_bill = "$date-$id_cus";
        $total = $_POST['total'];
        $sql_bill = "INSERT INTO tbl_bill (id, cus_id, total) VALUES('$id_bill','$id_cus','$total')";
        $result_bill = mysqli_query($conn, $sql_bill);
        foreach ($cart as $key => $value) {
            $pr = $cart[$key];
            $array_pr = explode(',', $pr);
            $id_pr = $array_pr[0];
            $q_pr = $array_pr[1];
            $total_post = $_POST["total_$key"];
            $sql_bill_detail = "INSERT INTO tbl_bill_detail (bill_id, product_id , quantity, total) VALUES('$id_bill','$id_pr',$q_pr,$total_post)";
            $result_bill_detail = mysqli_query($conn, $sql_bill_detail);
            if ($result_bill_detail) {
                unset($_SESSION['cart']);
            }
            ?>
            <script>
                window.alert('Order Success !!!');
                window.location.assign('../home.php');
            </script>
            <?php

        }
    } else {
        ?>
        <script>
            window.alert('You need to login to order !!!');
            window.location.assign('../login.php');
        </script>
        <?php

    }
}