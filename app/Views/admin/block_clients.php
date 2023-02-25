<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Blocked Clients</h2>
<ul class="breadcrumb mb-0">
</ul>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header">
<h6 class="card-title">All Clients</h6>
<ul class="header-dropdown">
<li>
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
<th>Hospital Name</th>
<th>Email</th>
<th>Registration Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  
  <?php 
  $i=1;
  foreach($cl_row as $row): ?>
<tr>
<td>
<?= $i++ ?>
</td>


<td>
<h6 class="mb-0"><?= $row['cl_h_name']?></h6>
</td>
<td><span><?= $row['cl_cont_email']?></span></td>
<td><?= date("d-m-y  h:i:s a", strtotime($row['cl_created']))?></td>
<td>
<a type="button" href="<?= base_url('backend/client_unblock/'.encryptIt($row['cl_id']))?>" class="btn btn-sm btn-outline-danger js-sweetalert" title="Block" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-unlock"></i></a>
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