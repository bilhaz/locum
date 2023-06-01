<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Emails</h2>
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
                        <h6 class="card-title">First Response</h6>
                        <ul class="header-dropdown">

                            <li>


                            </li>
                        </ul>

                    </div>
                    <hr class="primary">
                    <div class="card-body">
                        <div class="row mb-3 " id="email">
                            <form action="<?= base_url('backend/sFirstR/' . encryptIt($em_1['ord_id'])) ?>)?>" method="post">
                                <h6>Dear
                                    <?php $lname = explode(' ', $em_1['cl_cont_name']) ?>
                                    <?php if (!empty($lname[0])) : echo $lname[0];
                                    endif; ?></h6>
                                <br>
                                <p>Thank you for requesting a doctor through SRA Locum Service. We can confirm receiving your locum order. Process of sourcing a locum Doctor for you has already been initiated.</p>
                                <p class="text-danger">If the order details are correct, you do not need to reply to this email.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <table class="table align-middle table-responsive table-hover d-inline">
                                    <tr>
                                        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
                                        <td style="border: 1px solid black;"><strong><?= $em_1['cl_h_name'] . ', ' . $em_1['cl_address'] . ' | ' . $em_1['cl_eircode']  ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
                                        <td style="border: 1px solid black;"><strong><?= $em_1['cl_cont_name'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
                                        <td style="border: 1px solid black;"><strong><?= $em_1['spec_name'] . ' ' . $em_1['grade_name'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
                                        <td style="border: 1px solid black;"><strong><?php $pros = explode(",", $em_1['ord_datetime_detail']);
                                                                                        foreach ($pros as $var) : ?>
                                                    <?= $var ?> <br>
                                                <?php endforeach; ?></strong></td>
                                    </tr>
                                </table>
                                <p><strong>Order status:</strong>
                                <ol>
                                    <li><b>Order confirmation.</b></li>
                                    <li><b>Order processing initiated.</b></li>
                                    <li style="opacity:0.5;">Proposal of locum to you.</li>
                                    <li style="opacity:0.5;">Acceptance or declining a locum.</li>
                                    <li style="opacity:0.5;">Locum Confirmation.</li>
                                </ol>
                                </p>

                                <div style="float:right;">
                                    <a id="payment-button" href="<?= base_url('backend/order-s1/' . encryptIt($em_1['ord_id'])) ?>" class="btn btn-lg btn-dark btn-block">
                                        <span id="payment-button-amount">Back</span>
                                    </a>
                                    <a id="payment-button" href="<?= base_url('backend/order-s2/'. encryptIt($em_1['ord_id'])) ?>" class="btn btn-lg btn-secondary btn-block">
                                        <span id="payment-button-amount">Step 2 </span>
                                    </a>
                                    &nbsp; &nbsp;
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                        <span id="payment-button-amount">Send Email</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>