<?php
$product = isset($data['product']) ? $data['product'] : array();
?>

<!--Page Contents-->
<div id="page-content">
    <section id="welcome">
        <div class="container-fluid">
            <div class="row center mx-0">



                <div class="col-xl-8 align mb-5 mb-lg-0">
                    <div class="wrap-h d-none d-lg-block">
                        <img src="<?= base_url() . getval($product, 'data_img') ?>" alt="<?= seoUrl(getval($product, 'data_head')) ?>" width="10%">
                    </div>
                    <div class="content px-0 px-md-5">
                        <h1 class="mb-4"><?= getval($product, 'data_head') ?></span></h1>
                        <p>
                            price : <?= getval($product, 'data_price') ?><br>
                            <?php if (getval($product, 'data_avail') == 1) { ?>
                                <?php /* echo '<b style="color: green"> Available</b>';  // php comment; can't visible on browser inspect, dispalying HTML if condition in php echo function */ ?>
                             
                        <form action="<?= base_url() . 'app-name/add-to-cart' ?>" method="post">
                                <input type="hidden" id="product_id" name="product_id" value="<?= getval($product, 'data_id_pk') ?>">
                                <input type="number" id="quantity" name="quantity" min="1" max="50"><br>
                                <br>
                                 <button  title="add to cart"><i class="fas fa-cart-plus"></i></button>  
                            </form>
                        <?php } else { ?>
                            <b style="color: red"> Not Available</b>
                        <?php } ?>

                        </p>
                    </div>
                </div>


            </div>
        </div>
    </section>




