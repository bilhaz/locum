<?php $this->load->view('categories')?>

    <?php $products=$this->admin_model->get_products_by_cat($id); ?>
    <main class="site-content store-content" itemscope="itemscope" itemprop="mainContentOfPage" role="main">
        <header class="woocommerce-products-header"><br><br>
            <h1 class="woocommerce-products-header__title page-title"><?=$name?></h1></header>
            
        <div class="view-controls-wrapper">
            <p class="woocommerce-result-count"> (<?=count($products)?> Products )</p>
            <hr style="border:1px #CCC solid">
<!--            <form class="woocommerce-ordering" method="get">
                <select name="orderby" class="orderby">
                    <option value="popularity">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="date" selected="selected">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
                <input type="hidden" name="paged" value="1">
            </form>-->
        </div>
        <ul class="products columns-3">
            <?php  
                                                                                        foreach($products as $product):
                                                                               ?>
                                                                  <li class="post-99 product type-product status-publish has-post-thumbnail product_cat-brake-parts product_cat-performance-chips product_cat-performance-parts product_cat-suspension-systems product_tag-all-season product_tag-wheels badges-style-3 first instock shipping-taxable purchasable product-type-simple">
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=  site_url("assets/products_thumbs/$product->thumb")?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                              <h2 class="woocommerce-loop-product__title"><?=$product->productTitle?></h2>
                                                                           </a>
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div class="price-wrapper"> <span class="price"><span class="woocs_price_code" data-product-id="99"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<b><?=$product->price?></b> x </span></span>  </span> <input type="number" value="1" name="quantity" id="<?=$product->productId?>" class="quantity" style="width:50px;padding: 5px;"><span style="font-size:15px"><?=$product->unit?></span> <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>">Add to cart</a></div>
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php endforeach; ?>
        </ul>
    </main>
</div></div></div></div></div></div></div>