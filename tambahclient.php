<?php require_once "koneksi.php";?>
<html>
    <head>
                                            <?php
                                            session_start();
                                                if(empty($_SESSION['username'])){
                                                    echo "Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/>
                                                           <a href='login.php'><center>Login</center></a>";
                                                        header('location:login.php');
                                                 }else{
                                                    echo " ";
                                                                                }
                                            ?>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css.css" rel="stylesheet">
        
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
                        <body>
                            <?php
if(isset($_POST['submit'])) {
    $kd = $_POST['id'];
    $nama = $_POST['fullname'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO client (id, nama, alamat, phone, email)" .
        "VALUE ('$kd','$nama','$alamat','$phone','$email')";

if (mysqli_query($db,$sql)){
$saved = true;
}
else {
$saved = false;
}
include "client_confirmation.php"; 
}
else{

?>
                        <nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="home_user.php">MMI-PM</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
                                                    <a href="home_user.php">Home</a>
						</li>
						<li >
						<a href="daftarclient.php">Client</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lihat Data<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Daftar Project</a>
								</li>
								<li>
									<a href="#">Daftar Activity</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Document</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control">
						</div> 
						<button type="submit" class="btn btn-default">
							Submit
						</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
                                                    <a href="logout.php">Logout</a>
						</li>
                                                <li>
                                                    <a href="#"><B><span class="glyphicon glyphicon-user"> [<?php echo $_SESSION['username'] ?>]</span></B></a>
						</li>
					</ul>
				</div>
				
			</nav>
			<ul class="breadcrumb">
				<li>
                                    <a href="home_user.php">Home</a> <span class="divider">/</span>
				</li>
				<li>
                                    <a href="daftarclient.php">Client</a> <span class="divider">/</span>
				</li>
				<li class="active">
                                    Tambah Client
				</li>
			</ul>
                                    
                            <div class="container container-fluid">
                                        
                                        <div class="jumbotron"> 
                                            <font color="#000000">
                                            <h1 ></h1>      
                                            <p>Silahkan Masukan Data Diri Anda</p>
                                            </font>
                                        </div>

            <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">ID Client</label>
                <div class="col-sm-9">
                    <input name="id" type="text" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Lengkap Anda" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input name="fullname" type="text" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Lengkap Anda" required>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                    <input name="alamat" type="text" class="form-control" id="inputPassword3" placeholder="jl.xxxx" required>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">No.Telepon / HP</label>
                <div class="col-sm-9">
                    <input name="phone" type="number" class="form-control" id="inputPassword3" placeholder="081xxxxxxx" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">
                    <input name="email" type="mail" class="form-control" id="inputPassword3" placeholder="contoh: Pahmi@emakil.com" required>
                    <span class="help-block">Silahkan Isi Semua Data Diatas (Jangan Sampai Di Kosongkan)</span>
                </div>
            <div class="form-group">
                <div class="col-md-5">
                    <a href="daftarclient.php" class="btn btn-lg btn-block btn-primary">Kembali</a>
                </div>
                <div class="col-md-5 col-md-offset-2">
                    <input type="submit" name="submit" value="Kirim Data" class="btn btn-lg  btn-block btn-primary"/>
                </div>
            </div>
                
            </div>
                </form>
                <?php } ?>
                        </body>
</html>
