<?php
include "config.php";
mysql_query("UPDATE lowongan SET deleted='1' WHERE id_lowongan='$_GET[id]'");
header("location:index.php?page=list-lowongan");
?>
