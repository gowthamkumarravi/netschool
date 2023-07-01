
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
        

        <title>Edit | Dot Net Schools</title>
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
        $this->load->view('admin_menu');
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
                                <div class="item form-group">        
                                    <select  class="form-control col-md-7 col-xs-12" name="search_school_id" id="search_school_id" required="required">
                                        <option value="">--Select School--</option>
                                                                                    <option value="1" >vds jain</option>
                                                                            </select>       
                                </div>
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
                                        
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="item form-group">        
                                    <select  class="form-control col-md-7 col-xs-12" name="ay_school_id" id="ay_school_id" required="required" onchange="get_academic_year_by_school(this.value, '');">
                                        <option value="">--Select School--</option>
                                                                                    <option value="1" >vds jain</option>
                                                                            </select>       
                                </div>
                            </div>
                        
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
                <h3 class="head-title"><i class="fa fa-users"></i><small> Manage Student</small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
          
            <div class="x_content quick-link">
                <span>Quick Link:</span>
    <a href="<?php echo WEB_DIR?>student/type/index"> Student Type</a>
    | <a href="<?php echo WEB_DIR?>student/index">Manage Student</a>                    
    | <a href="<?php echo WEB_DIR?>student/add">Admit Student</a>
    
   | <a href="<?php echo WEB_DIR?>student/bulk/add">Bulk Admission</a>                    
   | <a href="<?php echo WEB_DIR?>student/admission/index">Online Admission</a>                    
    
   | <a href="<?php echo WEB_DIR?>student/activity/index"> Student Activity</a>                    
  
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        
                         
                            <li class=""><a href="#tab_student_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> List</a> </li>
                            <li  class=""><a href="<?php echo WEB_URL?>Student/InsertStudent"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> Add</a> </li>                          
                            <li  class="active"><a href="#tab_edit_student"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> Edit</a> </li>                          
                                                         
                            
                         
                        <li class="li-class-list">
                                                        
                                <form action="<?php echo WEB_DIR?>student/index" name="filter" id="filter" class="form-horizontal form-label-left" method="post" accept-charset="utf-8">
                                    <select  class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id"  onchange="get_class_by_school(this.value, '');">
                                            <option value="">--Select School--</option> 
                                                                                    <option value="1" selected="selected" > vds jain</option>
                                           
                                    </select>
                                    <select  class="form-control col-md-7 col-xs-12" id="filter_class_id" name="class_id"  style="width:auto;" onchange="this.form.submit();">
                                         <option value="">--Select--</option> 
                                                                                                                                    <option value="1">1st standard</option> 
                                                                                            <option value="2">2nd standard</option> 
                                                                                            <option value="3">3rd standard</option> 
                                                                                                                        </select>
                                   </form>                            
                                                    </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in " id="tab_student_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                                                                     <th>School</th>
                                                                                <th>Photo</th>
                                        <th>Name</th>
                                        <th>Group</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Roll No</th>
                                        <th>Email</th>
                                        <th>Action</th>                                            
                                    </tr>
                                </thead> 
                                <tbody>  
                                <?php
                                       foreach($emrolldata as $row)
                                       {
                                        ?>
                                           <tr id="student_<?php echo $row->id;?>">
                                        <td><?php echo $row->id?></td> 
                                        <td><?php echo $row->school_name?></td>
                                        <td><img style="height:75px;width:100px;"src="<?php echo WEB_IMG?>image/<?php echo $row->photo?>"></td>
                                        <td><?php echo $row->name?></td>
                                        <td><?php echo $row->group?></td>
                                        <td><?php echo $row->name?></td>
                                        <td><?php echo $row->s_name?></td>
                                        <td><?php echo $row->roll_no?></td>
                                        <td><?php echo $row->email?></td>
                                            <td>
                                            <a href="<?php echo WEB_URL?>Student/UpdateAdminStuent/<?php echo $row->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                                                                                                                       <a href="javascript:void(0);" onclick="get_student_modal(7);"  data-toggle="modal" data-target=".bs-student-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                                                                                                       <a href="#" onclick="return DeleteStudent('<?php echo $row->id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                                                                                                     <select  class="form-control col-md-7 col-xs-12 status-type"  name="status_type"  id="status_type" onchange="update_status_type('7', this.value);">
                                                        <option value="regular" selected="selected">Regular</option>
                                                        <option value="drop" >Drop</option>
                                                        <option value="transfer" >Transfer</option>
                                                        <option value="passed" >Passed</option>
                                                    </select>
                                                    
                                            </td>
                                        </tr>
                                        <?php
                                       }
                                       ?>
                                                                                                                 
                                                                                                            </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in " id="tab_add_student">
                            <div class="x_content"> 
                               <form action="<?php echo WEB_DIR?>student/add" name="add" id="add" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                
                                <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">School Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select  class="form-control col-md-7 col-xs-12 fn_school_id" name="school_id" id="add_school_id" required="required">
            <option value="">--Select School--</option>
                            <option value="1" selected="selected">vds jain</option>
                    </select>
        <div class="help-block"></div>
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
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="add_name" value="" placeholder="Name" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_no">Admission  No <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="admission_no"  id="add_admission_no" value="" placeholder="Admission  No" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_date">Admission Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="admission_date"  id="add_admission_date" value="" placeholder="Admission Date" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label  for="dob">Birth Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="add_dob" value="" placeholder="Birth Date" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                    </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="gender">Gender <span class="required">*</span></label>
                                              <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="add_gender" required="required">
                                                <option value="">--Select--</option>
                                                                                                                                                    <option value="male" >Male</option>
                                                                                                    <option value="female" >Female</option>
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="blood_group">Blood Group</label>
                                              <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="add_blood_group">
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
                                              <label for="religion">Religion</label>
                                              <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="add_religion" value="" placeholder="Religion" type="text" autocomplete="off">
                                               <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                              <label for="caste">Caste</label>
                                              <input  class="form-control col-md-7 col-xs-12"  name="caste"  id="add_caste" value="" placeholder="Caste" type="text" autocomplete="off">
                                               <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                    
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="phone">Phone <span class="required">*</span></label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="add_phone" value="" placeholder="Phone" required="required" minlength="6" maxlength="20" type="number" autocomplete="off">
                                             <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                           <label for="email">Email </label>
                                           <input  class="form-control col-md-7 col-xs-12"  name="email"  id="add_email" value="" placeholder="Email" type="email" autocomplete="off">
                                           <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="national_id">National ID </label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="add_national_id" value="" placeholder="National ID" type="text" autocomplete="off">
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
                                             <label for="type_id">Student Type</label>
                                                <select  class="form-control col-md-7 col-xs-12" name="type_id" id="add_type_id">
                                                <option  value="0">Select Type</option>
