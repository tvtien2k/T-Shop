<?php
include '../Public/Apps/ConnectionDB.php';
session_start();
if ($_SESSION['cart'] == NULL || !isset($_SESSION['cart'])) {
    header('location:home.php');
}
$cart = $_SESSION['cart'];
$sql_cate = "SELECT * FROM tbl_categories";
$sql_brand = "SELECT * FROM tbl_brands";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Cart | T-Shop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="home.php">T-SHOP</a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="login.php"><i class="fa fa-user"></i><?php if (isset($_SESSION['customer'])) echo $_SESSION['customer'] ?></a></li>
                                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="home.php" class="active">Home</a></li>
                                    <li class="dropdown"><a href="">Categories<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <?php
                                            $result_cate_menu = mysqli_query($conn, $sql_cate);
                                            while ($row = mysqli_fetch_array($result_cate_menu)) {
                                                ?>
                                                <li><a href="products.php?page=1&cate=<?= $row[0] ?>"><?= $row[1] ?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li> 
                                    <li class="dropdown"><a href="">Brands<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <?php
                                            $result_brand_menu = mysqli_query($conn, $sql_brand);
                                            while ($row = mysqli_fetch_array($result_brand_menu)) {
                                                ?>
                                                <li><a href="products.php?page=1&brand=<?= $row[0] ?>"><?= $row[1] ?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li> 
                                    <li><a href="products.php">All Products</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <form action="Apps/DBSearch.php" method="get">
                                <div class="search_box pull-right">
                                    <input type="text" placeholder="Search" name="search"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <form action="Apps/DBOrderDetail.php" method="POST">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description"></td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($cart as $key => $value) {
                                    $pr = $cart[$key];
                                    $array_pr = explode(',', $pr);
                                    $id = $array_pr[0];
                                    $q = $array_pr[1];
                                    $sql_pr = "SELECT id, name, price, img FROM tbl_products WHERE id = '$id'";
                                    $result_pr = mysqli_query($conn, $sql_pr);
                                    while ($row = mysqli_fetch_array($result_pr)) {
                                        $total = $total + $row[2] * $q;
                                        ?>
                                        <tr>
                                            <td class="cart_product">
                                                <a href=""><img style="height: 90px" src="<?= $row[3] ?>" alt=""></a>
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href=""><?= $row[1] ?></a></h4>
                                                <div class="cart_quantity_button">
                                                    <input name="id_<?php echo $key ?>" value="<?= $row[0] ?>" readonly="" style="border: 0px">
                                                </div>
                                            </td>
                                            <td class="cart_price">
                                                <p class="cart_total_price total_con" ><?= $row[2] ?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <input class="cart_quantity_input" name="quantity_<?php echo $key ?>" value="<?php echo $q ?>" autocomplete="off" size="2">
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <div class="cart_quantity_button">
                                                    <input class="cart_quantity_input" name="total_<?php echo $key ?>" value="<?= $row[2] * $q ?>" readonly="" style="border: 0px" autocomplete="off" size="2">
                                                </div>
                                            </td>
                                            <td class="cart_delete">
                                                <input class="btn btn-default check_out" type="submit" name="submit" value="update" readonly="" autocomplete="off" size="2">
                                                <a href="Apps/DBOrderDetail.php?id=<?= $row[0] ?>" style="color: black" class="btn btn-default check_out" autocomplete="off" size="2">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="cart_product">
                                    </td>
                                    <td class="cart_description">
                                    </td>
                                    <td class="cart_price">
                                    </td>
                                    <td class="cart_quantity">
                                    </td>
                                    <td class="cart_total">
                                        <div class="cart_quantity_button">
                                            <input class="cart_quantity_input" name="total" value="<?php echo $total ?>" readonly="" style="border: 0px" autocomplete="off" size="2">
                                        </div>
                                    </td>
                                    <td class="cart_delete">
                                        <input class="btn btn-default check_out" type="submit" name="submit" value="Order" readonly="" autocomplete="off" size="2">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <footer id="footer"><!--Footer-->

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                        <p class="pull-right">Designed by <span>Tien Tran</span></p>
                    </div>
                </div>
            </div>

        </footer><!--/Footer-->



        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>