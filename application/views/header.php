    <div class="mj_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="mj_logo">
                        <button type="button" style="background-color:#fecb16" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mj_menu" aria-expanded="false">
                            <span class="sr-only">MENU</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="collapse navbar-collapse mj_navmenu" id="mj_menu">
                        <ul class="nav navbar-nav">
                            <li class="<?php if($this->uri->segment(1)==""){echo "active";}?>"><a href="<?=base_url();?>">home</a>
                            </li>
                            <?php if ($this->session->userdata('isloggedin') ==  TRUE&&$this->session->userdata('status')!='') { ?> <li class="<?php if($this->uri->segment(1)=="jadwal"){echo "active";}?>"><a href="<?=base_url();?>jadwal">Jadwal</a> 
                            </li> <?php } ?>
                            <li class="<?php if($this->uri->segment(1)=="contact"){echo "active";}?>"><a href="<?=base_url();?>contact">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right mj_right_menu mj_withoutlogin_menu">
                                    <?php if ($this->session->userdata('isloggedin') ==  TRUE&&$this->session->userdata('status')!='') { ?>
                                <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION["nama"] ?></a>
                                    <ul class="sub_menu">
                                    <li><a href="<?=base_url();?>profile">Profile</a>
                                    </li>
                                    <li><a href="<?=base_url();?>riwayat">Riwayat Melamar</a>
                                    </li>
                                    <li><a href="<?=base_url();?>logout">Log out</a>
                                    </li>
                                </ul>
                                </li>
                                
                                <li>
                            
                             <?php }
                             else {
                              ?>
                            <li><a href="<?=base_url();?>register"><i class="fa fa-lock"></i> Register</a>
                                </li>
                            <li><a class="mj_logintoggle" onclick="show_my_div('my_profile_div_login' , 'id')"><i class="fa fa-user"></i> Login</a>
                            </li>

                            <div class="mj_profilediv" id="my_profile_div_login">
                            <form method="post" action="<?=base_url();?>welcome/doLogin">
                                <div class="form-group">
                                    <input type="text" placeholder="Email" id="ur_name" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" id="ur_password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <div class="mj_checkbox">
                                        <input type="checkbox" value="1" id="check1" name="checkbox">
                                        <label for="check1"></label>
                                    </div>
                                    <span> remember me</span>
                                    <hr><span> <a href="forgot-password">Forgot Password</a></span>
                                </div>
                                <div class="mj_showmore"> <input type="submit" value="Login Now!" class="mj_mainbtn mj_yellowbtn"></div>
                            </form>
                        </div>
                        <?php } ?>

                           
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>