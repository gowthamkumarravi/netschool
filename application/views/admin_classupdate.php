
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
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                                
                <ul class="nav side-menu">                    
                    <li><a href="<?php echo WEB_DIR?>dashboard/index"><i class="fa fa-dashboard"></i> Dashboard</a>  </li>
                    
                                 
  
                        
                                                <li><a  href="<?php echo WEB_DIR?>theme/index"><i class="fa fa-cubes"></i> Theme</a></li> 
                      
                    
                                          
                        
                        <li><a><i class="fa fa-user"></i> Administrator <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/setting/index"> General Setting</a></li>
                                                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/school/index"> Manage School</a></li>
                                                                 
                                <li><a href="<?php echo WEB_DIR?>administrator/payment/index">Payment Setting</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>administrator/sms/index">SMS Setting</a></li>
                                    
                                                                    <li><a href="<?php echo WEB_DIR?>administrator/emailsetting/index">Email Setting</a></li>
                                    
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/year/index"> Academic Year</a></li>
                                                                    
                                    <li><a href="<?php echo WEB_DIR?>administrator/role/index"> User Role (ACL)</a></li> 
                                                                 
                                    <li><a href="<?php echo WEB_DIR?>administrator/permission/index">Role Permission (ACL)</a></li> 
                                                                    
                                    <li><a href="<?php echo WEB_DIR?>administrator/superadmin/index"> Manage Super Admin</a></li> 
                                                                    
                                    <li><a href="<?php echo WEB_DIR?>administrator/user/index">Manage User</a></li> 
                                                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/password/index">Reset User Password</a></li> 
                                  
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/username/index">Reset Username</a></li> 
                                  
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/usercredential/index">User Credential</a></li> 
                                  
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/activitylog/index">Activity Log</a></li>                         
                                      
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/feedback/index">Manage Feedback</a></li>                         
                                 
                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/backup/index">Backup Database</a></li>                         
                                  
                                                                <li><a href="<?php echo WEB_DIR?>administrator/openinghour">Opening Hour</a></li>
                                                        </ul>
                        </li>
                                            
                        
                      
                        <li><a><i class="fa fa-tags"></i> Template <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">                            
                                    
                                    <li><a href="<?php echo WEB_DIR?>administrator/smstemplate/index">SMS Template</a></li>                         
                                                                   
                                    <li><a href="<?php echo WEB_DIR?>administrator/emailtemplate/index">Email Template</a></li>                         
                                     
                            </ul>
                        </li>                        
                     
                        
                      
                        <li><a><i class="fa fa-tty"></i> Front Office <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">                            
                                    
                                    <li><a href="<?php echo WEB_DIR?>frontoffice/purpose/index">Visitor Purpose</a></li>                         
                                                                   
                                    <li><a href="<?php echo WEB_DIR?>frontoffice/visitor/index">Visitor Info</a></li>                         
                                                                 
                                   
                                    <li><a href="<?php echo WEB_DIR?>frontoffice/calllog/index">Call Log</a></li>                         
                                                                 
                                   
                                    <li><a href="<?php echo WEB_DIR?>frontoffice/dispatch/index">Postal Dispatch</a></li>                         
                                                                 
                                   
                                    <li><a href="<?php echo WEB_DIR?>frontoffice/receive/index">Postal Receive</a></li>                         
                                                                 
                            </ul>
                        </li>                        
                     
                    
                        
                    <li><a><i class="fa fa-user-md"></i>  Human Resource <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                               
                                <li><a href="<?php echo WEB_DIR?>hrm/designation/index">Manage Designation</a></li>
                                                           
                                <li><a href="<?php echo WEB_DIR?>hrm/employee/index">Manage Employee</a></li>                            
                                                    </ul>
                    </li> 
                                        
                        
                        <li><a><i class="fa fa-users"></i> Teacher <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>teacher/department/index">Department</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>teacher/index">Manage Teacher</a></li>                         
                                                                                                    <li><a href="<?php echo WEB_DIR?>teacher/lecture/index">Class Lecture</a></li>                         
                                 
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>teacher/rating/manage">Rating</a></li>                         
                                 
                            </ul>
                        </li> 
                                        
                    
                                            <li><a><i class="fa fa-bell-o"></i> Manage Leave <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                  
                                    <li><a href="<?php echo WEB_DIR?>leave/type/index">Leave Type</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>leave/application/index">Leave Application </a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>leave/waiting/index">Waiting Application</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>leave/approve/index">Approved Application</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>leave/decline/index">Declined Application</a></li>
                                                            </ul>
                        </li>   
                      
                    
             
                                        
                        <li><a ><i class="fa fa-institution"></i> Academic<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu"> 
                                                                    <li><a href="<?php echo WEB_DIR?>academic/classes/index">Class</a></li>  
                                 
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/section/index">Section</a></li>  
                                 
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/subject/index">Subject</a></li>  
                                     
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/syllabus/index">Syllabus</a></li>  
                                     
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/material/index">Material</a></li>  
                                     
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/liveclass/index">Live Class</a></li>  
                                  
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/assignment/index">Assignment</a></li>  
                                 
                                    
                                    <li><a href="<?php echo WEB_DIR?>academic/submission/index">Submission</a></li>  
                                       
                            </ul>                    
                        </li>         
                     
                        
                        
                                             
                        <li><a ><i class="fa fa-bars"></i> Lesson Plan<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu"> 
                                                                    <li><a href="<?php echo WEB_DIR?>lessonplan/lesson/index">Lesson</a></li>  
                                 
                                    
                                    <li><a href="<?php echo WEB_DIR?>lessonplan/topic/index">Topic</a></li>  
                                 
                                    
                                    
                                    <li><a href="<?php echo WEB_DIR?>lessonplan/timeline">Lesson Timeline</a></li>  
                                                                
                                     
                                    <li><a href="<?php echo WEB_DIR?>lessonplan/status">Lesson Status</a></li>  
                                                                    
                                     
                                    <li><a href="<?php echo WEB_DIR?>lessonplan/index">Lesson Plan</a></li>  
                                  
                                    
                            </ul>                    
                        </li>         
                         
                
                   
                                           <li> <a  href="<?php echo WEB_DIR?>academic/routine/index"> <i class="fa fa-clock-o"></i>Class Routine</a></li>
                       
                                        
                        
                        <li><a href="<?php echo WEB_DIR?>guardian/index"><i class="fa fa-paw"></i> Guardian</a> </li>
                                                                
                    
                     
                      
                           <li><a><i class="fa fa-group"></i> Manage Student <span class="fa fa-chevron-down"></span></a>
                               <ul class="nav child_menu">
                                                                            <li><a href="<?php echo WEB_DIR?>student/type/index"> Student Type</a></li>
                                      
                                                                            <li><a href="<?php echo WEB_DIR?>student/index">Student List</a></li>
                                      
                                                                            <li><a href="<?php echo WEB_DIR?>student/add"> Admit Student</a></li>
                                      
                                                                             <li><a href="<?php echo WEB_DIR?>student/bulk/add"> Bulk Admission</a></li>
                                     
                                                                             <li><a href="<?php echo WEB_DIR?>student/admission/index"> Online Admission</a></li>
                                     
                                                                          <li><a href="<?php echo WEB_DIR?>student/activity/index"> Student Activity</a></li>
                                     
                               </ul>
                           </li> 
                        
                                        
              
                            
                                                
                        <li><a><i class="fa fa-check-circle-o"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    
                                       
                                        <li><a href="<?php echo WEB_DIR?>attendance/student/index">Student Attendance</a></li>
                                        
                                                                                                    <li><a href="<?php echo WEB_DIR?>attendance/teacher/index">Teacher Attendance</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>attendance/employee/index">Employee Attendance</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>attendance/absentemail/index">Absent Email</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>attendance/absentsms/index">Absent SMS</a></li>
                                     
                            </ul>
                        </li> 
                                                                                     
                                                
                        <li><a><i class="fa fa-barcode"></i> Generate Card<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">                                
                                                                    <li><a href="<?php echo WEB_DIR?>card/idsetting/index">ID Card Setting</a></li>
                                                                                                     <li><a href="<?php echo WEB_DIR?>card/admitsetting/index">Admit Card Setting</a></li>
                                                                        
                                     
                                                                        
                                                                    <li><a href="<?php echo WEB_DIR?>card/teacher/index">Teacher ID card</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>card/employee/index">Employee ID Card</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>card/student/index">Student ID Card</a></li>
                                                                  
                                  
                                    <li><a href="<?php echo WEB_DIR?>card/admit/index">Student Admit Card</a></li>
                                                                  
                            </ul>
                        </li> 
                     
                        
                        
                            
                        <li><a><i class="fa fa-mouse-pointer"></i> Online Exam<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>onlineexam/instruction/index">Instruction</a></li>                         
                                                                                                    <li><a href="<?php echo WEB_DIR?>onlineexam/question/index">Question Bank</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>onlineexam/index">Online Exam</a></li>                         
                                 
                                
                                
                                        
                                                                    <li><a href="<?php echo WEB_DIR?>onlineexam/takeexam/result">Exam Result</a></li>                         
                                 
                            </ul>
                        </li> 
                         
                        
                        
                        <li><a><i class="fa fa-graduation-cap"></i> Manage Exam <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>exam/grade/index">Exam Grade</a></li>                         
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/index">Exam Term</a></li>                         
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>exam/schedule/index">Schedule</a></li>
                                    

                                  
                                    <li><a href="<?php echo WEB_DIR?>exam/suggestion/index">Suggestion</a></li>
                                     

                                                                    <li><a  href="<?php echo WEB_DIR?>exam/attendance/index">Attendance</a></li>
                                    
                                        </ul>
                                    </li> 
                                                                 
                        
                        <li><a><i class="fa fa-file-text-o"></i> Exam Mark <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>exam/mark/index">Manage Mark</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/examresult/index">Exam Term Result</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/finalresult/index">Exam final result</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/meritlist/index">Merit List</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/marksheet/index">Mark Sheet</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/resultcard/index">Result Card</a></li>
                                                               
                                                                    <li><a href="<?php echo WEB_DIR?>exam/mail/index">Mark send by Email</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>exam/text/index">Mark send by SMS</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>exam/resultemail/index">Result Send by Email</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>exam/resultsms/index">Result Send by SMS</a></li>
                                    
                            </ul>
                        </li>
                                        
                                            <li><a href="<?php echo WEB_DIR?>academic/promotion"><i class="fa fa-mail-forward"></i>Promotion</a></li>                   
                                            
                                        <li><a><i class="fa fa-certificate"></i> Certificate <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                                            <li><a href="<?php echo WEB_DIR?>certificate/type/index">Certificate Type</a></li>
                                                                                        <li><a href="<?php echo WEB_DIR?>certificate/index">Generate Certificate</a></li>
                                                            
                        </ul>
                    </li>
                                        
                                      
                        
                        <li><a><i class="fa fa-users"></i> Inventory<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>inventory/supplier/index">Supplier</a></li>                         
                                                                                                    <li><a href="<?php echo WEB_DIR?>inventory/warehouse/index">Warehouse</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>inventory/category/index">Category</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>inventory/product/index">Product</a></li>                         
                                     
                                                                    <li><a href="<?php echo WEB_DIR?>inventory/purchase/index">Purchase</a></li>                         
                                     
                                                                    <li><a href="<?php echo WEB_DIR?>inventory/sale/index">Sale</a></li>                         
                                     
                                                                    <li><a href="<?php echo WEB_DIR?>inventory/issue/index">Issue</a></li>                         
                                     
                            </ul>
                        </li> 
                     
                    
                        
                        <li><a><i class="fa fa-users"></i> Asset Management<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>asset/vendor/index">Vendor</a></li>                         
                                     
                                                                    <li><a href="<?php echo WEB_DIR?>asset/store/index">Store</a></li>                         
                                                                                                    <li><a href="<?php echo WEB_DIR?>asset/category/index">Category</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>asset/item/index">Item</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>asset/purchase/index">Purchase</a></li>                         
                                 
                                                                    <li><a href="<?php echo WEB_DIR?>asset/issue/index">Issue</a></li>                         
                                 
                            </ul>
                        </li> 
                                        
                    
                        
                        <li><a><i class="fa fa-book"></i> Library <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>library/book/index">Book</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>library/member/index">Library Member</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>library/issue/index">Issue & Return</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>library/ebook/index">E-Book</a></li>
                                                            </ul>
                        </li> 
                                        
                            
                        <li><a><i class="fa fa-bus"></i> Transport <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>transport/vehicle/index">Vehicle</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>transport/route/index">Transport Route</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>transport/member/index">Transport Member</a></li>
                                                            </ul>
                        </li>  
                                            
                            
                        <li><a><i class="fa fa-hotel"></i> Hostel <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>hostel/index">Manage Hostel</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>hostel/room/index">Manage Room</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>hostel/member/index">Hostel Member</a></li>
                                                            </ul>
                        </li>
                                       
                                        
                                            <li><a><i class="fa fa-envelope-o"></i> Mail & SMS <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                  
                                    <li><a href="<?php echo WEB_DIR?>message/mail/index">Email</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>message/text/index">SMS</a></li>
                                                            </ul>
                        </li>   
                               
                        
                                            <li><a><i class="fa fa-commenting"></i> Complain <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                  
                                    <li><a href="<?php echo WEB_DIR?>complain/type/index">Complain Type</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>complain/index">Manage Complain </a></li>
                                                            </ul>
                        </li>   
                      
                    
                                
                        <li><a><i class="fa fa-bullhorn"></i> Announcement <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>announcement/notice/index">Notice</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>announcement/news/index">News</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>announcement/holiday/index">Holiday</a></li>
                                                            </ul>
                        </li>  
                                            
                        
                        
                        <li><a><i class="fa fa-users"></i> Scholarship<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                    <li><a href="<?php echo WEB_DIR?>scholarship/candidate/index">Candidate</a></li>                         
                                     
                                                                    <li><a href="<?php echo WEB_DIR?>scholarship/donar/index">Donar</a></li>                         
                                                                                                    <li><a href="<?php echo WEB_DIR?>scholarship/index">Scholarship</a></li>                         
                                 
                                                               
                            </ul>
                        </li> 
                                            
                   
                        
                        <li><a href="<?php echo WEB_DIR?>event/index"><i class="fa fa fa-calendar-check-o"></i> Event</a></li>
                                                                
                                            <li><a><i class="fa fa-dollar"></i> Payroll <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                  
                                    <li><a href="<?php echo WEB_DIR?>payroll/grade/index">Salary Grade</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>payroll/payment/index"> Salary Payment</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>payroll/history/index">Salary History</a></li>
                                                            </ul>
                        </li>   
                        
                    
                                        
                                    
                        <li><a><i class="fa fa-calculator"></i> Accounting <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                                                   <li><a href="<?php echo WEB_DIR?>accounting/discount/index">Discount</a></li> 
                                                                                                   <li><a href="<?php echo WEB_DIR?>accounting/feetype/index"> Fee Type</a></li> 
                                                               
                                                                    
                                                                            <li><a href="<?php echo WEB_DIR?>accounting/invoice/add">Fee Collection</a></li>                            
                                        <li><a href="<?php echo WEB_DIR?>accounting/invoice/index">Manage Invoice</a></li>                            
                                        <li><a href="<?php echo WEB_DIR?>accounting/invoice/due">Due Invoice</a></li>
                                                                        
                                                                        
                                   
                                        <li><a href="<?php echo WEB_DIR?>accounting/receipt/duereceipt">Due Receipt</a></li>
                                        <li><a href="<?php echo WEB_DIR?>accounting/receipt/paidreceipt">Paid Receipt</a></li>
                                        
                                        
                                  
                                    <li><a href="<?php echo WEB_DIR?>accounting/duefeeemail/index">Due Fee Email</a></li>
                                                                  
                                    <li><a href="<?php echo WEB_DIR?>accounting/duefeesms/index">Due Fee SMS</a></li>
                                                                    
                                                                    <li><a href="<?php echo WEB_DIR?>accounting/incomehead/index">Income Head</a></li> 
                                                                                                    <li><a href="<?php echo WEB_DIR?>accounting/income/index">Income</a></li> 
                                        
                                                                    <li><a href="<?php echo WEB_DIR?>accounting/exphead/index">Expenditure Head</a></li>
                                                                                                    <li><a href="<?php echo WEB_DIR?>accounting/expenditure/index">Expenditure</a></li>
                                                                
                            </ul>
                        </li> 
                                        
                                            <li><a><i class="fa fa-bar-chart"></i> Report <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo WEB_DIR?>report/income">Income Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/expenditure">Expenditure Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/invoice">Invoice Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/duefee">Due Fee Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/feecollection">Fee Collection Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/balance">Accounting Balance Report</a></li> 
                                <li><a href="<?php echo WEB_DIR?>report/library">Library Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/sattendance">Student Attendance Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/syattendance">Student Yearly Attendance Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/tattendance">Teacher Attendance Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/tyattendance">Teacher Yearly Attendance Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/eattendance">Employee Attendance Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/eyattendance">Employee Yearly Attendance Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/student">Student Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/sinvoice">Student Invoice Report</a></li> 
                                <li><a href="<?php echo WEB_DIR?>report/sactivity">Student Activity Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/payroll">Payroll Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/transaction">Daily Transaction Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/statement">Daily Statemen Report</a></li>
                                <li><a href="<?php echo WEB_DIR?>report/examresult">Exam Result Report</a></li>
                            </ul>
                        </li> 
                                       
                        
                    <li><a><i class="fa fa-image"></i>Media Gallery <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                                            <li><a href="<?php echo WEB_DIR?>gallery/index">Gallery</a></li>
                                                            
                                <li><a href="<?php echo WEB_DIR?>gallery/image/index">Gallery Image</a></li>
                                                   </ul>
                    </li> 
                     
                    
                                        <li><a><i class="fa fa-desktop"></i>Manage Frontend <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                                        <li><a href="<?php echo WEB_DIR?>frontend/index"> Frontend Page</a></li>
                                                                                        <li><a href="<?php echo WEB_DIR?>frontend/slider/index"> Slider</a></li>
                                                        
                                                            <li><a href="<?php echo WEB_DIR?>frontend/about/index">About School</a></li>
                                                        
                        </ul>
                    </li>  
                                        
                     
                    <li><a><i class="fa fa-image"></i>Miscellaneous <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                                            <li><a href="<?php echo WEB_DIR?>miscellaneous/award/index">Manage Award</a></li>
                                                       
                                                            <li><a href="<?php echo WEB_DIR?>miscellaneous/todo/index">Manage Todo</a></li>
                             
                                                            <li><a href="<?php echo WEB_DIR?>miscellaneous/faq/index"> FAQ</a></li>
                                                    </ul>
                    </li> 
                 
                    
                    
                    <li><a><i class="fa fa-thumbs-o-up"></i>Subscription (SaaS) <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo WEB_DIR?>subscription/faq/index"> FAQ</a></li>
                            <li><a href="<?php echo WEB_DIR?>subscription/slider/index">Slider</a></li>
                            <li><a href="<?php echo WEB_DIR?>subscription/setting/index">Subscription Setting</a></li>
                            <li><a href="<?php echo WEB_DIR?>administrator/setting/index"> General Setting</a></li>
                            <li><a href="<?php echo WEB_DIR?>subscription/plan/index">Subscription Plan</a></li>
                            <li><a href="<?php echo WEB_DIR?>subscription/index">School Subscription</a></li>
                        </ul>
                    </li> 
                     
                    
                                   
                    <li><a><i class="fa fa-lock"></i>Profile <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo WEB_DIR?>profile/index">My Profile</a></li>
                            <li><a href="<?php echo WEB_DIR?>profile/password">Reset Password</a></li>
                                                                                        
                                                            
                            <li><a href="<?php echo WEB_DIR?>auth/logout">Log Out</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);"><i class="fa fa-signal"></i><span class="version">V-6.2</span></a></li>
                </ul>
            </div>     
        </div>
        <!-- /sidebar menu -->
    </div>
