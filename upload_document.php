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
   $id_activity = $_GET['id_activity'];
   $query = mysqli_query($db, "SELECT * FROM document WHERE id_activity = '$id_activity'");
   $result = mysqli_fetch_array($query);
   ?>
  
    </head>
                        <body>
                            
                        <nav class="navbar navbar-inverse navbar-fixed-top">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a href="home_user.php"class="navbar-brand">
                                            MMI-PM
                                        </a>
                                    </div>
                                    
                                    <ul class="nav navbar-nav">
                                        <li><a href="home_user.php">Home</a></li>
                                        <li ><a href="daftarclient.php">Clients</a></li>
                                        <li><a href="daftarproject.php">Projects</a></li>
                                    <li><a href="daftaractivity.php">Activites</a></li>
                                    <li class="active"><a href="daftardocument.php">Documents</a></li>
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
                                            <h1>Upload Document</h1>      
                                            <p>Upload Document untuk aktifitas anda</p>
                                            </font>
                                        </div>
                                


<div class="container">
    <div class="header clearfix">
        <h3 class="text-center">Upload Document</h3>
        <h5 class="text-center well"><font color="#000000">Hanya Upload File Berformat .docx</font></h5><br><br>
    </div>
    
    <form enctype="multipart/form-data" action="upload.php" method="POST" class="form-horizontal">
        <div class="form-group">
                <div class="col-sm-9">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                </div>
        </div>
        
        <div class="form-group">
            <h2 class="col-lg-3">Pilih File:</h2>
                <div class="col-sm-9">
                    <input name="userfile" type="file" class="btn btn-lg btn-success" /><br><br>
                </div>
        </div>
        
        <div class="form-group">
            <h4 class="col-lg-3">ID Activity:</h4>
                <font color="#000000">
                <div class="col-sm-9">
                    <input name="id_activity" type="text" class="form-control" id="inputPassword3" value="<?=$_GET['id_activity'];?>" required readonly><br>
                </div>
                </font>

            </div>
        
        <div class="form-group"><br><br>
                <div class="col-md-5">
                    <a href="daftardocument.php" class="btn btn-lg btn-block btn-warning">Daftar Document</a>
                </div>
                <div class="col-md-5 col-md-offset-2">
                    <input type="submit" name="submit" value="Upload" class="btn btn-lg  btn-block btn-success"/>
                </div>
            </div>
        
    </form><br><br>

    
        

    <a class="btn btn-block btn-danger" href="home_user.php">home</a><br>
<footer class="footer">
    <p class="text-right">&copy; Coeg, Inc.</p>
</footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
            
                                
                                
                                
                                    </div>
                        </body>
</html>
