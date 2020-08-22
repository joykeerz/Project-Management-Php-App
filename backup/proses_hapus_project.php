<?php
include "koneksi.php";
$a="delete from projects where id_projects='$_GET[id_projects]'";
$b=mysqli_query($db,$a);
    if($b){
    header("location:daftarproject.php");
    }else{
    echo "Data gagal dihapus";
    }
?>