<link type = "text/css" rel = "stylesheet" href = "asset/template/css/11.css">
<link type = "text/css" rel = "stylesheet" href = "asset/js/jquery-ui.css">
<link type = "text/css" rel = "stylesheet" href = "asset/css/bootstrap-datetimepicker.min.css">		
<script src="asset/template/js/jquery-2.1.4.min.js"></script>
<script src="js/excel/FileSaver.min.js"></script>
<script src="js/excel/jszip.min.js"></script>
<script src="js/excel/excel-gen1.js"></script>	
<div class="app-title">
 <div>
  <h1><i class="fa fa-th-list"></i> Laporan Pelamar</h1>
       <p>Online Job Vacancy</p>
  </div>       
 </div>
 <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div id="panel">
				<p align ="center">				
					<div class="container"> 
						<form name="form1" method="POST" action="" id="form1">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="row">
									<div class="col-xs-1 col-sm-2 col-md-1"></div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<div class="row">				
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<table class="table" id="tabelfilter">
															<tbody>					
																<tr>
																	<td width="0.5%"></td>	
																	<td width="150">
																		<div class="input-group date" id="datetimepicker">
																			<input type="text" class="form-control" name="dTgl1" data-date-format="DD/MM/YYYY" data-toggle="tooltip" 
																			data-placement="top" title="Tanggal Awal" value="<?php echo isset($_POST["dTgl1"]) ? $_POST["dTgl1"] : "" ; ?>" placeholder="Isi Tgl Awal"/>
																			<span class="input-group-addon"><i class="fa fa-lg fa-calendar"></i></span>
																		</div>
																	</td>	
																	<td width="1" align="center">S/D</td>
																	<td width="1%"></td>	
																	<td width="150">
																		<div class="input-group date" id="datetimepicker2">
																			<input type="text" class="form-control" name="dTgl2" data-date-format="DD/MM/YYYY" data-toggle="tooltip"
																			data-placement="top" title="Tanggal Akhir" value="<?php echo isset($_POST["dTgl2"]) ? $_POST["dTgl2"] : ""; ?>" placeholder="Isi Tgl Akhir"/>
																			<span class="input-group-addon"><i class="fa fa-lg fa-calendar"></i></span>
																		</div>
																	</td>	
																	<td width="1"></td>
																</tr>			
																<tr>
																	<td width="0.5%"></td>	
																	<td width="150">
																		<input id="KdTransaksi" name="KdTransaksi" class="form-control" type="text" maxlength="6" placeholder="Pilih Lowongan" autocomplete="off" data-toggle="tooltip" data-placement="top" title="Lowongan" value="<?php echo isset($_POST['KdTransaksi']) ? $_POST['KdTransaksi'] : ''; ?>" onclick="kosong_tr()" readonly>
																	</td>	
																	<td>
																		<button type="button" class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#ModalTr" data-toggle="tooltip" data-placement="top" title="Pilih Kode Cabang" id="BtnCabang" > 
																			<i class="fa fa-lg fa-search"></i>
																		</button>
																	</td>
																	<td width="2%"></td>	
																	<td>	
																		<input id="cKdAnggota" name="cKdAnggota" class="form-control" type="text" placeholder="Kandidat Lolos/Tidak Lolos" data-toggle="tooltip" data-placement="top" title="Lolos/Tidak Lolos" value="<?php echo isset($_POST['cKdAnggota']) ? $_POST['cKdAnggota'] : ''; ?>" onclick="kosong_anggota()" readonly>
																	</td>	
																	<td>
																		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAnggota" 
																		data-toggle="tooltip" data-placement="top" title="Pilih Kandidat"id="BtnUser" ><i class="fa fa-lg fa-search"></i>
																		</button> 
																	</td>
																</tr>																
																<tr>	
																	<td width="2%"></td>
																	<td></td>					
																	<td></td>
																	<td width="2%"></td>	
																	<td width="150">					
																		<button type="submit" value="submit" name="btntampilkan" class="btn btn-danger btn-default pull-right" data-toggle="tooltip" 
																		data-placement="top" title="Tampilkan Hasil Pilihan"><span class="glyphicon glyphicon-search" > </span> Tampilkan
																		</button>				
																	</td>										
																</tr>																			
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-1 col-sm-2 col-md-2"></div>
									</div>
								</div>
							</div>							
						</form>			
					</div>
				</p>
			</div>
		</div>
	</div>
</div>	


