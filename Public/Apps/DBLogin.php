<?php

session_start();
include './ConnectionDB.php';

$user=$_POST['txtUser'];
$pass=$_POST['txtPass'];

$query = "SELECT username, password FROM tbl_customer WHERE username = '".$user."' AND password ='".$pass."'";
$result = mysqli_query($conn, $query);
$count= mysqli_num_rows($result);
if ($count==1) {
    $_SESSION['customer'] = $user;
    header('location:../home.php');
} else {
    ?>
    <script>
    window.alert('Account or password is incorrect');
    history.back();
    </script>
    <?php
}