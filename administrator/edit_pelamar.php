<?php
include "config.php";

$lokasi=$_FILES['fupload']['tmp_name'];
$nama=$_FILES['fupload']['name'];
$ukuran=$_FILES['fupload']['size'];
$type=$_FILES['fupload']['type'];
$direktori="../assets/images/pelamar/$nama";

$id_pelamar=$_POST['id_pelamar'];
$nama_lengkap=htmlentities($_POST['nama'], ENT_QUOTES, "UTF-8");
$gender=$_POST['gender'];
$no_ktp=$_POST['no_ktp'];
$tmpt_lahir=$_POST['tmpt_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$facebook=$_POST['facebook'];
$twitter=$_POST['twitter'];
$instagram=$_POST['instagram'];
$linkedin=$_POST['linkedin'];
$email=$_POST['email'];


if($nama_lengkap==null || $no_ktp==null || $no_hp==null || $tmpt_lahir==null || $facebook==null){
echo "<script>alert('Maaf Tidak Boleh Kosong');window.location='index.php?page=edit-pelamar&id=$id_pelamar'</script>";
}



else if($ukuran > 1097152) {
	echo "<script>alert('Ukuran file maksimal 2 MB');window.location='index.php?page=edit-pelamar&id=$id_pelamar'</script>";
}

else if(move_uploaded_file($lokasi,"$direktori")){

	if (!($type == "image/gif" || $type == "image/jpeg" || $type == "image/png")) {
		echo "<script>alert('Maaf, hanya boleh unggah file JPEG, PNG atau GIF');window.location='index.php?page=edit-pelamar&id=$id_pelamar'</script>";
	}
else {
$pelamar= "UPDATE pelamar SET nama='$nama_lengkap',gender='$gender',no_ktp='$no_ktp',tmpt_lahir='$tmpt_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',no_hp='$no_hp',facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin',email='$email',foto='$nama' WHERE id_pelamar='".$_POST['id_pelamar']."'";

$hasil		= mysql_query($pelamar) or die("Error : ".mysql_error());
}
}

else if(move_uploaded_file($lokasi,"$direktori")==null){

$pelamar= "UPDATE pelamar SET nama='$nama_lengkap',gender='$gender',no_ktp='$no_ktp',tmpt_lahir='$tmpt_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',no_hp='$no_hp',facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin',email='$email' WHERE id_pelamar='".$_POST['id_pelamar']."'";

$hasil		= mysql_query($pelamar) or die("Error : ".mysql_error());

}

if($hasil){
echo "<script>alert('Data Pelamar Berhasil Diubah');window.location='index.php?page=list-pelamar'</script>";
}

else {
echo "Maaf data tidak boleh kosong";
}

// close connection 
mysql_close();
?>
