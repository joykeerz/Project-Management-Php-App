<?php require_once "koneksi.php";?>
<?php

    // membaca id file dari link
    $id_document = $_GET['id_document'];

    // membaca informasi file dari tabel berdasarkan id nya
    $sql  = "SELECT * FROM document WHERE id_document = '$id_document'";
    $result = mysqli_query($db,$sql);
    $data = mysqli_fetch_array($result);

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$data['nama_document']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: ".$data['size']);

    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: ".$data['type']);

   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen("data/".$data['nama_document'], 'r');
   $content = fread($fp, filesize('data/'.$data['nama_document']));
   fclose($fp);

   // menampilkan isi file yang akan didownload
   echo $content;

   exit;
?>
