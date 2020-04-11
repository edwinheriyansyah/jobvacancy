<?php
include "config.php";

$id_laporan=$_POST['bookId'];
$lolos=$_POST['lolos'];

if($lolos==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=list-kandidat'</script>";
}

else {
$laporan= "UPDATE laporan SET lolos='$lolos' WHERE id_laporan='".$_POST['bookId']."'";

$hasil		= mysql_query($laporan) or die("Error : ".mysql_error());

}

if($hasil){
echo "<script>alert('Berhasil Terkirim');window.location='index.php?page=list-kandidat'</script>";
}

else {
echo "Maaf data tidak boleh kosong";
}

// close connection 
mysql_close();
?>
