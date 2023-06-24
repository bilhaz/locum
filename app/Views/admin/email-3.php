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
                        <h6 class="card-title">Email - Locum Confirmation</h6>
                        <ul class="header-dropdown">
                            <li>
                            </li>
                        </ul>
                    </div>
                    <hr class="primary">
                    <div class="card-body">
                        <div class="row mb-3 " id="email">
                            <form action="<?= base_url('backend/sThirdR/' . encryptIt($em_3['ord_id'])) ?>)?>" method="post">
                                <h5 class="text-danger">LOCUM CONFIRMATION</h5>
                                <h6>Dear
                                    <?php $lname = explode(' ', $em_3['cl_cont_name']) ?>
                                    <?php if (!empty($lname[0])) : echo $lname[0];
                                    endif; ?></h6>
                                <br>
                                <p>At SRA Locum Service we are pleased to confirm you the following doctor.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle d-inline">
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?= $em_3['cl_h_name'] . ', ' . $em_3['cl_address'] . ' | ' . $em_3['cl_eircode']  ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?= $em_3['cl_cont_name'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?= $em_3['spec_name'] . ' ' . $em_3['grade_name'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
                                            <td style="border: 1px solid black;"><strong>Dr. <?= $em_3['emp_fname'] . ' ' . $em_3['emp_lname'] . '( ' . $em_3['emp_imcr_no'] . ')' ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?php $pros = explode(",", $em_3['ord_prosdatetime_detail']);
                                                                                            foreach ($pros as $var) : ?>
                                                        <?= $var ?> <br>
                                                    <?php endforeach; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Rate:</strong></th>
                                            <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?=  $em_3['ord_Hnormal_hrs_rt'] ?>&nbsp;<?php if($em_3['nh_p_type'] == 1): echo "/hr"; elseif($em_3['nh_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php if($em_3['ord_Hocall_rt'] > 0): ?>
                                            <b>OnCall:</b> &euro;<?= $em_3['ord_Hocall_rt']?>&nbsp;<?php if($em_3['oc_p_type'] == 1): echo "/hr"; elseif($em_3['oc_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?> <br>
                                            <?php endif; ?>
                                            <?php if($em_3['ord_Hosite_rt'] > 0): ?>
                                            <b>OffSite:</b> &euro;<?= $em_3['ord_Hosite_rt'] ?>&nbsp;<?php if($em_3['os_p_type'] == 1): echo "/hr"; elseif($em_3['os_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php endif; ?>
                                            <?php if($em_3['ord_Hbhw_rt'] > 0): ?>
                                            <b>Weekend:</b> &euro;<?= $em_3['ord_Hbhw_rt'] ?>&nbsp;<?php if($em_3['bhw_p_type'] == 1): echo "/hr"; elseif($em_3['bhw_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
                                            <td class="text-danger" style="border: 1px solid black;"><strong> <?= $em_3['ord_admin_charges'] ?>%</strong></td>
                                        </tr>
                                    </table>
                                </div>

                                <p><strong>“SRA Locum”: Shamrock Assist, incorporated in Ireland under registration number 599436, Registered office is at 2nd Floor, 13 Upper Baggot St, Dublin 4 .</strong></p>

                                <br>
                                <h6 class="text-danger">SRA Locum standard terms and conditions are applicable to the above assignment. For the avoidance of doubt,</h6>
                                <ol type="a" class="text-danger">
                                    <li>The Client acknowledges that they are being provided locum doctor through the SRA Locum,</li>
                                    <li>That all payments will be made to SRA Locum, under no circumstances the client will pay the locum doctor directly. </li>
                                    <li>Client acknowledges to us that their services are supplied by us as an independent locum.</li>
                                    <li>Any placed personnel will be under the supervision, direction, and control of the client.</li>
                                    <li>Where a locum is hired directly by the client within the period of six months of the initial introduction, a one recruitment fee of 7% of the year pay will be payable by the client.</li>
                                    <li>The credit limit for your every ordering client shall not exceed 1000 euro unless previous dues are paid.</li>
                                </ol>
                                <br>
                                <hr class="primary">
                                <p><strong>Order status:</strong>
                                <ol>
                                    <li><b>Order confirmation.</b></li>
                                    <li><b>Order processing initiated.</b></li>
                                    <li><b>Proposal of locum to you.</b></li>
                                    <li><b>Acceptance or declining a locum.</b></li>
                                    <li><b>Locum Confirmation.</b></li>
                                </ol>
                                </p>
                                <div class="float-end">
                                    <a id="payment-button" href="<?= base_url('backend/order-s3/' . encryptIt($em_3['ord_id'])) ?>" class="btn btn-lg btn-dark btn-block">
                                        <span id="payment-button-amount">Back</span>
                                    </a>
                                    <a id="payment-button" href="<?= base_url('backend/order-s4/' . encryptIt($em_3['ord_id'])) ?>" class="btn btn-lg btn-secondary btn-block">
                                        <span id="payment-button-amount">Step 4 </span>
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