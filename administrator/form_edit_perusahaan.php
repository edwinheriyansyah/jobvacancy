 <?php
include "config.php";
$sql  = "SELECT * FROM perusahaan WHERE id_perusahaan='".$_GET['id']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
   <div class="app-title">
        <div>
          <h1>Edit Perusahaan</h1>
           <p>Online Job Vacancy</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Perusahaan</li>
          <li class="breadcrumb-item active"><a href="#">Edit Perusahaan</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form action="edit_perusahaan.php" method="post" enctype="multipart/form-data" name="form" accept-charset="utf-8">
                  <input class="form-control" value="<?php echo $show['id_perusahaan'] ?>" id="id_perusahaan" name="id_perusahaan" type="hidden">
                  <div class="form-group">
                    <label>Perusahaan</label>
                    <input class="form-control" id="nama_perusahaan" name="nama_perusahaan" type="text" value="<?php echo $show['nama_perusahaan'] ?>">
                  </div>
                 
                  <div class="form-group">
                    <label>Profil</label>
                    <textarea class="form-control" id="profil_perusahaan" name="profil_perusahaan" placeholder="Profil" rows="6"><?php echo $show['profil_perusahaan'] ?></textarea>
                  </div>

                  
                  <div class="form-group">
                    <img src="../assets/images/perusahaan/<?php echo $show['logo'] ?>" width=40%><br>
                    <label for="exampleInputFile">Ganti Logo</label>
                    <input class="form-control-file" id="upload" name="fupload" type="file" aria-describedby="fileLogo"><small class="form-text text-muted" id="fileHelp">*Max Ukuran 2 Mb (Format .jpg, .png)</small>
                  </div>  
                     
              </div>
              <div class="col-lg-6">

                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" type="text" value="<?php echo $show['alamat_perusahaan'] ?>">
                  </div>
                
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" id="email" name="email" type="text" value="<?php echo $show['email'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Website</label>
                    <input class="form-control" id="website" name="website" type="text" value="<?php echo $show['website'] ?>">
                  </div>
                  
              </div>
            </div>

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>


