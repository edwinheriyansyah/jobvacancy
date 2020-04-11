 <?php
include "config.php";
$sql  = "SELECT lowongan.id_lowongan,lowongan.info_lowongan,lowongan.kota,lowongan.syarat,lowongan.tgl_post,lowongan.tgl_close,perusahaan.nama_perusahaan FROM lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan WHERE lowongan.id_lowongan='".$_GET['id']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
 <div class="app-title">
        <div class="div">
          <h1>Detail Lowongan</h1>
          <p>Sistem Rekrutmen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Rekrutmen</li>
          <li class="breadcrumb-item active"><a href="#">Rekrutmen</a></li>
        </ul>
      </div>
      

      <div class="tile mb-4">
        <div class="row">
          <div class="col-lg-3">
            <h5>Lowongan</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['info_lowongan'] ?>
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
            <h5>Syarat</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['syarat'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Kota</h5>
          </div>
         
          <div class="col-lg-9">
            <?php echo $show['kota'] ?>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-lg-3">
            <h5>Tanggal Post </h5>
          </div>
         
          <div class="col-lg-9">
            <?php $date=$show['tgl_post'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate; ?>
          </div>
        </div><hr>
       
        <div class="row">
          <div class="col-lg-3">
            <h5>Tanggal Close </h5>
          </div>
          
          <div class="col-lg-9">
            <?php $date=$show['tgl_close'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate; ?>
          </div>
        </div><hr>
            
          <p><a class="btn btn-primary" href="javascript:window.history.back();">Kembali</a></p>
      </div>

      
     