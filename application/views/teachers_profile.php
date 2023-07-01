
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
        

        <title>My Profile | ewee</title>
                    <link rel="icon" href="http://localhost/dotnetschools/assets/uploads//logo/1682224490-favicon-icon.png" type="image/x-icon" />             
                
        
        <!-- Bootstrap -->
        <link href="http://localhost/dotnetschools/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="http://localhost/dotnetschools/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
        <!-- Custom Theme Style -->
                    <link href="http://localhost/dotnetschools/assets/css/custom.css" rel="stylesheet">
                
                    <link href="http://localhost/dotnetschools/assets/css/theme/slate-gray.css" rel="stylesheet">
                
        <!-- jQuery -->
        <script src="http://localhost/dotnetschools/assets/js/jquery-1.11.2.min.js"></script>
        <script src="http://localhost/dotnetschools/assets/js/jquery.validate.js"></script>
        
         <script type="text/javascript" src="http://localhost/dotnetschools/assets/vendors/toastr/toastr.min.js"></script>
        
                        
    </head>

    <body class="nav-md">
        <div id="preloader"></div>    
        <div class="container body">
            <div class="main_container">
                 <div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="http://localhost/dotnetschools/dashboard/index">
                                    <span >
                        Dot Net Schools                    </span>
                                
                
                                     <img class="logo" src="http://localhost/dotnetschools/assets/uploads/logo/1682224490-brand-logo.png" style="max-width: 65px;" alt="">
                            </a>
        </div>
        <div class="clearfix" style=""></div>        
        <!-- sidebar menu -->
        
        <?php
        $this->load->view('teacher_menu.php');
        ?>
        <!-- /sidebar menu -->
    </div>
