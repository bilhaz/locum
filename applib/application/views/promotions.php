<main class="site-content store-content" itemscope="itemscope" itemprop="mainContentOfPage" role="main" style="/*padding:0px;*/margin-bottom: 0px">
<?php $this->load->view('categories') ?>
<?php // $products = $this->admin_model->get_products_by_subcat($id); ?>
<div class="col-lg-9" style="padding: 0px">
    <header class="woocommerce-products-header">
        <h3 class="title" style="margin-bottom: 0px">Promotions</h3></header>
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
                <div class="img-wrapper">
                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?= app_url . "assets/products_thumbs/$product->thumb" ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                </div>
                <div class="excerpt-wrapper">
                    <!--<a class="primary-cat" href="#">cat Name</a>-->
                    <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                    <div style="text-align:center;font-size: 1.3em;color: #ff6a00">Rs.&nbsp;<b style="text-decoration: line-through;"><?php echo $product->price; ?> </b>&nbsp; <b style="color:#09db09"><?php echo ($product->price- round(( (($product->productPromotion/100)*$product->price)),0)); ?> </b>
    <?php //$product->unit  ?>
                        <input style="display:none" type="hidden" value="1" name="quantity" id="<?= $product->productId ?>" class="quantity">
                        <br> <a class="carting" data-productid="<?= $product->productId ?>"  data-productname="<?= $product->productTitle ?>"  data-image="<?= $product->thumb ?>" data-price="<?=$product->productPromotion?>"><img width="70%" src="<?= site_url('assets/imgs/buy.jpg') ?>"></a>
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
   
</div> <?php echo $this->pagination->create_links(); ?>