<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Locum Track</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mb-4">
                    <div class="card">
                        <div class="card-header">
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
                        </div>
                        <div class="card-body">
                        
<p class="mb-0 text-muted">Search Result For "<?= $search ?>"</p>
<div class="tab-content mt-3">
<div class="card tab-pane fade show active" id="Web">
<div class="card-body border-bottom">
<h4 class="mb-1"><a class="text-primary" target="_blank" href="#"><b>Client: </b><?= $order['cl_h_name'] ?> <small><span>
                                            <?php if($order['ord_cancel_bcl'] == 1): ?>
                                                <span class="badge bg-danger">Cancelled By Client</span><br>
                                                <span class="badge bg-warning text-dark"><?= $order['ord_cl_cremarks']?></span style="float:right;">
                                                <?php else: ?>
                                        <?php if($order['ord_cancel_bdr'] == 1): ?>
                                                <span class="badge bg-danger">Cancelled By Dr.</span><br>
                                                <span class="badge bg-warning text-dark"><?= $order['ord_dr_cremarks']?></span>
                                                <?php else: ?>
                                            <?php if ($order['ord_status'] == "1") : ?>
                                                <span class="badge chart-color123">Pending</span>
                                            <?php elseif ($order['ord_status'] == "2") : ?>
                                                <span class="badge chart-color122">Processed</span>
                                            <?php elseif ($order['ord_status'] == "3") : ?>
                                                <span class="badge bg-success">Confirmed</span>
                                            <?php else : ?>
                                                <span class="badge chart-color120">Ended</span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endif; ?></small></span></h4>
<h6><?= 'Speciality: '.$order['spec_name'].'<br>Grade: '. $order['grade_name'] ?></a></h6>
<p>Invoice ID: <a href="#"><?= $order['ord_invoice_id']?></a></p>
<p>Sage ID: <a href="#"><?= $order['ord_sage_refer_no']?></a></p>
<p>Confirmation No: <a href="#"><?= $order['ord_ref_no']?></a></p>
<p>Payment Received: <a href="#"><?= $order['ord_paymnt_rcvd_date']?></a></p>
<p>Paid to Employee: <a href="#"><?= $order['ord_pay_to_dr_date']?></a></p>
<h6><a target="_blank" href="<?= base_url('backend/order_view/'. encryptIt($order['ord_id'])) ?>">View Detail</a></h6>
</div>
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>