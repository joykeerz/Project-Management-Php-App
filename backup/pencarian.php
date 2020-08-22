<?PHP $sql=mysqli_query("select * from pencarian where title like '%$q%' or link like '%$q%' order by id desc LIMIT 10");
$cekdata=mysql_num_rows($sql); $no=0;
if($cekdata!=0){
while($post=mysql_fetch_array($sql)){
$title = strip_tags(ucfirst($post['title']));?>
Hasil Pencarian sekitar <?PHP echo $cekdata;?> ditemukan
<hr>
<li><a href="#"><?php echo $title;?></a></li>

<?PHP }} else { echo'<p>Data yang anda cari tidak ditemukan</p>'; } ?>