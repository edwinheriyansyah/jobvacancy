 <script src="asset/template/js/jquery-2.1.4.min.js"></script>

   <div class="app-title">
        <div>
          <h1>Tambah Lowongan</h1>
           <p>Online Job Vacancy</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Lowongan</li>
          <li class="breadcrumb-item active"><a href="#"> Lowongan</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form action="cek_lowongan.php" method="post" enctype="multipart/form-data" name="form">
                   <div class="form-group">
                    <label>Perusahaan</label>
                     <select class="form-control" id="id_perusahaan" name="id_perusahaan">
                      <?php
                  include "config.php";
                  $sql="SELECT * FROM perusahaan where deleted=0";
                  $hasil  = mysql_query($sql) or die("Error : ".mysql_error());
                  while($show = mysql_fetch_array($hasil))
                  { ?>
                      <option value="<?php echo $show['id_perusahaan'] ?>"><?php echo $show['nama_perusahaan'] ?></option>
                  <?php }  ?>  
                    </select>
                  </div>

                   <div class="form-group">
                    <label>Lowongan</label>
                    <input class="form-control" id="info_lowongan" name="info_lowongan" type="text" placeholder="Lowongan" required>
                  </div>
  
                 
                 <div class="form-group">
                    <label>Syarat</label>
                    <textarea class="form-control" id="syarat" name="syarat" placeholder="Syarat" rows="6" required> </textarea>
                  </div>

                 

              </div>
              <div class="col-lg-6">
                 <div class="form-group">
                    <label>Kota</label><br>
                      <input name="kota" id="kota" class="form-control" placeholder="Kota" />
                  </div>

                 <div class="form-group">
                    <label>Tanggal Post</label>
                    <input class="form-control" id="tgl_post" name="tgl_post" type="text" value="<?php echo date('Y-m-d')?>" readonly>
                  </div>

                   <div class="form-group">
                    <label>Tanggal Close</label><br>
                      <input name="tgl_close" id="tgl_close" class="datetimepicker form-control" data-date-format="YYYY-MM-DD" placeholder="Tanggal Close" required/>
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

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script src="asset/js/tglbootsrap/js/moment.js"></script>   
<script src="asset/js/tglbootsrap/js/bootstrap-datetimepicker.min.js"></script>
<script src="asset/js/tglbootsrap/js/locale/id.js"></script>
<script src="asset/js/jquery.printThis.js"></script>
<!-- kalender --> 
<script type="text/javascript">
  $(".datetimepicker").datetimepicker({   
    locale: "id",
    defaultDate: moment().startOf("day"),   
    
  });
  $(".datetimepicker2").datetimepicker({  
    showTodayButton: true,
    locale: "id",
    defaultDate: moment().startOf("day"),
    
  });
  $(".datetimepicker").datetimepicker();  
  $(".datetimepicker").on("dp.change", function (e) {
    $(".datetimepicker2").data("DateTimePicker").minDate(e.date);
  });
  $(".datetimepicker2").on("dp.change", function (e) {
    $(".datetimepicker").data("DateTimePicker").maxDate(e.date);
  }); 
</script>

