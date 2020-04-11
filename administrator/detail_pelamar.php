<?php
include "config.php";
$sql  = "SELECT * FROM pelamar WHERE id_pelamar='".$_GET['id']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
 <div class="app-title">
        <div class="div">
          <h1>Detail Pelamar</h1>
          <p>Online Job Vacancy</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Pelamar</li>
          <li class="breadcrumb-item active"><a href="#">Detail Pelamar</a></li>
        </ul>
      </div>
      

      <div class="tile mb-4">
        <div class="row">
                   
          <div class="col-lg-12">
            <img src="../assets/images/pelamar/<?php echo $show['foto'] ?>" width="15%">
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Nama</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['nama'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Jenis Kelamin</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['gender'] ?>
          </div>
        </div><hr>
         <div class="row">
          <div class="col-lg-3">
            <h5>No. KTP</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['no_ktp'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Tempat Lahir</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['tmpt_lahir'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Tanggal Lahir </h5>
          </div>
          
          <div class="col-lg-9">
            <?php $date=$show['tgl_lahir'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate;
                    ?>
          </div>
        </div><hr>
         <div class="row">
          <div class="col-lg-3">
            <h5>Alamat </h5>
          </div>
          <div class="col-lg-9">
            <?php echo $show['alamat'] ?>
          </div>
        </div><hr>
         <div class="row">
          <div class="col-lg-3">
            <h5>No. HP </h5>
          </div>
          <div class="col-lg-9">
           <?php echo $show['no_hp'] ?>
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
            <h5>Facebook </h5>
          </div>
          <div class="col-lg-9">
            <?php echo $show['facebook'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Twitter </h5>
          </div>
          <div class="col-lg-9">
            <?php echo $show['twitter'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Instagram </h5>
          </div>
          <div class="col-lg-9">
            <?php echo $show['instagram'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Linkedin </h5>
          </div>
          <div class="col-lg-9">
          <?php echo $show['linkedin'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Tanggal Bergabung</h5>
          </div>
          
          <div class="col-lg-9">
           <?php $date=$show['tgl_daftar'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate;
                    ?>
          </div>
        </div>
        <hr>
        
          <p><a class="btn btn-primary" href="javascript:window.history.back();">Kembali</a></p>
        
      
     