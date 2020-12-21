<?php
$categorylist = isset($data['category']) ? $data['category'] : array();
?>
<style></style>
<section class="content">
    <div class="container-fluid">

        <!-- Basic Validation -->
        <div class="row clearfix" id="printableArea">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Add / Edit  - Product</h2> 
                        <ul class="header-dropdown m-r--5">
                        </ul>
                        <?= getFeedbackMessage() ?>
                    </div>

                    <?php
                    $filter = isset($data['filter']) ? $data['filter'] : array();
                    ?>
                    <form action="<?= base_url('admin/add_edit_product') ?>" id="add_edit_product"  enctype="multipart/form-data"  method="post" accept-charset="utf-8">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding"> lang</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                            <script type="text/javascript">
                                                function jsFunction(value)
                                                {
                                                    if (value === 'ar'){
                                                        $('body').addClass('direction-rtl') ;
                                                    }else{
                                                       $('body').removeClass('direction-rtl') ; 
                                                    }
                                                   
                                                }
                                            </script>
                                            <select class="form-control show-tick"  name="data_lang" onmousedown="this.value = '';" onchange="jsFunction(this.value);">
                                                <option value="">-- Select lang --</option>
                                                <option onclick ="changeToRTL();" value="ar" <?php
                                                    if (getval($filter, 'data_lang') == 'ar') {
                                                        echo 'selected';
                                                    }
                                                    ?> >Arabic</option>
                                                <option onclick ="changeToLTR();" value="en"  <?php
                                                    if (getval($filter, 'data_lang') == 'en') {
                                                        echo 'selected';
                                                    }
                                                    ?>>English</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding"> Region</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick"  name="data_region">
                                                <option value="">-- Select Region --</option>
                                                <option value="sa"<?php
                                                    if (getval($filter, 'data_region') == 'sa') {
                                                        echo 'selected';
                                                    }
                                                    ?> >Saudi</option>
                                                <option value="ae" <?php
                                                    if (getval($filter, 'data_region') == 'ae') {
                                                        echo 'selected';
                                                    }
                                                    ?> >UAE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding"> Date</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date..." value="<?= getval($filter, 'data_date') ?>" name="data_date" data-dtp="dtp_0Mp6g" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding"> Category</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick"  name="data_cat_id">
                                                <option value="">-- Select Cat --</option>
                                                <?php foreach ($categorylist as $cat) { ?> 
                                                    <option value="<?= getval($cat, 'cat_id_pk') ?>" <?php
                                                    if (getval($filter, 'data_cat_id') == getval($cat, 'cat_id_pk')) {
                                                        echo 'selected';
                                                    }
                                                    ?>><?= getval($cat, 'cat_name') ?></option>
                                                        <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding">Product Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Enter the Product Name....." value="<?= getval($filter, 'data_head') ?>" name="data_head" required=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding"> Price</label>
                                </div>
                                <div class=" col-sm-10">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Enter the Product Price....." value="<?= getval($filter, 'data_price') ?>" name="data_price" required=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding">Availability</label>
                                </div>

                                <div class="col-sm-2">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_2" name="data_avail" class="filled-in" value="1" <?php
                                        if (getval($filter, 'data_avail') == 1) {
                                            echo 'checked';
                                        }
                                        ?> />
                                        <label for="basic_checkbox_2"></label>

                                    </div>
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <label class="from-label-padding">Image</label>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder=""  name="updateimage" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <?php if (getval($filter, 'data_img') != null) { ?>
                                        <img src="<?= base_url() . getval($filter, 'data_img') ?>" width="20%" class="img-responsive">
                                        <input type="hidden" value="<?= getval($filter, 'data_img') ?>" name="data_img"/>       
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-offset-3 col-sm-2">
                                    <input type="hidden" value="<?= getval($filter, 'data_id_pk') ?>" name="data_id_pk"/>
                                    <input type="hidden" value="<?= Cons::DATA_TYPE_PRODUCT ?>" name="data_type"/>
                                    <button class="btn btn-primary waves-effect" onclick="return confirm('Are you sure?')">UPDATE</button>
                                </div>
                            </div>


                        </div>
                </div>
            </div>
        </div>
        <!--#END# DateTime Picker -->




    </div>
</section>
