
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Add News</h2>
<!--						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
                                            <form id="test" action="<?=$post_controller?>" method="post">
						<div class="control-group">
								<label class="control-label" for="inputSuccess">News Title</label>
								<div class="controls">
								  <input type="text" name="title">
								</div>
						</div>
                                                <div class="control-group">
								<label class="control-label" for="inputSuccess">Place</label>
								<div class="controls">
								  <input type="text" name="place">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
						</div>
                                                <div class="control-group">
								<label class="control-label" for="inputSuccess">Date</label>
								<div class="controls">
								  <input type="date" name="date">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
						</div>
                                                <div class="control-group">
								<label class="control-label" for="inputSuccess">detail</label>
								<div class="controls">
                                                                    <textarea name="detail"></textarea>
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
						</div>
                                                
                                                <a href="<?=site_url('admin/news')?>" class="btn btn-small btn-danger">Cancel</a>
                                                <button type="submit" class="btn btn-small btn-success">Save</button>
                                            </form>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script> 
$( document ).ready(function() {
    if($("#hassub").val()==0)
        $("#menucontent").show(500);
    else 
        $("#menucontent").hide(500);
});
 $("#hassub").change(function(){
    if($("#hassub").val()==0)
        $("#menucontent").show(500);
    else 
        $("#menucontent").hide(500);
 });
</script>
