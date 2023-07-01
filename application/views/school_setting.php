
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta charset="ISO-8859-15">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="cache-control" content="no-store" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="pragma" content="no-store" />
        

        <title>School Setting | vds jain</title>
                    <link rel="icon" href="<?php echo WEB_DIR ?>assets/uploads//logo/1682338668-favicon-icon.png" type="image/x-icon" />             
                
        
        <!-- Bootstrap -->
        <link href="<?php echo WEB_DIR ?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="<?php echo WEB_DIR ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
        <!-- Custom Theme Style -->
                    <link href="<?php echo WEB_DIR ?>assets/css/custom.css" rel="stylesheet">
                
                    <link href="<?php echo WEB_DIR ?>assets/css/theme/slate-gray.css" rel="stylesheet">
                
        <!-- jQuery -->
        <script src="<?php echo WEB_DIR ?>assets/js/jquery-1.11.2.min.js"></script>
        <script src="<?php echo WEB_DIR ?>assets/js/jquery.validate.js"></script>
        
         <script type="text/javascript" src="<?php echo WEB_DIR ?>assets/vendors/toastr/toastr.min.js"></script>
        
                        
    </head>

    <body class="nav-md">
        <div id="preloader"></div>    
        <div class="container body">
            <div class="main_container">
                 <div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo WEB_URL?>dashboard/index">
                                    <span >
                        Dot Net Schools                    </span>
                                
                
                                     <img class="logo" src="<?php echo WEB_IMG ?>assets/uploads/logo/1682224490-brand-logo.png" style="max-width: 65px;" alt="">
                            </a>
        </div>
        <div class="clearfix" style=""></div>        
        <!-- sidebar menu -->
        <?php 
        $this->load->view('school_menu.php');
        ?>
        <!-- /sidebar menu -->
    </div>
</div>   
                <!-- top navigation -->
                <?php
                $this->load->view('header.php');
                ?>
                 <!--end navigation -->
 

    <div class="right_col fn_header_global no-print">  
    <div class="x_panel" style="padding-bottom: 2px;margin: 0px;">             
        <div class="x_content"> 
            <div class="row">               
                
                <div class="col-md-5 col-sm-5 col-xs-12">        

                    <div class="row">
                          
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <label class="text-right" style="padding-top: 5px;">Global Search</label>
                                <input type="hidden" class="" name="search_school_id" id="search_school_id" value="1" />
                           </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">                                
                                <input type="text"  class="form-control col-md-7 col-xs-12"  name="global_search"  id="global_search" onkeyup="get_search(this.value);" placeholder="Global Search" required="required">
                            </div>
                        </div>
                    </div>                       
                </div>
                                               
                 
                 <div class="col-md-1 col-sm-1 col-xs-1 header-form-sep"> |</div>
                
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                                                   
                            <input type="hidden" class="" name="ay_school_id" id="ay_school_id" value="1" />
                        
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="item form-group"> 
                                <select  class="form-control col-md-7 col-xs-12"  name="ay_academic_year_id"  id="ay_academic_year_id" required="required">
                                    <option value="">--Session Year--</option>                                                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="form-group">
                                <button  type="submit" class="btn btn-success" onclick="update_academic_year();">Update</button>
                            </div>
                        </div>

                    </div>          
                </div> 
                                
            </div>
            
            
            <!-- ====================START ======================= -->
            <div class="search_result_container"  style="position: absolute; padding-top: 1px; z-index: 999; background: #000;width: 100%; display: none;">
                <div class="row search_result" style="background: #fff; margin:0px 25px 10px  25px;">                    
                </div>
            </div>
            <!-- ====================END ======================= -->
            
        </div>
    </div>
</div>

<script type="text/javascript">
    
    //================ SEARCH ======================================================
      function get_search(keyword){        
         
        var school_id = $('#search_school_id').val(); 
        if(!school_id){
           toastr.error('Select School');           
           return false;
        }
        
        if(!keyword){
            $('.search_result').html(''); 
            $('.search_result_container').hide(); 
            return false;
        }
        
        $('.search_result_container').show();  
        $('.search_result').html('<p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR ?>assets/images/loading.gif" style="width: 40px;" /></p>');
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR ?>dashboard/get_search",
            data   : { school_id : school_id, keyword : keyword},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {                                                      
                   $('.search_result_container').show();                                     
                   $('.search_result').html(response);                                     
               }else{
                   $('.search_result_container').hide(); 
               }
            }
        }); 
    }
    
    
    
    //======================== ACADEMIC YEAR ==================================
     
         get_academic_year_by_school($('#ay_school_id').val(), '');
        
        
    function get_academic_year_by_school(ay_school_id, ay_academic_year_id){        
         
        if(!ay_school_id){
           toastr.error('Select School');
            $('#ay_academic_year_id').prop('selectedIndex',0);
           return false;
        }
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR ?>ajax/get_academic_year_by_school",
            data   : { school_id : ay_school_id, academic_year_id : ay_academic_year_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   $('#ay_academic_year_id').html(response);                                     
               }
            }
        }); 
    }
    
    function update_academic_year(){
    
       var ay_school_id = $('#ay_school_id').val();
       var ay_academic_year_id = $('#ay_academic_year_id').val();
       
       if(!ay_school_id){
           toastr.error('Select School');
            $('#ay_academic_year_id').prop('selectedIndex',0);
           return false;
        }
        
       if(!ay_academic_year_id){
           toastr.error('Session Year');           
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR ?>administrator/year/update_academic_year",
            data   : { school_id : ay_school_id, academic_year_id : ay_academic_year_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   toastr.success('Data updated successfully');                   
                   location.reload();
               }else{
                   toastr.error('Data update failed. Please try again'); 
               }
            }
        });        
    }

 
