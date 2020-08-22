<?php
include "koneksi.php";
$a="delete from activity where id_activity='$_GET[id_activity]'";
$b=mysqli_query($db,$a);
    if($b){
    header("location:daftaractivityx.php");
    }else{
    echo "Data gagal dihapus";
    }
?>