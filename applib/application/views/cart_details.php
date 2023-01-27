<main class="site-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage" style="background-color: #FFF">
    <article id="post-1706" class="post-1706 page type-page status-publish hentry badges-style-3">
        <br><br><h2 class="page-title"><span>Cart</span></h2>
        <div class="entry-content">
            <div class="woocommerce" id="contents">
                <a class="button empty-cart" href="<?=  site_url('home/delete_cart')?>" >Delete All</a>
                <form class="woocommerce-cart-form" action="#" method="post">
                    <table class=" table-striped" style="width: 100%" cellspacing="0">
<!--                        <thead>
                            <tr>
                                <th class="product-remove" style="width: 10%;">&nbsp;</th>
                                <th class="product-name" colspan="2" align="center"> Product(s)</th>
                                <th class="product-price" >Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>-->
                        <tbody id="tbl">
                          <?php $total=0;  foreach($this->cart->contents() as $items)
                            {
                             $total+=$items["qty"]*$items["price"];
                              ?>
                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                
                                <td class="product-thumbnail" style="border-right: none;width: 90px;background-color: #fff;">
                                    <img style="width:90px !important;height:90px !important;" src="<?php echo parent_url."assets/products_thumbs/".$items['image'];?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="">
                                </td>
                                <td class="product-name" data-title="Product" colspan="4" style="background-color: #fff"> 
                                    <div class="col-lg-12"><?=$items['name']?></div><br>
                                    <div class="col-lg-12">
                                       <span class="woocs_special_price_code">
                                           <button onclick="updt_inc(jQuery(this),'<?=$items["rowid"]?>')" style="width: 35px;height: 35px;float:right" class="btn btn-default" type="button">+</button> <input style="width: 40px; float:right;height: 35px" onkeyup="updt(jQuery(this),'<?=$items["rowid"]?>')"  type="number" id="qty"   class=" qty text" step="1" min="1" max="5" value="<?=$items['qty']?>" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" required=""> <button onclick="updt_dec(jQuery(this),'<?=$items["rowid"]?>')" style="width: 35px;height: 35px;float:right" class="btn btn-default" type="button">-</button>
                                           <br><br><br> 
                                           <span class="woocommerce-Price-amount amount" style="margin-top: 80px;background: #edeaea;padding: 5px;padding-bottom: 0px;">
                                                <span class="woocommerce-Price-currencySymbol">Rs.</span>
                                                &nbsp;<?=$items['price']?> x <?=$items['qty']?> = <span style="font-weight: 700"><?=$items['price']*$items['qty']?></span> 
                                            
                                            </span>
                                           
                                        </span>
                                    </div>
                                </td>
<!--                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                    <button onclick="updt_inc(jQuery(this),'<?=$items["rowid"]?>')" style="margin-top: 5px;/* margin-left: 10px; */text-align: center;padding: 4px;width: 70%;height: 25px;" class="btn btn-default" type="button">+</button>
                                    <div class="">
                                        <label class="screen-reader-text" for="quantity_5b4f5c55ba84b">Quantity</label>
                                        <input style="width: 70%; text-align: center" onkeyup="updt(jQuery(this),'<?=$items["rowid"]?>')"  type="number" id="qty"   class=" qty text" step="1" min="1" max="5" value="<?=$items['qty']?>" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" required=""></div>
                                    <button onclick="updt_dec(jQuery(this),'<?=$items["rowid"]?>')" style="margin-bottom: 5px;/* margin-left: 10px; */text-align: center;padding: 4px;width: 70%;height: 25px;" class="btn btn-default" type="button">-</button>
                                </td>
                                <td class="product-subtotal" data-title="Total"> 
                                    <span class="woocs_special_price_code">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">Rs.</span>
                                            <?=$items['price']*$items['qty']?>
                                        </span> 
                                    </span>
                                </td>-->
                                <td class="product-remove" style="width: 10%;text-align:center"> <a href="<?=  site_url('home/remove_tbl_item/'.$items["rowid"])?>" aria-label="Remove this item" data-product_id="34" >×</a> </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="6" class="actions" style="height:65px;text-align: center">
<!--                                    <div class="coupon">
                                        <label for="coupon_code">Coupon:</label>
                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                    </div>-->
                                    <!--<button type="submit" class="button" name="update_cart" value="Update cart" >Update cart</button>-->
                                    <a class="link-to-shop" href="<?=  site_url()?>" rel="nofollow">Continue Shopping<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                
                <div class="cart-collaterals"><br>
                    <div class="cart_totals ">
                        <h2>Cart total</h2>
                        <table cellspacing="0" class="shop_table shop_table_responsive">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal"><span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<?=$total?></span>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<?=$total?></span></span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout"> <a href="<?=site_url('home/checkout')?>" class="checkout-button button alt wc-forward"> Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
<script>
 function updt(ref,rid){
     var qty;
     if(!$.trim(ref.parent().parent().find('.qty').first().val()).length){
            qty=1;
          }
     else {
            qty=ref.parent().parent().find('.qty').first().val(); 
            $.post('<?=  site_url('home/update_tbl_item/')?>/' + rid+'/'+qty, function(result){
                $('#contents').html(result); 
            });
           }
        }
   function updt_inc(ref,rid){
     var qty;
     if(!$.trim(ref.parent().parent().find('.qty').first().val()).length){
            qty=1;
          }
     else {
            qty=parseInt((ref.parent().parent().find('.qty').first().val()))+parseInt(1); 
            $.post('<?=  site_url('home/update_tbl_item/')?>/' + rid+'/'+qty, function(result){
                $('#contents').html(result); 
            });
           }
        }
     function updt_dec(ref,rid){
     var qty;
     if(!$.trim(ref.parent().parent().find('.qty').first().val()).length){
            qty=1;
          }
     else {
            qty=parseInt((ref.parent().parent().find('.qty').first().val()))-parseInt(1); 
            $.post('<?=  site_url('home/update_tbl_item/')?>/' + rid+'/'+qty, function(result){
                $('#contents').html(result); 
            });
           }
        }
    </script>