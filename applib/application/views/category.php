<main class="site-content store-content" itemscope="itemscope" itemprop="mainContentOfPage" role="main" style="/*padding:0px;*/margin-bottom: 0px">
<?php $this->load->view('categories') ?>
<?php // $products = $this->admin_model->get_products_by_subcat($id); ?>
<div class="col-lg-9" style="padding: 0px">
    <header class="woocommerce-products-header">
        <h3 class="title" style="margin-bottom: 0px"><?= urldecode($name) ?></h3></header>


    <?php
    $i = 1;
    foreach ($products as $product):
        ?>
        <li style=" list-style: none;border: 1px solid #c1c1c1; border-collapse: collapse;" class="col-lg-4 col-sm-6 col-xs-6 product" >
            <div class="inner-wrapper with-extra-gallery">
                <?php if ($product->productPromotion > 0) { ?> <span class="badge badge-pill badge-success pull-left" style="height: 45px; position: absolute;z-index: 100;
    padding-top: 15px;
    text-align: center;
    font-size: 14px;
    border-radius: 50px
">-<?=$product->productPromotion?>%</span> <?php } ?>
                <a href="<?= site_url("home/description/$product->productId") ?>">
                <div class="img-wrapper" style="min-height: 150px;">
                    <img width="300" height="300" src="<?= parent_url . 'assets/products_thumbs/'.explode(',',$product->thumb)[0] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/>
                </div>
                </a>
                <div class="excerpt-wrapper">
                    <!--<a class="primary-cat" href="#">cat Name</a>-->
                    <h5  class="wraping" style="font-weight:600"><?php echo $product->productTitle; ?> </h5>
<div class="col-md-4 star-border rating" style="padding:0px">
                                                    <a >
                                                        <img src="<?= site_url("assets/star$product->stars.png") ?>" class="img-responsive center-block"> 
                                                    </a>
                                                </div>  
                                                <div class="col-md-8 text-muted text-center" style="padding-left:0px;padding-right: 0px;font-size: 11px; color:#0077b3"> (<?=$product->prdReviews?> <span>Customer Reviews</span>)</div>
                                                <br>
                    <!--                                                                           <div class="short-description">
                                                                                                  <p>Description</p>
                                                                                               </div>-->
                    <div style="text-align:center;font-size: 1.3em;color: #ff6a00">Rs.&nbsp;<?php if($product->productPromotion>0){ ?><b style="text-decoration: line-through;"><?php echo $product->price; ?> </b>&nbsp; <b style="color:#09db09"><?php echo $price=$product->price- round(( (($product->productPromotion/100)*$product->price)),0); ?> </b><?php } else{ ?> <b><?php echo $price=$product->price; ?> </b><?php } ?>
    <?php //$product->unit  ?>
                        <input style="display:none" type="hidden" value="1" name="quantity" id="<?= $product->productId ?>" class="quantity">
                        <br> 
                        <button class="btn btn-green btn-block carting"  data-productid="<?= $product->productId ?>"  data-productname="<?= $product->productTitle ?>"  data-image="<?= explode(',',$product->thumb)[0] ?>" data-price="<?= $price ?>"> 
                                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                                            </button>
                        <!--<a class="carting" data-productid="<?= $product->productId ?>"  data-productname="<?= $product->productTitle ?>"  data-image="<?= $product->thumb ?>"  data-price="<?= $price?>"><img width="70%" src="<?= site_url('assets/imgs/buy.jpg') ?>"></a>-->
                    </div>

                </div>
            </div>
        </li>
        <?php
        if ($this->agent->is_mobile()) {
            if ($i % 2 == 0)
                echo '<div class="clearfix"></div>';
        }
        else if ($i % 4 == 0) {
            echo '<div class="clearfix"></div>';
        }
        $i++;
        ?>
<?php endforeach; ?>

</div>
</div><?php echo $this->pagination->create_links(); ?>
</main> 