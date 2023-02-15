<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">

<a href="javascript:history.go(-1)" class="btn btn-secondary"><i class="fa fa-arrow-left me-2"></i>Go Back</a>
</div>
<!-- <div id="wrapper"> -->
<div class="d-flex h50vh align-items-center  w-100">
<div class="auth-box">
<div class="top mb-1">
<?php if (isset($validation)) : ?>
<div class="alert alert-danger" role="alert">
<?= $validation->listErrors() ?>
</div>
<?php endif;?>
<div class="logo">


</div>
</div>
<div class="card shadow p-lg-4">
<div class="card-header">
<p class="fs-5 mb-0">Edit User</p>
</div>
<div class="card-body">
<form action="<?= base_url('backend/edit-user/'. encryptIt($euser['usr_id']))?>" method="post" data-parsley-validate="" id="forma" autocomplete="off">
<div class="form-floating mb-1">
<input type="email" class="form-control" name="usr_email" value="<?= $euser['usr_email'] ?>" id="usr_email" placeholder="name@example.com" required=""  >
<label>Email address</label>
</div>
<div class="form-floating">
<input type="text" class="form-control" name="usr_name" id="usr_name" value="<?= $euser['usr_name'] ?>" placeholder="Full Name" required="">
<label>Full Name</label>
</div>
<div class="form-floating">
<input type="text" class="form-control" name="usr_designation" value="<?= $euser['usr_designation'] ?>" id="usr_designation" placeholder="Dessignation" required="">
<label>Designation</label>
</div>
<div class="form-floating">
<select  class="form-control " name="grp_id" id="grp_id" required="">
    <option value="">Select Role</option>
   
    <option value="super admin" <?php if ($euser['grp_id'] == "super admin") { ?> echo selected="selected" <?php } ?>>Super Admin</option>
    <option value="admin" <?php if ($euser['grp_id'] == "admin") { ?> echo selected="selected" <?php } ?>>Admin</option>
    <option value="user" <?php if ($euser['grp_id'] == "user") { ?> echo selected="selected" <?php } ?>>User</option>
</select>
<label>Group role</label>
</div>
<div class="form-floating">
<select  class="form-control " name="usr_status" id="usr_status" required="">
    <option value="">Select Status</option>
    <option value="1" <?php if ($euser['usr_status'] == "1") { ?> echo selected="selected" <?php } ?>>Active</option>
    <option value="0" <?php if ($euser['usr_status'] == "0") { ?> echo selected="selected" <?php } ?>>Disabled</option>  
</select>
<label>Status</label>
</div>
<div class="my-3">
<button type="submit" class="btn btn-primary w-100 px-3 py-2 mb-2">Update</button>
</div>
</form>
<div class="d-grid gap-2 mt-3 pt-3">

<a id="cancel" href="<?= base_url('backend/users') ?>" class="btn btn-lg btn-dark btn-block">

<span id="cancel">Cancel</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
    </div>
</div>
