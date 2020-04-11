<div class="clearfix"></div>
    <div class="mj_lightgraytbg mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="mj_mainheading mj_toppadder50 mj_bottompadder50">
                        <h2>Daftar Lowongan Pekerjaan</h2>
                    </div>
                    <div class="mj_tabs mj_bottompadder50">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="recentjobs">
                                <div class="mj_tabcontent mj_toppadder30">
                                    <table class="table table-striped">
                                        <?php foreach($tampil_lowongan as $data) { ?>
                                        <tr>
                                            <td width="5%"><a href="#"><i class="fa fa-heart"></i></a>
                                            </td>
                                            <td width="8%">
                                                <a href="#"><img src="<?=base_url();?>assets/images/perusahaan/<?php echo $data['logo']?>" class="img-responsive" alt="">
                                                </a>
                                            </td>
                                            <td width="65%">
                                                <h4><a href="#" data-toggle="modal" data-book-id="<?php echo $data['info_lowongan']?>" data-syarat-id="<?php echo $data['syarat']?>"><?php echo $data['info_lowongan']?></a></h4>
                                                <p>Company <strong><?php echo $data['nama_perusahaan']?></strong> | Closed <strong><?php echo format_tanggal_khusus($data['tgl_close']);?></strong></p>
                                                <br><br><br>
                                                <p><?php echo $data['syarat'];?></p>
                                            </td>
                                            <td width="10%">
                                                <i class="fa fa-map-marker"> <?php echo $data['kota']?></i>
                                                <P>&nbsp;</P>
                                            </td>
                                           <td></td>
                                            <td width="10%"> 
                                                <?php if ($this->session->userdata('isloggedin') ==  TRUE&&$this->session->userdata('status')!='') { ?>

                                               <span> <a href="#" data-toggle="modal" data-book-id="<?php echo $data['id_lowongan']?>" data-book-pelamar="<?php echo $this->session->userdata('id_pelamar')?>" data-book-lowongan="<?php echo $data['info_lowongan']?>" class="mj_btn mj_yellowbtn cek_apply">Apply</a></span>
                                                    <?php }  else { ?>
                                                <span> <a href="#" class="mj_btn mj_yellowbtn" onclick="swal(&apos;Maaf!&apos;, &apos;Harap Mendaftar Dahulu!&apos;, &apos;error&apos;)">Apply</a></span>
                                                 <?php }} ?>
                                            </td>
                                        </tr>
                                       
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="modal" id="my_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Harap Melengkapi Data</h4>
      </div>
      <form action="<?=base_url();?>welcome/apply_lowongan" class="form-horizontal form-seperated" method="post" enctype="multipart/form-data">
      <div class="modal-body">
         <input type="text" name="bookId" value=""/ hidden="true">
         <input type="text" name="bookLowongan" value=""/ hidden="true">
         <input type="text" name="id_pelamar" value="<?php echo $_SESSION["id_pelamar"] ?>"/ hidden="true">
         <p><strong>Lowongan yang Dilamar</strong></p>
         <strong><input class="form-control" type="text" name="bookLowongan" disabled></strong>
         <br>
         <p>Pendidikan Terakhir</p>
         <select class="form-control" id="pendidikan" name="pendidikan">
            <option value="SLTA/SMK">SLTA/SMK</option>
            <option value="D1">D1</option>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
         </select>
         <br>
         <p>Instansi</p>
         <input class="form-control" type="text" name="instansi" id="instansi" Placeholder="Universitas/Sekolah...">
         <br>
         <p>Jurusan</p>
         <input class="form-control" type="text" name="jurusan" id="jurusan" Placeholder="Jurusan">
         <br>
         <p>Nilai Akhir/IPK</p>
         <input class="form-control" type="text" name="nilai" id="nilai" Placeholder="Nilai Akhir/IPK" maxlength="4" size="4">
         <br>
         <p>Pengalaman Kerja</p>
         <table width="100%" class="table table-striped">  
            <tr>
                <th>Perusahaan</th>
                <th>Posisi Terakhir</th>
                <th>Tahun Periode</th>
                <th>Alasan Keluar</th>
            </tr>
            <tr>
                <td><input class="form-control" type="text" name="pl_perusahaan" id="pl_perusahaan" Placeholder="Perusahaan"></td>
                <td><input class="form-control" type="text" name="pl_posisi" id="pl_posisi" Placeholder="Posisi Terakhir"></td>
                <td><input class="form-control" type="text" name="pl_tahun" id="pl_tahun" Placeholder="Tahun Periode"></td>
                <td><input class="form-control" type="text" name="pl_alasan" id="pl_alasan" Placeholder="Alasan Keluar"></td>
            </tr>
         </table>

         <p>Pelatihan yang pernah diiikuti</p>
         <table width="100%" class="table table-striped">  
            <tr>
                <th>Jenis Pelatihan</th>
                <th>Tahun Pelatihan</th>
            </tr>
            <tr>
                <td><input class="form-control" type="text" name="pt_jenis" id="pt_jenis" Placeholder="Jenis Pelatihan"></td>
                <td><input class="form-control" type="text" name="pt_tahun" id="pt_tahun" Placeholder="Tahun Pelatihan"></td>
            </tr>
         </table>
         <br>
         <p>Promosikan diri Anda!</p>
         <textarea class="form-control" rows="4" name="alasan" placeholder="Beritahu perusahaan mengapa Anda paling cocok untuk posisi ini. Sebutkan keterampilan khusus dan bagaimana Anda berkontribusi dalam perusahaan." required></textarea>
         <hr>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
        <div class="col-lg-6 col-md-6">
        <p>Unggah Ijazah*</p>
          <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" name="ijazah" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <p>Unggah KTP*</p>
          <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" name="ktp" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01" required>
                
              </div>
          </div>
      </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br>
        <div class="col-lg-6 col-md-6">
          <p>Unggah Transkrip</p>
          <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" name="transkrip" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon01">
                
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <p>Unggah Sertifikat Training</p>
          <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" name="sertifikat" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon01">
                
              </div>
          </div>
        </div>
       </div>


       
      </div>
      
      <label class="custom-file-label" for="inputGroupFile01"><br><small>&nbsp;*Format file .jpg/.png/.pdf dan Maksimal ukuran 1 Megabyte<br>
      &nbsp;*Wajib unggah file Ijazah dan KTP<br>
      &nbsp;*Pastikan Lowongan yang anda pilih sudah sesuai</small></label>
