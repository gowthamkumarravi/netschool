<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="col-md-1">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="school-name">
                                             Dot Net Schools                                    </div>
            </div>
            <div class="col-md-4">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php if($this->session->userdata('photo')): ?>
                                <img src="<?php echo WEB_IMG?>image/<?php echo $this->session->userdata('photo'); ?>" alt="" width="60" /> 
                        <?php else: ?>
                            <img src="<?php echo WEB_IMG?>assets/images//default-user.png" alt="" width="60" /> 
                            <?php endif; ?>
                                                        
                                <?php echo $this->session->userdata('username'); ?>
                           
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?php echo WEB_URL?>Profile/index"> Profile</a></li>
                            <li><a href="<?php echo WEB_URL?>Dashboard/reset_password">Reset Password</a></li>
                            <li><a href="<?php echo WEB_URL?>Dashboard/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                    </li>
                    
                                                             
                                            <li>
                              
                                    <a href="<?php echo WEB_DIR?>" target="_blank"><i class="fa fa-globe"></i> Web</a>
                              
                        </li>
                      
                </ul>
            </div>
        </nav>
    </div>
</div>


 