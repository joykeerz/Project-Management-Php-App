<?php require_once "koneksi.php";?>
<html><head>
            <?php session_start(); if(empty($_SESSION[ 'username'])){ header(
            'location:login.php'); }else{ echo ""; } ?>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>MMI | Daftar Client</title>
                <meta name="description" content="Source code generated using layoutit.com">
                <meta name="author" content="LayoutIt!">
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="css/style.css" rel="stylesheet">
        </head><body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand"><img height="20" alt="Brand" src="img\logo.png"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active">
                                        <a href="home_user.php">Home</a>
                                    </li>
                                    <li>
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
                                            <li class="divider "></li>
                                            <li>
                                                <a href="daftardocument.php">Document</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="logout.php">Logout</a>
                                    </li>
                                    <li>
                                        <a href="#"><b><span class="glyphicon glyphicon-user"> [<?php echo $_SESSION['username'] ?>]</span></b></a>
                                    </li>
                                </ul>
                                
                                
                            </div>
                        </nav>
                        
                        
                        
                        <ul class="breadcrumb">
                            <li>
                                <a href="home_user.php">Home</a>
                                <span class="divider">/</span>
                            </li>
                        </ul>
                        <div class="jumbotron">
                            <h2>
                                <center>Data Terbaru</center>
                            </h2>
                            <p>
                                </p><center>List semua Data yang baru di input</center>
                            <p></p>
                        </div>
                        <br>
                        <br>
                        
                        <div class="col-md-12">
				<div class="panel panel-default">
                                    <div class="panel-heading text-center" ><h2>Data Yang Terakhir Ditambahkan</h2></div>
					<div class="panel-body tabs">
					
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">Projects</a></li>
							<li><a href="#pilltab2" data-toggle="tab">Activities</a></li>
							<li><a href="#pilltab3" data-toggle="tab">Documents</a></li>
						</ul>
		
						<div class="tab-content">
                                                    
							<div class="tab-pane fade in active" id="pilltab1">
								
                                                            <?php

$sql = "SELECT * FROM projects ORDER BY id_projects DESC LIMIT 5";

$result = mysqli_query($db,$sql);
			?>

			<table class="table table-hover" id="myTable">
				<thead>
					<tr>
						<th>
							Nama Project
						</th>
						<th>
							Start
						</th>
                                                <th>
							End
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

        <td><?=$row['nama_project'];?></td>

        <td><?=$row['start'];?></td>
        
        <td><?=$row['end'];?></td>
        
        <td><a class="btn btn-danger btn-block glyphicon glyphicon-edit" href="javascript:if(confirm('Anda Yakin Mau Edit Data Ini?'))

{document.location='edit_project.php?id_projects=<?php echo $row['id_projects']; ?>';}"></a>

        </td>

        

    </tr>
    <?php 
        }
    endif;
    ?>
				</tbody>
			</table>
								
							</div>
                                                    
							<div class="tab-pane fade" id="pilltab2">
<?php
$sql = "SELECT * FROM activity ORDER BY id_activity DESC LIMIT 5";
$result = mysqli_query($db,$sql);
?>
                                                            
                                                            <table class="table table-hover" id="myTable">
				<thead>
					<tr>
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

        <td><?=$row['nama_activity'];?></td>

        <td><?=$row['tgl_activity'];?></td>

        
        <td><a class="btn btn-danger btn-block glyphicon glyphicon-edit" href="javascript:if(confirm('Yakin mau edit'))
{document.location='edit_activity.php?id_activity=<?php echo $row['id_activity']; ?>';}"></a>
        </td>

        

    </tr>
    <?php }

	endif;

	?>
				</tbody>
			</table>
                                                            
							</div>
							<div class="tab-pane fade" id="pilltab3">
								
<?php
$sql = "SELECT * FROM document ORDER BY id_document DESC LIMIT 5";
$result = mysqli_query($db,$sql);
?>
                                                            
                                                            
                                                            <table class="table table-hover" id="myTable" >
				<thead>
					<tr>
                                                
                                                <th>
							Nama Document
						</th>
                                                
						<th>
                                <center>Type</center>
						</th>
                                                
                                                <th>
							Size
						</th>
                                                
                                                <th colspan="2">
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

        <td><?=$row['nama_document'];?></td>

        <td><?=$row['type'];?></td>
        
        <td><?=$row['size'];?></td>

        

        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Yakin Download File ini?'))

{document.location='download.php?id_document=<?php echo $row['id_document']; ?>';}">Download</a>

        </td>

        

    </tr>
    <?php }

	endif;

	?>
				</tbody>
			</table>
                                                            
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div>
                        
                                    <hr>
                                    <br>
                                    <br>
                                    <h5>PKL : Project Manager Ver 1.0</h5>
                                    <p class="text-right">© wijoyo wisnu M, Inc.</p>
                    </div>
                </div>
            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/scripts.js"></script>
            
           
      
      
        
    
    </body></html>