</script>

    
                <!-- /top navigation -->
                
                <div class="right_col" role="main" >                  
                    <style type="text/css">
    .remove{ 
        font-weight: bold;
        font-size: 12px;
        cursor: pointer;
        float: right;
    }
    #message_div{ 
        padding: 10px 10px 10px 10px;
        margin-bottom: 10px;
    }
</style>


<script type="text/javascript">
    $(function () {
        $('#message_div').delay(10000).fadeOut();
        $('.remove').click(function () {
           $('#message_div').hide();
        });
    });
</script>                    <!-- page content -->
                    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-gears "></i><small> School Setting</small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
                
            </div>
           <div class="x_content quick-link">
                 <span>Quick Link:</span>
    <a href="<?php echo WEB_DIR ?>setting/index">School Setting</a>
   | <a href="<?php echo WEB_DIR ?>setting/payment/index">Payment Setting</a>
   | <a href="<?php echo WEB_DIR ?>setting/sms/index">SMS Setting</a>                    
                
   | <a href="<?php echo WEB_DIR ?>setting/emailsetting/index">Email Setting</a>                    
  
   | <a href="<?php echo WEB_DIR ?>setting/openinghour/index">Setting Opening Hour</a>                    
              
            </div>
            
            
             <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                     <ul  class="nav nav-tabs bordered">                     
                        <li  class="active"><a href="#tab_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> School Setting</a> </li> 
                     </ul>
                     <br/>
                     <div class="tab-content">
                         <div class="tab-pane fade in active"id="tab_setting">
                            <div class="x_content"> 
                             <form action="<?php echo WEB_URL?>School/index" name="setting" id="setting" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" value="1" name="id" />
                               
                                          
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Basic Information:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_url">School URL <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_url"  id="school_url" value="windsor-park" placeholder="School URL" required="required" type="text" autocomplete="off">
                                            <div class="text-info">No Space, No Capital Letter, No Special Character. Ex: south-point OR liverpool</div>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_code">School Code</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_code"  id="school_code" value="" placeholder="School Code "  type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_name">School Name <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_name"  id="school_name" value="" placeholder="School Name" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="address">Address <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="" placeholder="Address " required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone">Phone <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="" placeholder="Phone " required="required" minlength="6" maxlength="20" type="number" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="registration_date">Registration Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_date"  id="edit_registration_date" value="" placeholder="Registration Date " required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="" placeholder="Email " required="required" type="email" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>                                    
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_fax">Fax </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_fax"  id="school_fax" value="" placeholder="Fax " type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="footer">Footer </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="footer"  id="footer" value="" placeholder="Footer " type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>                                                                 
                                   
                                </div>   
                                 
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Setting Information:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency">Currency</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency"  id="currency" value="INR" placeholder="Currency " type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency_symbol">Currency Symbol <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency_symbol"  id="currency_symbol" value="₹" placeholder="Currency Symbol " required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>                                   
                                   
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_frontend">Enable Frontend <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_frontend" required="required">
                                                <option value="1" selected="selected">Yes</option>
                                                <option value="0" >No</option>
                                            </select>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="final_result_type">Based on Final Result <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="final_result_type" required="required">
                                                <option value="0" selected="selected">Average of All Exam </option>
                                                <option value="1" >Only Based on Final Exam </option>
                                            </select>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>   
                                </div>    
                                    
                                <div class="row">  
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="language">Language <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="language" id="language" required="required">
                                                <option value="" >--Select--</option>
                                                                                                                                                                                                                                                                 
                                                                                                                                                        <option value="english" selected="selected">English</option>
                                                                                                                                                        <option value="bengali" >Bengali</option>
                                                                                                                                                        <option value="spanish" >Spanish</option>
                                                                                                                                                        <option value="arabic" >Arabic</option>
                                                                                                                                                        <option value="hindi" >Hindi</option>
                                                                                                                                                        <option value="urdu" >Urdu</option>
                                                                                                                                                        <option value="chinese" >Chinese</option>
                                                                                                                                                        <option value="japanese" >Japanese</option>
                                                                                                                                                        <option value="portuguese" >Portuguese</option>
                                                                                                                                                        <option value="russian" >Russian</option>
                                                                                                                                                        <option value="french" >French</option>
                                                                                                                                                        <option value="korean" >Korean</option>
                                                                                                                                                        <option value="german" >German</option>
                                                                                                                                                        <option value="italian" >Italian</option>
                                                                                                                                                        <option value="thai" >Thai</option>
                                                                                                                                                        <option value="hungarian" >Hungarian</option>
                                                                                                                                                        <option value="dutch" >Dutch</option>
                                                                                                                                                        <option value="latin" >Latin</option>
                                                                                                                                                        <option value="indonesian" >Indonesian</option>
                                                                                                                                                        <option value="turkish" >Turkish</option>
                                                                                                                                                        <option value="greek" >Greek</option>
                                                                                                                                                        <option value="persian" >Persian</option>
                                                                                                                                                        <option value="malay" >Malay</option>
                                                                                                                                                        <option value="gujarati" >Gujarati</option>
                                                                                                                                                        <option value="polish" >Polish</option>
                                                                                                                                                        <option value="ukrainian" >Ukrainian</option>
                                                                                                                                                        <option value="panjabi" >Panjabi</option>
                                                                                                                                                        <option value="romanian" >Romanian</option>
                                                                                                                                                        <option value="yoruba" >Yoruba</option>
                                                                                                                                                        <option value="hausa" >Hausa</option>
                                                                                            </select>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="theme_name">Theme <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="theme_name">
                                                <option value="">--Select--</option>
                                                <option style="color: #FFF;background-color: #9F134E;" value="jazzberry-jam" >Jazzberry Jam </option>
                                                <option style="color: #FFF;background-color: #000000;" value="black" >Black  </option>
                                                <option style="color: #FFF;background-color: #745D0B;" value="umber" >Umber </option>
                                                <option style="color: #FFF;background-color: #9370DB;" value="medium-purple" >MediumPurple  </option>
                                                <option style="color: #FFF;background-color: #32CD32;" value="lime-green" >LimeGreen </option>
                                                <option style="color: #FFF;background-color: #663399;" value="rebecca-purple" >RebeccaPurple  </option>
                                                <option style="color: #FFF;background-color: #FB2E50;" value="radical-red" >Radical Red </option>
                                                <option style="color: #FFF;background-color: #1E90FF;" value="dodger-blue" >DodgerBlue </option>
                                                <option style="color: #FFF;background-color: #800000;" value="maroon" >Maroon </option>
                                                <option style="color: #FFF;background-color: #FF8C00;" value="dark-orange" >DarkOrange </option>
                                                <option style="color: #FFF;background-color: #FF1493;" value="deep-pink" >DeepPink </option>
                                                <option style="color: #FFF;background-color: #CC4F26;" value="trinidad" >Trinidad </option>
                                                <option style="color: #FFF;background-color: #2A3F54;" value="slate-gray" selected="selected">SlateGray  </option>
                                                <option style="color: #FFF;background-color: #20B2AA;" value="light-sea-green" >LightSeaGreen  </option>
                                                <option style="color: #FFF;background-color: #001f67;" value="navy-blue" >Navy Blue </option>
                                                <option style="color: #FFF;background-color: #e80000;" value="red" >Red </option>
                                                                                            </select>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_online_admission">Online Admission <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_online_admission" id="enable_online_admission" required="required">
                                                <option value="" >--Select--</option>
                                                <option value="0" >No</option>
                                                <option value="1" selected="selected">Yes</option>
                                            </select>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_rtl">Enable RTL </label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_rtl" required="required">
                                                <option value="0" selected="selected">No</option>
                                                <option value="1" >Yes</option>
                                            </select>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>                            
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="zoom_api_key">Zoom Api Key </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="zoom_api_key"  id="zoom_api_key" value="7a1HERnuQ9eofBx87Or_hg" placeholder="Zoom Api Key "  type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="zoom_secret">Zoom Secret </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="zoom_secret"  id="zoom_secret" value="XQMrn7KdDs8DJ9fKsFTb73gbzD1nXWqq0uxr" placeholder="Zoom Secret "  type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="google_map">Google Map Url </label>
                                            <textarea  class="form-control col-md-6 col-xs-12 textarea-4column"  name="google_map"  id="google_map" placeholder="Google Map">https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703692693!2d90.27923991057244!3d23.780573258035957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1654592170888!5m2!1sen!2sbd</textarea>
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                </div>
                                
                                
                                                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Social Link:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="facebook_url">Facebook URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="https://www.facebook.com/" placeholder="Facebook URL " type="url" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="twitter_url">Twitter URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="https://www.twitter.com/" placeholder="Twitter URL " type="url" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="linkedin_url">Linkedin URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="https://www.linkedin.com/" placeholder="Linkedin URL " type="url" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>                                                                                                           
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="youtube_url">Youtube URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="https://www.youtube.com/" placeholder="Youtube URL " type="url" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                </div>    
                                    
                                <div class="row">    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="instagram_url">Instagram URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="https://www.instagram.com/" placeholder="Instagram URL " type="url" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pinterest_url">Pinterest URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="https://www.pinterest.com/" placeholder="Pinterest URL " type="url" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Other Information:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">                             
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo">Frontend Logo</label>
                                            <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> Upload                                                
                                            <input  class="form-control col-md-7 col-xs-12"  name="frontend_logo" id="frontend_logo"  type="file">
                                            </div>
                                                                                           <img  class="logo-identifier" src="<?php echo WEB_IMG ?>assets/uploads//logo/1682228194-school-front-logo.png" alt="" width="70"/><br/><br/>
                                                <input name="frontend_logo_prev" value="1682228194-school-front-logo.png"  type="hidden">
                                                                                       <div class="help-block"></div> 
                                        </div>
                                    </div>                                   
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo">Admin Logo</label>
                                            <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> Upload                                                
                                            <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo"  type="file">
                                            </div>
                                                                                        <img class="logo-identifier" src="<?php echo WEB_IMG ?>assets/uploads//logo/1682338952-school-admin-logo.png" alt="" width="70"/><br/><br/>
                                                <input name="logo_prev" value="1682338952-school-admin-logo.png"  type="hidden">
                                                                                        <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo">&nbsp;</label>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo">&nbsp;</label>
                                            
                                        </div>
                                    </div>
                                    
                                </div>                                 

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="1" name="id" />
                                        <button id="send" type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>

                                </form>                            </div>  
                        </div>  
                     </div>
                </div>
             </div>
        </div>
    </div>