<?php

                foreach($school_type as $row)
                {
                    
            ?>
           
            <option value="<?php echo $row->id?>">
            <?php echo $row->type?></option>  
        
          <?php
          }
          ?> 
                                                                                                </select>
                                             <div class="help-block"></div>
                                         </div>
                                     </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="class_id">Class <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="class_id" id="add_class_id" required="required" onchange="get_section_by_class(this.value, '');">
                                            <?php

foreach($class as $row)
{
    
?>

<option value="<?php echo $row->id?>">
<?php echo $row->name?></option>  

<?php
}
?>  
                                                                                          </select>
                                           <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                           <label for="section_id">Section <span class="required">*</span></label>
                                           <select  class="form-control col-md-7 col-xs-12 quick-field" name="section_id" id="add_section_id" required="required" onchange="get_roll_no(this.value);">
                                           <?php

foreach($section as $row)
{
    
?>

<option value="<?php echo $row->id?>">
<?php echo $row->name?></option>  

<?php
}
?>
                                           </select>
                                           <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="group">Group </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="group" id="add_group">
                                                <option value="">--Select--</option>
                                                                                                                                                    <option value="science" >Science</option>
                                                                                                    <option value="arts" >Arts</option>
                                                                                                    <option value="commerce" >Commerce</option>
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                <div class="row"> 
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="roll_no">Roll No <span class="required">*</span></label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="roll_no"  id="add_roll_no" value="" placeholder="Roll No" required="required" type="text" autocomplete="off">
                                             <div class="help-block"></div>
                                         </div>
                                     </div>                               
                               
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="registration_no">Registration No</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_no"  id="add_registration_no" value="" placeholder="Registration No" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="discount_id">Discount</label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="discount_id" id="add_discount_id">
                                            <?php

