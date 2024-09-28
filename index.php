<?php
session_start();
if (!isset($_SESSION['user'])) {
?>
    <script type="text/javascript">
        alert("Silahkan login terlebih dahulu");
        window.location.href = 'login.php';
    </script>
<?php
    exit();
}
require_once 'api/connection.php';
$id_user = $_SESSION['user'];

// $q = "
//     SELECT
//         *
//     FROM
//         lokasi_sensor
//     WHERE
//         token = 'JsgTcZc3Yw'
//     AND
//         token = 'yc4gMjlwv5'
// ";

// $e = mysqli_query($conn, $q);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home</title>
    <link rel="stylesheet" href="semantic/Semantic-UI-CSS-master/semantic.min.css">
    <style>
        #luar {
            width: 100%;
            max-width: 480px !important;
            margin: 0px auto !important;
        }

        ;
    </style>
</head>

<body>
    <div class="ui basic segment container" id="luar">
        <h1 class="ui icon header block center aligned">
            <i class="home icon"></i>
            <div class="content">Homepage</div>
            <div class="content"><i>"Smart living, simplified"</i></div>
        </h1>
        <h3>Halo, <?php echo $_SESSION['nama_user']; ?></h3>
        <button class="ui blue button" onclick="btn_tambah_lokasi()">Tambah Lokasi</button>
        <div onclick="logout()" class="ui button icon black right floated">
            <i class="ui sign out icon"></i>
        </div>
        <table class="ui  table striped tiny unstackable compact">
            <thead>
                <tr>
                    <th class="center aligned">Lokasi</th>
                    <th class="center aligned">Lampu</th>
                    <th class="center aligned">Kipas</th>
                    <th class="center aligned"></th>
                </tr>
            </thead>
            <tbody>

                <?php

                $q = "
                        SELECT
                            *
                        FROM
                            lokasi_sensor
                        WHERE
                            id_user = '$id_user'
                    ";

                $res = $conn->query($q);

                if (!$res) {
                    die('Invalid query');
                }

                $c = mysqli_num_rows($res);

                if ($c == 0) {
                ?>
                    <tr>
                        <td colspan="3">Belum ada data lokasi</td>
                    </tr>
                <?php
                }

                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["nama_ruangan"] . "<br>Token : " . $row['token'] . "</td>"
                ?>
                    <td>
                        <h5>
                            <?php
                            $showOn = 0;
                            $showOff = 0;
                            $showNotAvailable = 0;
                            if ($row['lampu'] == 0) {
                                $state = "OFF";
                                $showOn = 1;
                            }
                            if ($row['lampu'] == 2) {
                                $state = "Not Available";
                                $showNotAvailable = 1;
                            }
                            if ($row['lampu'] == 1) {
                                $state = "ON";
                                $showOff = 1;
                            }
                            echo $state;
                            ?>
                        </h5>
                        <?php
                        if ($showOn == 1) {
                        ?>
                            <a href="api/action.php?token=<?php echo $row['token'] ?>&unit=lampu&state=1" class="ui button tiny green">ON</a>
                        <?php
                        }
                        if ($showOff == 1) {
                        ?>
                            <a href="api/action.php?token=<?php echo $row['token'] ?>&unit=lampu&state=0" class="ui button tiny red">OFF</a>
                        <?php
                        }
                        ?>

                    </td>
                    <td>
                        <h5>
                            <?php
                            $showOff = 0;
                            $showOn = 0;
                            if ($row['kipas'] == 0) {
                                $state = "OFF";
                                $showOn = 1;
                            }
                            if ($row['kipas'] == 2) {
                                $state = "Not Available";
                            }
                            if ($row['kipas'] == 1) {
                                $state = "ON";
                                $showOff = 1;
                            }
                            echo $state;
                            ?>
                        </h5>
                        <?php
                        if ($showOn == 1) {
                        ?>
                            <a href="api/action.php?token=<?php echo $row['token'] ?>&unit=kipas&state=1" class="ui button tiny green">ON</a>
                        <?php
                        }
                        if ($showOff == 1) {
                        ?>
                            <a href="api/action.php?token=<?php echo $row['token'] ?>&unit=kipas&state=0" class="ui button tiny red">OFF</a>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <div onclick="onConfirm('<?php echo $row['id'] ?>')" class="ui icon button orange">
                            <i class="ui trash alternate icon"></i>
                        </div>
                    </td>
                <?php
                    "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>
<script src="jquery-3.7.0.min.js"></script>
<script src="semantic/Semantic-UI-CSS-master/semantic.min.js"></script>
<script>
    function btn_tambah_lokasi() {
        window.location.href = 'tambah_lokasi.php';
    }

    function onConfirm(id) {
        let text = 'Apakah anda yakin menghapus?'
        if (confirm(text) == true) {
            window.location.href = 'api/delete.php?id=' + id;
        }
    }

    function logout() {
        let text = 'Apakah anda yakin logout?'
        if (confirm(text) == true) {
            window.location.href = 'api/logout.php';
        }
    }
</script>

</html>