
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
    }
/*    body{
       direction:rtl
    }*/
</style>    


<div class="container " role="dialog" style="min-height: 700px;margin-top: 50px;background-image: url('<?=  site_url('assets/bg.png')?>');  background-repeat: repeat;">
    <br><br>
    <div class="row">
        
        <div class="col-lg-12">
            <?php foreach($authors as $row): ?>
            <h3 style="direction:rtl"> <?=$row->autName?> کتب</h3>
            <div class="list-group">
                <?php $cats=$this->base_model->get_categories_by_author($row->autId); 
                $i=1;
                    foreach ($cats as $row2):
                ?>
                <a href="<?=  site_url("home/books/$row2->catId")?>" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                          <h4 class="mb-1" style="direction:rtl"><?=$i++?>. <?=$row2->name?></h4>
                        <!--<small>3 days ago</small>-->
                      </div>
    <!--                  <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                      <small>Donec id elit non mi porta.</small>-->
                    </a>
                <?php endforeach; ?>
              </div>
            <hr>
            <?php endforeach; ?>
            
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