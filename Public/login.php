<?php
include '../Public/Apps/ConnectionDB.php';
session_start();
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
        <title>Login | T-Shop</title>
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

        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            <form action="../Public/Apps/DBLogin.php" method="POST">
                                <input type="text" placeholder="Username" name="txtUser"/>
                                <input type="password" placeholder="Password" name="txtPass"/>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            <form action="../Public/Apps/DBCreateAcc.php" method="POST">
                                <input type="text" placeholder="Username" name="txtUser"/>
                                <input type="password" placeholder="Password" name="txtPass"/>
                                <input type="password" placeholder="Password (Confirm)" name="txtPass2"/>
                                <input type="text" placeholder="Name" name="txtName"/>
                                <input type="email" placeholder="Email Address" name="txtEmail"/>
                                <input type="text" placeholder="Phone number" name="txtPhone"/>
                                <input type="text" placeholder="Address" name="txtAddress"/>
                                <button type="submit" class="btn btn-default">Signup</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->


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