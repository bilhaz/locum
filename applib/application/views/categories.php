<div class="col-sm-3 hidden-sm hidden-xs">
          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    </span>Categories</a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                
                                <ul class="list-group">
                                  <?php 
                                    $cats=$this->base_model->get_categories();
                                    foreach($cats as $cat):
                                        
                                                ?>
                                    <li class="list-group-item" ><a style="color:black" href=""><?=$cat->name?></a>
                                    <ul class="list-group">
                                        <?php $subcats=$this->admin_model->get_subcats_by_category($cat->catId);
                                    foreach($subcats as $subcat): ?> 
                                      <li class="list-group-item"><a href="<?=  site_url("home/category/$subcat->name/$subcat->subCatId/")?>"><?=$subcat->name?></a></li>
                                    <?php endforeach; ?>
                                    </ul>
                                  </li>
                                       
                                        <?php  endforeach; ?>
                                </ul>
              </div>
            </div>
            
          </div>
        </div>