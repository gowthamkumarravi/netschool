
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
        

        <title>Edit | vds jain</title>
                    <link rel="icon" href="<?php echo WEB_DIR?>assets/uploads//logo/1682338668-favicon-icon.png" type="image/x-icon" />             
                
        
        <!-- Bootstrap -->
        <link href="<?php echo WEB_DIR?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="<?php echo WEB_DIR?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
        <!-- Custom Theme Style -->
                    <link href="<?php echo WEB_DIR?>assets/css/custom.css" rel="stylesheet">
                
                    <link href="<?php echo WEB_DIR?>assets/css/theme/slate-gray.css" rel="stylesheet">
                
        <!-- jQuery -->
        <script src="<?php echo WEB_DIR?>assets/js/jquery-1.11.2.min.js"></script>
        <script src="<?php echo WEB_DIR?>assets/js/jquery.validate.js"></script>
        
         <script type="text/javascript" src="<?php echo WEB_DIR?>assets/vendors/toastr/toastr.min.js"></script>
        
                        
    </head>

    <body class="nav-md">
        <div id="preloader"></div>    
        <div class="container body">
            <div class="main_container">
                 <div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo WEB_DIR?>dashboard/index">
                                    <span >
                        Dot Net Schools                    </span>
                                
                
                                     <img class="logo" src="<?php echo WEB_DIR?>assets/uploads/logo/1682397710-brand-logo.png" style="max-width: 65px;" alt="">
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
            <!-- end navigation -->
 

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
        $('.search_result').html('<p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR?>assets/images/loading.gif" style="width: 40px;" /></p>');
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>dashboard/get_search",
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
            url    : "<?php echo WEB_DIR?>ajax/get_academic_year_by_school",
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
            url    : "<?php echo WEB_DIR?>administrator/year/update_academic_year",
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
                <h3 class="head-title"><i class="fa fa-users"></i><small> Manage Teacher</small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>      
            
            <div class="x_content quick-link">
               Quick Link:
 <a href="<?php echo WEB_DIR?>teacher/department/index">Department</a>

| <a href="<?php echo WEB_DIR?>teacher/teacher/index">Teacher</a>

