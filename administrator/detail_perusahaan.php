 <?php
include "config.php";
$sql  = "SELECT * FROM perusahaan where id_perusahaan='".$_GET['id']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
 <div class="app-title">
        <div class="div">
          <h1>Detail Perusahaan</h1>
          <p>Sistem Rekrutmen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Perusahaan</li>
          <li class="breadcrumb-item active"><a href="#">Detail perusahaan</a></li>
        </ul>
      </div>
      

      <div class="tile mb-4">
        <div class="row">
                   
          <div class="col-lg-12">
            <img src="../assets/images/perusahaan/<?php echo $show['logo'] ?>" width="30%">
          </div>
        </div><hr>
         <div class="row">
          <div class="col-lg-3">
            <h5>Perusahaan</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['nama_perusahaan'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Profil </h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['profil_perusahaan'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Alamat</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['alamat_perusahaan'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Email</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['email'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Website </h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['website'] ?>
          </div>
        </div><hr>
          <p><a class="btn btn-primary" href="javascript:window.history.back();">Kembali</a></p>
      </div>
      
     