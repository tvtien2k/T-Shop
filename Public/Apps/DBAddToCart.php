<?php

session_start();

$id = $_GET['id'];
$q = $_GET['q'];
$cart = $_SESSION['cart'];

if ($cart == NULL) {
    $cart = [];
}

foreach ($cart as $value) {
    if ($value == "$id,$q") {
        $_SESSION['cart'] = $cart;
        ?>
        <script>
            window.alert('The product has been added earlier');
            history.back();
        </script>
        <?php

        die();
    }
}

$cart[] = "$id,$q";
$_SESSION['cart'] = $cart;
?>
<script>
    window.alert('Add to cart success!!!!!');
    history.back();
</script>