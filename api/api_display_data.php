<?php
require_once 'connection.php';
function display_data()
{
    global $conn;
    $q = "
        SELECT
            'nama_ruangan',
            'lampu_status',
            'kipas_status',
            'ac_status'
        FROM
            lokasi
    ";
    echo $q;
    exit();
    $e = mysqli_query($conn, $q);
    return $e;
};
