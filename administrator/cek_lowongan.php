<?php
include "config.php";

$id_perusahaan=$_POST['id_perusahaan'];
$info_lowongan=$_POST['info_lowongan'];
$kota=$_POST['kota'];
$syarat=$_POST['syarat'];
$tgl_post=$_POST['tgl_post'];
$tgl_close=$_POST['tgl_close'];


if($info_lowongan==null || $syarat==null || $tgl_close==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=input-lowongan'</script>";
}

else {
// pendeklarasian query menambahkan data kedalam database
$lowongan_masuk="INSERT INTO lowongan(id_perusahaan,info_lowongan,kota,syarat,tgl_post,tgl_close) 
VALUES('$id_perusahaan','$info_lowongan','$kota','$syarat','$tgl_post','$tgl_close');";

$result=mysql_query($lowongan_masuk);

echo "<script>alert('Data Lowongan Berhasil Dimasukkan');window.location='index.php?page=list-lowongan'</script>";
}

// close connection 
mysql_close();
?>