| <a href="<?php echo WEB_DIR?>teacher/lecture/index">Class Lecture</a>

 
  |  <a href="<?php echo WEB_DIR?>teacher/rating/manage">Rating</a>                         




              
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class=""><a href="#tab_teacher_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> List</a> </li>
                        
                                                
                                                            <li  class=""><a href="<?php echo WEB_URL?>Manage_School/AddTeacher"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> Add</a> </li>                          
                                                     
                          
                        
                                                    <li  class="active"><a href="#tab_edit_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> Edit</a> </li>                          
                         
                            
                         
                         
                        <li class="li-class-list">
                             
                        </li>     
                            
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in " id="tab_teacher_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Joining Date</th>
                                        <th>Is View on Web?</th>
                                        <th>Display Order</th>
                                        <th>Action</th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                <?php
                            foreach($teachers as $row)
                            {
    ?>
                                                                                                           <tr>
                                            <td><?php echo $row->id?></td>
                                            <td>
                                            <img style="height:75px;width:100px;"src="<?php echo WEB_IMG?>image/<?php echo $row->photo?>">
                                                                                            </td>
                                            <td>
                                            <?php echo $row->name?>                                                                                            </td>
                                            <td><?php echo $row->department_id?></td>
                                            <td><?php echo $row->phone?></td>
                                            <td><?php echo $row->email?></td>
                                            <td><?php echo $row->joining_date?></td>
                                            <td><?php echo $row->is_view_on_web?></td>
                                            <td>
                                                <input  class="col-md-7 col-xs-12" itemid="1"  name="display_order[]"  value=""  type="text" autocomplete="off" />
                                            </td>
                                            <td>
                                            <a href="<?php echo WEB_URL?>Manage_School/TeacherUpdate/<?php echo $row->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Edit </a><br>
                                                 
                                                                                                    <a  onclick="get_teacher_modal(1);"  data-toggle="modal" data-target=".bs-teacher-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View </a><br/>
                                                                                                 
                                            </td>
                                        </tr>
                                                
                                                                              
                                                                               <?php
                            }
                            ?>
                                                                               
                                                                                                            </tbody>
                            </table>
                                
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 text-right">
                                            <button type="button" id="fn_display_order" class="btn btn-success">Update Order</button>
                                        </div>
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>
                                                            </div>
                        </div>

                        <div  class="tab-pane fade in " id="tab_add_teacher">
                            <div class="x_content"> 
                               <form action="<?php echo WEB_DIR?>teacher/add" name="add" id="add" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                
                                    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="fn_school_id" type="hidden" name="school_id" id="add_school_id" value="1" />
        </div>
    </div>
                                
                         
                                 <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Basic Information:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="" placeholder="Name" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="national_id">National ID </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="" placeholder="National ID" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="department_id">Department <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="department_id" id="add_department_id" required="required">
                                                <option value="">--Select--</option>
                                                                                                    <option value="1">maths</option>
                                                                                                    <option value="2">science</option>
                                                                                                    <option value="3">English</option>
                                                                                                    <option value="4">social</option>
                                                                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone">Phone <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="" placeholder="Phone" required="required" minlength="6" maxlength="20" type="number" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="gender">Gender <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--Select--</option>
                                                                                                                                                    <option value="male" >Male</option>
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
                                                                                                                                                    <option value="a_positive" >A+</option>
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
                                            <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="" placeholder="Religion" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob">Birth Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="add_dob" value="" placeholder="Birth Date" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address">Present Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="Present Address"></textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="permanent_address">Permanent Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="permanent_address"  placeholder="Permanent Address"></textarea>
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
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="" placeholder="Email" type="email" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="username">Username <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="username"  id="username" value="" placeholder="Username" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="password"  id="password" value="" placeholder="Password" required="required" type="password" minlength="6" maxlength="20" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="salary_grade_id">Salary Grade <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="salary_grade_id" id="add_salary_grade_id" required="required">
                                                <option value="">--Select--</option>                                                                                    
                                                                                           
                                                <option value="19" >Frist Grade</option>
                                                           
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div> 
                                </div>    
                                <div class="row">    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="salary_type">Salary Type <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12" name="salary_type" id="salary_type" required="required">
                                                <option value="">--Select--</option>                                                                                    
                                                <option value="monthly" >Monthly</option>                                           
                                                <option value="hourly" >Hourly</option>                                           
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="role_id">Role <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="role_id" required="required">                                                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="5" >Teacher</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="joining_date">Joining Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="add_joining_date" value="" placeholder="Joining Date" required="required" type="text" autocomplete="off">
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
                                            <label for="is_view_on_web">Is View on Web? </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                                <option value="">--Select--</option>                                                                                    
                                                <option value="1" >Yes</option>                                           
                                                <option value="0" >No</option>                                           
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
                                </div> 
                                    
                                <div class="row">     
                                   
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
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo WEB_DIR?>teacher/index" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                </form>                            </div>
                        </div>  

                                                
                        <div class="tab-pane fade in active" id="tab_edit_teacher">
                            <div class="x_content"> 
                            <form action="<?php echo WEB_URL?>Manage_School/TeacherUpdate/<?php echo $row->id;?>" name="editteacher" id="editteacher" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                
                                    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="fn_school_id" type="hidden" name="school_id" id="edit_school_id" value="1" />
        </div>
    </div>
                                
                                  <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Basic Information:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo $TeacherData->name?>" placeholder="Name" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="national_id">National ID </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="<?php echo $TeacherData->national_id?>" placeholder="National ID" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="department_id">Department <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="department_id" id="edit_department_id" required="required">
                                                <option value="">--Select--</option>                                                                                    
                                                                                           
                                                <option value="1" selected="selected">maths</option>
                                                                                           
                                                <option value="2" >science</option>
                                                                                           
                                                <option value="3" >English</option>
                                                                                           
                                                <option value="4" >social</option>
                                                           
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone">Phone <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo $TeacherData->phone?>" placeholder="Phone" required="required" minlength="6" maxlength="20" type="number" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="gender">Gender <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--Select--</option>
                                                                                                     <option value="male">Male</option>
                                                                                                    <option value="female">Female</option>
                                                                                            </select>
                                        <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="blood_group">Blood Group </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                                <option value="">--Select--</option> 
                                                                                                                                                    <option value="a_positive" >A+</option>
                                                                                                    <option value="a_negative" >A-</option>
                                                                                                    <option value="b_positive" >B+</option>
                                                                                                    <option value="b_negative" >B-</option>
                                                                                                    <option value="o_positive" selected="selected">O+</option>
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
                                            <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="<?php echo $TeacherData->religion?>" placeholder="Religion" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob">Birth Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo $TeacherData->dob?>" placeholder="Birth Date" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">   
                                    
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address">Present Address </label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="Present Address"><?php echo $TeacherData->present_address?></textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="permanent_address">Permanent Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="permanent_address"  placeholder="Permanent Address"><?php echo $TeacherData->permanent_address?></textarea>
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
                                            <label for="email">Email</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo $TeacherData->email?>" placeholder="Email" type="email" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="username">Username <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="username"  readonly="readonly"  id="username" value="<?php echo $TeacherData->name?>" placeholder="Username" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>                                    
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="salary_grade_id">Salary Grade <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="salary_grade_id" id="edit_salary_grade_id" required="required">
                                                <option value="">--Select--</option>                                                                                    
                                                                                           
                                                <option value="19" selected="selected">Frist Grade</option>
                                                           
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="salary_type">Salary Type <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12" name="salary_type" id="edit_salary_type" required="required">
                                                <option value="">--Select--</option>                                                                                    
                                                <option value="monthly" selected="selected">Monthly</option>                                           
                                                <option value="hourly" >Hourly</option>                                           
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div> 
                                </div>    
                                <div class="row">                                     
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="role_id">Role <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="role_id" required="required">
                                                <option value="">--Select--</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <option value="5" selected="selected">Teacher</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="joining_date">Joining Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="edit_joining_date" value="<?php echo $TeacherData->joining_date?>" placeholder="Joining Date" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="resume">Resume </label>                                           
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                      
                                                 <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume" type="file">
                                            </div>
                                            <div class="text-info">Document file format: .pdf, .doc/docx, .ppt/pptx  or .txt</div>                                            <div class="help-block"></div>
                                              
                                        </div>
                                    </div> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="resume">&nbsp;</label>   
                                            <input type="hidden" name="prev_resume" id="prev_resume" value="" />
                                               
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
                                            <label for="is_view_on_web">Is View on Web? </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                                <option value="">--Select--</option>                                                                                    
                                                <option value="1" selected="selected">Yes</option>                                           
                                                <option value="0" >No</option>                                           
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
                                </div>    
                                    
                                <div class="row">    
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
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="other_info">Other Info </label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="Other Info"><?php echo $TeacherData->other_info?></textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="photo"> Photo </label>                                           
                                                <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo"  type="file">
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
                                        <input type="hidden" name="id" id="id" value="1" />
                                        <a href="<?php echo WEB_DIR?>teacher/index" class="btn btn-primary">Cancel</a>
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


