<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
<p class="mt-3 text-justify text-danger"><strong>To view your all locum assignments, <br>Please click on My Assignment</strong></p>
</div>
</div>
</div>
<div class="row g-2 row-deck mb-2">
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('employee/Pending-assignments') ?>">
<div class="card chart-color123">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_pen ?></strong></h3>
<span>Pending Assignments</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('employee/processed-assignments') ?>">
<div class="card chart-color122">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_pro ?></strong></h3>
<span>Processed Assignments</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('employee/confirmed-assignments') ?>">
<div class="card chart-color121 ">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_con ?></h3></strong>
<span>Confirmed Assignments</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('employee/completed-assignments') ?>">
<div class="card chart-color120">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_end ?></strong></h3>
<span>Completed Assignments</span>
</div>
</a>
</div>
</div>



</div>
</div>
</div>