foreach($discount as $row)
{
    
?>

<option value="<?php echo $row->id?>">
<?php echo $row->title?></option>  

<?php
}
?>                                                    
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="second_language">Second Language</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="second_language"  id="add_second_language" value="" placeholder="Second Language" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                
                               
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong>Father Information:</strong></h5>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_name">Father Name</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_name"  id="add_father_name" value="" placeholder="Father Name" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_phone">Father Phone </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_phone"  id="add_father_phone" value="" placeholder="Father Phone"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_education">Father Education </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_education"  id="add_father_education" value="" placeholder="Father Education"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_profession">Father Profession</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_profession"  id="add_father_profession" value="" placeholder="Father Profession"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_designation">Father Designation</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_designation"  id="add_father_designation" value="" placeholder="Father Designation"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label >Father Photo</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="father_photo"  id="add_father_photo" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong>Mother Information:</strong></h5>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_name">Mother Name</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_name"  id="add_mother_name" value="" placeholder="Mother Name" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_phone">Mother Phone</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_phone"  id="add_mother_phone" value="" placeholder="Mother Phone"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_education">Mother Education</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_education"  id="add_mother_education" value="" placeholder="Mother Education"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_profession">Mother Profession</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_profession"  id="add_mother_profession" value="" placeholder="Mother Profession"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_designation">Mother Designation</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_designation"  id="add_mother_designation" value="" placeholder="Mother Designation"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label >Mother Photo</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="mother_photo"  id="add_mother_photo" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Guardian Information:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="is_guardian">Is Guardian? <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="is_guardian" id="add_is_guardian" required="required" onchange="check_guardian_type(this.value);">
                                                <option value="">--Select--</option>
                                                <option value="father" >Father</option>
                                                <option value="mother" >Mother</option>
                                                <option value="other" >Other</option>
                                                <option value="exist_guardian" >Guardian Exist</option>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="fn_existing_guardian display">
                                        <div class="col-md-3 col-sm-3 col-xs-12"> 
                                            <div class="item form-group">
                                                <label for="guardian_id">Guardian <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12 quick-field" name="guardian_id" id="add_guardian_id" onchange="get_guardian_by_id(this.value);">
                                                    <option value="">--Select--</option>
                                                                                                            <option value="1" >sagayamary</option>
                                                                                                            <option value="2" >sagayamary</option>
                                                                                                            <option value="3" >rajasekar</option>
                                                                                                            <option value="4" >sagayamary</option>
                                                                                                            <option value="5" >lakshmi</option>
                                                                                                            <option value="6" >amutha</option>
                                                                                                            <option value="7" >amutha</option>
                                                                                                            <option value="8" >rerer</option>
                                                                                                            <option value="9" >ravi</option>
                                                                                                            <option value="10" >2323</option>
                                                                                                            <option value="11" >g</option>
                                                                                                    </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>                                  
                                    </div>
                                                                        
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="relation_with">Relation With Guardian </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="relation_with"  id="add_relation_with" value="" placeholder="Relation With Guardian" type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div> 
                                </div> 
                                   
                                
                                <div class="display fn_except_exist"> 
                                    <div class="row"> 

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_name">Name <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_name"  id="add_gud_name" value="" placeholder="Name" required="required" type="text">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_phone">Phone <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_phone"  id="add_gud_phone" value="" placeholder="Phone" minlength="6" maxlength="20" required="required" type="number">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_email">Email </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_email"  id="add_gud_email" value="" placeholder="Email"  type="email">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_profession">Profession</label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_profession"  id="add_gud_profession" value="" placeholder="Profession"  type="text">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>  
                                    </div>    
                                    <div class="row">     
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_religion">Religion </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_religion"  id="add_gud_religion" value="" placeholder="Religion" type="text">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_national_id">National ID</label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_national_id"  id="add_gud_national_id" value="" placeholder="National ID"  type="text">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_username">Username <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="gud_username"  id="add_gud_username" value="Gud13460" placeholder="Username"  type="text" required="required">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>                                        

                                    </div>
                                    
                                    <div class="row">    
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_present_address"> Address</label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="gud_present_address"  id="add_gud_present_address" placeholder=" Address"></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gud_permanent_address"> Address</label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="gud_permanent_address"  id="add_gud_permanent_address" placeholder=" Address"></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="other_info">Other Info </label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="gud_other_info"  id="add_gud_other_info" placeholder="Other Info"></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title">
                                            <strong>
                                            Address Information: 
                                            </strong>
                                            Same as Guarduan Address <input  class=""  name="same_as_guardian"  id="same_as_guardian" value="1"  type="checkbox" >
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">   
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                             <label for="present_address">Present Address </label>
                                              <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="add_present_address"  placeholder="Present Address"></textarea>
                                              <div class="help-block"></div>
                                         </div>
                                     </div>                                    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                            <label for="permanent_address">Permanent Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="add_permanent_address"  placeholder="Permanent Address"></textarea>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                           
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Previous School:</strong></h5>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_school">School Name </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="previous_school"  id="add_previous_school" value="" placeholder="School Name"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_class">Class </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="previous_class"  id="add_previous_class" value="" placeholder="Previous Class"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label >Transfer Certificate </label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="transfer_certificate"  id="add_transfer_certificate" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 1200px, Max-H: 600px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    
                                </div>
                                   
                                
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong> Other Information:</strong></h5>
                                    </div>
                                </div>    
                                <div class="row">
                                 
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                     <div class="item form-group">
                                        <label for="username">Username <span class="required">*</span></label>
                                        <input  class="form-control col-md-7 col-xs-12"  name="username"  id="add_username" value="" placeholder="Username" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                     </div>
                                 </div>
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                     <div class="item form-group">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <input  class="form-control col-md-7 col-xs-12"  name="password"  id="add_password" value="" placeholder="Password" required="required" type="password" minlength="6" maxlength="20" autocomplete="off">
                                        <div class="help-block"></div>
                                     </div>
                                 </div>
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                     <div class="item form-group">
                                        <label for="health_condition">Health Condition </label>
                                        <input  class="form-control col-md-7 col-xs-12"  name="health_condition"  id="add_health_condition" value="" placeholder="Health Condition" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                     </div>
                                 </div>
                            </div>
                             <div class="row">                                     
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                            <label for="other_info">Other Info</label> 
                                            <textarea  class="form-control col-md-6 col-xs-12 textarea-4column"  name="other_info"  id="add_other_info" placeholder="Other Info"></textarea>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label >Photo</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="add_photo" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                         </div>
                                     </div>                                    
                                </div>
                                                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" id="role_id" name="role_id" value="4" />
                                        <a  href="<?php echo WEB_URL?>Student/InsertStudent" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                </form>                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong>Instruction: </strong> Please add Guardian, Class & Section before add Student.</div>
                                </div>
                                
                            </div>
                        </div>  

                                                
                        <div class="tab-pane fade in active" id="tab_edit_student">
                            <div class="x_content"> 
                            <form action="<?php echo WEB_URL?>Student/UpdateAdminStuent/<?php echo $StudentData->id;?>" name="edit" id="edit" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                               
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
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo $StudentData->name;?>" placeholder="Name" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_no">Admission  No <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="admission_no"  id="admission_no" value="<?php echo $StudentData->admission_no;?>" placeholder="Admission  No" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_date">Admission Date<span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="admission_date"  id="edit_admission_date" value="<?php echo $StudentData->admission_date;?>" placeholder="Admission Date" required="required" type="text" autocomplete="off">
                                            <div class="help-block"></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label  for="dob">Birth Date <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo $StudentData->dob;?>" placeholder="Birth Date" required="required" type="text" autocomplete="off">
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
                                                <option  value="Male" <?php echo $StudentData->gender == "Male"?"selected":""?> >Male</option>   
                                                <option value="Female" <?php echo $StudentData->gender == "Female"?"selected":""?>>Female</option>
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="blood_group">Blood Group</label>
                                              <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                                <option value="">--Select--</option>
                                                                                                     <option value="a_positive" >A+</option>
                                                                                                    <option value="a_negative"  >A-</option>
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
                                              <label for="religion">Religion</label>
                                              <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="add_religion" value="<?php echo $StudentData->religion;?>" placeholder="Religion" type="text" autocomplete="off">
                                               <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                              <label for="caste">Caste</label>
                                              <input  class="form-control col-md-7 col-xs-12"  name="caste"  id="caste" value="<?php echo $StudentData->caste;?>" placeholder="Caste" type="text" autocomplete="off">
                                               <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="phone">Phone <span class="required">*</span></label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="add_phone" value="<?php echo $StudentData->phone;?>" placeholder="Phone" required="required" minlength="6" maxlength="20" type="number" autocomplete="off">
                                             <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="email">Email </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"   id="email" value="<?php echo $StudentData->email;?>" placeholder="Email" type="email" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="national_id">National ID </label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="<?php echo $StudentData->national_id;?>" placeholder="National ID" type="text" autocomplete="off">
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
                                             <label for="type_id">Student Type</label>
                                                <select  class="form-control col-md-7 col-xs-12" name="type_id" id="edit_type_id">
                                                <option  value="0">Select Type</option>
                                                
                                                <?php
                                                foreach($school_type as $row)
                                                {
                                                ?>
                                                
                                                <option value="<?php echo $row->id?>">
                                                <?php echo $row->type?></option> 
                                               
                                               <?php
                                                }
                                                ?>  
     
                                                                                                </select>
                                             <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="class_id">Class <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="class_id" id="edit_class_id" required="required"  onchange="get_section_by_class(this.value, '');">
                                           
                                           <?php
                                            foreach($class as $row)
                                            {
                                            ?>
                                            
                                            <option value="<?php echo $row->id?>">
                                            <?php echo $row->name?></option>  
                                            
                                            <?php
                                            }
                                            ?>  
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="section_id">Section <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="section_id" id="edit_section_id" >
                                            
                                            <?php
                                            foreach($section as $row)
                                            {
                                            ?>
                                           
                                           <option value="<?php echo $row->id?>">
                                            <?php echo $row->name?></option>  
                                            
                                            <?php
                                            }
                                            ?>  
                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="group">Group </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="group" id="group">
                                                <option value="">--Select--</option>
                                                                                                    <option value="science" >Science</option>
                                                                                                    <option value="arts" >Arts</option>
                                                                                                    <option value="commerce" >Commerce</option>
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>                                     
                                </div>
                                    
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="roll_no">Roll No <span class="required">*</span></label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="roll_no"  id="roll_no"  value="" placeholder="Roll No" required="required" type="text" autocomplete="off">
                                             <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="registration_no">Registration No</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_no"  id="registration_no" value="<?php echo $StudentData->dob;?>" placeholder="Registration No" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="discount_id">Discount</label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="discount_id" id="edit_discount_id">
                                            
                                            <?php
                                            foreach($discount as $row)
                                            {
                                            ?>

                                            <option value="<?php echo $row->id?>">
                                            <?php echo $row->title?></option>  
                                        
                                            <?php
                                            }
                                            ?>  
                                                                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="second_language">Second Language</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="second_language"  id="second_language" value="<?php echo $StudentData->second_language;?>" placeholder="Second Language" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                
                                  
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong>Father Information:</strong></h5>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_name">Father Name</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_name"  id="father_name" value="<?php echo $StudentData->father_name;?>" placeholder="Father Name" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_phone">Father Phone</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_phone"  id="father_phone" value="<?php echo $StudentData->father_phone;?>" placeholder="Father Phone"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_education">Father Education </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_education"  id="father_education" value="<?php echo $StudentData->father_education;?>" placeholder="Father Education"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_profession">Father Profession</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_profession"  id="father_profession" value="<?php echo $StudentData->father_profession;?>" placeholder="Father Profession"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_designation">Father Designation</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_designation"  id="father_designation" value="<?php echo $StudentData->father_designation;?>" placeholder="Father Designation"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label >Father Photo</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                              
                                                  <input  class="form-control col-md-7 col-xs-12"  name="father_photo"  id="father_photo" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_father_photo" id="prev_father_photo" value="" />
                                                                                     </div>
                                     </div> 
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong>Mother Information:</strong></h5>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_name">Mother Name</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_name"  id="mother_name" value="<?php echo $StudentData->mother_name;?>" placeholder="Mother Name" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_phone">Mother Phone</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_phone"  id="mother_phone" value="<?php echo $StudentData->mother_phone;?>" placeholder="Mother Phone"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_education">Mother Education</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_education"  id="mother_education" value="<?php echo $StudentData->mother_education;?>" placeholder="Mother Education"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_profession">Mother Profession</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_profession"  id="mother_profession" value="<?php echo $StudentData->mother_profession;?>" placeholder="Mother Profession"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_designation">Mother Designation</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_designation"  id="mother_designation" value="<?php echo $StudentData->mother_designation;?>" placeholder="Mother Designation"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label >Mother Photo</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                
                                                <input  class="form-control col-md-7 col-xs-12"  name="mother_photo"  id="mother_photo" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 120px, Max-H: 130px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_mother_photo" id="prev_mother_photo" value="" />
                                                                                     </div>
                                     </div>
                                </div>
                                
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Guardian Information:</strong></h5>
                                    </div>
                                </div>
                                                               
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="guardian_id">Guardian Name <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="guardian_id" id="edit_guardian_id" required="required">
                                            <?php
                                            foreach($guardian as $row)
                                            {
                                            ?>

                                            <option value="<?php echo $row->id?>">
                                            <?php echo $row->name?></option>  
                                        
                                            <?php
                                            }
                                            ?> 
                                                                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="relation_with">Relation With Guardian </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="relation_with"  id="relation_with" value="" placeholder="Relation With Guardian"  type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>                                       
                                </div>
                                
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Address Information:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                             <label for="present_address">Present Address</label>
                                              <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="add_present_address"  placeholder="Present Address"><?php echo $StudentData->present_address;?></textarea>
                                              <div class="help-block"></div>
                                         </div>
                                     </div>                                    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                            <label for="permanent_address">Permanent Address</label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="add_permanent_address"  placeholder="Permanent Address"><?php echo $StudentData->permanent_address;?></textarea>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                                                
                              
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Previous School:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">                 
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_school">School Name </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="previous_school"  id="previous_school" value="<?php echo $StudentData->previous_school;?>" placeholder="School Name"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_class">Previous Class</label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="previous_class"  id="previous_class" value="<?php echo $StudentData->previous_class;?>" placeholder="Previous Class"  type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                   
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label >Transfer Certificate</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="transfer_certificate"  id="transfer_certificate" type="file">
                                            </div>
                                            <div class="text-info">Dimension:- Max-W: 1200px, Max-H: 600px</div>
                                            <div class="text-info">Image file format: .jpg, .jpeg, .png or .gif</div>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_transfer_certificate" id="prev_transfer_certificate" value="" />
                                                                                     </div>
                                     </div>                                    
                                </div>
                              
                                                                
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong>Other Information:</strong></h5>
                                    </div>
                                </div>    
                                <div class="row">                  
                                                                         
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="username">Username </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="username"  id="username" readonly="readonly" value="" placeholder="Username" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="health_condition">Health Condition </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="health_condition"  id="health_condition" value="<?php echo $StudentData->health_condition;?>" placeholder="Health Condition" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="status_type">Status </label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="status_type"  id="status_type">
                                                <option value="regular" selected="selected">Regular</option>
                                                <option value="drop" >Drop</option>
                                                <option value="transfer" >Transfer</option>
                                                <option value="passed" >Passed</option>
                                            </select>
                                            <div class="help-block"></div>
                                         </div>
                                     </div>
                                </div>
                                <div class="row">     
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                           <label for="other_info">Other Info</label> 
                                           <textarea  class="form-control col-md-6 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="Other Info"><?php echo $StudentData->other_info;?></textarea>
                                           <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label >Photo</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Upload                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
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
                                        <input type="hidden" name="id" id="id" value="8" />
                                        <a href="<?php echo WEB_URL?>Student/InsertStudent" class="btn btn-primary">Cancel</a>
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