</div>   
                <!-- top navigation -->
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
                                                                                        <img src="<?php echo WEB_DIR?>assets/images//default-user.png" alt="" width="60" /> 
                                                        
                            Murugan                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?php echo WEB_DIR?>profile/index"> Profile</a></li>
                            <li><a href="<?php echo WEB_DIR?>profile/password">Reset Password</a></li>
                            <li><a href="<?php echo WEB_DIR?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                                                                                    <option value="1" >qw</option>
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
                                                                                    <option value="1" >qw</option>
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
                <h3 class="head-title"><i class="fa fa-slideshare"></i><small> Manage Class</small></h3>
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
                        <li class=""><a href="#tab_class_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> List</a> </li>
                                                                                    <li  class=""><a href="<?php echo WEB_URL?>Academic/AdminClass"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> Add</a> </li>                          
                                                        
                         
                                                    <li  class="active"><a href="#tab_edit_class"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> Edit</a> </li>                          
                         

                        <li class="li-class-list">
                                                        
                            <select  class="form-control col-md-7 col-xs-12" onchange="get_class_by_school(this.value);">
                                    <option value="<?php echo WEB_DIR?>academic/classes/index">--Select School--</option> 
                                                                    <option value="<?php echo WEB_DIR?>academic/classes/index/1" selected="selected" > qw</option>
                                   
                            </select>
                          
                    </li> 
                            
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in " id="tab_class_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>School</th>
                                        <th>Class</th>
                                        <th>Numeric Name</th>
                                        <th>Class Teacher</th>                                  
                                        <th>Action</th>  
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php
                                    foreach( $class  as $row )
{
    ?>
                                                                                                                                                            
                                            <tr id="class_<?php echo $row->id;?>">
                                            <td><?php echo $row->id?></td>
                                            <td><?php echo $row->school_name?></td>
                                            <td><?php echo $row->name?></td>
                                            <td><?php echo $row->numeric_name?></td>
                                            <td><?php echo $row->teacher_name?></td>                                          
                                            <td>
                                            <a href="<?php echo WEB_URL?>Academic/UpdateClass/<?php echo $row->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>  
                                            <a href="#" onclick="return DeleteClass('<?php echo $row->id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                                                                                                 
                                                                                            </td>
                                        </tr>
                                     <?php
}
?>                                              
                                                                                                            </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in " id="tab_add_class">
                            <div class="x_content"> 
                               <form action="<?php echo WEB_DIR?>academic/classes/add" name="add" id="add" class="form-horizontal form-label-left" method="post" accept-charset="utf-8">
                                
                                <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">School Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select  class="form-control col-md-7 col-xs-12 fn_school_id" name="school_id" id="add_school_id" required="required">
            <option value="">--Select School--</option>
                            <option value="1" selected="selected">qw</option>
                    </select>
        <div class="help-block"></div>
    </div>
