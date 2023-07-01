
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
        

        <title>Manage Assignment | qw</title>
                    <link rel="icon" href="<?php echo WEB_DIR?>assets/uploads//logo/1682224490-favicon-icon.png" type="image/x-icon" />             
                
        
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
                                
                
                                     <img class="logo" src="<?php echo WEB_DIR?>assets/uploads/logo/1682224490-brand-logo.png" style="max-width: 65px;" alt="">
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
          <!-- /top navigation -->

 

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
                <h3 class="head-title"><i class="fa fa-file-word-o"></i><small> Manage Assignment</small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">                
                Quick Link:

    <a href="<?php echo WEB_DIR?>academic/classes/index">Class</a>
| <a href="<?php echo WEB_DIR?>academic/section/index">Section</a>

| <a href="<?php echo WEB_DIR?>academic/subject/index">Subject</a>

| <a href="<?php echo WEB_DIR?>academic/syllabus/index">Syllabus</a>

| <a href="<?php echo WEB_DIR?>academic/material/index">Material</a>

| <a href="<?php echo WEB_DIR?>academic/liveclass/index">Live Class</a>

| <a href="<?php echo WEB_DIR?>academic/assignment/index">Assignment</a>

| <a href="<?php echo WEB_DIR?>academic/submission/index">Submission</a>
                 
            </div>
           
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="active"><a href="#tab_assignment_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> List</a> </li>
                                                
                                                             <li  class=""><a href="#tab_add_assignment"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> Add</a> </li>                          
                                                                                      
                                        
                       
                            <li class="li-class-list">
                            
                             
                               
                                
                                                            
                                <select  class="form-control col-md-7 col-xs-12" onchange="get_assignment_by_class(this.value);">
                                                                        <option value="<?php echo WEB_DIR?>academic/assignment/index">--Select--</option> 
                                                                                                                                                                                                         <option value="<?php echo WEB_DIR?>academic/assignment/index/1"  >1st standard</option>
                                                                                    
                                                                                                                                                                    <option value="<?php echo WEB_DIR?>academic/assignment/index/2"  >2nd standard</option>
                                                                                    
                                                                                                                                                                    <option value="<?php echo WEB_DIR?>academic/assignment/index/3"  >3rd standard</option>
                                                                                    
                                                                                
                                </select> 
                                                    </li>    
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in active" id="tab_assignment_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                                                                <th>Title</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Assignment Date</th>
                                        <th>Submission Date</th>
                                        <th>Status</th>
                                        <th>Action</th>                                            
                                    </tr>
                                </thead>
                                <tbody>                                       
                                                                                                                                                            <tr>
                                            <td>1</td>
                                                                                        <td>fdfdfd</td>
                                            <td>1st standard</td>
                                            <td>maths</td>
                                            <td>Jun 1, 2023</td>
                                            <td>May 31, 2023</td>
                                            <td>Active</td>  
                                            <td>
                                                                                                    <a href="<?php echo WEB_DIR?>academic/submission/evaluate/1" class="btn btn-success btn-xs"><i class="fa fa-check-square-o"></i> Evaluate</a>
                                                                                                                                                    <a href="<?php echo WEB_DIR?>academic/assignment/edit/1" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Edit </a>
                                                                                                                                                    <a  onclick="get_assignment_modal(1);"  data-toggle="modal" data-target=".bs-assignment-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                                                                                                                                                </td>
                                        </tr>
                                                                                                            </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in " id="tab_add_assignment">
                            <div class="x_content"> 
                               <form action="<?php echo WEB_DIR?>academic/assignment/add" name="add" id="add" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                
                                     <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="fn_school_id" type="hidden" name="school_id" id="add_school_id" value="1" />
        </div>
    </div>
  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="" placeholder="Title" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>               
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id">Class <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="add_class_id" required="required" onchange="get_subject_by_class(this.value, ''); get_section_by_class(this.value, '');" >
                                            <option value="">--Select--</option> 
                                                                                                                                                                                                 <option value="1" >1st standard</option>
                                                                                                                                                     <option value="2" >2nd standard</option>
                                                                                                                                                     <option value="3" >3rd standard</option>
                                                                                            
                                                                                        
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id">Section <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="section_id"  id="add_section_id" required="required" >
                                            <option value="">--Select--</option>                                                                                      
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id">Subject <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="subject_id"  id="add_subject_id" required="required" >
                                            <option value="">--Select--</option>                                                                                      
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignment_date">Assignment Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="assigment_date"  id="add_assigment_date" value="" placeholder="Assignment Date" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="submission_date">Submission Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="submission_date"  id="add_submission_date" value="" placeholder="Submission Date" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Assignment 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> Upload                                            <input  class="form-control col-md-7 col-xs-12"  name="assignment"  id="assignment" type="file" >
                                        </div>
                                        <div class="text-info">Document file format: .pdf, .doc/docx, .ppt/pptx  or .txt</div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12 chk-label" for="sms_notification" style="padding-top: 0px;">SMS Notification</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="notification" type="checkbox" value="1" name="sms_notification" id="add_sms_notification" />
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12 chk-label" for="email_notification" style="padding-top: 0px;">Email Notification</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="notification" type="checkbox" value="1" name="email_notification" id="add_email_notification" />
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">Note</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="add_note" placeholder="Note"></textarea>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo WEB_DIR?>academic/assignment/index" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                </form>                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong>Instruction: </strong> Please add Class & Subject before add Assignment.</div>
                                </div>
                            </div>
                        </div>  

                        
                                                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-assignment-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Detail Information</h4>
        </div>
        <div class="modal-body fn_assignment_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_assignment_modal(assignment_id){
         
        $('.fn_assignment_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo WEB_DIR?>assets/images/loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo WEB_DIR?>academic/assignment/get_single_assignment",
          data   : {assignment_id : assignment_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_assignment_data').html(response);
             }
          }
       });
    }
