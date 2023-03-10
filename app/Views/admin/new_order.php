<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        New Order</h2>
                    <ul class="breadcrumb mb-0">

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">

                </div>

                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
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
                        <div class="card-title">
                            <h3 class="text-center title-2">Create New Order</h3>
                        </div>
                        <hr>
                        <form action="<?= base_url('backend/new_order') ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                        <div class="row mb-3">
                                <div class="form-group col-md-4 offset-md-8">
                                <label for="ord_status" class="control-label mb-1">Order Status</label>
                        <select id="ord_status" name="ord_status"  class="form-control select2">
                                        <option value="1" <?= set_select('ord_status','1', ( !empty($fieldType) && $fieldType == '1' ? TRUE : FALSE )); ?> >Pending</option>
                                        <option value="2" <?= set_select('ord_status','2', ( !empty($fieldType) && $fieldType == '2' ? TRUE : FALSE )); ?> >Processed</option>
                                        <option value="3" <?= set_select('ord_status','3', ( !empty($fieldType) && $fieldType == '3' ? TRUE : FALSE )); ?> >Confirmed</option>
                                        <option value="4" <?= set_select('ord_status','4', ( !empty($fieldType) && $fieldType == '4' ? TRUE : FALSE )); ?>  >Ended</option>
                                        
                                    </select>
                                </div>
                        </div>
                            
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="ord_speciality" class="control-label mb-1">Required Speciality</label>
                                    <select id="ord_speciality" name="ord_speciality" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($sp_row as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?= set_select('ord_speciality',$srow['spec_id'], ( !empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE )); ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label for="ord_grade" class="control-label mb-1">Required Grade</label>
                                    <select id="ord_grade" name="ord_grade"  class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($gr_row as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?= set_select('ord_grade',$grow['grade_id'], ( !empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE )); ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="cl_id" class="control-label mb-1">Order From</label>
                                    <select id="cl_id" name="cl_id" class="select2 form-control"  data-parsley-trigger="change">
                                        <option value="">Select Client</option>
                                        <?php foreach($cli_row as $crow):?>
                                        <option value="<?= $crow['cl_id']?>" <?= set_select('cl_id',$crow['cl_id'], ( !empty($fieldType) && $fieldType == $crow['cl_id'] ? TRUE : FALSE )); ?>><?= $crow['cl_cont_name'].' ('.$crow['cl_h_name'].')'?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label for="emp_id" class="control-label mb-1">Doctor Assigned to</label>
                                    <select id="emp_id" name="emp_id"  class="form-control select2" data-parsley-trigger="change" >
                                        <option value="">Select Employee</option>
                                        <?php foreach($emp_row as $erow):?>
                                        <option value="<?= $erow['emp_id']?>" <?= set_select('emp_id',$erow['emp_id'], ( !empty($fieldType) && $fieldType == $erow['emp_id'] ? TRUE : FALSE )); ?>><?= $erow['emp_fname'] .' '.$erow['emp_lname']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_required_from" class="ord_required_from-label mb-1">Locum Required From</label>
                                    <input id="ord_required_from" name="ord_required_from" type="datetime-local" title="Click to enter date and time" class="form-control"  value="<?= set_value('ord_required_from') ?>">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="ord_required_to" class="control-label mb-1">Locum Required To</label>
                                    <input id="ord_required_to" name="ord_required_to" type="datetime-local" title="Click to enter date and time" class="form-control"  value="<?= set_value('ord_required_to') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label for="ord_datetime_detail" class="control-label mb-1">Locum Date & Time Details</label>
                                <textarea id="ord_datetime_detail" name="ord_datetime_detail" class="form-control" placeholder="Use comma separation for putting multiple dates and time for e.g: ' 23-02-2024 to 23-03-2024 08 to 21, 28-02-2023 18 to 22' "></textarea>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_process_details_from" class="control-label mb-1">Locum Process From</label>
                                    <input id="ord_process_details_from" name="ord_process_details_from" type="datetime-local" title="Click to enter date and time" class="form-control"  value="<?= set_value('ord_process_details_from') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_process_details_to" class="control-label mb-1">Locum Process To</label>
                                    <input id="ord_process_details_to" name="ord_process_details_to" type="datetime-local" title="Click to enter date and time" class="form-control"  value="<?= set_value('ord_process_details_to') ?>">
                                </div>
                            </div>
                             <div class="row mb-3">
                            <label for="ord_prosdatetime_detail" class="control-label mb-1">Locum Process Date & Time Details</label>
                                <textarea id="ord_prosdatetime_detail" name="ord_prosdatetime_detail" class="form-control" placeholder="Use comma separation for putting multiple dates and time for e.g: ' 23-02-2024 to 23-03-2024 08 to 21, 28-02-2023 18 to 22' "></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_process_date" class="control-label mb-1">Processed Date</label>
                                    <input id="ord_process_date" name="ord_process_date" type="Date" title="Click to enter date" class="form-control"  value="<?= set_value('ord_process_date') ?>">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="ord_confirmation_date" class="control-label mb-1">Confirmation Date</label>
                                    <input id="ord_confirmation_date" name="ord_confirmation_date" type="Date" title="Click to enter date" class="form-control"  value="<?= set_value('ord_confirmation_date') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_normal_hrs" class="control-label mb-1">No of Normal Hours</label>
                                    <input id="ord_normal_hrs" name="ord_normal_hrs" oninput="calculate()" type="text"  class="form-control" value="<?= set_value('ord_normal_hrs') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_on_call_hrs" class="control-label mb-1">No of On Call Hours</label>
                                    <input id="ord_on_call_hrs" name="ord_on_call_hrs" oninput="calculate()" type="text" class="form-control" value="<?= set_value('ord_on_call_hrs') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="total" class="control-label mb-1">Total Hours</label>
                                    <input id="total" name="ord_total_hrs" oninput="payingdoc()" type="text" class="form-control" value="<?= set_value('ord_total_hrs') ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ord_approx_cost" class="control-label mb-1">Hospital Rate</label>
                                    <input id="ord_approx_cost"  name="ord_approx_cost" type="text" class="form-control" value="<?= set_value('ord_approx_cost') ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ord_hosp_earn" class="control-label mb-1">Total Earning from Hospital&nbsp;<small class="text-danger">(Office use only)</small></label>
                                    <input id="ord_hosp_earn" oninput="calculateTa();calculateDiff();" name="ord_hosp_earn" type="text" class="form-control" value="<?= set_value('ord_hosp_earn') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-3 ">
                                    <label for="ord_pay_to_dr" class="control-label mb-1">Pay to Dr.</label>
                                    <input id="ord_pay_to_dr" oninput="payingdoc()" name="ord_pay_to_dr" type="text" class="form-control" value="<?= set_value('ord_pay_to_dr') ?>">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="ord_paying_to_dr" class="control-label mb-1">Paying to Dr.&nbsp;<small class="text-danger">(Office use only)</small></label>
                                    <input id="ord_paying_to_dr" name="ord_paying_to_dr" oninput="calculateDiff()" type="text" class="form-control" value="<?= set_value('ord_paying_to_dr') ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ord_admin_charges" class="control-label mb-1">Admin Charges</label>
                                    <input id="ord_admin_charges" oninput="calculateTa()" name="ord_admin_charges" type="text" class="form-control" value="<?= set_value('ord_admin_charges') ?>">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="ord_adminchrg_intern" class="control-label mb-1">Total of Admin Charges&nbsp;<small class="text-danger">(Office use only)</small></label>
                                    <input id="Tadmin" name="ord_adminchrg_intern" oninput="calculateDiff()" type="text" class="form-control" value="<?= set_value('ord_adminchrg_intern') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="diff" class="control-label mb-1">Diff (Profit) + Admin
                                        Charges</label>
                                    <input id="diff" name="ord_diff_profit_admin" type="text" class="form-control" value="<?= set_value('ord_diff_profit_admin') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_time_sheet_rcvd" class="control-label mb-1">Time Sheet
                                        received</label>
                                    <input id="ord_time_sheet_rcvd" name="ord_time_sheet_rcvd" type="Date" title="Click to enter date" class="form-control" value="<?= set_value('ord_time_sheet_rcvd') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_time_sheet_mode" class="control-label mb-1">Time Sheet Mode</label>
                                    <select id="ord_time_sheet_mode" name="ord_time_sheet_mode" class="form-control select2" data-parsley-trigger="change">
                                        <option value="">Select Mode</option>
                                        <option value="">Select Mode</option>
                                        <option value="whatsapp" <?= set_select('ord_time_sheet_mode','whatsapp', ( !empty($fieldType) && $fieldType == "whatsapp" ? TRUE : FALSE )); ?>>whatsapp</option>
                                        <option value="email" <?= set_select('ord_time_sheet_mode','email', ( !empty($fieldType) && $fieldType == "email" ? TRUE : FALSE )); ?>>email</option>
                                        <option value="fax" <?= set_select('ord_time_sheet_mode','fax', ( !empty($fieldType) && $fieldType == "fax" ? TRUE : FALSE )); ?>>fax</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_time_sheet_process" class="control-label mb-1">Time Sheet
                                        Processed</label>
                                    <input id="ord_time_sheet_process" name="ord_time_sheet_process" type="date" title="Click to enter date" class="form-control" value="<?= set_value('ord_time_sheet_process') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_time_sheet_approved" class="control-label mb-1">Time Sheet
                                        Status</label>
                                    <select id="ord_time_sheet_approved" name="ord_time_sheet_approved" type="text" class="form-control select2" data-parsley-trigger="change">
                                        <option value="">Select Status</option>
                                        <option value="Due" <?= set_select('ord_time_sheet_approved','Due', ( !empty($fieldType) && $fieldType == "Due" ? TRUE : FALSE )); ?>>Due</option>
                                        <option value="Received" <?= set_select('ord_time_sheet_approved','Received', ( !empty($fieldType) && $fieldType == "Received" ? TRUE : FALSE )); ?>>Received</option>
                                        <option value="Sent_for_verification" <?= set_select('ord_time_sheet_approved','Sent_for_verification', ( !empty($fieldType) && $fieldType == "Sent_for_verification" ? TRUE : FALSE )); ?>>Sent For Verification</option>
                                        <option value="Approved" <?= set_select('ord_time_sheet_approved','Approved', ( !empty($fieldType) && $fieldType == "Approved" ? TRUE : FALSE )); ?>>Approved</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                   <label for="ord_comment1" class="control-label mb-1">Comment</label>
                                <textarea id="ord_comment1" name="ord_comment1" type="text" class="form-control"><?= set_value('ord_comment1') ?></textarea> 
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                            <label for="ord_invoice_id" class="control-label mb-1">Invoice Reference</label>
                            <input id="ord_invoice_id" name="ord_invoice_id" type="text" class="form-control" value="<?= set_value('ord_invoice_id') ?>">
                            </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_invoice_refer" class="control-label mb-1">Invoice Reference</label>
                                    <input id="ord_invoice_refer" name="ord_invoice_refer" type="text" class="form-control"  value="<?= set_value('ord_invoice_refer') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_ord_invoice_datetime_sheet_approved" class="control-label mb-1">Invoice Date</label>
                                    <input id="ord_invoice_date" name="ord_invoice_date" type="date" title="Click to enter date" class="form-control"  value="<?= set_value('ord_invoice_date') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_invoice_by" class="control-label mb-1">Invoice By</label>
                                    <input id="ord_invoice_by" name="ord_invoice_by" type="text" class="form-control"  value="<?= set_value('ord_invoice_by') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_sage_refer_no" class="control-label mb-1">Sage Reference No.</label>
                                    <input id="ord_sage_refer_no" name="ord_sage_refer_no" type="text" class="form-control"  value="<?= set_value('ord_sage_refer_no') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_paymnt_rcvd_date" class="control-label mb-1">Payment Received Date</label>
                                    <input id="ord_paymnt_rcvd_date" name="ord_paymnt_rcvd_date" type="date" title="Click to enter date" class="form-control"  value="<?= set_value('ord_paymnt_rcvd_date') ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_pay_to_dr_date" class="control-label mb-1">Paid to Employee Date</label>
                                    <input id="ord_pay_to_dr_date" name="ord_pay_to_dr_date" type="date" title="Click to enter date" class="form-control"  value="<?= set_value('ord_pay_to_dr_date') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_case_status" class="control-label mb-1">Case Status</label>
                                    <select id="ord_case_status" name="ord_case_status" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select status</option>
                                        <option value="Closed" <?= set_select('ord_case_status','Closed', ( !empty($fieldType) && $fieldType == "Closed" ? TRUE : FALSE )); ?>>Closed</option>
                                        <option value="Pending" <?= set_select('ord_case_status','Pending', ( !empty($fieldType) && $fieldType == "Pending" ? TRUE : FALSE )); ?>>Pending</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_payment_status" class="control-label mb-1">Employee Payment Status</label>
                                    <select id="ord_payment_status" name="ord_payment_status" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select status</option>
                                        <option value="Paid" <?= set_select('ord_payment_status','Paid', ( !empty($fieldType) && $fieldType == "Paid" ? TRUE : FALSE )); ?>>Paid</option>
                                        <option value="Pending" <?= set_select('ord_payment_status','Pending', ( !empty($fieldType) && $fieldType == "Pending" ? TRUE : FALSE )); ?>>Pending</option>
                                    </select>
                                 </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ord_comment2" class="control-label mb-1">Payment Remarks</label>
                                <textarea id="ord_comment2" name="ord_comment2" type="text" class="form-control" ><?= set_value('ord_comment2') ?></textarea>
                            </div>
                            

                            

                            <div style="float:right !important;"> 
                                
                                <a id="payment-button" href="<?= base_url('backend/orders') ?>"
                                    class="btn btn-lg btn-dark text-light btn-block">
                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                            &nbsp; &nbsp;
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Order</span>
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
</div>
</div>