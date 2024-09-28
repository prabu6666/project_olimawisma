<?php
$res = array(
    'kode' => '0',
    'data' => array(
        'lampu' => '0',
        'kipas' => '0',
        'jemuran' => '0'
    ),
    'pesan' => ''
);

if (isset($_GET['token'])) {
    require_once 'connection.php';
    $token = $_GET['token'];

    $q = "
            SELECT
                id,
                id_user,
                token,
                nama_ruangan,
                lampu,
                kipas,
                jemuran
            FROM
                lokasi_sensor
            WHERE
                token = '$token'
            LIMIT
                1
        ";

    $e = mysqli_query($conn, $q);
    $c = mysqli_num_rows($e);

    if ($c == 1) {
        $s = mysqli_fetch_assoc($e);
        $res['kode'] = '1';
        $res['data']['jemuran'] = $s['jemuran'];
        $res['data']['kipas'] = $s['kipas'];
        $res['data']['lampu'] = $s['lampu'];
        $res['pesan'] = 'Berhasil';
    }
}

echo json_encode($res);
// echo 'OK';