</script>


<link href="<?php echo WEB_DIR?>assets/vendors/datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo WEB_DIR?>assets/vendors/datepicker/datepicker.js"></script>


<!-- Super admin js START  -->
 <script type="text/javascript">
     
    $("document").ready(function() {
             });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();        
        var class_id = '';
        
         
        
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
                   if(class_id){
                       $('#edit_class_id').html(response);   
                   }else{
                       $('#add_class_id').html(response);   
                   }                  
               }
            }
        });
    }); 

  </script>
<!-- Super admin js end -->

 <script type="text/javascript">
     
  $('#add_assigment_date').datepicker();
  $('#edit_assigment_date').datepicker();
  $('#add_submission_date').datepicker();
  $('#edit_submission_date').datepicker();

    
    var edit = false;
        
    function get_subject_by_class(class_id, subject_id){       
        
        var school_id = '';
        
         
            school_id = $('#add_school_id').val();
          
             
        if(!school_id){
           toastr.error('Select School');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_subject_by_class",
            data   : {school_id:school_id, class_id : class_id , subject_id : subject_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   if(edit){
                        $('#edit_subject_id').html(response);
                   }else{
                        $('#add_subject_id').html(response);
                   }
               }
            }
        });                  
        
   }
   
    function get_section_by_class(class_id, section_id){       
        
        var school_id = '';
        
         
            school_id = $('#add_school_id').val();
          
             
        if(!school_id){
           toastr.error('Select School');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_section_by_class",
            data   : {school_id:school_id, class_id : class_id , section_id : section_id},               
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
   
   
   
   /* Menu Filter Start */
    function get_assignment_by_class(url){          
        if(url){
            window.location.href = url; 
        }
    }
    
    function get_assignment_by_class_sa(class_id){
    
        var school_id = $('#school_id_filter').val();
        if( !school_id){
            
           toastr.error('Select School');
           return false;
        }        
        if(!class_id){
            return false;
        }        
       window.location.href = '<?php echo WEB_DIR?>academic/assignment/index/'+class_id+'/'+school_id; 
        
    }
    
 </script>
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
        
    $("#add").validate();     
    $("#edit").validate(); 
</script>                    <!-- /page content -->
                </div>
                <!-- footer content -->
      <?php
      $this->load->View('footer.php');
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