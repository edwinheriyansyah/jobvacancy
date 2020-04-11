<?php
include "config.php";

$id_login=$_POST['id_login'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];

if($nama==null || $username==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=profile&id=id_login'</script>";
}

else {
$operator= "UPDATE login SET nama='$nama',username='$username',password='$password',level='$level' WHERE id_login='".$_POST['id_login']."'";

$hasil    = mysql_query($operator) or die("Error : ".mysql_error());

}

if($hasil){
echo "<script>alert('Data Profile Berhasil Diubah');window.location='index.php?page=profile'</script>";
}

else {
echo "Maaf data tidak boleh kosong";
}

// close connection 
mysql_close();
?>
