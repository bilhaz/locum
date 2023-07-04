<?php if($em_2['ord_status'] <= '1'){ ?>
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
                        <h6 class="card-title">Email - Locum Process</h6>
                        <ul class="header-dropdown">
                            <li>
                            </li>
                        </ul>
                    </div>
                    <hr class="primary">
                    <div class="card-body">
                        <div class="row mb-3 " id="email">
                            <form action="<?= base_url('backend/sSecondR/' . encryptIt($em_2['ord_id'])) ?>)?>" method="post">
                                <h6>Dear
                                    <?php $lname = explode(' ', $em_2['cl_cont_name']) ?>
                                    <?php if (!empty($lname[0])) : echo $lname[0];
                                    endif; ?></h6>
                                <br>
                                <p>At SRA Locum Service we are pleased to offer you the following doctor. Please review and reply.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle d-inline" style="padding-right:40px;">
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?= $em_2['cl_h_name'] . ', ' . $em_2['cl_address'] . ' | ' . $em_2['cl_eircode']  ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?= $em_2['cl_cont_name'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?= $em_2['spec_name'] . ' ' . $em_2['grade_name'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
                                            <td style="border: 1px solid black;"><strong>Dr. <?= $em_2['emp_fname'] . ' ' . $em_2['emp_lname'] . '( ' . $em_2['emp_imcr_no'] . ')' ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
                                            <td style="border: 1px solid black;"><strong><?php $pros = explode(",", $em_2['ord_prosdatetime_detail']);
                                                                                            foreach ($pros as $var) : ?>
                                                        <?= $var ?> <br>
                                                    <?php endforeach; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Rate:</strong></th>
                                            <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?=  $em_2['ord_Hnormal_hrs_rt'] ?>&nbsp;<?php if($em_2['nh_p_type'] == 1): echo "/hr"; elseif($em_2['nh_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php if($em_2['ord_ocall_rt'] > 0): ?>
                                            <b>OnCall:</b> &euro;<?= $em_2['ord_Hocall_rt']?>&nbsp;<?php if($em_2['oc_p_type'] == 1): echo "/hr"; elseif($em_2['oc_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?> <br>
                                            <?php endif; ?>
                                            <?php if($em_2['ord_osite_rt'] > 0): ?>
                                            <b>OffSite:</b> &euro;<?= $em_2['ord_Hosite_rt'] ?>&nbsp;<?php if($em_2['os_p_type'] == 1): echo "/hr"; elseif($em_2['os_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php endif; ?>
                                            <?php if($em_2['ord_bhw_rt'] > 0): ?>
                                            <b>Weekend:</b> &euro;<?= $em_2['ord_Hbhw_rt'] ?>&nbsp;<?php if($em_2['bhw_p_type'] == 1): echo "/hr"; elseif($em_2['bhw_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
                                            <td class="text-danger" style="border: 1px solid black;"><strong> <?= $em_2['ord_admin_charges'] ?>%</strong></td>
                                        </tr>
                                    </table>
                                </div>

                                <p><strong>Find attached the relevant CV and other documents.</strong></p>

                                <?php if (!empty($em_2['emp_cv'])) : ?>
                                    <p class="mb-0"><strong>CV</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_cv']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_imc_cert'])) : ?>
                                    <p class="mb-0"><strong>IMC Certificate</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_imc_cert']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_gv_cert'])) : ?>
                                    <p class="mb-0"><strong>Garda Vetting Certificate</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_gv_cert']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_rec_refer'])) : ?>
                                    <p class="mb-0"><strong>Recent Reference</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_rec_refer']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_passport'])) : ?>
                                    <p class="mb-0"><strong>Passport</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_passport']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_occup_health'])) : ?>
                                    <p class="mb-0"><strong>Occupational Health</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_occup_health']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_work_permit'])) : ?>
                                    <p class="mb-0"><strong>Work Permit</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_work_permit']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_acls'])) : ?>
                                    <p class="mb-0"><strong>ACLS</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_acls']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_bcls'])) : ?>
                                    <p class="mb-0"><strong>BCLS</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_bcls']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_bls'])) : ?>
                                    <p class="mb-0"><strong>BLS</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_bls']) ?>">Click To View</a>
                                <?php endif; ?>
                                <?php if (!empty($em_2['emp_atls'])) : ?>
                                    <p class="mb-0"><strong>ATLS</strong></p>
                                    <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $em_2['emp_atls']) ?>">Click To View</a>
                                <?php endif; ?>


                                <br>
                                <hr class="primary">
                                <p><strong>Order status:</strong>
                                <ol>
                                    <li><b>Order confirmation.</b></li>
                                    <li><b>Order processing initiated.</b></li>
                                    <li><b>Proposal of locum to you.</b></li>
                                    <li style="opacity:0.5;">Acceptance or declining a locum.</li>
                                    <li style="opacity:0.5;">Locum Confirmation.</li>
                                </ol>
                                </p>
                                <div style="float:right;">
                                    <a id="payment-button" href="<?= base_url('backend/order-s2/' . encryptIt($em_2['ord_id'])) ?>" class="btn btn-lg btn-dark btn-block">
                                        <span id="payment-button-amount">Back</span>
                                    </a>
                                    <a id="payment-button" href="<?= base_url('backend/order-s3/'. encryptIt($em_2['ord_id'])) ?>" class="btn btn-lg btn-secondary btn-block">
                                        <span id="payment-button-amount">Step 3 </span>
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
<?php }else{
    header('location: '.base_url().'/backend/order-s3/'.encryptIt($em_2['ord_id']));
    exit();
}
    ?>