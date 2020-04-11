<?php
include "config.php";

$lokasi=$_FILES['fupload']['tmp_name'];
$nama=$_FILES['fupload']['name'];
$ukuran=$_FILES['fupload']['size'];
$type=$_FILES['fupload']['type'];
$direktori="../assets/images/perusahaan/$nama";
$nama_perusahaan=$_POST['nama_perusahaan'];
$profil_perusahaan=$_POST['profil_perusahaan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$email=$_POST['email'];
$website=$_POST['website'];


if($nama_perusahaan==null || $profil_perusahaan==null || $alamat_perusahaan==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=input-perusahaan'</script>";
}

else if(move_uploaded_file($lokasi,"$direktori")){

if (!($type == "image/gif" || $type == "image/jpeg" || $type == "image/png")) {
		echo "<script>alert('Maaf, hanya boleh unggah file JPEG, PNG atau GIF');window.location='index.php?page=input-perusahaan'</script>";
}

else if($ukuran > 2097152) {
	echo "<script>alert('Ukuran file maksimal 2 MB');window.location='index.php?page=input-perusahaan'</script>";
}

else {
// pendeklarasian query menambahkan data kedalam database
$perusahaan_masuk="INSERT INTO perusahaan(nama_perusahaan,profil_perusahaan,alamat_perusahaan,email,website,logo) 
VALUES('$nama_perusahaan','$profil_perusahaan','$alamat_perusahaan','$email','$website','$nama');";

$result=mysql_query($perusahaan_masuk);

echo "<script>alert('Data Perusahaan Berhasil Dimasukkan');window.location='index.php?page=list-perusahaan'</script>";
}
}

else if(move_uploaded_file($lokasi,"$direktori") == null){
// pendeklarasian query menambahkan data kedalam database
$perusahaan_masuk="INSERT INTO perusahaan(nama_perusahaan,profil_perusahaan,alamat_perusahaan,email,website) 
VALUES('$nama_perusahaan','$profil_perusahaan','$alamat_perusahaan','$email','$website');";

$result=mysql_query($perusahaan_masuk);

echo "<script>alert('Data Perusahaan Berhasil Dimasukkan');window.location='index.php?page=list-perusahaan'</script>";
}

// close connection 
mysql_close();
?>