<div class="modal fade bs-teacher-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Detail Information</h4>
        </div>
        <div class="modal-body fn_teacher_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_teacher_modal(teacher_id){
         
        $('.fn_teacher_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR?>assets/images/loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo WEB_DIR?>teacher/get_single_teacher",
          data   : {teacher_id : teacher_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_teacher_data').html(response);
             }
          }
       });
    }
</script>
  

<!-- datatable with buttons -->
<link href="<?php echo WEB_DIR?>assets/vendors/datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo WEB_DIR?>assets/vendors/datepicker/datepicker.js"></script>
 
 
 
 
<!-- Super admin js START  -->
 <script type="text/javascript">
     
    $("document").ready(function() {
                     $(".fn_school_id").trigger('change');
             });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();       
        var salary_grade_id = '';
        var department_id = '';
                 
            salary_grade_id =  '19';
            department_id =  '1';
          
        
        if(!school_id){
           toastr.error('Select School');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_salary_grade_by_school",
            data   : { school_id:school_id, salary_grade_id:salary_grade_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(salary_grade_id){
                       $('#edit_salary_grade_id').html(response);
                   }else{
                       $('#add_salary_grade_id').html(response); 
                   }
               }
            }
        }); 
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>teacher/get_department_by_school",
            data   : { school_id:school_id, department_id:department_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(salary_grade_id){
                       $('#edit_department_id').html(response);
                   }else{
                       $('#add_department_id').html(response); 
                   }
               }
            }
        });
        
     
    }); 
    
    
    $('#fn_display_order').on('click', function(){
    
       var school_id = $('#filter_school_id').val();   
       
                  school_id = '2';
        
           
       if(!school_id){
           toastr.error('Select School');
           return false;
       }
       var ids = '';
       var orders = '';
        $("input[name^='display_order']").each(function() {
            orders += $(this).val()+',';
            ids += $(this).attr('itemid')+',';
        });
             
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>teacher/update_display_order",
            data   : { school_id:school_id, ids:ids, orders:orders },               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                    toastr.success('Data updated successfully');                    
                    location.reload();
               }else{
                    toastr.error('Data update failed. Please try again');
                    return false;
               }
            }
        }); 
       
       
    }); 

    
  </script>
  <!-- Super admin js end -->
  
 