<!-- Cabang-->
<div class="modal fade" id="ModalTr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 <div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title" id="myModalLabel">Daftar Lowongan</h4>
			</div>
			<div class="modal-body">
			<table id="lkpCabang" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="30%">ID Lowongan</th>	
					<th width="35%">Lowongan</th>
					<th width="35%">Perusahaan</th>
					<th width="35%">Tanggal Post</th>		
				</tr>
			</thead>
			<tbody>           
						<?php
			 //Data mentah yang ditampilkan ke tabel    
             include "config.php"; 	
             $query = mysql_query('SELECT lowongan.id_lowongan,lowongan.info_lowongan,lowongan.tgl_post,perusahaan.nama_perusahaan from lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan');
             while ($data = mysql_fetch_array($query)) 			 
			 {	?>
				 <tr class="pilihTransaksi" 
					data-KdTransaksi="<?php echo $data['info_lowongan']; ?>">		
				    <td width="5%"><?php echo $data['id_lowongan']; ?></td>
                    <td width="35%"><?php echo $data['info_lowongan']; ?></td>
                    <td width="35%"><?php echo $data['nama_perusahaan']; ?></td>
                    <td width="20%"><?php echo $data['tgl_post']; ?></td>

                </tr>	
			<?php			
             }			 			  
            ?>		
					</tbody>
			</table>			
			</div>
		</div>
	</div>
</div>	<!-- modal Anggota --> 
<div class="modal fade" id="ModalAnggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">       
          <h4 class="modal-title" id="myModalLabel">Pilihan Kandidat yang Lolos/Tidak Lolos</h4>
      </div>
      <div class="modal-body">
	  <div class="content table-responsive">
        <table id="lookupAnggota" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
          <thead>
            <tr>                      
			  <th>Pilihan</th>   
			  <th>Nilai</th>
			</tr>
          </thead>
          <tbody>  
          <tr class="pilihAnggota" data-NimAnggota="1">								 
               <td width="80%">LOLOS</td>
               <td width="20%">1</td>
          </tr>	 	
           <tr class="pilihAnggota" data-NimAnggota="0">								 
               <td width="80%">TIDAK LOLOS</td>
               <td width="20%">0</td>
          </tr>	  
          </tbody>
        </table>  
      </div>
	 </div>
    </div>
  </div>
</div>
	
<?php
	if(isset($_POST['btntampilkan']))
	{
		?>
	
		<div class="row">	
			<div class="col-md-12">
			<div class="card">		
			<?php	include "cetak_laporan.php";?>
		    </div>
			</div>
		</div>

		<?php } ?>	   
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script src="asset/js/tglbootsrap/js/moment.js"></script>   
<script src="asset/js/tglbootsrap/js/bootstrap-datetimepicker.min.js"></script>
<script src="asset/js/tglbootsrap/js/locale/id.js"></script>
<script src="asset/js/jquery.printThis.js"></script>
<!-- kalender -->	
<script type="text/javascript">
	$("#datetimepicker").datetimepicker({  	
		locale: "id",
		defaultDate: moment().startOf("day"),		
		
	});
	$("#datetimepicker2").datetimepicker({  
		showTodayButton: true,
		locale: "id",
		defaultDate: moment().startOf("day"),
		
	});
	$("#datetimepicker").datetimepicker();	
	$("#datetimepicker").on("dp.change", function (e) {
		$("#datetimepicker2").data("DateTimePicker").minDate(e.date);
	});
	$("#datetimepicker2").on("dp.change", function (e) {
		$("#datetimepicker").data("DateTimePicker").maxDate(e.date);
	}); 
</script>

<!-- modal kode anggota -->
<script type = "text/javascript">
//jika dipilih, kode stock akan masuk ke input dan modal di tutup
	$(document).on('click', '.pilihAnggota', function (e) {
	  document.getElementById("cKdAnggota").value = $(this).attr('data-NimAnggota');
	  $('#ModalAnggota').modal('hide');
	  });
	  $(function () {
	  $("#lookupAnggota").dataTable();		
	  });
</script>

<!-- modal kode cabang -->
<script type="text/javascript">
	//jika dipilih, kode cabang akan masuk ke input dan modal di tutup
	$(document).on('click', '.pilihTransaksi', function (e) {
		document.getElementById("KdTransaksi").value=$(this).attr('data-KdTransaksi');				
		$('#ModalTr').modal('hide');
	});
	// tabel lookup langgan
	$(function () {
		$("#lkpCabang").dataTable();		
	});     
</script>

<!-- Cetak Printer -->
<script type="text/javascript">
	$(document).ready(function(e) {
		$("button#btn_print").on("click", function(e)  {
			$("#div_to_print").printThis({
				exclude: [".do_not_print", ".print_exclude" ] 
				// stylesheets links											
			});
		}); 
	});
</script>
<!-- Cetak Printer -->
<script>
	function kosong_tr() {		
		document.getElementById("KdTransaksi").value="";		
	}
</script>	

<script>
	function kosong_anggota() {		
		document.getElementById("cKdAnggota").value="";
	}
</script>	