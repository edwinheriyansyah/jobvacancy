<?php
include "config.php";
$sql  = "SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pl_alasan,laporan.pt_jenis,laporan.pt_tahun,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,laporan.alasan,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan WHERE id_laporan='".$_GET['id']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
 <div class="app-title">
        <div class="div">
          <h1>Detail Kandidat</h1>
          <p>Online Job Vacancy</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Kandidat</li>
          <li class="breadcrumb-item active"><a href="#">Detail Kandidat</a></li>
        </ul>
      </div>
      

      <div class="tile mb-4">
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
            <h5>Email</h5>
          </div>
          
          <div class="col-lg-9">
            <?php echo $show['email'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Usia</h5>
          </div>
         
          <div class="col-lg-9">
            <?php 
                      $from = new DateTime($show['tgl_lahir']);
                      $to   = new DateTime('today');
                      echo $from->diff($to)->y;
                    ?>
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
            <h5>Jenis Kelamin</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['gender'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Pendidikan </h5>
          </div>
          
          <div class="col-lg-9">
            <?php echo $show['pendidikan'] ?>
          </div>
        </div><hr>
         <div class="row">
          <div class="col-lg-3">
            <h5>Jurusan </h5>
          </div>
          <div class="col-lg-9">
            <?php echo $show['jurusan'] ?>
          </div>
        </div><hr>
       
        <div class="row">
          <div class="col-lg-3">
            <h5>Instansi</h5>
          </div>
          
          <div class="col-lg-9">
            <?php echo $show['instansi'] ?>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Pengalaman Kerja Terakhir</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['pl_posisi'].' - '.$show['pl_perusahaan'].' ('.$show['pl_tahun'].')';?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Alasan Keluar </h5>
          </div>
          
          <div class="col-lg-9">
            <?php echo $show['pl_alasan'] ?>
          </div>
        </div><hr>
        
        <div class="row">
          <div class="col-lg-3">
            <h5>Pelatihan </h5>
          </div>
          
          <div class="col-lg-9">
            <?php echo $show['pt_jenis'].' ('.$show['pt_tahun'].')'; ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Promosi Diri </h5>
          </div>
          
          <div class="col-lg-9">
            <?php echo $show['alasan'] ?>
          </div>
        </div><hr>

        <div class="row">
          <div class="col-lg-3">
            <h5>File Ijazah</h5>
          </div>
          
          <div class="col-lg-9">
            <a href="../assets/uploads/<?php echo $show['ijazah'] ?>">Download Ijazah </a>
          </div>
        </div><hr>
        
         <div class="row">
          <div class="col-lg-3">
            <h5>File KTP</h5>
          </div>
         
          <div class="col-lg-9">
            <a href="../assets/uploads/<?php echo $show['ktp'] ?>">Download KTP </a>
          </div>
        </div><hr>

        <div class="row">
          <div class="col-lg-3">
            <h5>File Transkrip</h5>
          </div>
         
          <div class="col-lg-9">
            <a href="../assets/uploads/<?php echo $show['transkrip'] ?>">Download Transkrip </a>
          </div>
        </div><hr>

        <div class="row">
          <div class="col-lg-3">
            <h5>File Sertifikat</h5>
          </div>
         
          <div class="col-lg-9">
            <a href="../assets/uploads/<?php echo $show['sertifikat'] ?>">Download Sertifikat </a>
          </div>
        </div>
  <hr>
          <p><a class="btn btn-primary" href="javascript:window.history.back();">Kembali</a></p>
      </div>
      
     