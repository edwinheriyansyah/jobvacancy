   <div class="app-title">
        <div>
          <h1>Tambah Perusahaan</h1>
           <p>Online Job Vacancy</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Perusahaan</li>
          <li class="breadcrumb-item active"><a href="#"> Perusahaan</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form action="cek_perusahaan.php" method="post" enctype="multipart/form-data" name="form" accept-charset="utf-8">
                   <div class="form-group">
                    <label>Perusahaan</label>
                    <input class="form-control" id="nama_perusahaan" name="nama_perusahaan" type="text" placeholder="Perusahaan" required>
                  </div>
                 
                  <div class="form-group">
                    <label>Profil</label>
                    <textarea class="form-control" id="profil_perusahaan" name="profil_perusahaan" placeholder="Profil" rows="6" required> </textarea>
                  </div>

                 

                  <div class="form-group">
                    <label for="exampleInputFile">Unggah Logo</label>
                    <input class="form-control-file" id="upload" name="fupload" type="file" aria-describedby="fileLogo"><small class="form-text text-muted" id="fileHelp">*Max Ukuran 2 Mb (Format .jpg, .png)</small>
                  </div>  
                     
              </div>
              <div class="col-lg-6">
                 <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" type="text" placeholder="Alamat" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" id="email" name="email" type="text" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label>Website</label>
                    <input class="form-control" id="website" name="website" type="text" placeholder="Website">
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


