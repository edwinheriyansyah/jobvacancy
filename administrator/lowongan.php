<div class="app-title">

        <div>

          <h1><i class="fa fa-th-list"></i> Data Lowongan</h1>

          <p>Online Job Vacancy</p>

        </div>

        <a class="btn btn-primary" href="?page=input-lowongan"><i class="fa fa-plus"></i>Tambah Lowongan</a>

      </div>

      <div class="row">

        <div class="col-md-12">

          <div class="tile">

            <div class="tile-body">

              <table class="table table-hover table-bordered" id="sampleTable">

                <thead>

                  <tr>

                    <th>No</th>

                    <th>Lowongan</th>

                    <th>Perusahaan</th>

                    <th>Syarat</th>

                    <th>Kota</th>

                    <th>Tanggal Post</th>

                    <th>Tanggal Close</th>

                    <th>Aksi</th>

                  </tr>

                </thead>

                <tbody>

                  <?php

                  include "config.php";

  $no=0;

  $sql="SELECT lowongan.id_lowongan,lowongan.info_lowongan,lowongan.kota,lowongan.syarat,lowongan.tgl_post,lowongan.tgl_close,perusahaan.nama_perusahaan FROM lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan where lowongan.deleted = 0 order by id_lowongan ASC";

  $hasil  = mysql_query($sql) or die("Error : ".mysql_error());

  while($result = mysql_fetch_array($hasil))

  { 

    $no++;

    ?>

                  <tr>

                    <td><?php echo $no;?></td>

                    <td><?php echo $result['info_lowongan'];?></td>

                    <td><?php echo $result['nama_perusahaan'];?></td>

                    <td><?php echo substr($result['syarat'],0,100);?></td>

                    <td><?php echo $result['kota'];?></td>

                    <td><?php $date=$result['tgl_post'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate;?></td>

                   

                    <td><?php $date=$result['tgl_close'];
                           $myDate = DateTime::createFromFormat('Y-m-d', $date);
                           $formatDate = $myDate->format('d-m-Y');
                           echo $formatDate;?></td>

                    <td><div class="btn-group"><a class="btn btn-primary" href="?page=detail-lowongan&id=<?php echo $result[0] ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail Lowongan"><i class="fa fa-lg fa-eye"></i><a class="btn btn-primary" href="?page=edit-lowongan&id=<?php echo $result[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Data Lowongan"><i class="fa fa-lg fa-edit"></i></a><?php if (($_SESSION['level'])=='admin'){ ?><a class="btn btn-primary" href="delete_lowongan.php?id=<?php echo $result[0] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" onClick="return confirm('Apakah Anda Yakin untuk Menghapus Data ini ?')"><i class="fa fa-lg fa-trash"></i></a><?php } ?></div></td>

                  </tr>

 <?php } ?>      

                </tbody>

              </table>

            </div>

          </div>

        </div>

      </div>

