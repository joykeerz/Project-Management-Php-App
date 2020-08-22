<?php require_once "koneksi.php";?>
<html lang="en">
  <head>
  										<?php

                                            session_start();

                                                if(empty($_SESSION['username'])){

                                                        header('location:login.php');

                                                 }else{

                                                    echo "";

                                                                                }
                                            ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMI | Daftar Activity</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
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
                    
                    <?php
$sql = "SELECT * FROM activity where id_projects='$_GET[id_projects]'";
$result = mysqli_query($db,$sql);
                        ?>
                    
			<ul class="breadcrumb">
				<li>
                                    <a href="home_user.php">Home</a> <span class="divider">/</span>
				</li>
				<li>
                                    
                                    <?php
                            $j=mysqli_query($db,"SELECT * FROM projects where id_projects='$_GET[id_projects]'");
                            while($k=mysqli_fetch_array($j)){?> 
                                    <a href="javascript:if(confirm('Lihat Aktifitas?'))
{document.location='detail_client.php?id=<?php echo $k['id_projects']; ?>';}">
                                    
                                        <?php echo $k['nama_project'] ?>
                                        
                                        <?php
                                                            }
                                        ?>
                                    </a>
                                    <span class="divider">/</span>
				</li>
                                
				<li class="active">
					Data
				</li>
			</ul>
			<div class="jumbotron">
				<h2>
                                    <center>Daftar Activity</center>
				</h2>
				<p>
                                <center>List semua activity yang sudah Terdaftar</center>
				</p>
			</div> 
                    <center><a class="btn btn-primary" href="javascript:if(confirm('Yakin mau edit?'))
{document.location='tambahactivity.php?id_projects=<?php echo $_GET['id_projects']; ?>';}">Tambah Activity</a></center><br><br>
			<br>

			

			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							ID Activity
						</th>
						<th>
							ID Project
						</th>
						<th>
							Nama Project
						</th>
						<th>
							Nama Activity
						</th>
						<th>
							Tanggal Activity
						</th>
						<th>
                                <center>Action</center>
						</th>
					</tr>
				</thead>

				<?php
	if (mysqli_num_rows($result)>0):
	while ($row = mysqli_fetch_assoc($result)){
	?>

				<tbody>
					<tr>

        <td><?=$row['id_activity'];?></td>

    	<td><?=$row['id_projects'];?></td>

        <td><?=$row['nama_project'];?></td>

        <td><?=$row['nama_activity'];?></td>

        <td><?=$row['tgl_activity'];?></td>

        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Anda Yakin Mau Edit Data Ini?'))
{document.location='detail_document.php?id_activity=<?php echo $row['id_activity']; ?>';}">Documents</a>
        </td>
        
        <td><a class="btn btn-danger btn-block glyphicon glyphicon-remove" href="javascript:if(confirm('Anda yakin menghapus?'))
{document.location='proses_hapus_activity.php?id_activity=<?php echo $row['id_activity']; ?>';}"></a>
        </td>
        
        <td><a class="btn btn-danger btn-block glyphicon glyphicon-edit" href="javascript:if(confirm('Anda Yakin Mau Edit Data Ini?'))
{document.location='edit_activity.php?id_activity=<?php echo $row['id_activity']; ?>';}"></a>
        </td>

        

    </tr>
    <?php }

	endif;

	?>
				</tbody>
			</table>
                        <h5>
				PKL : Project Manager Ver 1.0
			</h5> <p class="text-right">&copy; wijoyo wisnu M, Inc.</p>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>