<br>
      <div class="modal-footer">
        <div class="mj_showmore">
            <input type="submit" class="mj_mainbtn mj_yellowbtn" id="alert" value="Submit">
            <button type="button" class="mj_mainbtn mj_bluebtn" data-dismiss="modal">Close</button>
          </div>
      </div>
    </form>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">        
     $(document).ready(function(){
      $('.cek_apply').click(function(e){
       var id_pelamar = $(this).attr('data-book-pelamar'), id_lowongan = $(this).attr('data-book-id');
        var bookLowongan = $(this).attr('data-book-lowongan');
        var bookId = $(this).attr('data-book-id');

       console.log(id_pelamar);
        $.ajax({
         url: "<?php echo base_url(); ?>welcome/checkApply",
         method: "POST",
         data: {id_pelamar:id_pelamar,id_lowongan:id_lowongan},
         success: function(data){
          if(data==1){
           swal("Maaf!", "Hanya bisa melamar untuk satu posisi lowongan!", "error");
            return;
          }

          else{ 
            $("#my_modal").modal();
            $('input[name="bookId"]').val(bookId);
            $('input[name="bookLowongan"]').val(bookLowongan);
          }
     }
    });
  });
 });
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#alert').bind("click",function() 
    { 
        var imgVal = $('#inputGroupFile01').val(); 
        if(imgVal=='') 
        { 
            alert("Mohon upload file Ijazah"); 
            return false; 
        } 

        var imgVal = $('#inputGroupFile02').val(); 
        if(imgVal=='') 
        { 
            alert("Mohon upload file KTP"); 
            return false; 
        } 


    }); 
});
</script> 
