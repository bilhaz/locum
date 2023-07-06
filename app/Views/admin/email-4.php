<?php if($em_4['ord_step4_flag'] != '1'){ ?>
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
                        <h6 class="card-title">Employee Confirmation</h6>
                        <ul class="header-dropdown">
                            <li>
                                <!-- <button type="button" onclick="CopyToClipboard()" class="btn btn-sm btn-outline-primary">Copy</button> -->
                            </li>
                        </ul>
                    </div>
                    <hr class="primary">
                    <div class="card-body">
                        <div class="row mb-3 " id="email">
                            <form action="<?= base_url('backend/sFourthR/' . encryptIt($em_4['ord_id']))?>" method="post">

                                <h5 style="color:#157DED">Dear Dr.

                                    <?= $em_4['emp_fname'] . ' ' . $em_4['emp_lname'] . ' (' . $em_4['emp_imcr_no'] . ')' ?></h5>
                                <br>
                                <p style="color:#157DED">Congratulations and thank you for taking up this Locum assignment with SRA Locum. Please find attached the confirmation of your booking.</p>
                                <h5 style="color:#157DED">Attachment</h5>
                                <ul class="spbull" style="line-height: 2em;">
                                <li style="color:#157DED">Attached is the Confirmation of Locum Details with Term & Conditions and Contract<br>
                                        <a type="button" target="_blank" href="<?= base_url('employee/ord-view/'.encryptIt($em_4['ord_id']))?>" class="btn" style="background-color:#157DED;color:white;">Click to View Contract</a>
                                    </li>
                                    <li style="color:#157DED">Attached is the Confirmation of Locum Details with Term & Conditions, Timesheet and Assessment form.<br>
                                        <a type="button" target="_blank" href="<?= base_url('public/uploads/SRAL-timesheet.pdf') ?>" class="btn" style="background-color:#157DED;color:white;">Click to Download Timesheet</a>
                                    </li>
                                    <li style="color:#157DED">Timesheet you are required to complete and get signed by your consultant when you have finished the shifts.</li>
                                    <li style="color:#157DED">Kindly ensure that you get your timesheet signed off at the end of the assignment. This is to make sure that you receive your payment promptly SRA Locum will only pay once Time sheet(s) is confirmed and the Client has paid SRA Locum (T&C applies).</li>
                                    <li style="color:#157DED">Please also submit the attached assessment form to the consultant/ GP whilst you are working as this will enable us to book you out easier in the future.</li>
                                    <li style="color:#157DED">Upon receipt of this email, please read the attached confirmation to confirm all details are correct, and then reply back to us immediately on by return Email.</li>
                                </ul>


                                <br>
                                <h6 class="text-danger">NOTE:</h6>
                                <span class="text-danger mb-2">If you are unable to reach GP/Hospital/assignment place of work on time for the agreed shifts please Contact Hospital/Surgery and SRA Locum on <a href="mailto:info@sralocum.com">info@sralocum.com</a> / 01-6854700. Unnecessary cancelation effects patient care please referrer to <a href="https://www.medicalcouncil.ie/">https://www.medicalcouncil.ie/</a> for additional information.</span>


                                <hr class="primary">
                                <br>
                                <p style="color:#157DED"><strong>What is next:</strong>
                                <ol type="1" style="color:#157DED; line-height: 2em;">
                                    <li>You finish your locum Assignment</li>
                                    <li>You send us a scan or fax of timesheet, Alternatively, leave it with HR.</li>
                                    <li>Once your timesheet hours are confirmed</li>
                                    <li>Your payment is processed subject to Hospital/ Surgery approval</li>
                                    <li>Shamrock Assist Locum Services Pays. (All agreed rates are Limited company rates only)</li>
                                </ol>
                                </p>
                                <div style="float:right;">
                                    <a id="payment-button" href="<?= base_url('backend/order-s4/' . encryptIt($em_4['ord_id'])) ?>" class="btn btn-lg btn-dark btn-block">
                                        <span id="payment-button-amount">Back</span>
                                    </a>
                                    <a id="payment-button" href="<?= base_url('backend/order-s5/' . encryptIt($em_4['ord_id'])) ?>" class="btn btn-lg btn-secondary btn-block">
                                        <span id="payment-button-amount">Step 5 </span>
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
    header('location: '.base_url().'/backend/order-s5/'.encryptIt($em_4['ord_id']));
    exit();
}
    ?>