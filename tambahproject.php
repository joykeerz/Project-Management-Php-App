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
                                                    echo "";
                                                                                }
                                            ?>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
        <link href="css/cover.css" rel="stylesheet">
        
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <?php
   $idclient = $_GET['id'];
   $query = mysqli_query($db, "SELECT * FROM client WHERE id = '$idclient'");
   $result = mysqli_fetch_array($query);
   ?>
    </head>
                        <body>
<?php
if(isset($_POST['submit'])) {
    $id_project = $_POST['id_project'];
    $id_client = $_POST['id_client'];
    $nama_client = $_POST['nama_client'];
    $nama_project = $_POST['nama_project'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO projects (id_projects, id_client, nama_client, nama_project, start, end)" .
        "VALUE ('$id_project','$id_client','$nama_client','$nama_project','$start','$end')";

if (mysqli_query($db,$sql)){
$saved = true;
}
else {
$saved = false;
}
include "project_confirmation.php"; 
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
						<li >
                                                    <a href="home_user.php">Home</a>
						</li>
						<li class="active">
						<a href="daftarclient.php">Client</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lihat Data<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
                                                                    <a href="daftarproject.php">Daftar Project</a>
								</li>
								<li>
                                                                    <a href="daftaractivity.php">Daftar Activity</a>
								</li>
								<li class="divider">
								</li>
								<li>
                                                                    <a href="daftardocument.php">Document</a>
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
                                                    <a href="#"><B><span class="glyphicon glyphicon-user">[<?php echo $_SESSION['username'] ?>]</span></B></a>
						</li>
					</ul>
				</div>
				
			</nav>
                                    
                            <div class="container container-fluid">
                                        
                                        <div class="jumbotron"> 
                                            <font color="#000000">
                                            <h1 ></h1>      
                                            <p>Sekarang Anda Bisa Melihat Dan Membahkan Project</p>
                                            </font>
                                        </div>

            <form class="form-horizontal" method="post">
                
                <div class="form-group">
                <label for="id_client" class="col-sm-3 control-label">ID Project</label>
                <div class="col-sm-9">
                    <input name="id_project" type="text" class="form-control" id="inputPassword3" required>
                </div>
                 </div>
            
            <div class="form-group">
                <label for="id_client" class="col-sm-3 control-label">ID dan Nama client</label>
                <div class="col-sm-9">
                    <input name="id_client" type="text" class="form-control" id="inputPassword3" value="<?=$result['id'];?>" required readonly><br>
                    <input name="nama_client" type="text" class="form-control" id="inputPassword3" value="<?=$result['nama'];?>" required readonly>
                </div>
                 </div>
             
            <div class="form-group">
                <label for="name_project" class="col-sm-3 control-label">Nama Peroject</label>
                <div class="col-sm-9">
                    <input name="nama_project" type="text" class="form-control" id="inputPassword3" required>
                </div>
            </div>
            <div class="form-group">
                <label for="start" class="col-sm-3 control-label">Start Project</label>
                <div class="col-sm-9">
                    <input name="start" type="date" class="form-control" id="inputPassword3" required>
                </div>
            </div>
            <div class="form-group">
                <label for="start" class="col-sm-3 control-label">End Project</label>
                <div class="col-sm-9">
                    <input name="end" type="date" class="form-control" id="inputPassword3" required>
                    <span class="help-block">Silahkan Isi Semua Data Diatas (Jangan Sampai Di Kosongkan)</span>
                </div>
            <div class="form-group">
                
                <div class="col-md-5 col-md-offset-4">
                    <input type="submit" name="submit" value="Kirim Data" class="btn btn-lg  btn-block btn-success"/>
                </div>
            </div>
        </form>
                                
                                
                                
                                    </div>
                <?php } ?>
                        </body>
</html>

