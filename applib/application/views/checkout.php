<main class="site-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage" style="background-color: #FFF">
   <article id="post-1707" class="post-1707 page type-page status-publish hentry badges-style-3">
       <br> <h2 class="page-title"><span>Checkout</span></h2>
       <hr>
      <div class="entry-content">
         <div class="woocommerce">
<!--            <div class="coupon-wrapper">
               <div class="woocommerce-form-coupon-toggle">
                  <div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a></div>
               </div>
               <form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
                  <p>If you have a coupon code, please apply it below.</p>
                  <p class="form-row form-row-first"> <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value=""></p>
                  <p class="form-row form-row-last"> <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button></p>
                  <div class="clear"></div>
               </form>
            </div>-->
<form id="form" method="post" class="checkout woocommerce-checkout" action="<?=  site_url('home/save_order')?>" enctype="multipart/form-data" >
<!--               <div class="col2-set" id="customer_details">
                  <div class="col-1">
                     <div class="woocommerce-billing-fields">
                        <h3>Billing details</h3>
                        <div class="woocommerce-billing-fields__field-wrapper">
                            <div id="delivery-info-block">
                                
                           </div>
                            <div class="col-xs-8 " style="padding-left: 0px"><p class="form-row form-row-wide " id="" ><label for="Mobile" class="">Mobile&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " style="color:#000" id="mobile" name="mobile" placeholder="03331234567" required autocomplete="off"></span></p></div>
                            <p class="form-row form-row-wide " id="" ><label for="name" class="">Name&nbsp;<abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="name" id="name"  style="color: #000" placeholder="Name" value="" required="" autocomplete="off"></p>
                            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px"><p class="form-row form-row-wide " id="" ><label>City&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input  style="color: #000"  id="city" name="city"  class="form-control" placeholder="City"></span></p></div>
                            
                            <p class="form-row form-row-wide " id="" ><label for="name" class="">Address&nbsp;<abbr class="required" title="required" >*</abbr></label><span class="woocommerce-input-wrapper"> <input type="text" class="input-text " id="address" name="address"  style="color: #000" placeholder="Address" autocomplete="off" required></span></p>
                            <p class="form-row form-row-wide " id="" ><label for="name" class="">Comment &nbsp;(Suggest products to add) <span  class=' text-muted'>[Optional]</span></label><textarea  name="comments"  style="color: #000" ></textarea></p>
                            <p class="form-row form-row-wide " id="" ><label for="name" class="">Note: Please keep cash ready and pay to delivery person.</label></p>
                             
                            
                            <div id="delivery-info-block">
                                
                           </div>
                            <hr>
                        </div>
                     </div>
                  </div>
                  <div class="col-2">
                     <div class="woocommerce-shipping-fields"></div>
                     <div class="woocommerce-additional-fields">
                        <h3>Additional information</h3>
                        <div class="woocommerce-additional-fields__field-wrapper">
                           <p class="form-row notes" id="order_comments_field" data-priority=""><label for="order_comments" class="">Order notes&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea></span></p>
                        </div>
                     </div>
                  </div>
               </div>
    -->
               <div class="order-wrapper">
                  <h3 id="order_review_heading">Your order</h3>
                  <div id="order_review" class="woocommerce-checkout-review-order">
                     <table class="shop_table woocommerce-checkout-review-order-table">
                        <thead>
                           <tr>
                              <th class="product-name">Product(s)</th>
                              <th class="product-total">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php $total=0;  foreach($this->cart->contents() as $items)
                            {
                             $total+=$items["qty"]*$items["price"];
                              ?>
                           <tr class="cart_item">
                              <td class="product-name">
                                 <span class="img"><img width="300" height="300" src="<?=  site_url("assets/products_thumbs/".explode(',',$items['image'])[0])?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" ></span><?=$items['name']?>&nbsp;							 <strong class="product-quantity">× <?=$items['qty']?></strong>													
                              </td>
                              <td class="product-total">
                                 <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<?=$items['price']*$items['qty']?></span></span>						
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                        <tfoot>
                           <tr class="cart-subtotal">
                               <th><h4>Subtotal</h4></th>
                               <td><span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><h4>Rs. </span>&nbsp;<?=$total?></h4></span></span></td>
                           </tr>
                           <tr class="cart-subtotal" id="delivery-row">
                               <th>Delivery Package</th>
                              <td><span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span>&nbsp;<span id="delivery-amount"  style="color: #000"><?php echo 250; $total=$total+250?></span></span></span></td>
                           </tr>
                           <tr class="order-total">
                               <th><h3>Grand Total</h3></th>
                               <td><h3><strong><span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span>&nbsp;<span id="total-amount"><?=$total?></span></span></span></strong> </h3></td>
                           </tr>
                        </tfoot>
                     </table>
                     <!--<h3 class="payments-title">Delivery</h3>-->
                     <div id="payment" class="woocommerce-checkout-payment">
<!--                        <ul class="wc_payment_methods payment_methods methods">
                           <li class="woocommerce-notice woocommerce-notice--info woocommerce-info">
                               
                               
                               Delivery Details</li>
                        </ul>-->
                        <div class="form-row place-order">
                           <noscript>
                              Since your browser does not support JavaScript, or it is disabled, please ensure you click the &lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                           </noscript>
                           <div class="woocommerce-terms-and-conditions-wrapper">
                              <div class="woocommerce-privacy-policy-text"></div>
                           </div>
                            <?php if($this->session->userdata('subsId')) { ?>
                           <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                           <?php }else{ ?>
                           <a href="<?=  site_url('home/login')?>"><button type="button" class="btn btn-warning" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Please login to checkout</button></a>
                           <?php } ?>                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </article>
</main>

<script>
    
    function delivry(price,duration=null,name=''){
            
        var total=(parseFloat((jQuery('#total-amount').text()-parseFloat(jQuery('#delivery-amount').text()))))+parseFloat(price);
        jQuery('#delivery-amount').text(price);
        jQuery('#total-amount').text(total);
        jQuery('#package-name').text(' ('+name+')');
        jQuery('#devPrice').val(price);
        jQuery('#duration').val(duration);
   
    };
    $('#mobile').on("keyup", function (e) 
	{
      
        get_sub_info(); 
   
    }); 
    $('#mobile').on("change", function (e) 
	{
      
        get_sub_info(); 
   
    }); 
    function get_sub_info(){
     jQuery.ajax({
                    type: "POST",
                    url: "<?=site_url('home/get_customer_info/')?>"+'/'+$('#mobile').val(),
//                    data: $("#form").serializeArray(),
                    success: function(data){
                        if(data==1){
                            delivry(0);
                            jQuery( "#name" ).prop( "disabled", true );
                            jQuery( "#country" ).prop( "disabled", true );
                                jQuery( "#city" ).prop( "disabled", true );
                                jQuery( "#region" ).prop( "disabled", true );
                                jQuery( "#address" ).prop( "disabled", true );
//                                jQuery( "#comment" ).prop( "disabled", true );
                                jQuery("#delivery-block").hide();
                                jQuery('#package-name').text(' (Free)');
                                jQuery('#devFlag').val(1);
                           jQuery("#delivery-info-block").html('<hr><h4 style="color:green">You have Free Delivery Package</h4><span style="font-size: 0.8em;">You do not have to fill the remaining form just place the order.</span></h4><hr>');
                            }
                            else {
                                jQuery( "#name").prop( "disabled", false );
                                jQuery( "#country").prop( "disabled", false );
                                jQuery( "#city").prop( "disabled", false );
                                jQuery( "#region").prop( "disabled", false );
                                jQuery( "#address").prop( "disabled", false );
                                jQuery("#delivery-block").show();
                                jQuery('#devFlag').val(0);
                                jQuery("#delivery-info-block").html('');
                            }
                          
                    }
                    
                });
            }
    </script>