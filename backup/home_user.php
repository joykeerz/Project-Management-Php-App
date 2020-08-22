<html>
    <head>
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
                                            session_start();
                                                if(empty($_SESSION['username'])){
                                                    echo "Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/>
                                                           <a href='login.php'><center>Login</center></a>";
                                                        header('location:login.php');
                                                 }else{
                                                    echo "Selamat Anda Berhasil Login<br/>";
                                                                                }
                                            ?>
                        <nav class="navbar navbar-inverse navbar-fixed-top">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a href="home_user.php"class="navbar-brand">
                                            MMI-PM
                                        </a>
                                    </div>
                                    
                                    <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Home</a></li>
                                    <li><a href="daftarclient.php">Clients</a></li>
                                    <li><a href="daftarproject.php">Projects</a></li>
                                    <li><a href="daftaractivity.php">Activites</a></li>
                                    <li><a href="upload_document.php">Documents</a></li>
                                    <li>
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
                                            <h1 >Welcome <?php echo $_SESSION['username'] ?> </h1>      
                                            <p>Sekarang Anda Bisa Melihat Dan Membahkan Data</p>
                                            </font>
                                        </div>
                                        
                                        <div class="jumbotron">
                                            <form class="form-horizontal">
                                                <input type="text" name="cari" placeholder="pencarian..." class="form-control form-inline"><br>
                                                <input type="submit" name="submit" placeholder="Cari!" class="btn btn-default col-lg-1 col-lg-offset-5">
                                            </form>
                                        </div>
                                        
                                    </div>
                        </body>
</html>
