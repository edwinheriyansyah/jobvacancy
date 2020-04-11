<div class="clearfix"></div>
    <div class="mj_lightgraytbg mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="wrapper-content bg-white mj_contact_form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="mj_mainheading mj_toppadder50 mj_bottompadder50 ">
                        <h1>R<span>egistration</span> F<span>orm</span></h1>
                       
                    </div>
                    <div class="mj_tabs mj_bottompadder50">
                        
                     <form action="<?=base_url();?>welcome/add_pelamar" id="add-form" class="form-horizontal form-seperated" method="post" enctype="multipart/form-data">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="recentjobs">
                                <form action="/action_page.php">
                                <div class="col-lg-12"> 
                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Nama Lengkap
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                </div>
                                </div>
                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Jenis Kelamin
                                    </div>
                                </div>

                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <input type="radio" name="gender" value="pria"> Pria
                                        <input type="radio" name="gender" value="wanita"> Wanita
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
                                       <input type="number" name="no_ktp" class="form-control" onkeypress="validate(event)" required>
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
                                       <input type="text" name="tmpt_lahir" class="form-control" required>
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
                                       <input type="text" name="tgl_lahir" class="form-control form_date" required>
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
                                       <textarea class="form-control" rows="4" name="alamat" required></textarea>
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
                                       <input type="number" name="no_hp" class="form-control" onkeypress="validate(event)" required>
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
                                       <input type="email" name="email" id="email" class="form-control" required>
                                       <span id="username_result"></span>
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Password
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                       <input type="password" name="password" class="form-control active" id="pass1" onkeyup="checkPass(); return false;" required/>
                                       <div class="group" style="position: relative;"> <i style="position: absolute;bottom: 12px;float: right;right: 15px;cursor: pointer;" id="icon" class="fa fa-eye-slash"></i></div>
                                       <div id="error-nwl"></div>
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
                                       <input type="text" name="facebook" class="form-control" placeholder="https://facebook.com/user_profile">
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
                                       <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com/user_profile">
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
                                       <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/user_profile">
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
                                       <input type="text" name="linkedin" class="form-control" placeholder="https://id.linkedin.com/user_profile">
                                    </div>
                                </div></div>

                                <div class="mj_tabs">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        Unggah foto
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><small>*Max size 1 MB</small></label>
                                      </div>
                                    </div>
                                </div></div>

                                <div class="mj_showmore"><input type="submit" class="mj_mainbtn mj_yellowbtn" value="Submit"></div>

                                 </div>

                            </div>
                           
                        </div>

                     </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">        
     $(document).ready(function(){
      $('#email').change(function(){
       var email = $('#email').val();
       if(email != ''){
        $.ajax({
         url: "<?php echo base_url(); ?>welcome/checkUsername",
         method: "POST",
         data: {email:email},
         success: function(data){
          $('#username_result').html(data);
           processData: false
     }
    });
   }
  });
 });
</script>
   
   