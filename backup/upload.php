<?php require_once "koneksi.php";?>
<?php

// setting nama folder tempat upload
$uploaddir = 'data/';

// membaca nama file yang diupload
$fileName = $_FILES['userfile']['name'];     

// nama file temporary yang akan disimpan di server
$tmpName  = $_FILES['userfile']['tmp_name']; 

// membaca ukuran file yang diupload
$fileSize = $_FILES['userfile']['size'];

// membaca jenis file yang diupload
$fileType = $_FILES['userfile']['type'];

// ini id activity dari form upload document hehehhehehhehehheheh
$id_activity = $_POST['id_activity'];

$sql = "SELECT count(*) as jum FROM document WHERE nama_document = '$fileName'";
$hasil = mysqli_query($db,$sql);
$data  = mysqli_fetch_array($hasil);

if ($data['jum'] > 0)
{
   $query = "UPDATE document SET size = '$fileSize' WHERE nama_document = '$fileName'";
}
else 
    $query = "INSERT INTO document (nama_document, size, type, id_activity) VALUES ('$fileName', '$fileSize', '$fileType', '$id_activity')";

mysqli_query($db,$query);

// menggabungkan nama folder dan nama file
$uploadfile = $uploaddir . $fileName;

// proses upload file ke folder 'data'
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File telah diupload";
    header("location:daftardocument.php");
} else {
    echo "File gagal diupload";
}
?>