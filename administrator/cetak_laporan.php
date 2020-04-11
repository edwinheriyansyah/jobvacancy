	<?php 	
		$kdTransaksi=$_POST['KdTransaksi'];
		$cKdAnggota=$_POST['cKdAnggota'];		
		$tgldari=$_POST['dTgl1'];
		$tgldari=str_replace('/', '-', $tgldari);
		$dari= date('Y-m-d', strtotime($tgldari));
		$tglsampai=$_POST['dTgl2'];
		$tglsampai=str_replace('/', '-', $tglsampai);
		$sampai= date('Y-m-d', strtotime($tglsampai));
		$ubah_tgl2=date('d/m/Y', strtotime($tglsampai));
		$ubah_tgl1=date('d/m/Y', strtotime($tgldari));
		echo "<br>";
	?>
	
	<div>
	<?php
			if ($kdTransaksi and $cKdAnggota=='0')
			{
				$sql=mysql_query("SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,laporan.lolos,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where (tgl_lamar >= '$dari' and tgl_lamar <= '$sampai') and info_lowongan='$kdTransaksi' and lolos='$cKdAnggota'"); 	
			}
			else if ($kdTransaksi and $cKdAnggota=='1')
			{
				$sql=mysql_query("SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,laporan.lolos,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where (tgl_lamar >= '$dari' and tgl_lamar <= '$sampai') and info_lowongan='$kdTransaksi' and lolos='$cKdAnggota'"); 	
			}
			elseif ($cKdAnggota=='0')
			{
				$sql=mysql_query("SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,laporan.lolos,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where (tgl_lamar >= '$dari' and tgl_lamar <= '$sampai') and lolos='$cKdAnggota'"); 	
			}
			elseif ($cKdAnggota=='1')
			{
				$sql=mysql_query("SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,laporan.lolos,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where (tgl_lamar >= '$dari' and tgl_lamar <= '$sampai') and lolos='$cKdAnggota'"); 	
			}
			elseif ($kdTransaksi)
			{
				$sql=mysql_query("SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where (tgl_lamar >= '$dari' and tgl_lamar <= '$sampai') and info_lowongan='$kdTransaksi'"); 	
			}
			else 
			{ 	
				$sql=mysql_query("SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,laporan.lolos,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where (tgl_lamar >= '$dari' and tgl_lamar <= '$sampai') order by id_laporan asc"); 	
			}  	
			
			if(mysql_num_rows($sql) > 0)
			{	
			 ?>
				<a style="margin-bottom:10px" class="pull-right">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
				<form name="form1" method="POST" action="" id="form1">
				<button type="submit" id="btn_print" name="btn_print" class="btn btn-warning pull-right" data-toggle="tooltip" data-placement="top" title="Data Dicetak Ke Printer"><i class="fa fa-lg fa-print"></i> &nbspPrint </a></button> </form>
				<button class="btn btn-success pull-right" name="btn_excel" id="btn_excel" data-toggle="tooltip"  data-placement="top" title="Data di Transfer Ke Excel"><i class="fa fa-lg fa-file-excel-o"></i>&nbsp&nbspExcel</button> 
				<a style="margin-bottom:10px" class="pull-right"></a>  
				<button type="reset" onclick="window.location.href='?page=laporan'"  class="btn btn-primary pull-right" name="clearform" id="clearform" data-toggle="tooltip" data-placement="top" title="Kosongkan Tampilan"><i class="fa fa-lg fa-refresh"></i>  Refresh</button> 
				<div id='div_to_print'>			
					<b><h3>Laporan</b></h3>
					<?php	echo "<b><h4>Tanggal : ".$ubah_tgl1."  s/d  ".$ubah_tgl2."</h4></b>";?>
					<div overflow="auto"><section id="basic">
						<table class="table table-hover table-bordered" id="DF" cellspacing="0" width="100%" border='1'>
							<thead>
							  <tr>
								<th style="vertical-align:center;">No</th>
								<th style="vertical-align:middle;">Nama</th>
								<th style="vertical-align:middle;">Email</th>
								<th style="vertical-align:middle;">Usia</th>
								<th style="vertical-align:middle;">Jenis Kelamin</th>						
								<th style="vertical-align:middle;">No. HP</th>
								<th style="vertical-align:middle;">Pendidikan Terakhir</th>
								<th style="vertical-align:middle;">Pengalaman Kerja Terakhir</th>
								<th style="vertical-align:middle;">Lowongan Dilamar</th>
								<th style="vertical-align:middle;">Perusahaan Dilamar</th>
							  </tr>
							</thead>
							<tbody>
							  <?php $no=0;
							  include "config.php";
								   
								  while($data=mysql_fetch_array($sql))					 
								  {	
									$no++;	
									$nama=$data['nama'];
									$email=$data['email'];
									$tgl_lahir=$data['tgl_lahir'];
									$dob = strtotime($tgl_lahir);
									$today=time();
									$difference = $today - $dob;
									$usia=floor($difference / 31556926);
									$gender=$data['gender'];
									$no_hp=$data['no_hp'];
									$pendidikan=$data['pendidikan'];
									$jurusan=$data['jurusan'];
									$instansi=$data['instansi'];
									$pl_posisi=$data['pl_posisi'];	
									$pl_perusahaan=$data['pl_perusahaan'];
									$pl_tahun=$data['pl_tahun'];	
									$info_lowongan=$data['info_lowongan'];
									$nama_perusahaan=$data['nama_perusahaan'];			
									?>
							  <tr>     
							<?php 	
								echo "<td align='left' width='1%'><font size='2'>&nbsp".@$no."</font></td>";	
								echo "<td align='center' width='20%'><font size='2'>&nbsp".@$nama."</font></td>";
								echo "<td align='center' width='20%'><font size='2'>&nbsp".@$email."</font></td>";
								echo "<td align='center' width='20'><font size='2'>&nbsp".$usia."</font></td>";
								echo "<td align='left' width='10%'><font size='2'>&nbsp".@$gender."</font></td>";			
								echo "<td align='center' width='10%'><font size='2'>&nbsp'".@$no_hp."</font></td>";	
								echo "<td align='center' width='20%'><font size='2'>&nbsp".@$pendidikan." ".@$jurusan." - ".@$instansi."</font></td>";
								echo "<td align='center' width='19%'><font size='2'>&nbsp".@$pl_posisi." - ".@$pl_perusahaan." (".@$pl_tahun.")</font></td>";
								echo "<td align='center' width='20%'><font size='2'>&nbsp".@$info_lowongan."</font></td>";
								echo "<td align='center' width='20%'><font size='2'>&nbsp".@$nama_perusahaan."</font></td>";
							?>		
							  </tr>				  
								 <?php } ?> 
							</tbody>
						  </table>
					</div>
								<?php
			}
			else
			{
				echo "<script>alert('Data Tidak Ada !')</script>";				
			}
			
		?>
				</div></div>
		<script>
		$(document).ready(function () {
			excel = new ExcelGen({
				"src_id": "DF",
				"show_header": true
			});
			$("#btn_excel").click(function () {
				excel.generate();
			});
		});	
	</script>