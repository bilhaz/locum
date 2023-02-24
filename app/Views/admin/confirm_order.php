<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Orders List</h2>
<ul class="breadcrumb mb-0">
<li class="breadcrumb-item"><a target="_blank" href="<?= base_url('backend/dashboard') ?>">SRA Locum</a></li>

</ul>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header">
<h6 class="card-title">Confirmed Orders</h6>
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
<th>ID</th>
<th>Hospital Name</th>
<th>Employee</th>
<th>Craeted Date</th>
<th>Status</th>
<th>View</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  
  <?php 
  
  foreach($ord_row as $row): ?>
<tr>
<td>
<?= $row['ord_id'] ?>
</td>


<td>
<h6 class="mb-0"><?= $row['cl_h_name']?></h6>
<!-- <span><a href="https://wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="771a1605041f161b1b5a1937101a161e1b5914181a">[email&#160;protected]</a></span> -->
</td>
<td><span><?= $row['emp_fname'].' '. $row['emp_lname']?></span></td>
<td><?= $row['ord_created']?></td>
<td><span class="badge chart-color121 text-light">Confirm</span></td>
<td>
  
<a type="button" href="<?= base_url('backend/order_view/'.encryptIt($row['ord_id']))?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View"  data-type="confirm"><i class="fa fa-eye"></i></a>

</td>
<td>
    <form action="<?= base_url('backend/ord_status/'.encryptIt( $row ['ord_id']) ) ?>" method="post">
    <select id="ord_status" name="ord_status" class="form-control" required="" data-parsley-trigger="change">
                                        <option value="1" <?php if ($row ['ord_status'] == "Pending") { ?> echo selected="selected" <?php } ?>>Pending</option>
                                        <option value="2" <?php if ($row ['ord_status'] == "Processed") { ?> echo selected="selected" <?php } ?>>Processed</option>
                                        <option value="3" <?php if ($row ['ord_status'] == "Confirmed") { ?> echo selected="selected" <?php } ?>>Confirmed</option>
                                        <option value="4" <?php if ($row ['ord_status'] == "Ended") { ?> echo selected="selected" <?php } ?>>Ended</option>
                                    </select>
                                    <button class="btn btn-sm btn-outline-primary btn-block" Onclick="return confirm('Are You sure?');" id="change" type="submit" value="Change"><span id="change">Change</span></button>
    </form>
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