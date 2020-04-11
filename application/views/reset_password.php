<div class="clearfix"></div>
    <div class="mj_lightgraytbg mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="wrapper-content bg-white mj_contact_form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="mj_mainheading mj_toppadder50 mj_bottompadder50 ">
                        <h1>R<span>eset</span> P<span>assword</span></h1>
                            <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>   
                           <?php echo form_open('welcome/reset_password/token/'.$token); ?>  
                           <p>Password Baru:</p>   
                           <p>   
                             <input type="password" name="password" value="<?php echo set_value('password'); ?>"/>   
                           </p>   
                           <p> <?php echo form_error('password'); ?><br> </p> 
                           <p>Konfirmasi Password:</p>   
                           <p>    
                             <input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>"/>   
                           </p>   
                           <p> <?php echo form_error('passconf'); ?> </p>   
                           <p>   <br>
                             <input type="submit" name="btnSubmit" value="Reset" class="mj_mainbtn mj_yellowbtn" />   
                           </p>   
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   