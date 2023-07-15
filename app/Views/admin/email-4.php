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

                                <h5 style="color:#157DED">Dear 
                                
                                <?= $em_4['emp_fname'].' '. $em_4['emp_lname']. ' ('. $em_4['emp_imcr_no']. ')'?></h5>
                                <br>
                                <p style="color:#157DED">Congratulations, and thank you for taking up this Locum assignment with SRA Locum with the following details:</p>
                                <table class="table table-bordered align-middle d-inline">
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_4['cl_h_name']. ', '. $em_4['cl_address'].' | ' . $em_4['cl_eircode'] ?></strong></td>
      </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_4['spec_name'].' '. $em_4['grade_name']?></strong></td>
     </tr>
     <tr>
	 <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
	 <td style="border: 1px solid black;"><strong>
    <?php $pros = explode(",",$em_4['ord_prosdatetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?>
</strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?=  $em_4['ord_normal_hrs_rt'] ?>&nbsp;<?php if($em_4['nh_p_type'] == 1): echo "/hr"; elseif($em_4['nh_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php if($em_4['ord_ocall_rt'] > 0): ?>
                                            <b>OnCall:</b> &euro;<?= $em_4['ord_ocall_rt']?>&nbsp;<?php if($em_4['oc_p_type'] == 1): echo "/hr"; elseif($em_4['oc_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?> <br>
                                            <?php endif; ?>
                                            <?php if($em_4['ord_osite_rt'] > 0): ?>
                                            <b>OffSite:</b> &euro;<?= $em_4['ord_osite_rt'] ?>&nbsp;<?php if($em_4['os_p_type'] == 1): echo "/hr"; elseif($em_4['os_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php endif; ?>
                                            <?php if($em_4['ord_bhw_rt'] > 0): ?>
                                            <b>Weekend:</b> &euro;<?= $em_4['ord_bhw_rt'] ?>&nbsp;<?php if($em_4['bhw_p_type'] == 1): echo "/hr"; elseif($em_4['bhw_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br></td>
                                            <?php endif; ?>
     </tr>
  </table>
  <br>
  <br>
  <p style="color:#157DED">You do not need to reply to this email. </p>
                                    <ol>
                                <li style="color:#157DED">To view your contract, please click here:
                                        <a type="button" target="_blank" href="<?= base_url('employee/ord-view/'.encryptIt($em_4['ord_id']))?>" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to View Contract</a></li>
										
										<li style="color:#157DED">To view your SRA Locum Terms and Condition, please click here:
                                        <a type="button" target="_blank" href="https://sralocum.com/public/uploads/files/termsandconditions.pdf" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to View Terms and Condition</a></li>
										
                                    <li style="color:#157DED">Once you have finished your locum, you will need to complete the time sheet.   Please login to your SRA Locum portal to complete your timesheet or alternatively click here to print your timesheet and send it to us after filling it.
                                        <a type="button" target="_blank" href="<?= base_url('public/uploads/SRAL-timesheet.pdf')?>" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to Download Timesheet</a></li>
										
										<li style="color:#157DED">We recommend that you have your assessment form completed and signed by the consultant and email it to us at info@sralocum.com
                                        <a type="button" target="_blank" href="<?= base_url('public/uploads/Assesment_form.pdf')?>" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to Download Assesment Form</a></li>
                                </ol>


   <br>
   <h6 style="color:red;">NOTE:</h6>
   <ol style="color:red;" type="a">
       <li>You remain responsible for the complete timesheet.</li>
       <li>. SRA Locum will only pay the locum doctor once the Timesheet (s) is confirmed and the ordering Client has paid Shamrock Assist Limited.</li>
       <li>We strongly recommend you have your assessment form completed as this will help us to secure locums for you.</li>
       <li>If you are unable to reach the GP/Hospital/assignment place of work on time for the agreed shifts please Contact the Hospital/Surgery on the phone (usually though GP surgery/Hospital switchboard) and by emailing SRA Locum at <a href="mailto:info@sralocum.com">info@sralocum.com</a> / or by calling 01-6854700.</li>
       <li>Unnecessary cancellation affects patient care. Please referrer to <a href="https://www.medicalcouncil.ie/">https://www.medicalcouncil.ie/</a> for additional information.</li>
       </ol>
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

<?php }else{
    header('location: '.base_url().'/backend/order-s5/'.encryptIt($em_4['ord_id']));
    exit();
}
    ?>