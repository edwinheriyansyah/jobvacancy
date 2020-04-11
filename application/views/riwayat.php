<div class="clearfix"></div>
    <div class="mj_lightgraytbg mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="wrapper-content bg-white mj_contact_form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="mj_mainheading mj_toppadder50 mj_bottompadder50 ">
                        <h1>R<span>iwayat</span> M<span>elamar</span></h1>
                       <p>
                        <div class="col-md-12">
                                <table id="userTable" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th><center>Lowongan</center></th>
                                        <th><center>Perusahaan</center></th>
                                        <th><center>Tanggal Melamar</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="x in master" class="ng-scope">
                                        <td class="ng-binding"><?php if (empty($riwayat[0]->info_lowongan)){
                                        	echo '-';
                                        } else {
                                        	echo $riwayat[0]->info_lowongan;
                                        } ?></td>
                                        <td class="ng-binding"><?php if (empty($riwayat[0]->nama_perusahaan)){
                                        	echo '-';
                                        } else {
                                        	echo $riwayat[0]->nama_perusahaan;
                                        } ?></td>
                                        <td class="ng-binding"><?php if (empty($riwayat[0]->tgl_lamar)){
                                        	echo '-';
                                        } else {
                                        	echo format_tanggal_khusus($riwayat[0]->tgl_lamar);
                                        } ?></td>
                                        <td class="ng-binding"><?php if (empty($riwayat[0]->id_laporan)){
                                        	echo '-';
                                        } 

                                        else if($riwayat[0]->lolos == 1){
                                            echo '<strong>LOLOS</strong>';
                                        }

                                        else {
                                        	echo 'Terkirim';
                                        } ?></td>
                                         <td class="ng-binding">
                                            <?php if (empty($riwayat[0]->tgl_lamar)){
                                                echo '-';
                                                }
                                                else if ($riwayat[0]->lolos == 1){
                                                echo '-';
                                                }
                                                else {
                                                echo '<a href="batal/'.$riwayat[0]->id_laporan.'" style="color:red"><i class="fa fa-minus-circle" aria-hidden="true"></i> Batalkan</a>';
                                                } 
                                            ?>       
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                                <?php 
                                    if (empty($riwayat[0]->lolos)){
                                            echo '';
                                        }

                                    else if($riwayat[0]->lolos == 1)
                                    {
                                        echo '<br><div align="center"><p>Selamat! Anda lolos ke tahap berikutnya.</p><p>Silahkan cek email Anda untuk informasi kelengkapan yang wajib dibawa pada saat tes.</p></div><br><br><br><br>';
                                    }
                                    
                                ?>

                          <div class="mj_showmore"> <a href="<?=base_url();?>" class="mj_mainbtn mj_yellowbtn">Home</a></div>
                        </div>
                       </p>
                    </div>
                </div>
            </div>
        </div>
    </div>