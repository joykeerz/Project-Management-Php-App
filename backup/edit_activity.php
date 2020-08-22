<?php require_once "koneksi.php";?>
<html>
    <head>
                                            <?php
                                            session_start();
                                                if(empty($_SESSION['username'])){
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
    </head>
                        <body>
 <?php
  include "koneksi.php";

   $id_activity = $_GET['id_activity'];

   $query = mysqli_query($db, "SELECT * FROM activity WHERE id_activity = '$id_activity'");

   $result = mysqli_fetch_array($query);
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
                                        <li><a href="daftarproject.php">Projects</a></li>
                                        <li class="active"><a href="daftaractivity.php">Activites</a></li>
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
                                            <p>Sekarang Anda Bisa Mengedit Activity</p>
                                            </font>
                                        </div>

            <form class="form-horizontal" method="post">
                 <div class="form-group">
                <label for="id_activity" class="col-sm-3 control-label">ID Activity</label>
                <div class="col-sm-9">
                    <input name="id_activity" type="text" class="form-control" id="inputPassword3" value="<?php echo $result['id_activity'] ?>" required>
                </div>
                 </div>
              
            <div class="form-group">
                <label for="id_projects" class="col-sm-3 control-label">ID Project</label>
                <div class="col-sm-9">
                    <input name="id_projects" type="text" class="form-control" id="inputPassword3" value="<?php echo $result['id_projects'] ?>" required>
                </div>
            </div>              
                
            <div class="form-group">
                <label for="name_activity" class="col-sm-3 control-label">Nama Aktivity</label>
                <div class="col-sm-9">
                    <input name="nama_activity" type="text" class="form-control" id="inputPassword3" value="<?php echo $result['nama_activity'] ?>" required>
                </div>
            </div>
                
                <div class="form-group">
                <label for="tgl_activity" class="col-sm-3 control-label">Tanggal Activty</label>
                <div class="col-sm-9">
                    <input name="tgl_activity" type="date" class="form-control" id="inputPassword3" value="<?php echo $result['tgl_activity'] ?>" required >
                    <span class="help-block">Silahkan Isi Semua Data Diatas (Jangan Sampai Di Kosongkan)</span>
                </div>
                
            <div class="form-group">
                <div class="col-md-5">
                    <a href="daftaractivity.php" class="btn btn-lg btn-block btn-warning">Kembali</a>
                </div>
                <div class="col-md-5 col-md-offset-2">
                    <input type="submit" name="edit" value="Update" class="btn btn-lg  btn-block btn-success"/> 
                </div>
                
            </div>
        </form>
                                
                                
                                
                                    </div>

                        </body>
                        
                            <?php
  if(isset($_POST['edit'])){

  $id_activity = $_POST['id_activity'];
  $id_projects    = $_POST['id_projects'];
  $nama_activity = $_POST['nama_activity'];
  $tgl  = $_POST['tgl_activity'];
  

   $queryupdate = mysqli_query($db, "UPDATE activity SET id_projects ='$id_projects', nama_activity  = '$nama_activity', tgl_activity  = '$tgl' WHERE id_activity = $id_activity");

  if($queryupdate){
   echo "<h1>Berhasil terupdate<h1>";
  }else{
      
   echo "Maaf ada kesalahan";
   
  }
  }

   ?>
</html>