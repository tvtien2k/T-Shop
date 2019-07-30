<?php

session_start();
include '../Apps/DBConnection.php';

$user = $_POST['txtUser'];
$pass = $_POST['txtPass'];
$pass2 = $_POST['txtPass2'];
$name = $_POST['txtName'];

if ($user == NULL || $pass == NULL || $pass2 == NULL || $name == NULL || $pass != $pass2) {
    ?>
    <script>
        window.alert('ERROR');
        history.back();
    </script>
    <?php

} else {
    $sql = "INSERT INTO tbl_admin VALUES('$user','$pass','$name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['user'] = $user;
        header('location:../Form/dataProduct.php');
    } else {
        ?>
        <script>
            window.alert('ERROR');
            history.back();
        </script>
        <?php

    }
} 