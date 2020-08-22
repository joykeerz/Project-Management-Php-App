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

   $id_projects = $_GET['id_projects'];

   $query = mysqli_query($db, "SELECT * FROM projects WHERE id_projects = '$id_projects'");

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
                                            <p>Sekarang Anda Bisa Melihat Dan Membahkan Project</p>
                                            </font>
                                        </div>

            <form class="form-horizontal" method="post">
                
                <div class="form-group">
                <label for="id_client" class="col-sm-3 control-label">ID Project</label>
                <div class="col-sm-9">
                    <input name="id_project" type="text" class="form-control" id="inputPassword3" value="<?php echo $result['id_projects'] ?>" required>
                </div>
                 </div>
            <div class="form-group">
                <label for="id_client" class="col-sm-3 control-label">ID dan Nama Client</label>
                <font color="#000000">
                <div class="col-sm-9">
                    <select name="id_client">
                        
                        <?php
                            $j=mysqli_query($db, "SELECT * FROM projects WHERE id_projects = '$id_projects'");
                            while($k=mysqli_fetch_array($j)){
                            echo "<option value='$k[id_client]'>$k[nama_client] - $k[id_client]</option>";
                        }
                        ?>
                    </select>
                    
                    <select name="nama_client">
                        <?php
                            $j=mysqli_query($db, "SELECT * FROM projects WHERE id_projects = '$id_projects'");
                            while($k=mysqli_fetch_array($j)){
                            echo "<option value='$k[nama_client]'>$k[id_client]</option>";
                        }
                        ?>
                    </select>
                    
                </div>
                </font>

            </div>
            
             
            <div class="form-group">
                <label for="name_project" class="col-sm-3 control-label">Nama Project</label>
                <div class="col-sm-9">
                    <input name="nama_project" type="text" class="form-control" id="inputPassword3" value="<?php echo $result['nama_project'] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="start" class="col-sm-3 control-label">Start Project</label>
                <div class="col-sm-9">
                    <input name="start" type="date" class="form-control" id="inputPassword3" value="<?php echo $result['start'] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="start" class="col-sm-3 control-label">End Project</label>
                <div class="col-sm-9">
                    <input name="end" type="date" class="form-control" id="inputPassword3" value="<?php echo $result['end'] ?>" required >
                    <span class="help-block">Silahkan Isi Semua Data Diatas (Jangan Sampai Di Kosongkan)</span>
                </div>
            <div class="form-group">
                <div class="col-md-5">
                    <a href="daftarproject.php" class="btn btn-lg btn-block btn-warning">Kembali</a>
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

  $id_projects = $_POST['id_project'];
  $id_client    = $_POST['id_client'];
  $nama_client = $_POST['nama_client'];
  $nama_project  = $_POST['nama_project'];
  $start  = $_POST['start'];
  $end  = $_POST['end'];
  

   $queryupdate = mysqli_query($db, "UPDATE projects SET id_client = '$id_client', nama_client ='$nama_client', nama_project  = '$nama_project', start  = '$start', end  = '$end' WHERE id_projects = $id_projects");

  if($queryupdate){
   echo "<h1>Berhasil terupdate<h1>";
  }else{
      
   echo "Maaf ada kesalahan";
   
  }
  }

   ?>
</html>