</div>   
                <!-- top navigation -->
  <?php
  $this->load->view('header.php');
  ?>

                <!-- end top navigation -->
 

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
        $('.search_result').html('<p style="padding: 20px;text-align:center;"><img src="http://localhost/dotnetschools/assets/images/loading.gif" style="width: 40px;" /></p>');
        
        $.ajax({       
            type   : "POST",
            url    : "http://localhost/dotnetschools/dashboard/get_search",
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
        
        
    function get_academic_year_by_school(ay_school_id, ay_academic_year_id){        
         
        if(!ay_school_id){
           toastr.error('Select School');
            $('#ay_academic_year_id').prop('selectedIndex',0);
           return false;
        }
         
        $.ajax({       
            type   : "POST",
            url    : "http://localhost/dotnetschools/ajax/get_academic_year_by_school",
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
            url    : "http://localhost/dotnetschools/administrator/year/update_academic_year",
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
                <h3 class="head-title"><i class="fa fa-lock"></i><small> My Profile</small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
                <div class="x_content quick-link">
                 <span>Quick Link:</span>                
<a href="http://localhost/dotnetschools/profile/index">My Profile</a>
| <a href="http://localhost/dotnetschools/profile/password">Reset Password</a>


  
          | <a href="http://localhost/dotnetschools/usercomplain/index">Complain</a>
             | <a href="http://localhost/dotnetschools/userleave/index">Leave Application</a>    
                   
| <a href="http://localhost/dotnetschools/auth/logout">Log Out</a>                     
            </div>
            
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="active"><a href="#tab_profile"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> Profile</a> </li>
                        <li class=""><a href="#tab_social_info"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-share"></i> Social Link</a> </li>
                        <li  class=""><a href="#tab_update"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> Update</a> </li>                          
                    </ul>
                    <br/>                    
                    <div class="tab-content">                  

                        <div  class="tab-pane fade in active" id="tab_profile">
                            <div class="x_content">  
                                <div class="col-md-12">
                                    <div class="profile_img">
                                                                                    <img class="" src="http://localhost/dotnetschools/assets/images/default-user.png" width="100" alt="Avatar" title="Avatar">
                                                                                <h3>gowtham</h3><br/>
                                      </div>
                                  </div>
                                
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>gowtham</td>
                                            <th>Department</th>
                                            <td></td>
                                        </tr>                                                                                
                                        <tr>
                                            <th>Email</th>
                                            <td>gowtham@gmail.com</td>
                                            <th>Phone</th>
                                            <td>123234</td>
                                        </tr>                                                                                
                                        <tr>
                                            <th>Present Address</th>
                                            <td>marriyamman kovil  street</td>
                                            <th>Permanent Address</th>
                                            <td>marriyamman kovil street</td>
                                        </tr>                                                                                
                                        <tr>
                                            <th>Gender</th>
                                            <td>Male</td>
                                            <th>Blood Group</th>
                                            <td>A+</td>
                                        </tr>                                                                                
                                        <tr>
                                            <th>Religion</th>
                                            <td>hindu</td>
                                            <th>Birth Date</th>
                                            <td>Jan 28,2020</td>
                                        </tr>                                                                                
                                        <tr>
                                            <th>Joining Date</th>
                                            <td>Nov 30,-0001</td>
                                            <th>Other Info</th>
                                            <td></td>
                                        </tr>                                                                                
                                        <tr>
                                            <th>Resume</th>
                                            <td>
                                                                                            </td>
                                            <th>Resign Date</th>
                                            <td></td>
                                        </tr>                                                                                
                                        
                                    </tbody> 
                                </table> 
                            </div>
                        </div>  
                        
                         <div  class="tab-pane fade in" id="tab_social_info" > 
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <tbody>           
                                <tr>
                                    <th>Facebook URL</th>
                                    <td></td>       
                                    <th>Linkedin URL</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Twitter URL</th>
                                    <td></td>        
                                    <th>Instagram URL</th>
                                    <td></td>        
                                </tr>
                                <tr>
                                    <th>Pinterest URL</th>
                                    <td></td>
                                    <th>Youtube URL</th>
                                    <td></td>        
                                </tr>
                                <tr>
                                    <th>Is View on Web?</th>
                                    <td colspan="3">No</td>
                                </tr>

                            </tbody>
                        </table>
                        </div>

                       
                        <div class="tab-pane fade in" id="tab_update">
                           <div class="x_content"> 
                            <form action="http://localhost/dotnetschools/profile/update/4" name="profile" id="profile" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Basic Information:</strong></h5>
                                    </div>
                                </div>
                               
                               <div class="row">                                   
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                       <div class="item form-group">
                                           <label for="name">Name <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="gowtham" placeholder="Name" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                       </div>
                                   </div>
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="national_id">National ID </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="india2099" placeholder="National ID" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone">Phone <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="123234" placeholder="Phone" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div> 
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="gender">Gender <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--Select--</option>
                                                                                                                                                    <option value="male" selected="selected">Male</option>
                                                                                                    <option value="female" >Female</option>
                                                                                            </select>
                                        <div class="help-block"></div> 
                                        </div>
                                    </div>
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="blood_group">Blood Group </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                                <option value="">--Select--</option> 
                                                                                                                                                    <option value="a_positive" selected="selected">A+</option>
                                                                                                    <option value="a_negative" >A-</option>
                                                                                                    <option value="b_positive" >B+</option>
                                                                                                    <option value="b_negative" >B-</option>
                                                                                                    <option value="o_positive" >O+</option>
                                                                                                    <option value="o_negative" >O-</option>
                                                                                                    <option value="ab_positive" >AB+</option>
                                                                                                    <option value="ab_negative" >AB-</option>
                                                                                            </select>
                                        <div class="help-block"></div> 
                                        </div>
                                    </div>
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="religion">Religion </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="hindu" placeholder="Religion" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob">Birth Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="28-01-2020" placeholder="Birth Date"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address">Present Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="Present Address">marriyamman kovil  street</textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="permanent_address">Permanent Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="permanent_address"  placeholder="Permanent Address">marriyamman kovil street</textarea>
                                        <div class="help-block"></div>
                                        </div>
                                    </div>
                                   
                               </div>
                           
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Academic Information:</strong></h5>
                                    </div>
                                </div>
                               <div class="row">
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email">Email </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="gowtham@gmail.com" placeholder="Email" type="email" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="username">Username </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="username"  id="username" readonly="readonly" value="freeda" placeholder="Username"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>                           
                                 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="joining_date">Joining Date</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="edit_joining_date" value="30-11--0001" placeholder="Joining Date" readonly="readonly" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                   
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="resume">Resume </label>                                           
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume" type="file">
                                            </div>
                                            <div class="text-info">Document file format: .pdf, .doc/docx, .ppt/pptx  or .txt</div>
                                            <div class="help-block"></div>
                                            
                                             <input type="hidden" name="prev_resume" id="prev_resume" value="" />
                                              
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
                                            <label for="is_view_on_web">Is View on Web? </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                                <option value="">--Select--</option>                                                                                    
                                                <option value="1" >Yes</option>                                           
                                                <option value="0" selected="selected">No</option>                                           
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="facebook_url">Facebook URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="" placeholder="Facebook URL" type="url" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="linkedin_url">Linkedin URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="" placeholder="Linkedin URL" type="url" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="twitter_url">Twitter URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="" placeholder="Twitter URL" type="url" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>                                   
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="instagram_url">Instagram URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="" placeholder="Instagram URL" type="url" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="youtube_url">Youtube URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="" placeholder="Youtube URL" type="url" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pinterest_url">Pinterest URL </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="" placeholder="Pinterest URL" type="url" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                               </div> 
                               
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Other Info:</strong></h5>
                                    </div>
                                </div>
                               <div class="row">
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="other_info">Other Info </label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="Other Info"></textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                   <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="photo">Photo </label>                                           
                                                <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" placeholder="" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <input type="hidden" name="prev_photo" id="prev_photo" value="" />
                                                                                    </div>
                                    </div> 
                               </div>
                             
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="http://localhost/dotnetschools/profile/index" class="btn btn-primary">Cancel</a>
                                        <input type="hidden" name="id" id="id" value="4" />
                                        <input type="hidden" name="user_type" id="user_type" value="teacher" />
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

  <!-- bootstrap-datetimepicker -->
 <link href="http://localhost/dotnetschools/assets/vendors/datepicker/datepicker.css" rel="stylesheet">
 <script src="http://localhost/dotnetschools/assets/vendors/datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#dob').datepicker({startView: 2, endDate: "today"});
  $('#joining_date').datepicker();
  $("#profile").validate(); 
  </script>                     <!-- /page content -->
                </div>
                <!-- footer content -->
                <footer class="footer no-print">
    <div class="pull-right">
        <p class="white">
                             xcc                     </p>       
    </div>
    <div class="clearfix"></div>
</footer>   
                <!-- /footer content -->
            </div>
        </div>
        
        <!-- Bootstrap -->
        <script src="http://localhost/dotnetschools/assets/vendors/bootstrap/bootstrap.min.js"></script>    
        
        <!--   Start   -->   
        <link href="http://localhost/dotnetschools/assets/vendors/datatables/rowReorder/rowReorder.dataTables.min.css" rel="stylesheet">
        <link href="http://localhost/dotnetschools/assets/vendors/datatables/rowReorder/responsive.dataTables.min.css" rel="stylesheet">
        
        <link href="http://localhost/dotnetschools/assets/vendors/datatables/buttons.dataTables.min.css" rel="stylesheet"> 
        <link href="http://localhost/dotnetschools/assets/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet"> 
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/tools/jquery.dataTables.min.js"></script>
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/tools/dataTables.buttons.min.js"></script>
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/tools/pdfmake.min.js"></script>
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/tools/jszip.min.js"></script>
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/tools/vfs_fonts.js"></script>
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/tools/buttons.html5.min.js"></script> 
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/dataTables.bootstrap.js"></script> 
        
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/rowReorder/dataTables.rowReorder.min.js"></script> 
        <script src="http://localhost/dotnetschools/assets/vendors/datatables/rowReorder/dataTables.responsive.min.js"></script> 
    
       <!-- dataTable with buttons end -->       
        <link href="http://localhost/dotnetschools/assets/vendors/toastr/toastr.min.css" rel="stylesheet">
       <!-- Custom Theme Scripts -->       
           
       <script src="http://localhost/dotnetschools/assets/js/custom.js"></script>  
       
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