</div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Class Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="add_name" value="" placeholder="Class Name" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numeric_name">Numeric Name<span class="required"> *</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="numeric_name"  id="add_numeric_name" value="" placeholder="Numeric Name" required="required" type="number" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id">Class Teacher <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="add_teacher_id" required="required" >
                                            <option value="">--Select--</option> 
                                                                                        
                                        </select>
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
                                        <a href="<?php echo WEB_DIR?>academic/classes/index" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                </form>                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong>Instruction: </strong> Please add Teacher before add Class.</div>
                                </div>
                            </div>                           
                            
                        </div>  

                                                <div class="tab-pane fade in active" id="tab_edit_class">
                            <div class="x_content"> 
                               <form action="<?php echo WEB_URL?>Academic/ClassUpdate/<?php echo $class_data->id;?>" name="edit" id="edit" class="form-horizontal form-label-left" method="post" accept-charset="utf-8">
                                
                                <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="fn_school_id" type="hidden" name="school_id" id="edit_school_id" value="1" />
    </div>
</div>
 
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Class Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="edit_name" value="<?php echo $class_data->name?>" placeholder="Class Name" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numeric_name">Numeric Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="numeric_name"  id="edit_numeric_name" value="<?php echo $class_data->numeric_name?>" placeholder="Numeric Name" required="required" type="number" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id">Class Teacher <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="edit_teacher_id" required="required" >
                                        <option  value="0">Teacher Name</option>