<!-- datatable with buttons -->
 <script type="text/javascript">
     
    $('#add_dob').datepicker({startView: 2, endDate: "today"});
    $('#add_joining_date').datepicker();
    $('#edit_dob').datepicker({startView: 2, endDate: "today"});
    $('#edit_joining_date').datepicker();
    
        $(document).ready(function() {
          $('#datatable-responsive').DataTable({
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true,              
              responsive: true
          });
        });
        
    $("#add").validate();     
    $("#editteacher").validate();    
    
    
    function get_teacher_by_school(url){          
        if(url){
            window.location.href = url; 
        }
        return false; 
    }  
    
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
        <script src="<?php echo WEB_DIR?>assets/vendors/bootstrap/bootstrap.min.js"></script>    
        
        <!--   Start   -->   
        <link href="<?php echo WEB_DIR?>assets/vendors/datatables/rowReorder/rowReorder.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo WEB_DIR?>assets/vendors/datatables/rowReorder/responsive.dataTables.min.css" rel="stylesheet">
        
        <link href="<?php echo WEB_DIR?>assets/vendors/datatables/buttons.dataTables.min.css" rel="stylesheet"> 
        <link href="<?php echo WEB_DIR?>assets/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet"> 
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/tools/jquery.dataTables.min.js"></script>
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/tools/dataTables.buttons.min.js"></script>
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/tools/pdfmake.min.js"></script>
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/tools/jszip.min.js"></script>
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/tools/vfs_fonts.js"></script>
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/tools/buttons.html5.min.js"></script> 
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/dataTables.bootstrap.js"></script> 
        
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/rowReorder/dataTables.rowReorder.min.js"></script> 
        <script src="<?php echo WEB_DIR?>assets/vendors/datatables/rowReorder/dataTables.responsive.min.js"></script> 
    
       <!-- dataTable with buttons end -->       
        <link href="<?php echo WEB_DIR?>assets/vendors/toastr/toastr.min.css" rel="stylesheet">
       <!-- Custom Theme Scripts -->       
           
       <script src="<?php echo WEB_DIR?>assets/js/custom.js"></script>  
       
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