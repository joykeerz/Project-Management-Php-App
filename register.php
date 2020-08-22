<?php require_once "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Halaman Register</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "INSERT INTO users (id, username, password)" .
        "VALUE ('','$username','$password')";

if (mysqli_query($db,$sql)){
$saved = true;
}
else {
$saved = false;
}
include "register_confirmation.php"; 
}
else{

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-center">PROJECT MANAGEMENT PT.MITRA MANDIRI INFORMATIKA</h3>
    </div>

    <div class="jumbotron">
        <h3 class="text-center">SILAHKAN ISI FORM BERIKUT</h3>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Lengkap Anda" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="********" required="">
                </div>
            </div>
            <div class="row">
                <div>
                    <input type="submit" name="submit" value="Kirim Data" class="btn btn-lg  btn-block btn-success"/><br>
                    <a href="index.php" class="btn btn-primary btn-lg btn-block">Kembali</a>
                    <h5>Sudah Punya Account? Klik <a href="login.php">Disini</a></h5>
                </div>
            </div>
            </div>
        </form>
    </div>

<footer class="footer">
    <p class="text-left">&copy; Wijoyo Wisnu M & Nur Fahmi Aziz, Inc.</p>
</footer>

</div> <!-- /container -->
<?php } ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
