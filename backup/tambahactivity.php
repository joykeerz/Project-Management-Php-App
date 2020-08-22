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
                                                    echo "Selamat Anda Berhasil Login<br/>";
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
   $idproject = $_GET['id_projects'];
   $query = mysqli_query($db, "SELECT * FROM projects WHERE id_projects = '$idproject'");
   $result = mysqli_fetch_array($query);
   ?>
    </head>
                        <body>
<?php
if(isset($_POST['submit'])) {
    $id_activity = $_POST['id_activity'];
    $id_projects = $_POST['id_projects'];
    $nama_project = $_POST['nama_project'];
    $nama_activity = $_POST['nama_activity'];
    $tgl_activity = $_POST['tgl_activity'];

    $sql = "INSERT INTO activity (id_activity, id_projects, nama_project, nama_activity, tgl_activity)" .
        "VALUE ('$id_activity','$id_projects','$nama_project','$nama_activity','$tgl_activity')";

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
                        <nav class="navbar navbar-inverse navbar-fixed-top">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a href="home_user.php"class="navbar-brand">
                                            MMI-PM
                                        </a>
                                    </div>
                                    
                                    <ul class="nav navbar-nav">
                                        <li><a href="home_user.php">Home</a></li>
                                        <li><a href="daftarclient.php">Clients</a></li>
                                        <li class="active"><a href="daftarproject.php">Projects</a></li>
                                    <li><a href="#">Activites</a></li>
                                    <li><a href="#">Documents</a></li>
                                    </ul>
                                    
                                    <ul class="nav navbar-nav navbar-right">
                                    <li><a href="logout.php">Logout</a>
                                    <li><a href="#"><B>Welcome [<?php echo $_SESSION['username'] ?>]</B></a></li>
                                    </ul>
                                </div>
                        </nav>
                                    
                            <div class="container container-fluid">
                                        
                                        <div class="jumbotron"> 
                                            <font color="#000000">
                                            <h1 ></h1>      
                                            <p>Sekarang Anda Bisa Melihat Dan Membahkan Activity</p>
                                            </font>
                                        </div>

            <form class="form-horizontal" method="post">
                
                <div class="form-group">
                <label for="id_activity" class="col-sm-3 control-label">ID Activity</label>
                <div class="col-sm-9">
                    <input name="id_activity" type="text" class="form-control" id="inputPassword3" required>
                </div>
                 </div>
            
            <div class="form-group">
                <label for="id_client" class="col-sm-3 control-label">ID dan Nama Projects</label>
                <div class="col-sm-9">
                    <input name="id_projects" type="text" class="form-control" id="inputPassword3" value="<?=$result['id_projects'];?>" required readonly><br>
                    <input name="nama_project" type="text" class="form-control" id="inputPassword3" value="<?=$result['nama_project'];?>" required readonly>
                </div>
                 </div>
                
             
            <div class="form-group">
                <label for="tgl_activity" class="col-sm-3 control-label">Nama Activity</label>
                <div class="col-sm-9">
                    <input name="nama_activity" type="text" class="form-control" id="inputPassword3" required>
                </div>
            </div>
                
            <div class="form-group">
                <label for="tgl_activity" class="col-sm-3 control-label">Tanggal Activity</label>
                <div class="col-sm-9">
                    <input name="tgl_activity" type="date" class="form-control" id="inputPassword3" required>
                </div>
            </div>
                
            <div class="form-group">
                
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

