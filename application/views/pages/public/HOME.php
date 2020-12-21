<?php
// getting data from controller and checking is there anything coming like that or it's empty, then return array, or the actual data.
$productlist = isset($data['productlist']) ? $data['productlist'] : array();
$region = $this->uri->segment(2);
$lang = $this->uri->segment(3);
$place = '';
$curency = '';
// Taking region and lang from url and setting currency and they based on that
if ($region == 'sa') {
    $place = 'Saudi';
    $curency = 'SR';
} elseif ($region == 'ae') {
    $place = 'UAE';
     $curency = 'AED';
}
$language = '';
if ($lang == 'ar') {
    $language = 'Arabic';
    ?>

<?php
} elseif ($lang == 'en') {
    $language = 'English';
}
?>

<!--Page Contents-->
<div id="page-content">

    <!--Section Products-->
    <section id="cap">
        <div class="container-fluid">
            <h1 class="pb-5 wow fadeInUp" data-wow-duartion="1.5s" data-wow-delay="100ms"><span> <?= $place ?> </span> <?= $language ?>
            </h1>

            <div class="row mx-0">
                
                <?php // displaying all related data here in a foreach loop. 
                      // getval funtion is used to print_r, but if the in array/index null, no error will show
                foreach ($productlist as $product) { ?>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3 mb-5 px-3">
                        <a href="<?= base_url().'app-name/product-detail/' . seoUrl(getval($product, 'data_head')) .'/'. getval($product, 'data_id_pk')  ?>">
                            <div class="value-card wow fadeInUp" data-wow-duartion="1.5s" data-wow-delay="300ms">
                                <div class="head">
                                    <img src="<?= base_url() . getval($product, 'data_img') ?>" alt="<?= seoUrl(getval($product, 'data_head')) ?>">
                                </div>
                                <div class="body">
                                    <h3><?= getval($product, 'data_head') ?></h3>
                                    <p>
                                        price : <?= getval($product, 'data_price') ?>  <?= $curency ?><br>
                                        <?php if (getval($product, 'data_avail') == 1) { ?>
                                            <?php /* echo '<b style="color: green"> Available</b>';  // php comment; can't visible on browser inspect, dispalying HTML if condition in php echo function */ ?>
                                            <button   title="add to cart"><i class="fas fa-cart-plus"></i></button>                            
                                            <?php } else { ?>
                                        <b style="color: red"> Not Available</b>

                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>

        </div>
    </section>
    <!--End Section Products-->



