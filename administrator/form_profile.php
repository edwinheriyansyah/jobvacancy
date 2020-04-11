 <?php
include "config.php";
$sql  = "SELECT * FROM login WHERE id_login='".$_SESSION['id_login']."'";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
$show = mysql_fetch_array($hasil);
?>
<main>
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="images/user.png">
              <h4><?php echo $show['nama'] ?></h4>
              <p><?php echo $show['level'] ?></p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="tab-content">
           
            <div class="" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Profile</h4>
                  <form action="edit_profile.php" method="post" enctype="multipart/form-data" name="form">
                    <input class="form-control" type="hidden" id="id_login" name="id_login" value="<?php echo $show['id_login'] ?>"">
                    <input class="form-control" type="hidden" id="level" name="level" value="<?php echo $show['level'] ?>"">
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Nama</label>
                      <input class="form-control" type="text" id="nama" name="nama" value="<?php echo $show['nama'] ?>"">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Username</label>
                      <input class="form-control" type="text" id="username" name="username" value="<?php echo $show['username'] ?>"">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Password</label>
                      <input class="form-control" type="text" id="password" name="password" value="<?php echo $show['password'] ?>"">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">

                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>