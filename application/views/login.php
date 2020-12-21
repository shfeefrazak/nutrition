<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin | Test</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap/css/bootstrap.css'?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() . 'webres/admin//plugins/node-waves/waves.css'?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() . 'webres/admin//plugins/animate-css/animate.css'?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url() . 'webres/admin//css/style.css'?>" rel="stylesheet">
</head>

<body class="login-page" style="background-color: #005863;">
    <div class="login-box">
        <div class="logo text-center">
            <h1 style="color: #ffcc99"> Admin section for test project nutrious (password/all encyptions are not using) </h1>    
        </div>
         <?php
                $data = isset($data) ? $data : array();
                $formAttributes = array('id' => 'loginFrom', 'data-parsley-validate' => '');

                echo form_open('adminlogin', $formAttributes);
                ?>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                  <p class="col-pink text-center">  <?= getFeedbackMessage() ?></p>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username_of" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_of" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                             <input type="hidden" id="initscr" name="initscr" required="">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" >SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                       
                        <div class="col-xs-6 align-right">
                            <a href="<?= base_url('forgotpassword') ?>">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() . 'webres/admin/plugins/jquery/jquery.min.js'?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url() . 'webres/admin/plugins/bootstrap/js/bootstrap.js'?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url() . 'webres/admin/plugins/node-waves/waves.js'?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url() . 'webres/admin/plugins/jquery-validation/jquery.validate.js'?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url() . 'webres/admin/js/admin.js'?>"></script>
    <script src="<?php echo base_url() . 'webres/admin/js/pages/examples/sign-in.js'?>"></script>
</body>


</html>


