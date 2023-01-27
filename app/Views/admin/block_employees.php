<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Blocked Employee</h2>
<ul class="breadcrumb mb-0">
<li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a></li>

</ul>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header">
<h6 class="card-title">Employee List</h6>
<ul class="header-dropdown">
<li>
<!-- <a type="button" href="<?=base_url('admin/reg_emp')?>" class="btn btn-sm btn-outline-primary">Register Employee</a> -->
</li>
</ul>
</div>
<div class="card-body">
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
<table id="employee_List" class="table table-hover">
<thead class="thead-dark">
<tr>
<th>SNo.</th>
<th>Name</th>
<th>Email</th>
<th>Register</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  
  <?php 
  $i=1;
  foreach($bemp_row as $row): ?>
<tr>
<td>
<?= $i++ ?>
</td>


<td>
<h6 class="mb-0"><?= $row['emp_fname'] . ' ' . $row['emp_lname'] ?></h6>
</td>
<td><span><?= $row['emp_email']?></span></td>
<td><?= $row['emp_created']?></td>
<td>
  
<a type="button" href="<?= base_url('admin/emp_unblock/'.encryptIt($row['emp_id']))?>" class="btn btn-sm btn-outline-danger js-sweetalert" Onclick="return confirm('Are You sure?');" title="Unblock" data-type="confirm"><i class="fa fa-unlock"></i></a>
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