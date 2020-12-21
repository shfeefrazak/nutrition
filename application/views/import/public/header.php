<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <img class="img-responsive" src="<?= base_url('webres/images/jcilogo.png') ?>" width="10%" height="10%"> &nbsp;
        <a class="navbar-brand js-scroll-trigger" href="<?PHP ECHO base_url() ?>">MY PORTAL <b>2017</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php
            $regUrl = '#about';
            $event = '#services';
            $contactus = '#contact';
            $currentpage = isset($data['currentpage']) ? $data['currentpage'] : NULL;
            if ($currentpage != 'HOME') {
                $regUrl = base_url();
                $event = base_url('eventdetails');
                $contactus = base_url('contactus');
            }
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <b><a class="nav-link js-scroll-trigger" href="<?php echo $regUrl; ?>">Register</a></b>
                </li>
                <li class="nav-item">
                    <b> <a class="nav-link js-scroll-trigger" href="<?php echo $event; ?>">Event</a> </b>
                </li>
                <li class="nav-item">
                    <b> <a target="_blank" class="nav-link js-scroll-trigger" href="<?= base_url('webres/images/jci_brochure.jpg') ?>">Brochure</a> </b>
                </li>
                <li class="nav-item">
                    <b> <a class="nav-link js-scroll-trigger" href="<?php echo $contactus; ?>">Contact</a> </b>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <noscript>Your browser is not supported for registration</noscript> -->