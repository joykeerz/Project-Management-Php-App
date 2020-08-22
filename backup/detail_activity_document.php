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
                                        <li><a href="daftarclient.php">Clients</a></li>
                                        <li><a href="daftarproject.php">Projects</a></li>
                                    <li><a href="daftaractivity.php">Activites</a></li>
                                    <li  class="active"><a href="daftardocument.php">Documents</a></li>
                                    </ul>
                                    
                                    <ul class="nav navbar-nav navbar-right">
                                    <li><a href="logout.php">Logout</a>
                                    <li><a href="#"><B>Welcome [<?php echo $_SESSION['username'] ?>]</B></a></li>
                                    </ul>
                                </div>
                        </nav>
                                    
                            <div class="container container-fluid">
                                        
                                        <div class="jumbotron"> 
                                            <h1><font color="#000000">Daftar Activity</h1>      
                                            <p>List semua Activity yang sudah Terdaftar</font></p>
                                        </div>
                                
<?php
$sql = "SELECT * FROM document where id_activity='$_GET[id_activity]'";
$result = mysqli_query($db,$sql);?>

<div class="container">
    <div class="header clearfix">
        <h3 class="text-center">Daftar Activity</h3>
        <a href="tambahactivity.php" class="btn btn-danger">Tambah Activity</a><br><br>
    </div>

    
        <table class="table table-hover table-responsive" align="center" border="1" bordercolor="#FFFFFF">
        	<tr>
            	<td bgcolor="#666666"><b>ID Document</b></td>
                <td bgcolor="#666666"><b>ID Activity</b></td>
                <td bgcolor="#666666"><b>Nama Document</b></td>
                <td bgcolor="#666666"><b>type</b></td>
                <td bgcolor="#666666"><b>size</b></td>
                <td bgcolor="#666666" width="10%"><b>Delete</b></td>
                <td bgcolor="#666666" width="10%"><b>.</b></td>
                
                
        
    
    <?php
	if (mysqli_num_rows($result)>0):
	while ($row = mysqli_fetch_assoc($result)){
	?>
    <tr>
        <td><?=$row['id_document'];?></td>
    	<td><?=$row['id_activity'];?></td>
        <td><?=$row['nama_document'];?></td>
        <td><?=$row['type'];?></td>
        <td><?=$row['size'];?>(byte)</td>
        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Anda yakin menghapus?'))
{document.location='proses_hapus_document.php?id_document=<?php echo $row['id_document']; ?>';}">Hapus</a>
        </td>
        
        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Anda Yakin Mau Edit Data Ini?'))
               {document.location='edit_project.php?id_document=<?php echo $row['id_document']; ?>';}">&nbsp;</a>
        </td>
        
    </tr>
    <?php }
	endif;
	?>
    </table><br>

    <a class="btn btn-block btn-danger" href="daftaractivity.php">Back</a><br>
<footer class="footer">
    <p class="text-right">&copy; Coeg, Inc.</p>
</footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
            
                                
                                
                                
                                    </div>
                        </body>
</html>
