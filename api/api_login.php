<?php
session_start();
require_once 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = md5($password);

$q = "
    SELECT 
        *
    FROM
        user
    WHERE
        username = '$username'
    AND
        password = '$hashed_password'
";

$e = mysqli_query($conn, $q);
$c = mysqli_num_rows($e);

if ($c = 1) {
    $data = mysqli_fetch_assoc($e);
    $_SESSION['user'] = $data['id'];
    $_SESSION['nama_user'] = $data['nama_user'];
    header("location:../index.php");
} else {
?>
    <script type="text/javascript">
        alert("Username atau password salah");
        window.location.href = "../login.php";
    </script>
<?php

}
