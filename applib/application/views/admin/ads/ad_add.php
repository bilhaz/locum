
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Add New Post</h2>
<!--						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
                                            <form id="test" action="<?=$post_controller?>" method="post" enctype="multipart/form-data">
						<div class="control-group">
								<label class="control-label" for="inputSuccess">ad Link </label>
								<div class="controls">
                                                                    <input type="text" name="link" value="#" required="">
								</div>
						</div>
                                                
                                                <div class="control-group">
								<label class="control-label" for="thumb">ad Image</label>
								<div class="controls">
                                                                <input type="file" name="ad" id="thumb">
								</div>
                                                </div>
                                                
                                                <a href="<?=site_url('admin/ads')?>" class="btn btn-small btn-danger">Cancel</a>
                                                <button type="submit" class="btn btn-small btn-success">Save</button>
                                            </form>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
