<?php
if (isset($_POST['token'])) {
    include 'connection.php';
    $key = $_POST['token'];

    $q = "
            SELECT 
                * 
            FROM 
                lokasi_sensor 
            WHERE 
                token = '$key'
        ";

    $e = mysqli_query($conn, $q);
    $c = mysqli_num_rows($e);

    if ($c > 0) {
        $data = mysqli_fetch_assoc($e);
    } else {
        $data = ['token' => "Invalid"];
    }

    echo json_encode($data);
}
