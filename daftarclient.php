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

    <title>MMI | Daftar Client</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                                    <!-- search -->
                                    <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Masukan Nama..." title="Type in a ID">
						</div> 
                                        
							
					</form>
                                    <!-- search -->
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
			<ul class="breadcrumb">
				<li>
                                    <a href="home_user.php">Home</a> <span class="divider">/</span>
				</li>
				<li>
                                    <a href="daftarclient.php.php">Client</a> <span class="divider">/</span>
				</li>
				<li class="active">
					Data
				</li>
			</ul>
			<div class="jumbotron">
				<h2>
                                    <center>Daftar Client</center>
				</h2>
				<p>
                                <center>List semua client yang sudah Terdaftar</center>
				</p>
			</div> 
                    <center><a href="tambahclient.php" class="btn btn-primary">Tambah Client</a></center><br><br>
			<br>

			<?php

$sql = "SELECT * FROM client";

$result = mysqli_query($db,$sql);
			?>

			<table class="table table-hover" id="myTable">
				<thead>
					<tr>
						<th>
							ID
						</th>
						<th>
							Nama
						</th>
						<th>
							Alamat
						</th>
						<th>
							Phone
						</th>
						<th>
							email
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
				</tbody>
			</table>
                        <h5>
				PKL : Project Manager Ver 1.0
			</h5> <p class="text-right">&copy; wijoyo wisnu M, Inc.</p>
		</div>
	</div>
</div>
      
      <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
      </script>
      
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>