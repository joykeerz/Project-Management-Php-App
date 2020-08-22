<?php
include "koneksi.php";
if(isset($_POST['edit'])) {
    $id_project = $_POST['id_project'];
    $id_client = $_POST['id_client'];
    $nama_client = $_POST['nama_client'];
    $nama_project = $_POST['nama_project'];
    $start = $_POST['start'];
    $end = $_POST['end'];
	
	$sql	= 'update projects set id_client="$id_client", nama_client="$nama_client", nama_project="$nama_project", start="$start", end="$end" where id_projects="$id_project"';
	$query	= mysqli_query($db,$sql);
	
	if($query){
		header('location: daftarproject.php');
	}
	else{
		echo 'Gagal';
	}
}
?>