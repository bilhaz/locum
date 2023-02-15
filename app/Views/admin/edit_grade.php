<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>New Grade</h2>
<ul class="breadcrumb mb-0">
<li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a></li>

</ul>
<a href="javascript:history.go(-1)" class="btn btn-secondary"><i class="fa fa-arrow-left me-2"></i>Go Back</a>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-10 offset-lg-1">
<div class="card mb-4">
<div class="card">
<div class="card-header"></div>
<div class="card-body">
<?php if (isset($validation)) : ?>
<div class="alert alert-danger" role="alert">
<?= $validation->listErrors() ?>
</div>
<?php endif;?>
<div class="card-title">
<h3 class="text-center title-2">Add New Grade</h3>
</div>
<hr>
<form action="<?= base_url('backend/edit_grade/'. encryptIt( $gr_row['grade_id']))?>" method="post">
<div class="form-group">
<label for="grade_name" class="control-label mb-1">Grade</label>
<input id="grade_name" name="grade_name" type="text" class="form-control" value="<?= $gr_row['grade_name'] ?>" placeholder="Enter Grade" aria-required="true" aria-invalid="false">
</div>



<div>
    <br>
<button id="submit" type="submit" class="btn btn-lg btn-primary btn-block">

<span id="submit">Update</span>
</button>

<a id="cancel" href="<?= base_url('backend/grade') ?>" class="btn btn-lg btn-dark btn-block">

<span id="cancel">Cancel</span>
</a>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>




