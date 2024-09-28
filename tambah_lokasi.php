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
        <!-- Header -->
        <h1 class="ui icon header block center aligned">
            <i class="home icon"></i>
            <div class="content">Login</div>
            <div class="content"><i>"Smart living, simplified"</i></div>
        </h1>
        <!-- Form Tambah Lokasi -->
        <form class="ui segment form" method="post" action="api/api_tambah_lokasi.php">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']; ?>">
            <div class="field">
                <label>Nama Ruangan</label>
                <input type="text" name="nama_ruangan" placeholder="Nama Ruangan" id="nama_ruangan" required>
            </div>
            <table class="ui compact very basic table">
                <tbody>
                    <tr>
                        <td data-label="Label">Pakai lampu?</td>
                        <td data-label="Button">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="lampu" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Label">Pakai kipas?</td>
                        <td data-label="Button">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="kipas" value="0">
                            </div>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td data-label="Label">Pakai AC?</td>
                        <td data-label="Button">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="ac" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Label">Pakai sensor kualitas udara?</td>
                        <td data-label="Button">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="kualitas_udara" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Label">Pakai sensor suhu?</td>
                        <td data-label="Button">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="suhu" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Label">Pakai sensor cahaya?</td>
                        <td data-label="Button">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="cahaya" value="0">
                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <button class="ui button blue" type="submit" id="btn-submit" name="login">Submit</button>
        </form>
    </div>
</body>
<script src="jquery-3.7.0.min.js"></script>
<script src="semantic/Semantic-UI-CSS-master/semantic.min.js"></script>
<script>
    $('.ui.toggle').checkbox({
        onChecked: function() {
            $(this).attr('value', '1');
        }
    })
</script>

</html>