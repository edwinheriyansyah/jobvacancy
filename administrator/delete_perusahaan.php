<?php
include "config.php";
mysql_query("UPDATE perusahaan SET deleted='1' WHERE id_perusahaan='$_GET[id]'");
header("location:index.php?page=list-perusahaan");
?>