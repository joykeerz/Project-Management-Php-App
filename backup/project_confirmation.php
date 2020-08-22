<div class="container">
    <div class="header clearfix">
        <h3  class="text-center">
		<?php echo $saved==true?"DATA ANDA TELAH TERSIMPAN":"DATA ANDA GAGAL TERSIMPAN";?>
		</h3>
    </div>

    <div class="jumbotron">

       <?php if($saved) : ?>
        <a class = "btn btn-lg btn-success" href ="home_user.php">Selesai</a>
        <a class = "btn btn-lg btn-success" href ="daftarproject.php">Lihat List</a>
	   <?php else :
	   echo "<p> Error : ".mysqli_error($db)."</p>";
	   endif;
	   ?>
	   

    </div>

    <footer class="footer">
        <p class="text-right">&copy; Coeg, Inc.</p>
    </footer>

</div> <!-- /container -->