<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
</div>
</div>
</div>
<div class="row g-2 row-deck mb-2">
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('backend/pending_order') ?>">
<div class="card chart-color123">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_pen ?></strong></h3>
<span>Pending Orders</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('backend/processed_order') ?>">
<div class="card chart-color122">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_pro ?></strong></h3>
<span>Processed Orders</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('backend/confirm_order') ?>">
<div class="card chart-color121">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_con ?></strong></h3>
<span>Confirmed Orders</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('backend/ended_order') ?>">
<div class="card chart-color120">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_end ?></strong></h3>
<span>Ended Orders</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('backend/expired-orders') ?>">
<div class="card chart-color125">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_exp ?></h3></strong>
<span>Expired Orders</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
    <a href="<?= base_url('backend/cancelled_order') ?>">
    <div class="card chart-color119">
    <div class="card-body p-lg-4 text-light">
    <h3><strong><?= $o_canc ?></h3></strong>
    <span>Cancelled Orders</span>
    </div>
    </a>
    </div>


</div>
</div>
</div>