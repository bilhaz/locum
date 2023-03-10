<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-7 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
<p class="mb-0 text-justify text-success"><strong>This is your dashboard. Click on the tab to view your chosen options.</strong></p>
</div>
<div class="col-md-5 col-sm-12">
<ul class="header-dropdown" style="float:right;">
                            
                                <a type="button" href="<?= base_url('client/new-order') ?>" class="btn btn-sm btn-primary">Add  New Order/Locum</a>
                           
                        </ul>
</div>
</div>

<div class="row g-2 row-deck mb-2">
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('client/new-orders') ?>">
<div class="card chart-color123">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_pen ?></strong></h3>
<span>New Orders</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('client/cur-processed') ?>">
<div class="card chart-color122">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_pro ?></strong></h3>
<span>Currently processed</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('client/confirm-orders') ?>">
<div class="card chart-color121">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_con ?></h3></strong>
<span>Confirmed</span>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 text-center">
<a href="<?= base_url('client/completed-orders') ?>">
<div class="card chart-color120">
<div class="card-body p-lg-4 text-light">
<h3><strong><?= $o_end ?></strong></h3>
<span>Completed</span>
</div>
</a>
</div>
</div>



</div>
</div>
</div>