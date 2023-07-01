
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log In | Dot Net Schools</title>
        
                    <link rel="icon" href="<?php echo WEB_DIR?>assets/uploads//logo/1682338668-favicon-icon.png" type="image/x-icon" />             
                
        <!-- Bootstrap -->
        <link href="<?php echo WEB_DIR?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo WEB_DIR?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">     
        <!-- Custom Theme Style -->
        <link href="<?php echo WEB_DIR?>assets/css/custom.css" rel="stylesheet">
         <style type="text/css">   
.login_wrapper {
    right: 0px;
    margin: 0px auto;
    margin-top: 2%;
    max-width: 450px;
    position: relative
}
.login_wrapper h1{
    padding: 20px 0px;
    border-radius: 10px 10px 0px 0px;
}
.login_form{
    border-radius: 10px 10px 10px 10px;
}
.login_content{
    padding: 20px;
}
.login_box {
    padding: 20px;
    margin: auto
}
.demo-note{               
    margin: 10px;
    font-size: 18px;
}
.demo-button{               
    margin: 8px;
    font-size: 16px;
    padding: 5px 12px !important;
}


    .login{    
        background: url(../assets/images/login-screen/slate-gray.jpg);   
        background-color: #132436;
    }   
    .login_form{
        background: #2A3F54; 
    }
    .login-button{
        color: #000 !important;
        background-color: #6b8198 !important;
        border: .5px solid #c5c2c2 !important;
    }
    .login-button:hover{
        background-color: #43607d !important;
    }
    .login_wrapper h1{   
        background: #1d1c1c;
        color: #fff;  
   }
   .form-control.has-feedback-left {
        border: .5px solid #2A3F54;     
   }
    
    
    .login{  
        background-repeat: no-repeat;
        background-size: 100% auto;
        background-position: center top;
        background-attachment: fixed; 
        background-repeat: no-repeat;   
    }
    
</style>  
    </head>    
    <body class="login">     

        <div class="login_wrapper">
            <section>
                <center>
                <img  src="<?php echo WEB_DIR?>assets/uploads/logo/1682397710-brand-logo.png" style="max-width: 100px;" alt="">
                                        
                </center>
            </section>
            <div class="form login_form">
                <section><h1 class="text-center">Log In</h1></section>    
                <section class="login_content">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <p class="red" style="color: #fff;"></p>
                        <p class="green"  style="color: #fff;"></p>
                    </div>
                    <form action="<?php echo base_url('Login/loginpage')?>" name="login" id="login" method="post" accept-charset="utf-8">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input type="text" name="username" class="form-control has-feedback-left" placeholder="Username" autocomplete="off">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input type="password" name="password" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password" autocomplete="off">
                        <span class="fa fa-asterisk form-control-feedback left" aria-hidden="true"></span>
                    </div>                    
                   
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  class="btn btn-primary login-button" type="submit" name="submit" value="Log In" />
                    </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <a class="reset_pass btn btn-primary login-button" href="<?php echo WEB_DIR?>auth/forgot">Lost your password?</a>
                    </div>
                    <div class="clearfix"></div>                        
                    </form>                
                </section>
            </div>
        </div>
    </body>
</html>
