<div class="clearfix"></div>
    <div class="mj_lightgraytbg mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="wrapper-content bg-white mj_contact_form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="mj_mainheading mj_toppadder50 mj_bottompadder50 ">
                        <h1>F<span>orgot</span> P<span>assword</span></h1>
                           <p>Untuk melakukan reset password, silakan masukkan alamat email anda. </p>   
                           <?php echo form_open('welcome/forgot_password');?>   
                           <p>Email:</p>   
                           <p>   
                             <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>   
                           </p>   
                           <p> <?php echo form_error('email'); ?> </p>  
                           <p>  <br>  
                             <input type="submit" name="btnSubmit" value="Submit" class="mj_mainbtn mj_yellowbtn"/>   
                           </p>   
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   