<div class="modal fade bs-invoice-modal-lg no-print_" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 999999;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header  no-print">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Detail Information</h4>
        </div>
          <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="font-weight: bold;margin-top: 01px;">
            <p class="red"></p>
            <p class="green"></p>
        </div>
          <div class="modal-body fn_invoice_data" style="padding-top: 30px;"></div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_invoice_modal(invoice_id){
       
        $('.fn_news_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR?>assets/images/loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo WEB_DIR?>accounting/invoice/get_single_invoice",
          data   : {invoice_id:invoice_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_invoice_data').html(response);
             }
          }
       });
    }
    
        
</script>
<style>
    @media print {
    body.modalprinter * {
        visibility: hidden;
    }

    body.modalprinter .modal-dialog.focused {
        position: absolute;
        padding: 0;
        margin: 0;
        left: 0;
        top: 0;
    }

    body.modalprinter .modal-dialog.focused .modal-content {
        border-width: 0;
    }

    body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title,
    body.modalprinter .modal-dialog.focused .modal-content .modal-body,
    body.modalprinter .modal-dialog.focused .modal-content .modal-body * {
        visibility: visible;
        width: 100%;
    }

    body.modalprinter .modal-dialog.focused .modal-content .modal-header,
    body.modalprinter .modal-dialog.focused .modal-content .modal-body {
        padding: 0;
        width: 100%;
    }

    body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title {
        margin-bottom: 20px;
    }
}
</style>
<script>
  $().ready(function () {
    $('.modal.printable').on('shown.bs.modal', function () {
        $('.modal-dialog', this).addClass('focused');
        $('body').addClass('modalprinter');

    }).on('hidden.bs.modal', function () {
        $('.modal-dialog', this).removeClass('focused');
        $('body').removeClass('modalprinter');
    });
  });