<?php

                foreach($teacher_name as $row)
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
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">Note</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="Note"><?php echo $class_data->note?></textarea>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="id" id="id" value="1" />
                                        <a href="<?php echo WEB_DIR?>academic/classes/index" class="btn btn-primary">Cancel</a>
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

<!-- Super admin js START  -->
<script>
function DeleteClass(id){
    var confText = confirm("do you want to delete?");
    if(confText){
      $.ajax({
         url:"<?php echo WEB_URL?>Academic/ajaxClassDelete",
         data:{id:id},
         type:"POST",
         success:function(result){
         var obj = JSON.parse(result);
            $('#class_'+id).remove();
            alert(obj.message);
         }
      });
     
    }
    return false;
}
</script>
 <script type="text/javascript">
     
    $("document").ready(function() {
                     $("#edit_school_id").trigger('change');
                      
    });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();       
        var teacher_id = '';
                 
            teacher_id =  '1';
          
        
        if(!school_id){
           toastr.error('Select School');
           return false;
        }
        
         $.ajax({       
            type   : "POST",
            url    : "<?php echo WEB_DIR?>ajax/get_teacher_by_school",
            data   : { school_id:school_id, teacher_id : teacher_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(teacher_id){
                       $('#edit_teacher_id').html(response);
                   }else{
                       $('#add_teacher_id').html(response); 
                   }
               }
            }
        });       
     
    }); 

    
  </script>
  <!-- Super admin js end -->

<!-- datatable with buttons -->
 <script type="text/javascript">
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
    $("#edit").validate(); 
    
    function get_class_by_school(url){          
        if(url){
            window.location.href = url; 
        }
    }  
    
</script>                    <!-- /page content -->
                </div>
                <!-- footer content -->
                <footer class="footer no-print">
    <div class="pull-right">
        <p class="white">
                             Copyright © Dot Net Schools at 2023 
                     </p>       
    </div>
    <div class="clearfix"></div>
</footer>   
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