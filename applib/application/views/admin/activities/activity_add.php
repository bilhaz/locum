
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Add New Activity</h2>
<!--						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
                                            <form action="<?=$post_controller?>" method="post" enctype="multipart/form-data">
						<div class="control-group">
                                                    <div class="span6">
								<label class="control-label" for="inputSuccess">Title</label>
								<div class="controls">
								  <input type="text" name="title">
								</div>
                                                    </div>
                                                    <div class="span6">
                                                        <label class="control-label" for="inputSuccess">Place</label>
								<div class="controls">
								  <input type="text" name="place">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
                                                    </div>
                                                </div>		
                                                <div class="control-group">
                                                    <div class="span6">
								<label class="control-label" for="inputSuccess">year</label>
								<div class="controls">
								  <input type="text" name="year">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
                                                    </div>
                                                    <div class="span6">
                                                        <label class="control-label" for="inputSuccess">Start Date</label>
								<div class="controls">
                                                                    <input type="date" name="start_date">
<!--								  <span class="help-inline">Menu Name</span>-->
							</div>
                                                    </div>
						</div>
								
                                                <div class="control-group">
                                                    <div class="span6">
                                                            <label class="control-label" for="inputSuccess">End Date</label>
								<div class="controls">
								  <input type="date" name="end_date">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
                                                    </div>
                                                    <div class="span6">
                                                        <label class="control-label" for="inputSuccess">Participants</label>
								<div class="controls">
								  <input type="text" name="participants">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
                                                    </div>
						</div>
								
                                                <div class="control-group">
                                                    <div class="span6">
								<label class="control-label" for="inputSuccess">Donee</label>
								<div class="controls">
								  <input type="text" name="donee">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
                                                    </div>
                                                    <div class="span6">
								<label class="control-label" for="inputSuccess">Expanse</label>
								<div class="controls">
								  <input type="text" name="expanse">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
                                                    </div>
						</div>
                                                <div class="control-group">
                                                    <div class="span6">
								<label class="control-label" for="hassub">Event</label>
								  <select   id="hassub" name="event">3
                                                                      <?php foreach($events as $event):?>
                                                                        <option value="<?=$event->eventId?>"><?=$event->eventName?></option>
                                                                      <?php endforeach; ?>
                                                                  </select>
                                                    </div>
                                                    <div class="span6">
								<label class="control-label" for="inputSuccess">Description</label>
								<div class="controls">
                                                                    <textarea name="description"></textarea>
								
								</div>
                                                    </div>
                                                    
                                                    </div>
                                                <div class="control-group">
                                                    <div class="span6">
								<label class="control-label" for="thumb">Activity Thumbnail</label>
                                                                <input type="file" name="thumb" id="thumb">
                                                    </div>
                                                </div>
                                                
                                                <a href="<?=site_url('admin/activities')?>" class="btn btn-small btn-danger">Cancel</a>
                                                <button type="submit" class="btn btn-small btn-success">Save</button>
                                            </form>
				</div><!--/span-->
			
			</div><!--/row-->
</div>
