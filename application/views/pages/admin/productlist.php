<?php
$postlist = isset($data['list']) ? $data['list'] : array();
$filter = isset($data['filter']) ? $data['filter'] : array();
$categorylist = isset($data['category']) ? $data['category'] : array();
?>

<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-offset-6 col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categories<small>Add and edit categories...</small>
                        </h2>

                        <div class="row clearfix">
                            <form action="<?= base_url('admin/add_edit_cat') ?>" id="add_edit_cat"  enctype="multipart/form-data"  method="post" accept-charset="utf-8">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Category name...." value="<?= getval($filter, 'cat_name') ?>" name="cat_name" required=""/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <input type="hidden" value="<?= getval($filter, 'cat_id_pk') ?>" name="cat_id_pk"/>
                                    <button class="btn btn-primary waves-effect">UPDATE</button>
                                </div>
                            </form>
                        </div>


                        <ul class="header-dropdown m-r--5">

                            <li>
                                <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="timer" id="tog">
                                    <i class="material-icons">loop</i>
                                </a>
                            </li>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $("#tog").click(function () {
                                        $("#hide").toggle();
                                    });
                                });
                            </script>

                        </ul>
                    </div>



                    <div class="body table-responsive" id="hide">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                IF (count($categorylist) > 0) {
                                    $i = 1;
                                    foreach ($categorylist as $cat) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php
                                                echo $i;
                                                $i++
                                                ?></th>
                                            <td><?= getval($cat, 'cat_name') ?></td>
                                            <?php if (getval($cat, 'cat_status') == Cons::STATUS_ACTIVE) { ?>
                                                <td><span class="label label-success">Published</span></td>
                                            <?php } elseif (getval($cat, 'cat_status') == Cons::STATUS_BLOCK) { ?>
                                                <td><span class="label label-danger">Blocked</span></td>
                                            <?php } ?>   
                                            <td><a href="<?= base_url() . 'admin/add_edit_cat?postid=' . getval($cat, 'cat_id_pk') ?>"> <button type="button" class="btn btn-warning waves-effect">Edit</button></a></td>
                                            
                                            <?php if (getval($cat, 'cat_status') == Cons::STATUS_ACTIVE) { ?>
                                                <td><a href="<?= base_url() . 'change_cat_status/' . getval($cat, 'cat_id_pk') . '/' . Cons::STATUS_BLOCK ?>"><button type="button" class="btn btn-danger waves-effect todisable">Block</button></a></td>
                                            <?php } elseif (getval($cat, 'cat_status') == Cons::STATUS_BLOCK) { ?>
                                                <td><a href="<?= base_url() . 'change_cat_status/' . getval($cat, 'cat_id_pk') . '/' . Cons::STATUS_ACTIVE ?>"><button type="button" class="btn btn-success waves-effect todisable">Publish</button></a></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Products<br>
                            <?= getFeedbackMessage() ?>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="<?= base_url('admin/add_edit_product') ?>" > <button type="button" class="btn btn-danger waves-effect">Add Product</button></a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tittle</th>
                                        <th>Image</th>
                                        <th>Added,Updated</th>
                                        <th>Status</th>
                                        <th colspan="2"> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    IF (count($postlist) > 0) {
                                        $i = 1;
                                        foreach ($postlist as $post) {
                                            ?>
                                            <tr>
                                                <td><?php
                                                    echo $i;
                                                    $i++
                                                    ?></td>

                                                <td style="width: 40%">  <?= getval($post, 'data_head') ?><br> <br> <b style="color: red;float: right"><?= getval($post, 'cat_name') ?>  <br>Date : <?= getval($post, 'data_date') ?> </b></td>
                                                <td ><img src="<?= base_url() . getval($post, 'data_img') ?>" style="width: 100px;height: 100px" ></td>
                                                <td><?= dbDate2UIdate(getval($post, 'data_added'), TRUE) ?><br>
                                                    <?= dbDate2UIdate(getval($post, 'data_updated'), TRUE) ?>
                                                </td>
                                                <?php if (getval($post, 'data_status') == Cons::STATUS_ACTIVE) { ?>
                                                    <td><span class="label label-success">Published</span></td>
                                                <?php } elseif (getval($post, 'data_status') == Cons::STATUS_BLOCK) { ?>
                                                    <td><span class="label label-danger">Blocked</span></td>
                                                <?php } ?>   
                                                <td><a href="<?= base_url() . 'admin/add_edit_product?postid=' . getval($post, 'data_id_pk') ?>"> <button type="button" class="btn btn-warning waves-effect">Edit</button></a></td>
                                                <?php if (getval($post, 'data_status') == Cons::STATUS_ACTIVE) { ?>
                                                    <td><a href="<?= base_url() . 'change_post_status/' . getval($post, 'data_id_pk') . '/' . Cons::STATUS_BLOCK ?>"><button type="button" class="btn btn-danger waves-effect todisable">Block</button></a></td>
                                                <?php } elseif (getval($post, 'data_status') == Cons::STATUS_BLOCK) { ?>
                                                    <td><a href="<?= base_url() . 'change_post_status/' . getval($post, 'data_id_pk') . '/' . Cons::STATUS_ACTIVE ?>"><button type="button" class="btn btn-success waves-effect todisable">Publish</button></a></td>
                                                <?php } ?>
                                                    <td><a href="<?= base_url() . 'admin/delete_data/' . getval($post, 'data_id_pk') ?>" onclick="return confirm('Are you sure you want to delete this item?');"> <button type="button" class="btn bg-purple waves-effect"><i class="material-icons">delete</i></button></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>

