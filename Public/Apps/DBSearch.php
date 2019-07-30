<?php

$search =$_GET['search'];
var_dump($search);
header('location:../products.php?page=1&search='.$search);