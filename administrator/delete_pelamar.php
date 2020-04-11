<?php
include "config.php";
mysql_query("DELETE FROM pelamar WHERE id_pelamar='$_GET[id]'");
header("location:index.php?page=list-pelamar");
?>
