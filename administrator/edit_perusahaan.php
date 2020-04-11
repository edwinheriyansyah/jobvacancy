<?php
include "config.php";

$lokasi=$_FILES['fupload']['tmp_name'];
$nama=$_FILES['fupload']['name'];
$ukuran=$_FILES['fupload']['size'];
$type=$_FILES['fupload']['type'];
$direktori="../assets/images/perusahaan/$nama";
$nama_perusahaan=htmlentities($_POST['nama_perusahaan'], ENT_QUOTES, "UTF-8");
$profil_perusahaan=$_POST['profil_perusahaan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$email=$_POST['email'];
$website=$_POST['website'];


if($nama_perusahaan==null || $profil_perusahaan==null || $alamat_perusahaan==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=edit-perusahaan&id=$id_perusahaan'</script>";
}



else if($ukuran > 2097152) {
	echo "<script>alert('Ukuran file maksimal 2 MB');window.location='index.php?page=edit-perusahaan&id=$id_perusahaan'</script>";
}

else if(move_uploaded_file($lokasi,"$direktori")){

	if (!($type == "image/gif" || $type == "image/jpeg" || $type == "image/png")) {
		echo "<script>alert('Maaf, hanya boleh unggah file JPEG, PNG atau GIF');window.location='index.php?page=edit-perusahaan&id=$id_perusahaan'</script>";
	}
else {
$perusahaan= "UPDATE perusahaan SET nama_perusahaan='$nama_perusahaan',profil_perusahaan='$profil_perusahaan',alamat_perusahaan='$alamat_perusahaan',email='$email',website='$website',logo='$nama' WHERE id_perusahaan='".$_POST['id_perusahaan']."'";

$hasil		= mysql_query($perusahaan) or die("Error : ".mysql_error());
}
}

else if(move_uploaded_file($lokasi,"$direktori")==null){

$perusahaan= "UPDATE perusahaan SET nama_perusahaan='$nama_perusahaan',profil_perusahaan='$profil_perusahaan',alamat_perusahaan='$alamat_perusahaan',email='$email',website='$website' WHERE id_perusahaan='".$_POST['id_perusahaan']."'";

$hasil		= mysql_query($perusahaan) or die("Error : ".mysql_error());

}

if($hasil){
echo "<script>alert('Data Perusahaan Berhasil Diubah');window.location='index.php?page=list-perusahaan'</script>";
}

else {
echo "Maaf data tidak boleh kosong";
}

// close connection 
mysql_close();
?>
