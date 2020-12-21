<?php
$tittle = isset($data['tittle']) ? $data['tittle'] : "Task Shafeef ";
$description = isset($data['description']) ? $data['description'] : "Description";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Title-->
        <title><?= $tittle; ?></title>
        <meta name="<?= $description; ?>">
        <!--Font-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
              rel="stylesheet">
      
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css">
        <meta name="robots" content="index, follow" />
        <!--Icons Library-->
        <link rel="stylesheet" href="<?= base_url() ?>vendor/fontawesome/fontawesome-free-5.14.0-web/css/all.min.css">

        <!--Additional CSS-->
        <link rel="stylesheet" href="<?= base_url() ?>vendor/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>vendor/owlcarousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>vendor/wow/animate.css">

        <!--Master CSS-->
        <link rel="stylesheet" href="<?= base_url() ?>css/master.css">



    </head>

    <body>

        <!--Fixed Social Button-->
        <div class="pos-fixed-list">
            <a href="" class="btn-fixed">
                <i class="fas fa-share"></i>
                <i class="fas fa-plus"></i>
            </a>
            <div class="pos-fixed-inner">
                <a href="https://www.linkedin.com/in/shafeef-razak-128bb2167/" target="blank"  class="btn-fixed-inner"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.instagram.com/shf_rzk/" target="blank"  class="btn-fixed-inner"><i class="fab fa-instagram-square"></i></a>
            </div>
        </div>
        <!--End Fixed Social Button-->




        <!--Header-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-user fixed-top">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>



                <div class="collapse navbar-collapse right" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-list">
                        
                        <li class="nav-item dropdown ">
                            <a class="nav-link" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">Saudi Arabia</a>
                            <div class="dropdown-menu dropdown-user" aria-labelledby="productDropdown">
                                <a href="<?= base_url('app-name/sa/ar') ?>" class="dropdown-item"> Arabic </a>
                                 <a href="<?= base_url('app-name/sa/en') ?>" class="dropdown-item"> English </a>
                            </div>
                        </li>
                         <li class="nav-item dropdown ">
                            <a class="nav-link" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">UAE</a>
                            <div class="dropdown-menu dropdown-user" aria-labelledby="productDropdown">
                                <a href="<?= base_url('app-name/ae/ar') ?>" class="dropdown-item"> Arabic </a>
                                 <a href="<?= base_url('app-name/ae/en') ?>" class="dropdown-item"> English </a>
                            </div>
                        </li>
                        
                         <li class="nav-item">
                             <a class="nav-link" href="<?= base_url().'app-name/cart' ?>" ><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url().'adminlogin' ?>">Admin(not Visible)</a>
                        </li>

                       

                    </ul>
                </div>
            </nav>
        </header>
        <!--End Header-->