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
                                        <li ><a href="daftarproject.php">Projects</a></li>
                                        <li ><a href="daftaractivity.php">Activities</a></li>
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
                                            <h1><font color="#000000">Daftar Document</h1>      
                                            <p>List semua Document yang sudah Terdaftar</font></p>
                                        </div>
                                
<?php
$sql = "SELECT * FROM document";
$result = mysqli_query($db,$sql);?>

<div class="container">
    <div class="header clearfix">
        <h3 class="text-center">Daftar Document</h3>
        <a href="upload_document.php" class="btn btn-danger">Tambah Document</a><br><br>
    </div>

    
        <table class="table table-hover table-responsive" align="center" border="1" bordercolor="#FFFFFF">
        	<tr>
                <td bgcolor="#666666" width="1%"><b>ID Document</b></td>
                <td bgcolor="#666666" width="10%"><b>Nama Document</b></td>
                <td bgcolor="#666666" width="2%"><b>Detail</b></td>
                <td bgcolor="#666666" width="2%"><b>Download</b></td>
                <td bgcolor="#666666" width="2%"><b>Delete</b></td>
                
    <?php
    $cari = $_GET['cari']; 
    // gets value sent over search form
     
    $min_length = 1;
    // you can set minimum length of the query if you want
     
    if(strlen($cari) >= $min_length){ // if query length is more or equal minimum length then
         
        $cari = htmlspecialchars($cari); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $cari = mysqli_real_escape_string($db,$cari);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($db,"SELECT * FROM document WHERE (`nama_document` LIKE '%".$cari."%') OR (`id_document` LIKE '%".$cari."%')") or die(mysqli_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){?>
    <tr>
        <td><?=$results['id_document'];?></td>
        <td><?=$results['nama_document'];?></td>
        
        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Lihat Details'))
{document.location='detail_document.php?id_document=<?php echo $results['id_document']; ?>';}">Detail</a>
        </td>
        
        <td><a class="btn btn-danger btn-block" href="javascript:if(confirm('Yakin Download File ini?'))
{document.location='download.php?id_document=<?php echo $results['id_document']; ?>';}">Download</a>
        </td>
        <td>
            <a class="btn btn-danger btn-block" href="javascript:if(confirm('Anda yakin menghapus?'))
{document.location='proses_hapus.php?id=<?php echo $results['id']; ?>';}">Delete</a>
        </td>
        
    </tr>
    
    
    
    
    <?php 
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>
    </table><br>
    
    

    <a class="btn btn-block btn-danger" href="daftardocument.php">Back</a><br>
<footer class="footer">
    <p class="text-right">&copy; Coeg, Inc.</p>
</footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
            
                                
                                
                                
                                    </div>
                        </body>
</html>
