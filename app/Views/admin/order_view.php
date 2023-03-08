<style>

@media print {
  .col-md-1,.col-md-2,.col-md-3,.col-md-4,
  .col-md-5,.col-md-6,.col-md-7,.col-md-8, 
  .col-md-9,.col-md-10,.col-md-11,.col-md-12 {
    float: left;
  }

  .col-md-1 {
    width: 8%;
  }
  .col-md-2 {
    width: 16%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-4 {
    width: 33%;
  }
  .col-md-5 {
    width: 42%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-7 {
    width: 58%;
  }
  .col-md-8 {
    width: 66%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-10 {
    width: 83%;
  }
  .col-md-11 {
    width: 92%;
  }
  .col-md-12 {
    width: 100%;
  }
}

</style>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12 d-print-none">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a>View Order</h2>
                    <ul class="breadcrumb mb-0">

                    </ul>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title"></h6>
                        <ul class="header-dropdown d-print-none">
                            <li class="dropdown">
                                <button onclick="printSection('printthis')" class="btn btn-outline-secondary"><i
                                        class="fa fa-print"></i></button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" id="printthis">
                    <page size="A4"> 
                    <?php if($ordr_row['ord_cancel_bdr'] == 1): ?> 
                    <div class="row">
                    <div class="col-md-6 col-sm-6">
                    
                                            <span class="badge bg-danger">Cancelled by Dr</span>
                                            
                    </div>
                    </div>
                    <?php endif; ?>
                    <?php if($ordr_row['ord_cancel_bcl'] == 1): ?> 
                    <div class="row">
                    <div class="col-md-6 col-sm-6">
                    
                                            <span class="badge bg-danger">Cancelled by Client</span>
                                            
                    </div>
                    </div>
                    <?php endif; ?>
                        <h3>Order ID: <strong class="text-primary">
                                <?= $ordr_row['ord_id'] ?>
                            </strong></h3>
                        
                        

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                <div class="row">
                                    <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <address>
                                            <strong>
                                                <?= $ordr_row['cl_h_name'] ?>
                                            </strong><br>
                                            <?= $ordr_row['cl_cont_name'] ?><br>
                                            <?= $ordr_row['cl_address'] ?><br>
                                            <?= $ordr_row['cl_county'] ?><br>
                                            <abbr title="Phone">P:</abbr>
                                            <?= $ordr_row['cl_cont_phone'] ?>
                                        </address>
                                    </div>

                                    <div class="col-md-6 col-sm-6 text-end">
                                        <p class="mb-0 mt-0"><strong>Employee: </strong>&nbsp;<u>
                                                <?= $ordr_row['emp_fname'] . ' ' . $ordr_row['emp_lname'] ?>
                                            </u></p>
                                        <p class="mb-0"><strong>Order Process Date: </strong>
                                            <?= $ordr_row['ord_process_date'] ?>
                                        </p>
                                        <p class="mb-0"><strong>Order Status: </strong>
                                            <?php if($ordr_row['ord_status'] == "1"): ?>
                                            <span class="badge chart-color123">Pending</span>
                                            <?php elseif($ordr_row['ord_status'] == "2"): ?>
                                            <span class="badge chart-color122 ">Processed</span>
                                            <?php elseif($ordr_row['ord_status'] == "3"): ?>
                                            <span class="badge bg-success">Confirmed</span>
                                            <?php else: ?>
                                            <span class="badge chart-color120">Ended</span>
                                            <?php endif;?>
                                        </p>
                                        
                                        <p class="mb-0"><strong>Invoice ID: </strong>
                                            <?= $ordr_row['ord_invoice_id'] ?>
                                        </p>
                                        <p class="mb-0"><strong>Payment Status: </strong>
                                            <?php if ($ordr_row['ord_payment_status'] == 'Pending') : ?>
                                            <span class="badge chart-color123">
                                                <?= $ordr_row['ord_payment_status'] ?>
                                            </span>

                                            <?php else : ?>
                                            <span class="badge bg-success">
                                                <?= $ordr_row['ord_payment_status'] ?>
                                            </span>
                                        <?php endif; ?>
                                        </p>
                                        <p class="mb-0"><strong>Case Status: </strong>
                                            <?php if ($ordr_row['ord_case_status'] == 'Pending') : ?>
                                            <span class="badge chart-color123">
                                                <?= $ordr_row['ord_case_status'] ?>
                                            </span>

                                            <?php else : ?>
                                            <span class="badge bg-success">
                                                <?= $ordr_row['ord_case_status'] ?>
                                            </span>
                                        <?php endif; ?>
                                        </p>
                                    </div>
                                </div>

                                    <div class="col-md-12">
                                    <div class="row mb-3">
                                    <?php if($ordr_row['ord_cancel_bdr'] == "1") :?>
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Employee Reason for Canceling</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span><?= $ordr_row['ord_dr_cremarks'] ?></span>
                                                        
                                                        <hr class="primary">
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="row mb-3">
                                    <?php if($ordr_row['ord_cancel_bcl'] == "1") :?>
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Client Reason for Canceling</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span><?= $ordr_row['ord_cl_cremarks'] ?></span>
                                                        
                                                        <hr class="primary">
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(!empty($ordr_row['ord_assignment'])) :?>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Doctor Assesment</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <a target="_blank" id="tocopy"
                                                        href="<?= base_url('public/uploads/doc_assesment/'.$ordr_row['ord_assignment']) ?>">View
                                                        Assesment</a>&nbsp; <i type="button" onclick="copyLink()" class="fa fa-clipboard"><span id="flash-message" class="alert alert-success"></span></i>
                                                        
                                                        <hr class="primary">
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Speciality:</h6>
                                                <hr class="primary">


                                            </div>
                                            <div class="col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['spec_name'] ?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Grade:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['grade_name'] ?>
                                                </span>
                                                <hr class="primary">

                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label" class="ord_required_from-label">Locum Required
                                                    From - To:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_required_from'] . ' - ' . $ordr_row['ord_required_to'] ?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label" class="ord_required_from-label">Locum Required
                                                    Date & Time Details:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_datetime_detail'] ?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Process Date:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_process_date'] ?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Confirmation Date:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_confirmation_date'] ?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Process Dates From - To:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_process_details_from']. ' - '.$ordr_row['ord_process_details_to']  ?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Process Date & Time Dtails:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_prosdatetime_detail']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Normal Hours:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_normal_hrs']?>/Hrs
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">On Call Hours:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_on_call_hrs']?>/Hrs
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Total Hours:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_total_hrs']?>/Hrs
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Approximate Cost:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_approx_cost']?>€
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Pay to Dr. :</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_pay_to_dr']?>€
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Admin Charges:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_admin_charges']?>%
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Diff (Profit) + Admin Charges:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_diff_profit_admin']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Time Sheet received (Mode):</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_time_sheet_rcvd']. '&nbsp;(&nbsp;'.$ordr_row['ord_time_sheet_mode'].'&nbsp;)&nbsp;'?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6 ">
                                                <h6 class="control-label ">Time Sheet Process:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <span class="cview ">
                                                    <?= $ordr_row['ord_time_sheet_process']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Time Sheet Status:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?php if($ordr_row['ord_time_sheet_approved'] == "Approved"): ?>
                                                <span class="cview badge bg-success ">
                                                    <?= $ordr_row['ord_time_sheet_approved']?>
                                                </span>
                                                <hr class="primary">
                                                <?php else: ?>
                                                <span class="cview badge chart-color123">
                                                    <?= $ordr_row['ord_time_sheet_approved']?>
                                                </span>
                                                <hr class="primary">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Comment:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_comment1']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Invoice Reference:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_invoice_refer']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Invoice Date:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_invoice_date']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Invoice By:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_invoice_by']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Sage Reference No:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_sage_refer_no']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Payment Received Date:</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_paymnt_rcvd_date']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Paid to Dr. :</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_pay_to_dr_date']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <h6 class="control-label ">Comment :</h6>
                                                <hr class="primary">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="cview">
                                                    <?= $ordr_row['ord_comment2']?>
                                                </span>
                                                <hr class="primary">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </page>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>