</script>
 


<div class="modal fade bs-student-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Detail Information</h4>
        </div>
        <div class="modal-body fn_student_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_student_modal(student_id){
         
        $('.fn_student_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR?>assets/images/loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo WEB_DIR?>student/get_single_student",
          data   : {student_id : student_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_student_data').html(response);
             }
          }
       });
    }
</script>


<div class="modal fade bs-activity-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Detail Information</h4>
        </div>
        <div class="modal-body fn_activity_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_activity_modal(activity_id){
         
        $('.fn_activity_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR?>assets/images/loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo WEB_DIR?>student/activity/get_single_activity",
          data   : {activity_id : activity_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_activity_data').html(response);
             }
          }
       });
    }
</script>

  
<!-- bootstrap-datetimepicker -->
<link href="<?php echo WEB_DIR?>assets/vendors/datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo WEB_DIR?>assets/vendors/datepicker/datepicker.js"></script>

 
<!-- Super admin js START  -->
<script>
function DeleteStudent(id){
    var confText = confirm("do you want to delete?");
    if(confText){
      $.ajax({
         url:"<?php echo WEB_URL?>Student/ajaxStudentDelete",
         data:{id:id},
         type:"POST",
         success:function(result){
         var obj = JSON.parse(result);
            $('#student_'+id).remove();
            alert(obj.message);
         }
      });
     
    }
    return false;
}
</script>
 <script type="text/javascript">
     
    var edit = false;
         
    $("document").ready(function() {
                     $("#edit_school_id").trigger('change');   
             });
    
               edit = true; 
              
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();        
        var class_id = '';
        var guardian_id = '';       
        var discount_id = ''; 
        var type_id = ''; 
        
                        class_id =  '3';
                guardian_id =  '8';
                discount_id =  '0';
                type_id =  '1';
          
        
        if(!school_id){
           toastr.error('Select School');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_class_by_school",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   if(edit){
                       $('#edit_class_id').html(response);   
                   }else{
                       $('#add_class_id').html(response);   
                   }
                                    
                   get_guardian_by_school(school_id, guardian_id);
                   get_discount_by_school(school_id, discount_id);
                   get_student_type_by_school(school_id, type_id);
               }
            }
        });
    }); 
    
    
    function get_guardian_by_school(school_id, guardian_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_guardian_by_school",
            data   : { school_id:school_id, guardian_id: guardian_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_guardian_id').html(response);
                   }else{
                       $('#add_guardian_id').html(response); 
                   }
               }
            }
        });
    }
        
    function get_discount_by_school(school_id, discount_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_discount_by_school",
            data   : { school_id:school_id, discount_id: discount_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_discount_id').html(response);
                   }else{
                       $('#add_discount_id').html(response); 
                   }
               }
            }
        });
    }
    
    function get_student_type_by_school(school_id, type_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_student_type_by_school",
            data   : { school_id:school_id, type_id: type_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_type_id').html(response);
                   }else{
                       $('#add_type_id').html(response); 
                   }
               }
            }
        });
    }
    
     
    $('#add_admission_date').datepicker();
    $('#edit_admission_date').datepicker();
    $('#add_dob').datepicker({startView: 2, endDate: "today"});
    $('#edit_dob').datepicker({startView: 2, endDate: "today"});
  
            get_section_by_class('3', '3');
        
    function get_section_by_class(class_id, section_id){       
        
        var school_id = '';
                        
            school_id = $('#edit_school_id').val();
          
          
        
       if(!school_id){
           toastr.error('Select School');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_section_by_class",
            data   : { school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   if(edit){
                       $('#edit_section_id').html(response);
                   }else{
                       $('#add_section_id').html(response);
                   }
               }
            }
        });  
                     
        
   }
   
    function get_roll_no(section_id){       
        
        if(!section_id){ $('#add_roll_no').val('');  return false; }
        
        var school_id = $('#add_school_id').val();
        var class_id = $('#add_class_id').val();
         
        if(!school_id){
           toastr.error("Select School");
           return false;
        }        
        if(!class_id){
           toastr.error("Select Class");
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>student/get_roll_no",
            data   : { school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
                if(response)
                {
                   $('#add_roll_no').val(response);                   
                }
            }
        });  
                     
        
   }
   
  </script>
  
  <!-- datatable with buttons -->
 <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
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
        
        
      
        function check_guardian_type(guardian_type){
           
            $('#add_relation_with').val('');  
            $('#add_gud_name').val('');  
            $('#add_gud_phone').val('');  
            $('#add_gud_present_address').val('');  
            $('#add_gud_permanent_address').val('');  
            $('#add_gud_religion').val(''); 
            $('#add_gud_profession').val(''); 
            $('#add_gud_national_id').val(''); 
            $('#add_gud_email').val(''); 
            $('#add_gud_other_info').val(''); 
                    
           if(guardian_type == 'father'){
               
               $('#add_relation_with').val('Father'); 
               $('.fn_existing_guardian').hide();
               $('.fn_except_exist').show();
               $('#guardian_id').prop('required', false);               
               $('#add_gud_name').prop('required', true);               
               $('#add_gud_phone').prop('required', true);               
               $('#add_gud_email').prop('required', true);               
               
               var f_name = $('#add_father_name').val();
               var f_phone = $('#add_father_phone').val(); 
               var f_education = $('#add_father_education').val(); 
               var f_profession = $('#add_father_profession').val(); 
               var f_designation = $('#add_father_designation').val(); 
               
               $('#add_gud_name').val(f_name);  
               $('#add_gud_phone').val(f_phone); 
               $('#add_gud_profession').val(f_profession); 
               
           }else if(guardian_type == 'mother'){
               
               $('#add_relation_with').val('Mother');   
               $('.fn_existing_guardian').hide();
               $('.fn_except_exist').show();
               $('#guardian_id').prop('required', false);
               $('#add_gud_name').prop('required', true);               
               $('#add_gud_phone').prop('required', true);               
               $('#add_gud_email').prop('required', true); 
               
               var m_name = $('#add_mother_name').val();
               var m_phone = $('#add_mother_phone').val(); 
               var m_education = $('#add_mother_education').val(); 
               var m_profession = $('#add_mother_profession').val(); 
               var m_designation = $('#add_mother_designation').val(); 
               
               $('#add_gud_name').val(m_name);  
               $('#add_gud_phone').val(m_phone); 
               $('#add_gud_profession').val(m_profession); 
               
           }else if(guardian_type == 'other'){
               $('#add_relation_with').val('Other');    
               $('.fn_existing_guardian').hide();
               $('.fn_except_exist').show();
               $('#guardian_id').prop('required', false);
               $('#add_gud_name').prop('required', true);               
               $('#add_gud_phone').prop('required', true);               
               $('#add_gud_email').prop('required', false); 
                              
           }else if(guardian_type == 'exist_guardian'){
               $('.fn_existing_guardian').show();
               $('.fn_except_exist').hide();
               $('#guardian_id').prop('required', true);   
               $('#add_gud_name').prop('required', false);               
               $('#add_gud_phone').prop('required', false);               
               $('#add_gud_email').prop('required', false); 
               
           }else{
                $('#add_relation_with').val('');   
                $('.fn_existing_guardian').hide();
                $('.fn_except_exist').show();
                $('#guardian_id').prop('required', false);
                $('#add_gud_name').prop('required', true);               
                $('#add_gud_phone').prop('required', true);               
                $('#add_gud_email').prop('required', false); 
           }
        
        }
        
        function get_guardian_by_id(guardian_id){                       
            
            $.ajax({       
            type   : "POST",
            dataType: "json",
            url    : "<?php echo WEB_DIR?>ajax/get_guardian_by_id",
            data   : { guardian_id : guardian_id},               
            async  : true,
            success: function(response){ 
               if(response)
               {
                    $('#add_gud_name').val(response.name);  
                    $('#add_gud_phone').val(response.phone);  
                    $('#add_gud_present_address').val(response.present_address);  
                    $('#add_gud_permanent_address').val(response.permanent_address);  
                    $('#add_gud_religion').val(response.religion);  
                    $('#add_gud_profession').val(response.profession);  
                    $('#add_gud_national_id').val(response.national_id);  
                    $('#add_gud_email').val(response.email);  
                    $('#add_gud_other_info').val(response.other_info);  
               }
               else
               {
                    $('#add_relation_with').val('');  
                    $('#add_gud_name').val('');  
                    $('#add_gud_phone').val('');  
                    $('#add_gud_present_address').val('');  
                    $('#add_gud_permanent_address').val('');  
                    $('#add_gud_religion').val(''); 
                    $('#add_gud_profession').val(''); 
                    $('#add_gud_national_id').val(''); 
                    $('#add_gud_email').val(''); 
                    $('#add_gud_other_info').val(''); 
               }
            }
        });  
        
        }
        
             
    $('#same_as_guardian').on('click', function(){
        
        if($(this).is(":checked")) {
            var present =  $('#add_gud_present_address').val();  
            var permanent = $('#add_gud_permanent_address').val();  
            $('#add_present_address').val(present);  
            $('#add_permanent_address').val(permanent);  
        }else{
             $('#add_present_address').val('');  
             $('#add_permanent_address').val(''); 
        }
    });
        
        
     /* Menu Filter Start */   
    function get_student_by_class(url){          
        if(url){
            window.location.href = url; 
        }
    }         
       
        
        
    function get_class_by_school(school_id, class_id){
        
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_class_by_school",
            data   : { school_id : school_id, class_id : class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                    $('#filter_class_id').html(response);                     
               }
            }
        });
    } 
    
    function update_status_type(student_id, status){
        
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/update_student_status_type",
            data   : { student_id : student_id, status : status},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                   toastr.success('Data updated successfully');
                   location.reload();
                   return false;                    
               }
            }
        });
    }    
             
    $("#add").validate();     
    $("#edit").validate();   
    
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