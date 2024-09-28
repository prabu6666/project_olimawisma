<?php
require_once 'connection.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$pass = md5($password);
function getRandomString()
{
    return uniqid();
}

$id = getRandomString();
$token = getRandomString();

$res = array(
    'status' => '0'
);

$q = "
        INSERT INTO
            user
                (
                    id,
                    username,
                    nama_user,
                    password,
                    token
                )
        VALUES
                (
                    '$id',
                    '$username',
                    '$nama',
                    '$pass',
                    '$token'
                )
    ";

$e = mysqli_query($conn, $q);
if ($e) {
    $res['status'] = '1';
    echo '<script>alert("Berhasil menambahkan data")</script>';
    echo '<script>window.location.href="../login.php"</script>';
} else {
    echo '<script>alert("Gagal menambahkan data")</script>';
    echo '<script>window.location.href="../login.php"</script>';
}
