<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Speciality</h2>
<ul class="breadcrumb mb-0">
<li class="breadcrumb-item"><a target="_blank" href="<?= base_url('backend/dashboard') ?>">SRA Locum</a></li>

</ul>
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
<h3 class="text-center title-2">Edit Speciality</h3>
</div>
<hr>
<form action="<?= base_url('backend/edit_spec/'. encryptIt($sp_row['spec_id']))?>" method="post">
<div class="form-group">
<label for="spec_name" class="control-label mb-1">Speciality</label>
<input id="spec_name" name="spec_name" type="text" class="form-control" placeholder="Enter Speciality" value="<?= $sp_row['spec_name'] ?>" required="">
</div>



<div>
    <br>
<button id="submit" type="submit" class="btn btn-lg btn-primary btn-block">

<span id="submit">Update</span>
</button>

<a id="cancel" href="<?= base_url('backend/speciality') ?>" class="btn btn-lg btn-dark btn-block">

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




