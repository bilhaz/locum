<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-primary">Track Locum</h4>
                    <br>
                    <?php if (session()->get('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-times-circle"></i> <?= session()->get('error') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-new2 mb-2">
                        <li class="nav-item"><a class="nav-link active show" data-bs-toggle="tab" href="#confrm-new2">Confirmation NO.</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#invoice-new2">Invoice ID</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sage-new2">Sage ID</a></li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="confrm-new2">
                            <form action="<?= base_url('backend/locum-ctrack') ?>" method="Post" autocomplete="off" accept-charset="utf-8" data-parsley-validate="" id="forma">
                                <input type="text" class="form-control mb-2" name="cnfrm_id" placeholder="Enter Locum Confirmation No" required="">
                                <button type="submit" class="btn btn-primary">Track</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="invoice-new2">
                            <form action="<?= base_url('backend/locum-intrack') ?>" method="post" autocomplete="off" accept-charset="utf-8" data-parsley-validate="" id="forma">
                                <input type="text" class="form-control mb-2" name="invoice_id" placeholder="Enter Locum Invoice ID" required="">
                                <button type="submit" class="btn btn-primary float-right">Track</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="sage-new2">
                            <form action="<?= base_url('backend/locum-sagtrack') ?>" method="post" autocomplete="off" accept-charset="utf-8" data-parsley-validate="" id="forma">
                                <input type="text" class="form-control mb-2" name="sage_id" placeholder="Enter Locum Sage Id" required="">
                                <button type="submit" class="btn btn-primary float-right">Track</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Confirmed Order Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div class="card mb-2">
                            <label class="form-label">Today<span style="float:right;"><?= $today ?></span></label>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-info bg-gradient" role="progressbar" style="width: <?= $today ?>%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <label class="form-label">This Week<span style="float:right;"><?= $this_week ?></span></label>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger bg-gradient" role="progressbar" style="width: <?= $this_week ?>%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <label class="form-label">This Month<span style="float:right;"><?= $this_month ?></span></label>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning bg-gradient" role="progressbar" style="width: <?= $this_month ?>%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <label class="form-label">This Year<span style="float:right;"><?= $this_year ?></span></label>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-gradient" role="progressbar" style="width: <?= $this_year ?>%;" aria-valuenow="500" aria-valuemin="0" aria-valuemax="1000"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Today Activity</h4>
                    </div>
                    <div class="card-body">
                        <div class="new_timeline">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-start">
                                    <div class="bullet green"></div>
                                    <div class="time mx-3"></div>
                                    <div class="desc">
                                        <h3><strong>Order received</strong></h3>
                                        <h4><?= $ord_rcvd ?></h4>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <div class="bullet green"></div>
                                    <div class="time mx-3"></div>
                                    <div class="desc">
                                        <h3><strong>Order Processed</strong></h3>
                                        <h4><?= $ord_proc ?></h4>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <div class="bullet green"></div>
                                    <div class="time mx-3"></div>
                                    <div class="desc">
                                        <h3><strong>Order Confirmed</strong></h3>
                                        <h4><?= $ord_conf ?></h4>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <div class="bullet green"></div>
                                    <div class="time mx-3"></div>
                                    <div class="desc">
                                        <h3><strong>Order Cancelled</strong></h3>
                                        <h4><?= $ord_canc ?></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6 mb-2">
                                <a type="button" class="btn btn-outline-primary btn-block equal-width" href="#" target="_blank">Sales</a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a type="button" class="btn btn-outline-primary btn-block equal-width" href="#" target="_blank">Purchases</a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a type="button" class="btn btn-outline-primary btn-block equal-width" href="#" target="_blank">VAT on Sales</a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a type="button" class="btn btn-outline-primary btn-block equal-width" href="#" target="_blank">VAT on Purchase</a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a type="button" class="btn btn-outline-primary btn-block equal-width" href="#" target="_blank">VOS - VOP</a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a type="button" class="btn btn-outline-primary btn-block equal-width" href="#" target="_blank">CASH FLOW</a>
                            </div>
                        </div>
                    </div>
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
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="card-title">Work Report</h6>
                </div>
                <div class="col-auto">
                    <div class="form-group mb-0">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group mb-0">
                        <span class="mx-2">TO</span>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group mb-0">
                        <input type="date" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="wrok_report"></div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary">User Work Log List</h4>
            </div>
            <div class="card-body">
                <table id="" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>SNo.</th>
                            <th>Name</th>
                            <th>First Response</th>
                            <th>Processed</th>
                            <th>Confirmed</th>
                            <th>Session</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>
                                1
                            </td>


                            <td>
                                <h6 class="mb-0">abc</h6>
                            </td>
                            <td><span>33</span></td>
                            <td><span>55</span></td>
                            <td>88</td>
                            <td>
                                Nothing

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>