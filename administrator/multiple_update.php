<?php
include "config.php";

$lolos = $_POST['name'];
$subjects = explode(',', $lolos);

for ($i=0; $i < count($subjects) ; $i++) { 
	//echo $subjects[$i];

	$laporan= "UPDATE laporan SET lolos='1' WHERE id_laporan='".$subjects[$i]."'";
	$hasil		= mysql_query($laporan) or die("Error : ".mysql_error());

	if($hasil){
	echo "Berhasil";
	}
	
}
// close connection 
	mysql_close();
?>
