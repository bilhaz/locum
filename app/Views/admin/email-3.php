
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Emails</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a></li>

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
                        <h6 class="card-title">Email 3</h6>
                        <ul class="header-dropdown">
                            <li>
                                <button type="button" onclick="CopyToClipboard()" class="btn btn-sm btn-outline-primary">Copy</button>
                            </li>
                        </ul>
                    </div>
                    <hr class="primary">
                    <div class="card-body">
                    <div class="row mb-3 " id="email" contenteditable="true">
                        <h5 class="text-danger">LOCUM CONFIRMATION</h5>
                               <h6>Dear <?php 
                               if($em_3['cl_gender']== "M"):?>
                               Mr.
                               <?php else: ?>
                                Ms.
                                <?php endif; ?>
                                <?php $lname = explode(' ',$em_3['cl_cont_name']) ?>
                                <?= $lname[1]?></h6>
                                <br>
                                <p>At SRA Locum Service we are pleased to confirm you the following doctor.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
  <table class="table table-bordered align-middle " style="border: 2px solid black;" >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_3['cl_h_name']. ', '. $em_3['cl_address'] ?></strong></td>
      </tr>
      <tr>
        <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_3['cl_cont_name'] ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_3['spec_name'].' '. $em_3['grade_name'] ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
        <td style="border: 1px solid black;"><strong>Dr. <?= $em_3['emp_fname']. ' ' .$em_3['emp_lname'] .'( '. $em_3['emp_imcr_no'].')' ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_3['ord_required_from']. ' - ' .$em_3['ord_required_to'] ?></strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><strong> Euro /hr</strong></td>
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
   <li>Order confirmation.</li>
   <li>Order processing initiated.</li>
   <li>Proposal of locum to you.</li>
   <li>Acceptance or declining a locum.</li>
   <li>Locum Confirmation.</li>
</ol>
</p>

                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>