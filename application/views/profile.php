<div class="clearfix"></div>
    <div class="mj_lightgraytbg mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="wrapper-content bg-white mj_contact_form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="mj_mainheading mj_toppadder50 mj_bottompadder50 ">
                        <h1>P<span>rofile</span></h1>
                       
                    </div>
                    <div class="mj_tabs mj_bottompadder50">
                        
                     <form action="<?=base_url();?>welcome/edit_pelamar" class="form-horizontal form-seperated" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="recentjobs">
                                <div class="col-lg-12"> 
                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Nama Lengkap
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" value="<?=$profile[0]->nama;?>">
                                        <input type="hidden" name="id_pelamar" class="form-control" value="<?php echo $_SESSION["id_pelamar"] ?>">
                                    </div>
                                </div></div>
                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Jenis Kelamin
                                    </div>
                                </div>

                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <input type="radio" name="gender" value="pria" <?php if ($profile[0]->gender=="pria"){?> checked="checked" <?php }?> > Pria
                                        <input type="radio" name="gender" value="wanita" <?php if ($profile[0]->gender=="wanita"){?> checked="checked" <?php }?> > Wanita
                                    </div>
                                </div></div>
    
                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        No. KTP
                                    </div>
                                </div>

                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="no_ktp" class="form-control" value="<?php echo $profile[0]->no_ktp ?>">
                                    </div>
                                </div></div>
                                    
                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Kota Kelahiran
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="tmpt_lahir" class="form-control" value="<?php echo $profile[0]->tmpt_lahir ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Tanggal Lahir
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="tgl_lahir" class="form-control form_date" onblur="if(this.value=='') this.value='<?php echo format_tanggal_khusus($profile[0]->tgl_lahir) ?>';" onfocus="if(this.value=='<?php echo format_tanggal_khusus($profile[0]->tgl_lahir) ?>') this.value='';" placeholder="<?php echo format_tanggal_khusus($profile[0]->tgl_lahir) ?>" required/>
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Alamat
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <textarea class="form-control" rows="4" name="alamat" required><?php echo $profile[0]->alamat ?></textarea>
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        No. HP
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="no_hp" class="form-control" value="<?php echo $profile[0]->no_hp ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Email
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="email" name="email" class="form-control" value="<?php echo $profile[0]->email ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Facebook
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="facebook" class="form-control" value="<?php echo $profile[0]->facebook ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Twitter
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="twitter" class="form-control" value="<?php echo $profile[0]->twitter ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Instagram
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="instagram" class="form-control" value="<?php echo $profile[0]->instagram ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Linkedin
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="text" name="linkedin" class="form-control" value="<?php echo $profile[0]->linkedin ?>">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Ganti foto
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <img src="assets/images/pelamar/<?php echo $profile[0]->foto ?>" width="150px"><br><br>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><small>*Max size 1 MB</small></label>
                                      </div>
                                    </div>
                                </div></div>


                                <div class="mj_showmore"><input type="submit" class="mj_mainbtn mj_yellowbtn" value="Submit"></a></div>

                                 </div>

                            </div>
                           
                        </div>

                     </form>

                    </div>

                </div>

               
               
            </div>
        </div>
    </div>