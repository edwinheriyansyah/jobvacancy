<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Perusahaan</h1>
          <p>Online Job Vacancy</p>
        </div>
        <a class="btn btn-primary" href="?page=input-perusahaan"><i class="fa fa-plus"></i>Tambah Perusahaan</a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Profil</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "config.php";
  $no=0;
  $sql="SELECT * FROM perusahaan where deleted=0 order by id_perusahaan ASC";
  $hasil  = mysql_query($sql) or die("Error : ".mysql_error());
  while($result = mysql_fetch_array($hasil))
  { 
    $no++;
    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $result['nama_perusahaan'];?></td>
                    <td width="20%"><? echo substr($result['profil_perusahaan'],0,100);?></td>
                    <td><?php echo $result['alamat_perusahaan'];?></td>
                    <td><?php echo $result['email'];?></td>
                    <td align="center"><img src="../assets/images/perusahaan/<?php echo $result['logo'];?>" width="20%"></td>
                    <td><div class="btn-group"><a class="btn btn-primary" href="?page=detail-perusahaan&id=<?php echo $result[0] ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail Perusahaan"><i class="fa fa-lg fa-eye"></i><a class="btn btn-primary" href="?page=edit-perusahaan&id=<?php echo $result[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Data perusahaan"><i class="fa fa-lg fa-edit"></i></a><?php if (($_SESSION['level'])=='admin'){ ?><a class="btn btn-primary" href="delete_perusahaan.php?id=<?php echo $result[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" onClick="return confirm('Apakah Anda Yakin untuk Menghapus Data ini ?')"><i class="fa fa-lg fa-trash"></i></a><?php } ?></div></td>
                  </tr>
 <?php } ?>      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
