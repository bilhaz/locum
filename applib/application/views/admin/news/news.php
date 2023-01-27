<script>
function confirmDelete(){
var agree = confirm("Are you sure you want to delete this ?");
  if(agree == true){
    return true
}
else{
return false;
}
}
</script>
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>News</h2><a href="<?=site_url('admin/news_add')?>" class="btn btn-small btn-success pull-right">Add News</a>
<!--						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>-->
					</div>
                                    <?php if($this->session->userdata('msg')){ ?>
                                                <div class="alert alert-info alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <?=$this->session->userdata('msg')?>
                                                  <strong class="pull-right"><?php $this->session->unset_userdata('msg');?></strong>
						</div>
                                    <?php } ?>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Title</th>
								  <th>Details</th>
								  <th>Place</th>
								  <th>Date</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
                                                                <?php foreach ($news as $news): ?>
								<td><?=$news->newsTitle?></td>
								<td class="center"><?=$news->newsDetail?></td>
								<td class="center"><?=$news->newsPlace?></td>
								<td class="center">
									<?=$news->newsDate?>
								</td>
								<td class="center">
<!--									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>-->
									<a class="btn btn-info" href="<?=site_url("admin/news_update/$news->id")?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="<?=site_url("admin/news_delete/$news->id")?>"  onClick = 'return confirmDelete();'>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
                                                                
							</tr>
							<?php endforeach;?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->