
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Emails</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="<?= base_url('backend/dashboard') ?>">SRA Locum</a></li>

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
                        <h6 class="card-title">Email 2</h6>
                        <ul class="header-dropdown">
                            <li>
                                <button type="button" onclick="CopyToClipboard()" class="btn btn-sm btn-outline-primary">Copy</button>
                            </li>
                        </ul>
                    </div>
                    <hr class="primary">
                    <div class="card-body">
                    <div class="row mb-3 " id="email" contenteditable="true">
                               <h6>Dear <?php 
                               if($em_2['cl_gender']== "M"):?>
                               Mr.
                               <?php else: ?>
                                Ms.
                                <?php endif; ?>
                                <?php $lname = explode(' ',$em_2['cl_cont_name']) ?>
                                <?= $lname[1]?></h6>
                                <br>
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
        <td style="border: 1px solid black;"><strong><?= $em_2['ord_required_from']. ' - ' .$em_2['ord_required_to'] ?></strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><strong> Euro /hr</strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
        <td class="text-danger" style="border: 1px solid black;"><strong> <?= $em_2['ord_admin_charges'] ?>%</strong></td>
     </tr>  
  </table>
</div>

<p><strong>Find attached the relevant CV and other documents.</strong></p>

   <p class="mb-0"><strong>CV</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_cv']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_cv']) ?></a>
   <p class="mb-0"><strong>IMC Certificate</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_imc_cert']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_imc_cert']) ?></a>
   <p class="mb-0"><strong>Garda Vetting Certificate</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_gv_cert']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_gv_cert']) ?></a>
   <p class="mb-0"><strong>Recent Reference</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_rec_refer']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_rec_refer']) ?></a>
   <p class="mb-0"><strong>Passport</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_passport']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_passport']) ?></a>
   <p class="mb-0"><strong>Occupational Health</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_occup_health']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_occup_health']) ?></a>
   <p class="mb-0"><strong>Work Permit</strong></p>
   <a href="<?= base_url('public/uploads/employee_attach/'.$em_2['emp_work_permit']) ?>"><?= base_url('public/uploads/employee_attach/'.$em_2['emp_work_permit']) ?></a>


<br>
<hr class="primary">
<p><strong>Order status:</strong>
<ol>
   <li>Order confirmation.</li>
   <li>Order processing initiated.</li>
   <li>Proposal of locum to you.</li>
</ol>
</p>

                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>