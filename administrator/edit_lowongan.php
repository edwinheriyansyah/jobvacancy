<?php
include "config.php";

$id_perusahaan=$_POST['id_perusahaan'];
$info_lowongan=$_POST['lowongan'];
$kota=$_POST['kota'];
$syarat=$_POST['syarat'];
$tgl_post=$_POST['tgl_post'];
$tgl_close=$_POST['tgl_close'];


if($info_lowongan==null || $syarat==null || $tgl_close==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=edit-lowongan&id=$id_lowongan'</script>";
}

else {
$lowongan= "UPDATE lowongan SET id_perusahaan='$id_perusahaan',info_lowongan='$info_lowongan',kota='$kota',syarat='$syarat',tgl_post='$tgl_post',tgl_close='$tgl_close' WHERE id_lowongan='".$_POST['id_lowongan']."'";

$hasil		= mysql_query($lowongan) or die("Error : ".mysql_error());
}


if($hasil){
echo "<script>alert('Data lowongan Berhasil Diubah');window.location='index.php?page=list-lowongan'</script>";
}

else {
echo "Maaf data tidak boleh kosong";
}

// close connection 
mysql_close();
?>
