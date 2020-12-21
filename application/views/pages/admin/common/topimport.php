<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Test Admin section for netrious</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url() . 'favicon.ico' ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap/css/bootstrap.css' ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/node-waves/waves.css' ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/animate-css/animate.css' ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url() . 'webres/admin/css/style.css' ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() . 'webres/admin/css/themes/all-themes.css' ?>" rel="stylesheet" />


    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css' ?>" rel="stylesheet" />


    <!-- Wait Me Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/waitme/waitMe.css' ?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url() . 'webres/admin/plugins/bootstrap-select/css/bootstrap-select.css' ?>" rel="stylesheet" />   
</head>


<?php $feed  = getFeedbackMessage();
 $FLAG = limitString($feed);
 
?>
<style>
    body {
        zoom: 70%;
    }
</style>

<body class="theme-green" <?php if($feed != NULL){ if($FLAG == "ly"){$color = "bg-black";}else{$color = "bg-red";}   ?> onload="showNotification('<?= $color ?>','<?=$feed?>','bottom','center')" <?php } ?>>









