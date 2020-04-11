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
          <h1><i class="fa fa-th-list"></i> Data Kandidat</h1>
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
                    <th align="center">Check Jika Lolos</th>
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
                    <th><input type="submit" id="sub_marks" class="btn btn-info" value="Submit"></th>
          </tr>
        </tfoot>
                <tbody>
                  <?php
                  include "config.php";

$sql="SELECT laporan.id_laporan,laporan.pendidikan,laporan.instansi,laporan.jurusan,laporan.nilai,laporan.pl_perusahaan,laporan.pl_posisi,laporan.pl_tahun,laporan.pt_jenis,laporan.ijazah,laporan.ktp,laporan.transkrip,laporan.sertifikat,pelamar.nama,pelamar.gender,pelamar.no_hp,pelamar.tgl_lahir,lowongan.info_lowongan,perusahaan.nama_perusahaan,pelamar.email FROM laporan INNER JOIN pelamar ON laporan.id_pelamar=pelamar.id_pelamar INNER JOIN lowongan ON laporan.id_lowongan=lowongan.id_lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan WHERE lolos='0' ";
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
                    <td><div class="btn-group"><a class="btn btn-primary" href="?page=detail-kandidat&id=<?php echo $result['id_laporan'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail Kandidat"><i class="fa fa-lg fa-eye"></i><a class="btn btn-primary" href="#my_modal" data-toggle="modal" data-book-id="<?php echo $result['id_laporan']?>" data-book-nama="<?php echo $result['nama']?>" data-book-usia="<?php $from = new DateTime($result['tgl_lahir']);
                      $to   = new DateTime('today');
                      echo $from->diff($to)->y;?>" data-book-email="<?php echo $result['email']?>" data-book-pendidikan="<?php echo $result['pendidikan'].' '.$result['jurusan'].' - '.$result['instansi'];?>" data-book-lowongan="<?php echo $result['info_lowongan'].' - '.$result['nama_perusahaan']?>" data-placement="top" title="" data-original-title="Kirim Email Kandidat"><i class="fa fa-lg fa-check"></i></a></div></td>
                    <td><input type="checkbox" id="check" name="myCheckbox[]" class="theClass" value="<?php echo $result['id_laporan'];?>"></td>
                  </tr>
 <?php } ?>
                 
                
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

      <div class="modal" id="my_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form action="kirim_email.php" class="form-horizontal form-seperated" method="post" enctype="multipart/form-data">
      <div class="modal-body">
         <input class="form-control" type="text" name="bookId" hidden>
         <p>Nama</p>
         <input class="form-control" type="text" name="bookNama" disabled>
         <br>
         <p>Usia</p>
         <input class="form-control" type="text" name="bookUsia" disabled>
         <br>
         <p>Email</p>
         <input class="form-control" type="text" name="bookEmail" disabled>
         <br>
         <p>Pendidikan Terakhir</p>
         <input class="form-control" type="text" name="bookPendidikan" disabled>
         <br>
         <p>Lowongan Dilamar</p>
         <input class="form-control" type="text" name="bookLowongan" disabled>
         <br>
         <p>Aksi</p>
         <select name="lolos" id="lolos" class="form-control" required>
           <option>Pilih</option>
           <option value="1">LOLOS</option>
           <option value="0">TIDAK LOLOS</option>
          </select>
         <br>
         <div class="modal-footer">
        <div class="mj_showmore">
          
            <input type="submit" class="btn btn-primary" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
          </div>
      </div>
       </div>
    </form>


    </div>
  </div>

</div>
