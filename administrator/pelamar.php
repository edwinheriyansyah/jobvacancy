<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Pelamar</h1>
          <p>Online Job Vacancy</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-13">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. KTP</th>
                    <th>Usia</th>
                    <th>No. HP</th>
                    <th>Tanggal Bergabung</th>
                    <th>Akun Facebook</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "config.php";
  $sql="SELECT * FROM pelamar order by id_pelamar ASC";
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
                    <td><?php echo $result['no_ktp'];?></td>
                    <td><?php 
                      $from = new DateTime($result['tgl_lahir']);
                      $to   = new DateTime('today');
                      echo $from->diff($to)->y;
                    ?></td>
                    <td><?php echo $result['no_hp'];?></td>
                    <td><?php $date=$result['tgl_daftar'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate;
                    ?></td>
                    <td><?php echo $result['facebook'];?></td>
                 
                   
                    <td><div class="btn-group"><a class="btn btn-primary" href="?page=detail-pelamar&id=<?php echo $result[0] ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail Pelamar"><i class="fa fa-lg fa-eye"></i><a class="btn btn-primary" href="?page=edit-pelamar&id=<?php echo $result[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Data Pelamar"><i class="fa fa-lg fa-edit"></i><?php if (($_SESSION['level'])=='admin'){ ?><a class="btn btn-primary" href="delete_pelamar.php?id=<?php echo $result[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" onClick="return confirm('Apakah Anda Yakin untuk Menghapus Data ini ?')"><i class="fa fa-lg fa-trash"></i></a><?php } ?></div></td>
                    
                  </tr>
 <?php } ?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>