</div>

<link href="<?php echo WEB_DIR ?>assets/vendors/datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo WEB_DIR ?>assets/vendors/datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
   $('#edit_registration_date').datepicker();
    $("#setting").validate();  
</script>                    <!-- /page content -->
                </div>
                <!-- footer content -->
      <?php
      $this->load->view('footer.php');
      ?>   
                <!-- /footer content -->
            </div>
        </div>
        
        <!-- Bootstrap -->
        <script src="<?php echo WEB_DIR ?>assets/vendors/bootstrap/bootstrap.min.js"></script>    
        
        <!--   Start   -->   
        <link href="<?php echo WEB_DIR ?>assets/vendors/datatables/rowReorder/rowReorder.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo WEB_DIR ?>assets/vendors/datatables/rowReorder/responsive.dataTables.min.css" rel="stylesheet">
        
        <link href="<?php echo WEB_DIR ?>assets/vendors/datatables/buttons.dataTables.min.css" rel="stylesheet"> 
        <link href="<?php echo WEB_DIR ?>assets/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet"> 
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/tools/jquery.dataTables.min.js"></script>
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/tools/dataTables.buttons.min.js"></script>
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/tools/pdfmake.min.js"></script>
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/tools/jszip.min.js"></script>
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/tools/vfs_fonts.js"></script>
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/tools/buttons.html5.min.js"></script> 
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/dataTables.bootstrap.js"></script> 
        
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/rowReorder/dataTables.rowReorder.min.js"></script> 
        <script src="<?php echo WEB_DIR ?>assets/vendors/datatables/rowReorder/dataTables.responsive.min.js"></script> 
    
       <!-- dataTable with buttons end -->       
        <link href="<?php echo WEB_DIR ?>assets/vendors/toastr/toastr.min.css" rel="stylesheet">
       <!-- Custom Theme Scripts -->       
           
       <script src="<?php echo WEB_DIR ?>assets/js/custom.js"></script>  
       
       <script type="text/javascript">
       
       jQuery.extend(jQuery.validator.messages, {
                required: "This field is required.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                equalTo: "Please enter the same value again.",
                remote: "Please fix this field.",
                dateISO: "Please enter a valid date (ISO).",
                maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                minlength: jQuery.validator.format("Please enter at least {0} characters."),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                 range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
            });
            
            toastr.options = {
                "closeButton": true,               
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "300",
                "timeOut": "3000",              
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }


        $(window).on('load', function() {
            $('#preloader').fadeOut('slow', function() { $(this).remove(); });
        });
  
       </script>

</body>
</html>