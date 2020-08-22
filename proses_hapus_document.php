<?php
include "koneksi.php";
$a="delete from document where id_document='$_GET[id_document]'";
$b=mysqli_query($db,$a);
    if($b){
    header("location:daftardocument.php");
    }else{
    echo "Data gagal dihapus";
    }
?>