<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="<?php echo base_url() . 'webres/css/theam_look.min.css'; ?>">
        <title><?php echo Cons::common_title ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!-- app theme Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() . 'webres/css/theam_look.min.css'; ?>">

        <link rel="stylesheet" href="<?php echo base_url() . 'webres/css/parsley.css' ?>">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>


    <body class="hold-transition login-page" >
        <div class="login-box">
            <div class="login-logo" style="background-color: white">

             <?php /*   <img class="img-responsive" src="<?php echo base_url('webres/images/jcilogo.png'); ?>"> */?>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <h4>User Registration</h4>
                <?php if (isset($data[Cons::feedbackmessageKey])) { ?>
                    <h5><?php echo $data[Cons::feedbackmessageKey]; ?></h5>
                <?php }
                echo getFeedbackMessage();?>
                <hr>



                <?php
                $formAttributes = array('id' => 'loginFrom', 'data-parsley-validate' => '');
                echo form_open('userreg', $formAttributes);
                ?>
                <label>Name</label>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name"  name="name" required="">
                    
                </div>
                <label>Dob</label>
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="Dob" name="dob">
                    
                </div>
                
                <label>Gender</label>
                <div class="form-group">
                    <input type="radio" name="gender" value="male" checked> Male
                    <input type="radio" name="gender" value="female"> Female
                    
                </div>
                <label>State</label>
                <div class="form-group ">
                    <input type="text" class="form-control" placeholder="State"  name="state">
                    
                </div>
                <label>Address</label>
                <div class="form-group">
                    <textarea class="form-control" name="address" placeholder="Address"></textarea>
                </div>
                <label>Mobile No</label>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Mobile No"  name="mobile" required="">
                    
                </div>
                <label>E-mail</label>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail" required=""  name="email">
                    
                </div>
                
                <label>Password</label>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password"  name="password" required="">
                   
                </div>
                <div class="row">
                    <div class="col-md-8">
                        
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>


                <!-- /.social-auth-links -->

<?php /* <a href="#">I forgot my password</a><br> */ ?>


            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->



        <script src="<?php echo base_url() . 'webres/js/parsley.min.js' ?>"></script>


        <script src="<?php echo base_url() . 'viewjs/login.js' ?>"></script>
        <script src="<?php echo base_url() . 'viewjs/validate.js' ?>"></script>





    </body>

</html>