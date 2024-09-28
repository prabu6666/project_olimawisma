<?php
session_start();
if (isset($_SESSION['user'])) {
?>
    <script type="text/javascript">
        alert("Sudah Login");
        window.location.href = 'index.php';
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
    </style>
</head>

<body>
    <div class="ui basic segment container" id="luar">
        <h1 class="ui icon header block center aligned">
            <i class="home icon"></i>
            <div class="content">Login</div>
            <div class="content"><i>"Smart living, simplified"</i></div>
        </h1>

        <form class="ui segment form" method="post" action="api/api_tambah_user.php">
            <div class="field">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Nama" id="nama" required>
            </div>
            <div class="field">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" id="username" required>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" id="password" required>
            </div>
            <button class="ui button blue" type="submit" id="btn-submit" name="login">Submit</button>
        </form>
    </div>
</body>
<script src="jquery-3.7.0.min.js"></script>
<script src="semantic/Semantic-UI-CSS-master/semantic.min.js"></script>
<script>
    // const password = $('#password').val();
    // const confirm_password = $('#confirm_password').val();

    // if (password != confirm_password) {
    //     alert('Password tidak sama. Coba Kembali')
    // }
</script>

</html>