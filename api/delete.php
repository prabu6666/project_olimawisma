<?php
require_once 'connection.php';
$id = $_GET['id'];

$q = "
        DELETE FROM
            lokasi_sensor
        WHERE
            id = '$id'
    ";

$e = mysqli_query($conn, $q);
if (!$e) {
?>
    <script type="text/javascript">
        alert("Gagal menghapus data");
        window.location.href = '../index.php';
    </script>
<?php
    exit();
}
?>

<script type="text/javascript">
    alert("Berhasil menghapus data");
    window.location.href = '../index.php';
</script>