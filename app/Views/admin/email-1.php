
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
                        <div class="col-md-3 offset-md-5">
                    <span id="flash-message" class="alert alert-success "></span>
                        </div>
                        <h6 class="card-title">Email 1</h6>
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
                               if($em_1['cl_gender']== "M"):?>
                               Mr.
                               <?php elseif($em_1['cl_gender']== "F"): ?>
                                Ms.
                                <?php endif; ?>
                                <?php $lname = explode(' ',$em_1['cl_cont_name']) ?>
                                <?php if(!empty($lname[1])): echo $lname[1]; endif;?></h6>
                                <br>
                                <p>Thank you for requesting a doctor through SRA Locum Service. We can confirm receiving your locum order. Process of sourcing a locum Doctor for you has already been initiated.</p>
                                <p class="text-danger">If the order details are correct, you do not need to reply to this email.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
  <table class="table table-bordered align-middle " style="border: 2px solid black;" >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_1['cl_h_name']. ', '. $em_1['cl_address'] ?></strong></td>
      </tr>
      <tr>
        <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_1['cl_cont_name'] ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $em_1['spec_name'].' '. $em_1['grade_name'] ?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
        <td style="border: 1px solid black;"><strong><?= date("d-m-y  h:i:s a", strtotime($em_1['ord_required_from'])). ' - ' .date("d-m-y  h:i:s a", strtotime($em_1['ord_required_to'])) ?></strong></td>
      </tr>    
  </table>
</div>

<p><strong>Order status:</strong>
<ol>
   <li><b>Order confirmation.</b></li>
   <li><b>Order processing initiated.</b></li>
   <li style="opacity:0.5;">Proposal of locum to you.</li>
<li style="opacity:0.5;">Acceptance or declining a locum.</li>
<li style="opacity:0.5;">Locum Confirmation.</li>
</ol>
</p>

                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>