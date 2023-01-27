<script src="<?=  site_url('assets/js/tinymce/tinymce.min.js')?>"></script>

<script>tinymce.init({ selector:'textarea',
	file_browser_callback: function(field_name, url, type, win) {
    win.document.getElementById(field_name).value = 'my browser value';
  },images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '<?=site_url('upload.php')?>');

    xhr.onload = function() {
      var json;

      if (xhr.status != 200) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }

      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }

      success(json.location);
    };

    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
  },
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ] });</script>
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Update Main Menu</h2>
<!--						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
                                            <form id="test" action="<?=$post_controller?>" method="post">
						<div class="control-group">
								<label class="control-label" for="inputSuccess">Menu Name</label>
								<div class="controls">
                                                                    <input type="text" name="name" value="<?=$menu['name']?>">
								</div>
						</div>
                                                <div class="control-group">
								<label class="control-label" for="inputSuccess">Order No</label>
								<div class="controls">
                                                                    <input type="text" name="sequence" value="<?=$menu['sequence']?>">
<!--								  <span class="help-inline">Menu Name</span>-->
								</div>
						</div>
                                                <div class="control-group">
								<label class="control-label" for="inputSuccess">Has Sub Menu</label>
								  <select type="text"  id="hassub" name="hassub">
                                                                      <option <?php if($menu['hassub']==1) echo "selected='selected'"  ?> value="1">Yes</option>
                                                                      <option <?php if($menu['hassub']==0) echo "selected='selected'"  ?> value="0">No</option>
                                                                  </select>
								  <span class="help-inline">Select Yes if This Main Menu has sub menu</span>
						</div>
                                                <div class="control-group" id="menucontent">
								<label class="control-label" for="inputSuccess">Content</label>
								<div class="controls">
                                                                    <textarea name="content"><?=$menu['content']?></textarea>
								
								</div>
								  <span class="help-inline">Type Page Contents in Editor</span>
						</div>
                                                <a href="<?=site_url('admin/main_menus')?>" class="btn btn-small btn-danger">Cancel</a>
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
