
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Order Status</h2>
                    <ul class="breadcrumb mb-0">
                    <a href="javascript:history.go(-1)" class="btn btn-secondary"><i class="fa fa-arrow-left me-2"></i>Go Back</a>

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        
                    <div class="col-md-3 offset-md-5">
                    <span id="flash-message" class="alert alert-success"></span>
                    
                        </div>
                        
                        <h6 class="card-title">You Order Details</h6>
                            

                                <ul class="header-dropdown">
                            <li>
                            
                            <?php if($em_2['ord_cancel_bcl'] <> 1): ?>
                                <?php if($em_2['ord_status'] > 1 && $em_2['ord_status'] < 3): ?>
                                            <h6 class="mb-0"><a href="<?= base_url('client/ord-confirm/'.encryptIt($em_2['ord_id'])) ?>" class="btn btn-primary">Confirm</a></h6>
                                            <?php elseif($em_2['ord_status'] > 2 ): ?>
                                                <span class="badge bg-success">Confirmed</span>
                                                <?php endif; ?>
                                                <?php endif; ?>
                            </li>
                            </ul>
                    </div>
                    <hr class="primary">
                    <div class="card-body">
                    <div class="row mb-3 " id="email">
                    <h6>Dear<?php $fname = explode(' ',$em_2['cl_cont_name']) ?>
                                <?php if(!empty($fname[0])): echo $fname[0]; endif;?></h6>
                                <p>At SRA Locum Service we are pleased to offer you the following doctor. Please review and reply.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
  <table class="table table-bordered align-middle " style="border: 2px solid black;" >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_2['cl_h_name']. ', '. $em_2['cl_address'] ?></strong></td>
      </tr>
      <tr>
        <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_2['cl_cont_name'] ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_2['spec_name'].' '. $em_2['grade_name'] ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
        <td style="border: 1px solid black;"><strong>Dr. <?= $em_2['emp_fname']. ' ' .$em_2['emp_lname'] .'( '. $em_2['emp_imcr_no'].')' ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_2['ord_datetime_detail']?></strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_2['ord_pay_to_dr'] ?> Euro /hr</strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
        <td class="text-danger" style="border: 1px solid black;"><strong> <?= $em_2['ord_admin_charges'] ?>%</strong></td>
     </tr>  
  </table>
</div>

<p><strong>Find attached the relevant CV and other documents.</strong></p>

    <?php if(!empty($em_2['emp_cv'])):?>
   <p class="mb-0"><strong>CV</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_cv']) ?>">Click To View</a>
   <?php endif; ?>
   <?php if(!empty($em_2['emp_imc_cert'])):?>
   <p class="mb-0"><strong>IMC Certificate</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_imc_cert']) ?>">Click To View</a>
   <?php endif; ?>
<?php if(!empty($em_2['emp_gv_cert'])):?>
   <p class="mb-0"><strong>Garda Vetting Certificate</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_gv_cert']) ?>">Click To View</a>
   <?php endif; ?>
<?php if(!empty($em_2['emp_rec_refer'])):?>
   <p class="mb-0"><strong>Recent Reference</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_rec_refer']) ?>">Click To View</a>
   <?php endif; ?>
<?php if(!empty($em_2['emp_passport'])):?>
   <p class="mb-0"><strong>Passport</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_passport']) ?>">Click To View</a>
   <?php endif; ?>
<?php if(!empty($em_2['emp_occup_health'])):?>
   <p class="mb-0"><strong>Occupational Health</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_occup_health']) ?>">Click To View</a>
   <?php endif; ?>
<?php if(!empty($em_2['emp_work_permit'])):?>
   <p class="mb-0"><strong>Work Permit</strong></p>
   <a target="_blank" href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_work_permit']) ?>">Click To View</a>
   <?php endif; ?>


<br>

                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>