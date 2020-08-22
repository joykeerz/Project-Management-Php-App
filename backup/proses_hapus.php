<?php
include "koneksi.php";
$a="delete from client where id='$_GET[id]'";
$b=mysqli_query($db,$a);
    if($b){
    header("location:daftarclient.php");
    }else{
    echo "Data gagal dihapus";
    }
?>