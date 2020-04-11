<?php
include "config.php";
$sql  = "SELECT * FROM pelamar WHERE id_pelamar='".$_GET['id']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
   <div class="app-title">
        <div>
          <h1>Edit Pelamar</h1>
           <p>Online Job Vacancy</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Pelamar</li>
          <li class="breadcrumb-item active"><a href="#">Edit Pelamar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                  <form action="edit_pelamar.php" method="post" enctype="multipart/form-data" name="form" accept-charset="utf-8">
                  	<input class="form-control" value="<?php echo $show['id_pelamar'] ?>" id="id_pelamar" name="id_pelamar" type="hidden">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" value="<?php echo $show['nama'] ?>" id="nama" name="nama" type="text">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="radio" name="gender" value="pria" <?php if ($show['gender']){?> checked="checked" <?php } ?> > Pria
                                        <input type="radio" name="gender" value="wanita" <?php if ($show['gender']=="wanita"){?> checked="checked" <?php } ?> > Wanita
                  </div>
                   <div class="form-group">
                    <label>No. KTP</label>
                    <input class="form-control" value="<?php echo $show['no_ktp'] ?>" id="no_ktp" name="no_ktp" type="text">
                  </div>
                   <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" value="<?php echo $show['tmpt_lahir'] ?>" id="tmpt_lahir" name="tmpt_lahir" type="text">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" value="<?php echo $show['tgl_lahir'] ?>" id="tgl_lahir" name="tgl_lahir" type="text">
                  </div>
                  <div class="form-group">
                    <label>No. HP</label>
                    <input class="form-control" value="<?php echo $show['no_hp'] ?>" id="no_hp" name="no_hp" type="text">
                  </div>
                 
                 
                  <div class="form-group">
                    <label>Alamat</label>
                     <textarea class="form-control" rows="4" name="alamat" required><?php echo $show['alamat'] ?></textarea>
                  </div>

                  <div class="form-group">
                      Ganti foto
                     </div>
      
                      <img src="../assets/images/pelamar/<?php echo $show['foto'] ?>" width="150px"><br><br>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="form-control-file" id="upload" name="fupload" type="file" aria-describedby="fileLogo">
                            </div>
                        </div>   
                        <small>*Max size 1 MB</small>      
                   
              </div>
              <div class="col-lg-6">
              
                   <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" value="<?php echo $show['email'] ?>" id="email" name="email" type="text">
                  </div>
                   <div class="form-group">
                    <label>Facebook</label>
                    <input class="form-control" value="<?php echo $show['facebook'] ?>" id="facebook" name="facebook" type="text">
                  </div>
                  <div class="form-group">
                    <label>Twitter</label>
                    <input class="form-control" value="<?php echo $show['twitter'] ?>" id="twitter" name="twitter" type="text">
                  </div>
                   <div class="form-group">
                    <label>Instagram</label>
                    <input class="form-control" value="<?php echo $show['instagram'] ?>" id="instagram" name="instagram" type="text">
                  </div>
                  <div class="form-group">
                    <label>Linkedin</label>
                    <input class="form-control" value="<?php echo $show['linkedin'] ?>" id="linkedin" name="linkedin" type="text">
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
