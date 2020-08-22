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
                                        <li class="active"><a href="daftarproject.php">Projects</a></li>
                                    <li><a href="daftaractivity.php">Activites</a></li>
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
                                            <h1><font color="#000000">Daftar Project</h1>      
                                            <p>List semua project yang sudah Terdaftar</font></p>
                                        </div>
                                
<?php
$sql = "SELECT * FROM Projects where id_client='$_GET[id]'";
$result = mysqli_query($db,$sql);
$data = mysqli_fetch_assoc($result);
?>
                                
<div class="container">
    <div class="header clearfix">
        <h3 class="text-center">Daftar Project</h3>
        <a class="btn btn-danger btn-block" href="javascript:if(confirm('Yakin mau edit?'))
{document.location='tambahproject.php?id=<?php echo $_GET['id']; ?>';}">Tambah Project</a><br><br>
    </div>

    <ul class="nav navbar-nav">
        <li><a href="home_user.php" class="alert-danger"><?php echo $data['nama_client'] ?> &nbsp; >> &nbsp; </a></li>
    </ul>
    
        <table class="table table-hover table-responsive" align="center" border="0" bordercolor="#FFFFFF">
        	<tr>
            	<td bgcolor="#666666"><b>id project</b></td>
                <td bgcolor="#666666"><b>id client</b></td>
                <td bgcolor="#666666"><b>Nama client</b></td>
                <td bgcolor="#666666"><b>Nama Project</b></td>
                <td bgcolor="#666666" width="10%"><b>Start Project</b></td>
                <td bgcolor="#666666" width="10%"><b>End Project</b></td>
                <td bgcolor="#666666" width="10%" colspan="3"><b>Action</b></td>
                
                
        
    
    <?php
	if (mysqli_num_rows($result)>0):
	while ($row = mysqli_fetch_assoc($result)){
	?>
    <tr>
        <td><?=$row['id_projects'];?></td>
    	<td><?=$row['id_client'];?></td>
        <td><?=$row['nama_client'];?></td>
        <td><?=$row['nama_project'];?></td>
        <td><?=$row['start'];?></td>
        <td><?=$row['end'];?></td>
        
        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Lihat Aktifitas?'))
{document.location='detail_project.php?id_projects=<?php echo $row['id_projects']; ?>';}">Activity</a>
        </td>
        
        <td><a class="btn btn-danger btn-block glyphicon glyphicon-remove" href="javascript:if(confirm('Anda yakin menghapus?'))
{document.location='proses_hapus_project.php?id_projects=<?php echo $row['id_projects']; ?>';}"></a>
        </td>
        
        <td><a class="btn btn-danger btn-block glyphicon glyphicon-edit" href="javascript:if(confirm('Anda Yakin Mau Edit Data Ini?'))
{document.location='edit_project.php?id_projects=<?php echo $row['id_projects']; ?>';}"></a>
        </td>
        
    </tr>
    <?php }
	endif;
	?>
    </table><br>

    <a class="btn btn-block btn-danger" href="daftarclient.php">Back</a><br>
<footer class="footer">
    <p class="text-right">&copy; Coeg, Inc.</p>
</footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
            
                                
                                
                                
                                    </div>
                        </body>
</html>
