<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Edit Order</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="<?= base_url('backend/dashboard') ?>">SRA
                                Locum</a>
                        </li>

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
                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->get('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->get('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->get('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->get('error') ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-title">
                            <h3 class="text-center title-2">Edit Order</h3>
                        </div>
                        <hr>
                        <form action="<?= base_url('backend/order_edit/' . encryptIt($eord_row['ord_id'])) ?>"
                            method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8"
                            data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <label for="ord_status" class="control-label mb-1">Cancel By Dr.</label>
                                    <select id="ord_cancel_bdr" name="ord_cancel_bdr" class="form-control select2">
                                        <option value="1" <?php if ($eord_row['ord_cancel_bdr'] == "1") { ?> echo
                                                selected="selected" <?php } ?>>Cancel</option>
                                        <option value="" <?php if (empty($eord_row['ord_cancel_bdr'])) { ?> echo
                                                selected="selected" <?php } ?>>Active</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ord_status" class="control-label mb-1">Cancel By Client</label>
                                    <select id="ord_cancel_bcl" name="ord_cancel_bcl" class="form-control select2">
                                        <option value="1" <?php if ($eord_row['ord_cancel_bcl'] == "1") { ?> echo
                                                selected="selected" <?php } ?>>Cancel</option>
                                        <option value="" <?php if ($eord_row['ord_cancel_bcl'] == "") { ?> echo
                                                selected="selected" <?php } ?>>Active</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-4 ">
                                    <label for="ord_status" class="control-label mb-1">Order Status</label>
                                    <select id="ord_status" name="ord_status" class="form-control select2">
                                        <option value="1" <?php if ($eord_row['ord_status'] == "1") { ?> echo
                                                selected="selected" <?php } ?>>Pending</option>
                                        <option value="2" <?php if ($eord_row['ord_status'] == "2") { ?> echo
                                                selected="selected" <?php } ?>>Processed</option>
                                        <option value="3" <?php if ($eord_row['ord_status'] == "3") { ?> echo
                                                selected="selected" <?php } ?>>Confirmed</option>
                                        <option value="4" <?php if ($eord_row['ord_status'] == "4") { ?> echo
                                                selected="selected" <?php } ?>>Ended</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php if($eord_row['ord_cancel_bdr'] == "1"): ?>
                                <div class="form-group col-md-4">
                                <label for="ord_status" class="control-label mb-1">Employee remarks</label>
                                <input type="text" class="form-control" value="<?= $eord_row['ord_dr_cremarks'] ?>" disabled>
                                </div>
                                <?php endif; ?>
                          
                                <?php if($eord_row['ord_cancel_bcl'] == "1"): ?>
                                <div class="form-group col-md-4">
                                <label for="ord_status" class="control-label mb-1">Client remarks</label>
                                <input type="text" class="form-control" value="<?= $eord_row['ord_cl_cremarks'] ?>" disabled>
                                </div>
                                <?php endif; ?>
                            </div>
                                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="ord_speciality" class="control-label mb-1">Required Speciality</label>
                                    <select id="ord_speciality" name="ord_speciality" class="form-control select2"
                                        required="" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach ($sp_row as $srow): ?>
                                            <option value="<?= $srow['spec_id'] ?>" <?php if ($eord_row['ord_speciality'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ord_grade" class="control-label mb-1">Required Grade</label>
                                    <select id="ord_grade" name="ord_grade" class="form-control select2" required=""
                                        data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach ($gr_row as $grow): ?>
                                            <option value="<?= $grow['grade_id'] ?>" <?php if ($eord_row['ord_grade'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>>
                                                <?= $grow['grade_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="cl_id" class="control-label mb-1">Order Form</label>
                                    <select id="cl_id" name="cl_id" class="select2 form-control" required=""
                                        data-parsley-trigger="change">
                                        <option value="">Select Client</option>
                                        <?php foreach ($cli_row as $crow): ?>
                                            <option value="<?= $crow['cl_id'] ?>" <?php if ($eord_row['cl_id'] == $crow['cl_id']) { ?> echo selected="selected" <?php } ?>> <?=
                                                          $crow['cl_cont_name'] . ' (' . $crow['cl_h_name'] . ')' ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="emp_id" class="control-label mb-1">Doctor Assigned to</label>
                                    <select id="emp_id" name="emp_id" class="form-control select2"
                                        data-parsley-trigger="change" required=""  onchange="checkCancellation()">
                                        <option value="">Select Employee</option>
                                        <?php foreach ($emp_row as $erow): ?>
                                            <option value="<?= encryptIt($erow['emp_id']) ?>" <?php if ($eord_row['emp_id'] == $erow['emp_id']) { ?> echo selected="selected" <?php } ?>><?=
                                                          $erow['emp_fname'] . ' ' . $erow['emp_lname'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_required_from" class="ord_required_from-label mb-1">Locum Required
                                        From</label>
                                    <input id="ord_required_from" name="ord_required_from" type="datetime-local"
                                        class="form-control" required="" value="<?= $eord_row['ord_required_from'] ?>">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="ord_required_to" class="control-label mb-1">Locum Required To</label>
                                    <input id="ord_required_to" name="ord_required_to" type="datetime-local"
                                        class="form-control" required="" value="<?= $eord_row['ord_required_to'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_process_date" class="control-label mb-1">Process Date</label>
                                    <input id="ord_process_date" name="ord_process_date" type="Date"
                                        class="form-control" required="" value="<?= $eord_row['ord_process_date'] ?>">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="ord_confirmation_date" class="control-label mb-1">Confirmation
                                        Date</label>
                                    <input id="ord_confirmation_date" name="ord_confirmation_date" type="Date"
                                        class="form-control" required=""
                                        value="<?= $eord_row['ord_confirmation_date'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_process_details_from" class="control-label mb-1">Locum Process
                                        From</label>
                                    <input id="ord_process_details_from" name="ord_process_details_from"
                                        type="datetime-local" class="form-control" required=""
                                        value="<?= $eord_row['ord_process_details_from'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_process_details_to" class="control-label mb-1">Locum Process
                                        To</label>
                                    <input id="ord_process_details_to" name="ord_process_details_to"
                                        type="datetime-local" class="form-control" required=""
                                        value="<?= $eord_row['ord_process_details_to'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_normal_hrs" class="control-label mb-1">No of Normal Hours</label>
                                    <input id="ord_normal_hrs" name="ord_normal_hrs" oninput="calculate()" type="text"
                                        class="form-control" required="" value="<?= $eord_row['ord_normal_hrs'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_on_call_hrs" class="control-label mb-1">No of On Call Hours</label>
                                    <input id="ord_on_call_hrs" name="ord_on_call_hrs" oninput="calculate()" type="text"
                                        class="form-control" required="" value="<?= $eord_row['ord_on_call_hrs'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="total" class="control-label mb-1">Total Hours</label>
                                    <input id="total" name="ord_total_hrs" type="text" class="form-control" required=""
                                        value="<?= $eord_row['ord_total_hrs'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_invoice_id" class="control-label mb-1">Invoice Id</label>
                                    <input id="ord_invoice_id" name="ord_invoice_id" type="text" class="form-control"
                                        required="" value="<?= $eord_row['ord_invoice_id'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_approx_cost" class="control-label mb-1">Approximate Cost</label>
                                    <input id="ord_approx_cost" name="ord_approx_cost" type="text" class="form-control"
                                        required="" value="<?= $eord_row['ord_approx_cost'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_pay_to_dr" class="control-label mb-1">Pay to Dr.</label>
                                    <input id="ord_pay_to_dr" name="ord_pay_to_dr" type="text" class="form-control"
                                        required="" value="<?= $eord_row['ord_pay_to_dr'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_admin_charges" class="control-label mb-1">Admin Charges</label>
                                    <input id="ord_admin_charges" name="ord_admin_charges" type="text"
                                        class="form-control" required="" value="<?= $eord_row['ord_admin_charges'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_diff_profit_admin" class="control-label mb-1">Diff (Profit) + Admin
                                        Charges</label>
                                    <input id="ord_diff_profit_admin" name="ord_diff_profit_admin" type="text"
                                        class="form-control" required=""
                                        value="<?= $eord_row['ord_diff_profit_admin'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_time_sheet_rcvd" class="control-label mb-1">Time Sheet
                                        received</label>
                                    <input id="ord_time_sheet_rcvd" name="ord_time_sheet_rcvd" type="Date"
                                        class="form-control" required=""
                                        value="<?= $eord_row['ord_time_sheet_rcvd'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_time_sheet_mode" class="control-label mb-1">Time Sheet Mode</label>
                                    <select id="ord_time_sheet_mode" name="ord_time_sheet_mode"
                                        class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Mode</option>
                                        <option value="whatsapp" <?php if ($eord_row['ord_time_sheet_mode'] == "whatsapp") { ?> echo selected="selected" <?php } ?>>whatsapp</option>
                                        <option value="email" <?php if ($eord_row['ord_time_sheet_mode'] == "email") { ?>
                                                echo selected="selected" <?php } ?>>email</option>
                                        <option value="fax" <?php if ($eord_row['ord_time_sheet_mode'] == "fax") { ?>
                                                echo selected="selected" <?php } ?>>fax</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_time_sheet_process" class="control-label mb-1">Time Sheet
                                        Processed</label>
                                    <input id="ord_time_sheet_process" name="ord_time_sheet_process" type="date"
                                        class="form-control" required=""
                                        value="<?= $eord_row['ord_time_sheet_process'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_time_sheet_approved" class="control-label mb-1">Time Sheet
                                        Status</label>
                                    <select id="ord_time_sheet_approved" name="ord_time_sheet_approved" type="text"
                                        class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Status</option>
                                        <option value="Approved" <?php if ($eord_row['ord_time_sheet_approved'] == "Approved") { ?> echo selected="selected" <?php
                                        } ?>>Approved</option>
                                        <option value="Not-Approved" <?php if ($eord_row['ord_time_sheet_approved'] == "Not-Approved") { ?> echo selected="selected"
                                            <?php } ?>>Not-Approved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ord_comment1" class="control-label mb-1">Comment</label>
                                <textarea id="ord_comment1" name="ord_comment1" type="text"
                                    class="form-control"><?= $eord_row['ord_comment1'] ?></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_invoice_refer" class="control-label mb-1">Invoice Reference</label>
                                    <input id="ord_invoice_refer" name="ord_invoice_refer" type="text"
                                        class="form-control" required="" value="<?= $eord_row['ord_invoice_refer'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_ord_invoice_datetime_sheet_approved"
                                        class="control-label mb-1">Invoice Date</label>
                                    <input id="ord_invoice_date" name="ord_invoice_date" type="date"
                                        class="form-control" required="" value="<?= $eord_row['ord_invoice_date'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_invoice_by" class="control-label mb-1">Invoice By</label>
                                    <input id="ord_invoice_by" name="ord_invoice_by" type="text" class="form-control"
                                        required="" value="<?= $eord_row['ord_invoice_by'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_sage_refer_no" class="control-label mb-1">Sage Reference No.</label>
                                    <input id="ord_sage_refer_no" name="ord_sage_refer_no" type="text"
                                        class="form-control" required="" value="<?= $eord_row['ord_sage_refer_no'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_paymnt_rcvd_date" class="control-label mb-1">Payment Received
                                        Date</label>
                                    <input id="ord_paymnt_rcvd_date" name="ord_paymnt_rcvd_date" type="date"
                                        class="form-control" required=""
                                        value="<?= $eord_row['ord_paymnt_rcvd_date'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_pay_to_dr_date" class="control-label mb-1">Paid to Employee Date</label>
                                    <input id="ord_pay_to_dr_date" name="ord_pay_to_dr_date" type="date"
                                        class="form-control" required="" value="<?= $eord_row['ord_pay_to_dr_date'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_case_status" class="control-label mb-1">Case Status</label>
                                    <select id="ord_case_status" name="ord_case_status" class="form-control select2"
                                        required="" data-parsley-trigger="change">
                                        <option value="">Select status</option>
                                        <option value="Closed" <?php if ($eord_row['ord_case_status'] == "Closed") { ?>
                                                echo selected="selected" <?php } ?>>Closed</option>
                                        <option value="Pending" <?php if ($eord_row['ord_case_status'] == "Pending") { ?>
                                                echo selected="selected" <?php } ?>>Pending</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ord_payment_status" class="control-label mb-1">Employee Payment Status</label>
                                    <select id="ord_payment_status" name="ord_payment_status"
                                        class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select status</option>
                                        <option value="Paid" <?php if ($eord_row['ord_payment_status'] == "Paid") { ?>
                                                echo selected="selected" <?php } ?>>Paid</option>
                                        <option value="Pending" <?php if ($eord_row['ord_payment_status'] == "Pending") { ?> echo selected="selected" <?php } ?>>Pending</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ord_comment2" class="control-label mb-1">Payment Remarks</label>
                                <textarea id="ord_comment2" name="ord_comment2" type="text"
                                    class="form-control"><?= $eord_row['ord_comment2'] ?></textarea>
                            </div>
                            <hr class="primary">
                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Doctor Assesment</label>
                                <input class="form-control" type="file" name="ord_assignment" id="formFile"
                                    data-parsley-max-file-size="2000" />
                                <input class="form-control" type="hidden" name="ord_assignmentt"
                                    value="<?= $eord_row['ord_assignment'] ?>" id="ord_assignmentt" />
                            </div>
                            <?php if (!empty($eord_row['ord_assignment'])): ?>
                                <div class="row mb-3">
                                    <p><a target="_blank"
                                            href="<?= base_url('public/uploads/doc_assesment/' . $eord_row['ord_assignment']) ?>">View
                                            Assesment</a></p>
                                </div>
                            <?php endif; ?>
                            <hr class="primary">



                            <div> 
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Update Order</span>
                                </button>

                                <a style="float:right !important;" id="payment-button" href="<?= base_url('backend/orders') ?>"
                                    class="btn btn-lg btn-dark text-light btn-block">
                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

function checkCancellation(){
    if(document.getElementById("ord_cancel_bdr").value === "1"){
        if(confirm("Are you sure?"))
        window.location.href = "<?=base_url("backend/change_doctor_cancelled_order/".encryptIt($eord_row['ord_id']))?>"+"/"+document.getElementById("emp_id").value;
    }
}

</script>