<?php
if (isset($_GET['unit']) && isset($_GET['state']) && $_GET['token']) {
    require_once 'connection.php';
    $state = $_GET['state'];
    $unit = $_GET['unit'];
    $token = $_GET['token'];

    if ($token == 'JsgTcZc3Yw') {
        if ($unit == 'lampu') {
            $q = "
                UPDATE
                    lokasi_sensor
                SET
                    lampu = '$state'
                WHERE
                    token = '$token'
            ";
            $e = mysqli_query($conn, $q);
        }
    } else if ($token == 'yc4gMjlwv5') {
        if ($unit == 'lampu') {
            $q = "
                UPDATE
                    lokasi_sensor
                SET
                    lampu = '$state'
                WHERE
                    token = '$token'
            ";
            $e = mysqli_query($conn, $q);
        }
        if ($unit == 'kipas') {
            $q = "
                UPDATE
                    lokasi_sensor
                SET
                    kipas = '$state'
                WHERE
                    token = '$token'
            ";
            $e = mysqli_query($conn, $q);
        }
    } else if ($token == 'Wl8YuBkKbT') {
        if ($unit == 'jemuran') {
            $q = "
                UPDATE
                    lokasi_sensor
                SET
                    jemuran = '$state'
                WHERE
                    token = '$token'
            ";
            $e = mysqli_query($conn, $q);
        }
        if ($unit == 'lampu') {
            $q = "
                UPDATE
                    lokasi_sensor
                SET
                    lampu = '$state'
                WHERE
                    token = '$token'
            ";
            $e = mysqli_query($conn, $q);
        }
    }
    echo $token;
    header('location: ../index.php');
    exit();
}
