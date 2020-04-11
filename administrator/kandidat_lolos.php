<?php
include "config.php";
$lowongan = '';
$sql = "SELECT info_lowongan FROM lowongan ORDER BY id_lowongan ASC";
$hasil  = mysql_query($sql) or die("Error : ".mysql_error());
while($row = mysql_fetch_array($hasil))
  { 
 $lowongan .= '<option value="'.$row['info_lowongan'].'">'.$row['info_lowongan'].'</option>';
}
?>

 
<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Kandidat Yang Lolos</h1>
          <p>Online Job Vacancy</p>
        </div>
      </div><span id="hasil"></span>
      <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <div class="col-md-4"></div>
   </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Usia</th>
                    <th>No. HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Pengalaman Kerja Terakhir</th>
                    <th>Lowongan Dilamar</th>
                    <th>Perusahaan Dilamar</th>
                    <th>Attachment</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
          <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th></th>
                    <th></th>
                    <th>Lowongan Dilamar</th>
                    <th>Perusahaan Dilamar</th>
                    <th></th>
                    <th></th> 
          </tr>
        </tfoot>
                <tbody>
                  <?php
                  include "config.php";
$sql="SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan WHERE lolos='1' ";
  //$sql="SELECT * FROM skripsi";
  $hasil  = mysql_query($sql) or die("Error : ".mysql_error());
  $no=0;
  while($result = mysql_fetch_array($hasil))
  { 
    $no++;
    ?>
     <tr> 
                    <td><?php echo $no;?></td>
                    <td><?php echo $result['nama'];?></td>
                    <td><?php echo $result['email'];?></td>
                    <td><?php $from = new DateTime($result['tgl_lahir']);
                      $to   = new DateTime('today');
                      echo $from->diff($to)->y;?></td>
                    <td><?php echo $result['no_hp'];?></td>
                    <td><?php echo $result['gender'];?></td>
                    <td><?php echo $result['pendidikan'];?></td>
                    <td><?php echo $result['jurusan'].' - '.$result['instansi'];?></td>
                    <td><?php echo $result['pl_posisi'].' - '.$result['pl_perusahaan'].' ('.$result['pl_tahun'].')';?></td>
                    <td><?php echo $result['info_lowongan'];?></td>
                    <td><?php echo $result['nama_perusahaan'];?></td>
                    <td>
                      <a href="JavaScript:newPopup('../assets/uploads/<?php echo $result['ijazah']; ?>');">Ijazah</a> | 
                      <a href="JavaScript:newPopup('../assets/uploads/<?php echo $result['ktp']; ?>');">KTP</a> | 
                      <a href="JavaScript:newPopup('../assets/uploads/<?php echo $result['transkrip']; ?>');">Transkrip</a> |
                      <a href="JavaScript:newPopup('../assets/uploads/<?php echo $result['sertifikat']; ?>');">Sertifikat</a>
                    </td>
                    <td><div class="btn-group"><a class="btn btn-primary" href="mailto:<?php echo $result['email']?>?subject=Pengumuman Lolos Ke Tahap Selanjutnya&body=Hi <?php echo $result['nama']?>, Selamat anda dinyatakan lolos ke tahap selanjutnya. Harap cek jadwal di website dan konfirmasi kehadiran dengan membalas email ini atau mengirim SMS ke nomor 081...." title="Kirim Email Kandidat" data-original-title="Kirim Email Kandidat"><i class="fa fa-lg fa-paper-plane"></i></a></div></td>
                    
                  </tr>
 <?php } ?>
                 
                
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

      