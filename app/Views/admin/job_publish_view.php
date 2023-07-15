<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Job Publish View</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="col-md-12">
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
                            <div class="row mb-3 " id="email">
                                <label><strong>To:</strong>
                                    <h6 class="text-secondary">
                                        <?php foreach ($doc as $docs) : ?>
                                            <span class="badge chart-color122 my-1"><?= $docs['emp_email'] ?>&nbsp;&nbsp;</span>
                                        <?php endforeach; ?>
                                    </h6>
                                </label>
                                <hr class="primary">
                                <label><strong>Subject:</strong>&nbsp;<span class="h6 px-3 text-primary"><?= $subject ?></span>
                                    <hr class="primary">
                                    <h3 style="color:#157DED">Dear
                                    <?php foreach ($doc as $docss) : ?>
                                            <span><?= $docss['emp_fname'] ?>&nbsp;&nbsp;</span>
                                        <?php endforeach; ?>
                                    </h3>
                                    <br>
                                    <p style="color:#000000">We are pleased to inform you that we have a new Locum as you mentioned in your profile's Speciality.</p>
                                    <h4 style="color:#fd1f1f">Here are the Details of Locum</h4>
                                    <p><b style="color:#157DED">Hospital:</b> <?= $ord['cl_h_name'] ?></p>
                                    <p><b style="color:#157DED">Speciality:</b> <?= $ord['spec_name'] ?></p>
                                    <p><b style="color:#157DED">Grade:</b> <?= $ord['grade_name'] ?></p>
                                    <p><b style="color:#157DED">Locum Date & Time Details:</b> <?php $pros = explode(",", $ord['ord_datetime_detail']);
                                                                                                foreach ($pros as $var) : ?>
                                            <?= $var ?> <br>
                                        <?php endforeach; ?></p>
                                    <br>
                                    <h4 style="color:#fd1f1f">If you want to Apply for this Locum Kindly click the Apply Button below</h4>
                                    <div class="col-md-6">
                                        <a target="_blank" href="<?= base_url('employee/advt_apply/' . encryptIt($ord['ord_id'])) ?>" class="btn btn-success" style="background-color:#29cb29e8;color:white;border: none;
                                                border-radius: 15%;
                                                padding: 5px 10px;
                                                text-align: center;
                                                text-decoration: none;
                                                display: inline-block;
                                                font-size: 16px;
                                                margin: 4px 2px;
                                                cursor: pointer;">Apply</a>
                                    </div>
                                    <br>
                                    <h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
                            </div>
                            <div class="float-end">
                                <a id="payment-button" href="<?= base_url('backend/order-publish/'. encryptIt($ord['ord_id']))?>" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Send Email</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>