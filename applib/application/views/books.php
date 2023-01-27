<link rel="stylesheet" href="<?=site_url('assets/owlcarousel/assets/owl.carousel.min.css')?>">
<link rel="stylesheet" href="<?=site_url('assets/owlcarousel/assets/owl.theme.default.min.css')?>">
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
    .site-content{
        padding: 0px 1em;
    }               
    a:hover, a:visited, a:link, a:active { text-decoration: none;
    }
    .elementor img{
        padding: 1em 0em 0em 0em;
    }
    a.list-group-item{
        margin-bottom: 8px;
        box-shadow: 2px 2px #c6c6c6;
        padding: 5px;
        padding-right: 15px;

    }
/*    body{
       direction:rtl
    }*/
</style>    


<div class="container " role="dialog" style="min-height: 700px;margin-top: 50px;background: url('<?=  site_url('assets/bg2.jpg')?>') no-repeat center center fixed;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; ">
    <br><br>
    <div class="row">
        
        <div class="col-lg-12">
            <h3 style="direction:rtl"><?=$books[0]->name?></h3>
            <div class="list-group">
                <?php foreach($books as $row): ?>
                <a href="<?=  site_url("home/description/$row->productId")?>" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                      <h4 class="mb-1" style="direction:rtl"><i class="fa fa-book"></i> <?=$row->productTitle?> </h4>
                    <!--<small>3 days ago</small>-->
                  </div>
                </a>
                <?php endforeach; ?>
                
                
              </div>
            <hr>
            <h2>Related:</h2>
          <div class="owl-carousel owl-theme">
              <?php $cats=$this->base_model->get_categories_by_author(1); 
                $i=1;
                    foreach ($cats as $row2):
                ?>
              <div class="item" onclick="window.location='<?=  site_url("home/books/$row2->catId")?>'"><img src="<?=site_url("assets/cat_thumbs/$row2->catId.jpg")?>"  style="padding: 5px;" class="img-responsive img-rounded text-right"><h3 align="center"><?=$row2->name?></h3></div>
                <?php endforeach; ?> 
            </div>
          
          
            
<!--            <br><br>
            <a href="#" class="btn btn-sq-lg btn-default" style="margin-left:10%">
                <i class="fa fa-user fa-5x"></i><br>
                Demo Primary <br>Button
            </a>
            <a href="#" class="btn btn-sq-lg btn-default pull-right" style="margin-right:10%">
                <i class="fa fa-user fa-5x"></i><br>
                Demo Primary <br>Button
            </a>
            <br>
            <br>
            <a href="#" class="btn btn-sq-lg btn-default" style="margin-left:10%">
                <i class="fa fa-user fa-5x"></i><br>
                Demo Primary <br>Button
            </a>&nbsp;&nbsp;&nbsp;
            <a href="#" class="btn btn-sq-lg btn-default pull-right" style="margin-right:10%">
                <i class="fa fa-user fa-5x"></i><br>
                Demo Primary <br>Button
            </a>-->
        </div>
    </div>
</div>
<script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=site_url('assets/owlcarousel/owl.carousel.js')?>"></script>
<script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>