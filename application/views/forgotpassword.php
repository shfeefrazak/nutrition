<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap/css/bootstrap.css'?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/node-waves/waves.css" rel="stylesheet'?>" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/animate-css/animate.css'?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url() . 'webres/admin/css/style.css'?>" rel="stylesheet">
</head>

<body class="fp-page" style="background-color: #005863;">
    <div class="fp-box">
         <div class="logo text-center">
            <h1 style="color: #ffcc99"> GAMI - Admin Section </h1>    
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                        <p class="col-pink text-center">Note: This option is disabled, Please contact your provider </p>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" disabled="">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?= base_url('adminlogin') ?>">Sign In!</a>
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
    <script src="<?php echo base_url() . 'webres/admin/js/pages/examples/forgot-password.js'?>"></script>
</body>

</html>