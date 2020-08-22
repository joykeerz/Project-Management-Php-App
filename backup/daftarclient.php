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

                                        <li class="active"><a href="daftarclient.php">Clients</a></li>

                                        <li><a href="daftarproject.php">Projects</a></li>

                                    <li><a href="daftaractivity.php">Activites</a></li>

                                    <li><a href="daftardocument.php">Documents</a></li>

                                    </ul>

                                    

                                    <ul class="nav navbar-nav navbar-right">

                                    <li><a href="logout.php">Logout</a>

                                    <li><a href="#"><B><span class="glyphicon glyphicon-user"> [<?php echo $_SESSION['username'] ?>]</span></B></a></li>

                                    </ul>

                                </div>

                        </nav>

                                    

                            <div class="container container-fluid">

                                        

                                        <div class="jumbotron"> 

                                            <font color="#000000">

                                            <h1><font color="#000000">Daftar Client</h1>      

                                            <p>List semua client yang sudah Terdaftar</font></p>

                                            </font>

                                        </div>

                                

<?php

$sql = "SELECT * FROM client";

$result = mysqli_query($db,$sql);?>



<div class="container">

    <div class="header clearfix">

        <h3 class="text-center">Daftar Client</h3>

        <a href="tambahclient.php" class="btn btn-danger">Tambah Client</a><br><br>

    </div>



<ul class="nav navbar-nav">
    <li><a href="home_user.php" class="alert-danger">Home</a></li>
</ul>

        <table class="table table-hover table-responsive" align="center" border="0" bordercolor="#FFFFFF">

        	<tr>

            	<td bgcolor="#666666"><b>id</b></td>

                <td bgcolor="#666666"><b>Nama</b></td>

                <td bgcolor="#666666"><b>Alamat</b></td>

                <td bgcolor="#666666" width="10%"><b>Phone</b></td>

                <td bgcolor="#666666" width="10%"><b>Email</b></td>

                <td bgcolor="#666666" width="10%" colspan="3"><b><center>Action</center></b></td>

                

        

    

    <?php

	if (mysqli_num_rows($result)>0):

	while ($row = mysqli_fetch_assoc($result)){

	?>

    <tr>

        <td><?=$row['id'];?></td>

    	<td><?=$row['nama'];?></td>

        <td><?=$row['alamat'];?></td>

        <td><?=$row['phone'];?></td>

        <td><?=$row['email'];?></td>

        

        <td>

            <a class="btn btn-danger btn-block glyphicon glyphicon-remove" href="javascript:if(confirm('Anda yakin menghapus?'))

{document.location='proses_hapus.php?id=<?php echo $row['id']; ?>';}"></a>

        </td>

        

        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Lihat Details'))
{document.location='detail_client.php?id=<?php echo $row['id']; ?>';}">Projects</a>
        </td>

        

        <td><a class="btn btn-danger btn-block glyphicon glyphicon-edit" href="javascript:if(confirm('Yakin mau edit?'))
{document.location='edit_client.php?id=<?php echo $row['id']; ?>';}"></a>
        </td>

        

    </tr>

    <?php }

	endif;

	?>

    </table><br>



    <a class="btn btn-block btn-danger" href="home_user.php">home</a><br>

<footer class="footer">

    <p class="text-right">&copy; wijoyo wisnu M, Inc.</p>

</footer>



</div> <!-- /container -->





<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="js/ie10-viewport-bug-workaround.js"></script>

            

                                

                                

                                

                                    </div>

                        </body>

</html>

