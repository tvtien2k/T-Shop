<?php
session_start();
if ($_SESSION['user'] == NULL) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en-us">

    <head>
        <title>Create Account</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico" />

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">

        <!-- STYLESHEETS -->
        <style type="text/css">
            [fuse-cloak],
            .fuse-cloak {
                display: none !important;
            }
        </style>

        <!-- Icons.css -->
        <link type="text/css" rel="stylesheet" href="../assets/icons/fuse-icon-font/style.css">
        <!-- Animate.css -->
        <link type="text/css" rel="stylesheet" href="../assets/node_modules/animate.css/animate.min.css">
        <!-- PNotify -->
        <link type="text/css" rel="stylesheet" href="../assets/node_modules/pnotify/dist/PNotifyBrightTheme.css">
        <!-- Nvd3 - D3 Charts -->
        <link type="text/css" rel="stylesheet" href="../assets/node_modules/nvd3/build/nv.d3.min.css" />
        <!-- Perfect Scrollbar -->
        <link type="text/css" rel="stylesheet" href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" />
        <!-- Fuse Html -->
        <link type="text/css" rel="stylesheet" href="../assets/fuse-html/fuse-html.min.css" />
        <!-- Main CSS -->
        <link type="text/css" rel="stylesheet" href="../assets/css/main.css">
        <!-- / STYLESHEETS -->

        <!-- JAVASCRIPT -->
        <!-- jQuery -->
        <script type="text/javascript" src="../assets/node_modules/jquery/dist/jquery.min.js"></script>
        <!-- Mobile Detect -->
        <script type="text/javascript" src="../assets/node_modules/mobile-detect/mobile-detect.min.js"></script>
        <!-- Perfect Scrollbar -->
        <script type="text/javascript" src="../assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- Popper.js -->
        <script type="text/javascript" src="../assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Nvd3 - D3 Charts -->
        <script type="text/javascript" src="../assets/node_modules/d3/d3.min.js"></script>
        <script type="text/javascript" src="../assets/node_modules/nvd3/build/nv.d3.min.js"></script>
        <!-- Data tables -->
        <script type="text/javascript" src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
        <!-- PNotify -->
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotify.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyStyleMaterial.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyButtons.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyCallbacks.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyMobile.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyHistory.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyDesktop.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyConfirm.js"></script>
        <script type="text/javascript" src="../assets/node_modules/pnotify/dist/iife/PNotifyReference.js"></script>
        <!-- Fuse Html -->
        <script type="text/javascript" src="../assets/fuse-html/fuse-html.min.js"></script>
        <!-- Main JS -->
        <script type="text/javascript" src="../assets/js/main.js"></script>
        <!-- / JAVASCRIPT -->
    </head>

    <body class="layout layout-vertical layout-left-navigation layout-below-toolbar layout-below-footer">
        <main>
            <div id="wrapper">
                <aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
                    <div class="aside-content bg-primary-700 text-auto">

                        <div class="aside-toolbar">

                            <div class="logo">
                                <span class="logo-icon">T</span>
                                <span class="logo-text">T-SHOP</span>
                            </div>

                            <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                                <i class="icon icon-backburger"></i>
                            </button>

                        </div>

                        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                            <li class="subheader">
                                <span>MANAGE</span>
                            </li>

                            <li class="nav-item" role="tab" id="heading-dashboards">

                                <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-dashboards" href="#" aria-expanded="false" aria-controls="collapse-dashboards">

                                    <div class="logo">
                                        <span class="logo-icon">P</span>
                                    </div>

                                    <span>roducts</span>
                                </a>
                                <ul id="collapse-dashboards" class='collapse ' role="tabpanel" aria-labelledby="heading-dashboards" data-children=".nav-item">

                                    <li class="nav-item">
                                        <a class="nav-link ripple" href="dataProduct.php" data-url="index.html">

                                            <span>Data</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link ripple  " href="addProduct.php" data-url="index.html">

                                            <span>Add new</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item" role="tab" id="heading-ecommerce">

                                <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-ecommerce" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">

                                    <div class="logo">
                                        <span class="logo-icon">C</span>
                                    </div>

                                    <span>ategories</span>
                                </a>
                                <ul id="collapse-ecommerce" class='collapse ' role="tabpanel" aria-labelledby="heading-ecommerce" data-children=".nav-item">

                                    <li class="nav-item">
                                        <a class="nav-link ripple " href="dataCategory.php" data-url="index.html">

                                            <span>Data</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link ripple " href="addCategory.php" data-url="index.html">

                                            <span>Add new</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item" role="tab" id="heading-errors">

                                <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-errors" href="#" aria-expanded="false" aria-controls="collapse-errors">

                                    <div class="logo">
                                        <span class="logo-icon">B</span>
                                    </div>

                                    <span>rands</span>
                                </a>
                                <ul id="collapse-errors" class='collapse' role="tabpanel" aria-labelledby="heading-errors" data-children=".nav-item">

                                    <li class="nav-item">
                                        <a class="nav-link ripple " href="dataBrand.php" data-url="dataProduct.php">

                                            <span>Data</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link ripple" href="addBrand.php" data-url="dataProduct.php">

                                            <span>Add new</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ripple" href="orders.php" data-url="apps-e-commerce-orders.html">

                                    <div class="logo">
                                        <span class="logo-icon">O</span>
                                    </div>

                                    <span>rder</span>
                                </a>
                            </li>

                            <li class="subheader">
                                <span>Setting</span>
                            </li>

                            <li class="nav-item" role="tab" id="heading-authentication">

                                <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-authentication" href="#" aria-expanded="false" aria-controls="collapse-authentication">

                                    <i class="icon s-4 icon-lock"></i>

                                    <span>Account</span>
                                </a>
                                <ul id="collapse-authentication" class='collapse show' role="tabpanel" aria-labelledby="heading-authentication" data-children=".nav-item">

                                    <li class="nav-item">
                                        <a class="nav-link ripple " href="setLogin.php" data-url="apps-e-commerce-orders.html">

                                            <span>Login</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link ripple active" href="createAccount.php" data-url="apps-e-commerce-orders.html">

                                            <span>Create Account</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                </aside>
                <div class="content-wrapper">
                    <nav id="toolbar" class="bg-white">

                        <div class="row no-gutters align-items-center flex-nowrap">

                            <div class="col-auto">

                                <div class="row no-gutters align-items-center justify-content-end">

                                    <div class="user-menu-button dropdown">

                                        <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="avatar-wrapper">
                                                <img class="avatar" src="../assets/images/avatars/profile.jpg">
                                                <i class="status text-green icon-checkbox-marked-circle s-4"></i>
                                            </div>
                                            <span class="username mx-3 d-none d-md-block"><?= $_SESSION['user'] ?></span>
                                        </div>

                                        <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                                            <a class="dropdown-item" href="#">
                                                <div class="row no-gutters align-items-center flex-nowrap">
                                                    <i class="status text-green icon-checkbox-marked-circle"></i>
                                                    <span class="px-3">Online</span>
                                                </div>
                                            </a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="../Apps/DBLogout.php">
                                                <div class="row no-gutters align-items-center flex-nowrap">
                                                    <i class="icon-logout"></i>
                                                    <span class="px-3">Logout</span>
                                                </div>
                                            </a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="content custom-scrollbar">

                        <div id="register-v2" class="row no-gutters">

                            <div class="intro col-12 col-md light-fg">

                                <div class="d-flex flex-column align-items-center align-items-md-start text-center text-md-left py-16 py-md-32 px-12">

                                    <div class="logo bg-secondary mb-8">
                                        <span>T</span>
                                    </div>

                                    <div class="title">
                                        Welcome to the T-SHOP!
                                    </div>

                                </div>
                            </div>

                            <div class="form-wrapper col-12 col-md-auto d-flex justify-content-center p-4 p-md-0">

                                <div class="form-content md-elevation-8 h-100 bg-white text-auto py-16 py-md-32 px-12">

                                    <div class="title h5">Create account</div>

                                    <form name="registerForm" novalidate class="mt-8" action="../Apps/DBCreateAcc.php" method="POST">

                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control" id="registerFormInputName" aria-describedby="nameHelp" name="txtName"/>
                                            <label for="registerFormInputName">Full Name</label>
                                        </div>

                                        <div class="form-group mb-4">
                                            <input type="email" class="form-control" id="registerFormInputEmail" aria-describedby="emailHelp" name="txtUser"/>
                                            <label for="registerFormInputEmail">Username</label>
                                        </div>

                                        <div class="form-group mb-4">
                                            <input type="password" class="form-control" id="registerFormInputPassword" name="txtPass"/>
                                            <label for="registerFormInputPassword">Password</label>
                                        </div>

                                        <div class="form-group mb-4">
                                            <input type="password" class="form-control" id="registerFormInputPasswordConfirm" name="txtPass2"/>
                                            <label for="registerFormInputPasswordConfirm">Password (Confirm)</label>
                                        </div>

                                        <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN" name="submit">
                                            CREATE MY ACCOUNT
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </body>

</html>