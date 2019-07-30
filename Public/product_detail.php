<?php
include '../Public/Apps/ConnectionDB.php';
session_start();
if (!isset($_GET['id'])) {
    header('Location: home.php');
}
$sql_cate = "SELECT * FROM tbl_categories";
$sql_brand = "SELECT * FROM tbl_brands";
$id = $_GET['id'];
$sql_pr = "SELECT * FROM tbl_products WHERE id = '$id'";
$id_cate = NULL;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Product Details | T-Shop</title>
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

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Category</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php
                                        $result_cate = mysqli_query($conn, $sql_cate);
                                        while ($row = mysqli_fetch_array($result_cate)) {
                                            ?>
                                            <h4 class="panel-title" style="padding: 4px"><a href="products.php?page=1&cate=<?= $row[0] ?>"><?= $row[1] ?></a></h4>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div><!--/category-products-->

                            <div class="brands_products"><!--brands_products-->
                                <h2>Brands</h2>
                                <div class="brands-name">
                                    <?php
                                    $result_brand = mysqli_query($conn, $sql_brand);
                                    while ($row = mysqli_fetch_array($result_brand)) {
                                        ?>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="products.php?page=1&brand=<?= $row[0] ?>"> <span class="pull-right"></span><?= $row[1] ?></a></li>
                                        </ul>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div><!--/brands_products-->
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <?php
                        $result_pr = mysqli_query($conn, $sql_pr);
                        while ($row = mysqli_fetch_array($result_pr)) {
                            $id_cate = $row[2];
                            ?>
                            <div class="product-details"><!--product-details-->
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?= $row[6] ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <h2><?= $row[1] ?></h2>
                                        <img src="images/product-details/rating.png" alt="" />
                                        <span>
                                            <span>$ <?= $row[4] ?></span>
                                            <a href="Apps/DBAddToCart.php?id=<?= $row[0] ?>&q=1">
                                                <button type="button" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>
                                            </a>
                                        </span>
                                    </div><!--/product-information-->
                                </div>
                            </div><!--/product-details-->
                            <div class="category-tab shop-details-tab"><!--category-tab-->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#reviews" data-toggle="tab">Describe</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="reviews" >
                                        <div class="col-sm-12">
                                            <p><b><?= $row[1] ?></b></p>
                                            <p><?= $row[5] ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div><!--/category-tab-->
                            <?php
                        }
                        ?>
                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">RELATE</h2>
                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <?php
                                        $sql_relate_1 = "SELECT id, name, price, img FROM tbl_products WHERE category_id = '$id_cate' ORDER BY time DESC LIMIT 0, 3";
                                        $result_relate_1 = mysqli_query($conn, $sql_relate_1);
                                        while ($row = mysqli_fetch_array($result_relate_1)) {
                                            ?>
                                            <div class="col-sm-4" style=" height: 400px">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="<?= $row[3] ?>" style=" height: 260px" alt="" />
                                                            <h2>$<?= $row[2] ?></h2>
                                                            <p><?= $row[1] ?></p>
                                                            <div class="choose">
                                                                <ul class="nav nav-pills nav-justified">
                                                                    <li><a href="product_detail.php?id=<?= $row[0] ?>"><i class="fa fa-plus-square"></i>Product information</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="item">	
                                        <?php
                                        $sql_relate_2 = "SELECT id, name, price, img FROM tbl_products WHERE category_id = '$id_cate' ORDER BY time DESC LIMIT 3, 3";
                                        $result_relate_2 = mysqli_query($conn, $sql_relate_2);
                                        while ($row = mysqli_fetch_array($result_relate_2)) {
                                            ?>
                                            <div class="col-sm-4" style=" height: 400px">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="<?= $row[3] ?>" style=" height: 260px" alt="" />
                                                            <h2>$<?= $row[2] ?></h2>
                                                            <p><?= $row[1] ?></p>
                                                            <div class="choose">
                                                                <ul class="nav nav-pills nav-justified">
                                                                    <li><a href="product_detail.php?id=<?= $row[0] ?>"><i class="fa fa-plus-square"></i>Product information</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>			
                            </div>
                        </div><!--/recommended_items-->
                    </div>


                </div>
            </div>
        </section>

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
        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>