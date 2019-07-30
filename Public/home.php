<?php
include '../Public/Apps/ConnectionDB.php';
session_start();
$sql_cate = "SELECT * FROM tbl_categories";
$sql_brand = "SELECT * FROM tbl_brands";
$sql_pr = "SELECT id, name, price, img FROM tbl_products ORDER BY time DESC LIMIT 0, 12";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | T-Shop</title>
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

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span>T</span>-SHOP</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <img style="height: 400px" src="http://tbmobile.vn/wp-content/uploads/2018/09/macbook2.png" class="girl img-responsive" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>T</span>-SHOP</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <img style="height: 400px" src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-xs-max-space-select-2018?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1550795409906" class="girl img-responsive" alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>T</span>-SHOP</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <img style="height: 400px" src="https://www.rogers.com/apple-images/watch/40mm-grey-straight.png" class="girl img-responsive" alt="" />
                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->

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
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">PRODUCTS NEW</h2>
                            <?php
                            $result_pr = mysqli_query($conn, $sql_pr);
                            while ($row = mysqli_fetch_array($result_pr)) {
                                ?>
                                <div class="col-sm-4" style="height: 500px">
                                    <div class="product-image-wrapper">
                                        <div class="single-products" style="height: 400px">
                                            <div class="productinfo text-center">
                                                <img src="<?= $row[3] ?>" alt="" style="height: 250px"/>
                                                <h2>$<?= $row[2] ?></h2>
                                                <p><?= $row[1] ?></p>
                                                <a href="Apps/DBAddToCart.php?id=<?= $row[0] ?>&q=1" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>$<?= $row[2] ?></h2>
                                                    <p><?= $row[1] ?></p>
                                                    <a href="Apps/DBAddToCart.php?id=<?= $row[0] ?>&q=1" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="product_detail.php?id=<?= $row[0] ?>"><i class="fa fa-plus-square"></i>Product information</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div><!--features_items-->
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="products.php?page=2">2</a></li>
                            <li><a href="products.php?page=3">3</a></li>
                            <li><a href="products.php?page=2">></a></li>
                        </ul>
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
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>