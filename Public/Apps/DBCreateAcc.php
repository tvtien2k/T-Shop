<?php

session_start();
include './ConnectionDB.php';

$user = $_POST['txtUser'];
$pass = $_POST['txtPass'];
$pass2 = $_POST['txtPass2'];
$name = $_POST['txtName'];
$regex_email = '/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/';
$email = $_POST['txtEmail'];
$regex_phone = '/(09|01[2|6|8|9])+([0-9]{8})\b/';
$phone = $_POST['txtPhone'];
$address = $_POST['txtAddress'];

if ($user == NULL || $pass == NULL || $pass2 == NULL || $name == NULL || $email == NULL || $phone == NULL || $address == NULL || $pass != $pass2) {
    ?>
    <script>
        window.alert('ERROR');
        history.back();
    </script>
    <?php

} elseif (!preg_match($regex_email, $email)) {
    ?>
    <script>
        window.alert('ERROR Email!!!');
        history.back();
    </script>
    <?php

} elseif (!preg_match($regex_phone, $phone)) {
    ?>
    <script>
        window.alert('ERROR Phone!!!!');
        history.back();
    </script>
    <?php

} else {
    $sql = "INSERT INTO tbl_customer VALUES('$user','$pass','$name','$email','$phone','$address')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['customer'] = $user;
        header('location:../home.php');
    } else {
        ?>
        <script>
            window.alert('ERROR');
            history.back();
        </script>
        <?php

    }
}