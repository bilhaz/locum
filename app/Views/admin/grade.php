<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Grade List</h2>
<ul class="breadcrumb mb-0">
<li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a></li>

</ul>
<a href="javascript:history.go(-1)" class="btn btn-secondary"><i class="fa fa-arrow-left me-2"></i>Go Back</a>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header">
<h6 class="card-title">All Grades</h6>
<ul class="header-dropdown">
<li>
<a type="button" href="<?= base_url('backend/new_grade')?>" class="btn btn-sm btn-outline-primary">Add New</a>
</li>
</ul>
</div>
<?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->get('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->get('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->get('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->get('error') ?>
                                </div>
                            <?php endif; ?>
<div class="card-body">
<table id="employee_List" class="table table-hover">
<thead class="thead-dark">
<tr>
<th>SNo.</th>
<th>Grade</th>
<th>Created</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  
  <?php 
  $i=1;
  foreach($grade as $row): ?>
<tr>
<td>
<?= $i++ ?>
</td>


<td>
<h6 class="mb-0"><?= $row['grade_name']?></h6>
<!-- <span><a href="https://wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="771a1605041f161b1b5a1937101a161e1b5914181a">[email&#160;protected]</a></span> -->
</td>
<td><span><?= $row['grade_created']?></span></td>
<td>
  
<a type="button" href="<?= base_url('backend/edit_grade/'. encryptIt($row['grade_id']))?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>

<a type="button" href="<?= base_url('backend/del_grade/'.encryptIt($row['grade_id']))?>" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>