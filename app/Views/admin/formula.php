<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Formulae</h2>
<ul class="breadcrumb mb-0">

</ul>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header">
<h6 class="card-title">All Formulae</h6>
<ul class="header-dropdown">
<li>
<!-- <a type="button" href="<?= base_url('backend/new_grade')?>" class="btn btn-sm btn-outline-primary">Add New</a> -->
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
<th>Title</th>
<th>Craeted Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  
  <?php 
  $i=1;
  foreach($form as $row): ?>
<tr>
<td>
<?= $i++ ?>
</td>


<td>
<h6 class="mb-0"><?= $row['title']?></h6>
</td>
<td><span><?= date("d-m-y  h:i:s a", strtotime($row['created'])) ?></span></td>
<td>
  
<a type="button" href="<?= base_url('backend/edit-formula/'. encryptIt($row['id']))?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>

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