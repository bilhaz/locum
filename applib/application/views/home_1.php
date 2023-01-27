
<style type="text/css">
.carousel{
    background: #2f4357;
    /*margin-top: 20px;*/
}
.carousel .item{
    /*min-height: 280px;  Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	/*margin: 20px;*/
}
</style>

<div class="row">        
                                     <div class="col-lg-12"  style="padding:0px">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel"  >
                                                            <!-- Carousel indicators -->
<!--                                                            <ol class="carousel-indicators">
                                                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                                            </ol>   -->
                                                            <!-- Wrapper for carousel items -->
                                                            <div class="carousel-inner" >                                         
                                                                <?php $i=1; foreach($slides as $slide): ?>
                                                                <div class="item <?php if($i==1) echo 'active';$i++; ?>">
                                                                     <img style="width:100%" src="<?=app_url."assets/slides_thumbs/$slide->slide"?>" alt="">
                                                                           
                                                                </div>
                                                                    <?php endforeach; ?>
                                                            </div>
                                                            <!-- Carousel controls -->
                                                            <a class="carousel-control left"  href="#myCarousel" data-slide="prev">
                                                                <span style=" padding-top: 80%;margin-left: -20%" class="fa fa-chevron-left"></span>
                                                            </a>
                                                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                                                <span  style=" padding-top: 80%;margin-right: -20%"  class="fa fa-chevron-right"></span>
                                                            </a>
                                                        </div>
                                                   
                                </div>              
     </div>

 <main class="site-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage">
            <article id="post-701" class="post-701 page type-page status-publish hentry badges-style-3">
               <div class="entry-content">
                  <div class="elementor elementor-701">
                     <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                          
                        
                                 
           
                           
                             
                           <div class="row " style=" margin-bottom: 15px;">
                               <a href="<?php echo site_url("home/category/Baverages/16")?>"> <h3>&nbsp;&nbsp;Veggies </h3></a>
                               
                                     <div class="col-lg-12">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(16);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                           <h5 class="wraping"><?php
                                                                            echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  
                                                                  <?php
                                                                   
                                                                    endforeach; ?>
                                                               
                                     </div>
                                                   
                                 </div>
                           
                           <div class="row" style=" margin-bottom: 15px;">
                                    <a href="<?php echo site_url("home/category/Baverages/2")?>"> <h3>&nbsp;&nbsp; Fruits </h3></a>
                                     <div class="col-lg-12"style="padding: 0px">
                                    
                                                      
                                                                   <?php  $i=0;$products=$this->admin_model->get_products_by_cat_front(2);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                               <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php
                                                                            echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php endforeach; ?>
                                                               
                                     </div>
                                                   
                                 </div>
                           
                           <div class="row" style=" margin-bottom: 15px;">
                               <a class="title" href="<?=  site_url("home/category/Cold Drinks/40")?>" ><h3>&nbsp;&nbsp;Beverages </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(40);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a class="title" href="<?=  site_url("home/category/Frozen Food/27")?>" ><h3>&nbsp;&nbsp;Frozen Food </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(27);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a class="title" href="<?=  site_url("home/category/Baby Food/31")?>" ><h3>&nbsp;&nbsp;Baby Food </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(31);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a class="title" href="<?=  site_url("home/category/Body Care/34")?>" ><h3>&nbsp;&nbsp;Body & Skin Care </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(34);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Diapers and wipes/30")?>" ><h3>&nbsp;&nbsp;Diapers & Wipes </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(30);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Hair Care/37")?>" ><h3>&nbsp;&nbsp;Hair Care </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(37);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Pasta and Noodles/28")?>" ><h3>&nbsp;&nbsp;Pasta and Noodles </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(28);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Canned and Packaged food/21")?>" ><h3>&nbsp;&nbsp;Canned and Packaged food </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(21);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Baby Bath And Skin Care/32")?>" ><h3>&nbsp;&nbsp;Baby Bath And Skin Care </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(32);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Oral Care/39")?>" ><h3>&nbsp;&nbsp;Oral Care </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(39);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                            
                            <div class="row" style=" margin-bottom: 15px;">
                               <a  class="title" href="<?=  site_url("home/category/Condiments And Sauces/23")?>" ><h3>&nbsp;&nbsp;Condiments And Sauces </h3></a>
                                     <div class="col-lg-9">
                                    
                                                      
                                                                   <?php $i=0;  $products=$this->admin_model->get_products_by_cat_front(23);
                                                                                        foreach($products as $product): $i++;
                                                                               ?>
                                                                <li style=" list-style: none;border-bottom: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;" class="col-lg-4 col-sm-6 col-xs-6 product" >
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=app_url."assets/products_thumbs/$product->thumb"?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                               <h5  class="wraping"><?php echo $product->productTitle; ?> </h5>
                                                                           
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div style="text-align:center;font-size: 1.1em">Rs.&nbsp;<b><?=$product->price?></b>
                                                                                 <?php //$product->unit?>
                                                                                <input style="display:none" type="hidden" value="1" name="quantity" id="<?=$product->productId?>" class="quantity">
                                                                                <br> <a class="carting" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>"><img src="<?=site_url('assets/imgs/buy.jpg')?>"></a>
                                                                            </div>
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php 
                                                                    endforeach; ?>
                                                               
                                     </div>
                                               
                                 </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </article>
         </main> 