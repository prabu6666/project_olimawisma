<?php
require_once 'connection.php';
$nama_ruangan = $_POST['nama_ruangan'];
$id_user = $_POST['id_user'];


$ar_data = array(
    'lampu',
    'kipas'
);

foreach ($ar_data as $pref) {
    $$pref = 0;
    if (!empty($_POST[$pref])) {
        $$pref = $_POST[$pref];
    };
}


function getRandomString()
{
    return uniqid();
}
$token = getRandomString();
$id = getRandomString();

$q = "
        INSERT INTO
            lokasi_sensor
                (
                    id,
                    nama_ruangan,
                    token,
                    id_user,
                    lampu,
                    kipas
                )
        VALUES
                (
                    '$id',
                    '$nama_ruangan',
                    '$token',
                    '$id_user',
                    '$lampu',
                    '$kipas'
                )
    ";

$e = mysqli_query($conn, $q);
if ($e) {
    $res['status'] = '1';
    echo '<script>alert("Berhasil menambahkan data")</script>';
    echo '<script>window.location.href="../index.php"</script>';
} else {
    echo '<script>alert("Gagal menambahkan data")</script>';
    echo '<script>window.location.href="../index.php"</script>';
}
