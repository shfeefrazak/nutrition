<?php
$cartitems = isset($data['cartitems']) ? $data['cartitems'] : array();
?>

<!--Page Contents-->
<div id="page-content">
    <section id="welcome">
        <div class="container-fluid">
            <div class="row center mx-0">
                <?php if( $cartitems != null) { ?>
                
                <table style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 50%">Name</th>
                            <th style="width: 50%">Price</th>
                            <th style="width: 50%">QTY</th>
                        </tr>

                    </thead>
                    <tbody>
                        
                        <?php  foreach ($cartitems as $item) { ?>
                            <tr>
                                <td style="width: 50%"><?= getval($item, 'data_head') ?></td> 
                                <td style="width: 50%"><?= getval($item, 'data_price') ?></td> 
                                <td style="width: 50%"><?= getval($item, 'qty') ?></td> 
                            </tr>
                        <?php }  ?>

                    </tbody>

                </table>
                <?php /*   // We can use ajax to checkot cart and destroy the session or we can do in the CTRL simple 
                  // I used the CRTL here, Before that we need to save cart as order, i didn't done that here */ ?>
             
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
               <button  title="Checkout" id="myHref" ><i class="fas fa-cart-plus"></i></button>
                <script >
                    $("#myHref").on('click', function () {
                        alert("confirm Check out");
                        window.location = "<?= base_url() .'check-out' ?>";
                    });
                </script>
                
                
                
                <?php }else{ ?>
                <h2>Cart Empty</h2>
                <?php } ?>
                
            </div>
        </div>
    </section>




    <?php /* here is ajax version */ ?>
    
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
                    function destroy_session() {
                        var xmlhttp = getXmlHttp();
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open('GET', './destroy_session.php', true);
                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4) {
                                if (xmlhttp.status == 200) {
                                    alert(xmlhttp.responseText);
                                }
                            }
                        };
                        xmlhttp.send(null);
                    }
    </script>