<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap/css/bootstrap.css'?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/node-waves/waves.css'?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/animate-css/animate.css'?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url() . 'webres/admin/css/style.css" rel="stylesheet'?>">
</head>

<body class="signup-page" style="background-color: #005863;">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="namesurname" placeholder="Name Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?= base_url('adminlogin') ?>">You already have a membership?</a>
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
    <script src="<?php echo base_url() . 'webres/admin/js/pages/examples/sign-up.js'?>"></script>
</body>

</html>

