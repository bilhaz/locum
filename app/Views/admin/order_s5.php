<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Payments</h2>
                    <ul class="breadcrumb mb-0">

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">

                </div>


                <div id="wizard_horizontal" role="application" class="wizard clearfix">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first done" aria-disabled="false" aria-selected="false"><a id="wizard_horizontal-t-0" href="#wizard_horizontal-h-0" aria-controls="wizard_horizontal-p-0"><span class="number">1.</span> First Response</a>
                            </li>
                            <li role="tab" class="second done" aria-disabled="false" aria-selected="true"><a id="wizard_horizontal-t-1" href="#wizard_horizontal-h-1" aria-controls="wizard_horizontal-p-1"><span class="current-info audible">current
                                        step: </span><span class="number">2.</span> Locum Process</a></li>
                            <li role="tab" class="third done" aria-disabled="false"><a id="wizard_horizontal-t-2" href="#wizard_horizontal-h-2" aria-controls="wizard_horizontal-p-2"><span class="number">3.</span> Client Confirmation</a></li>
                            <li role="tab" class="fourth done" aria-disabled="false"><a id="wizard_horizontal-t-3" aria-controls="wizard_horizontal-p-3"><span class="number">4.</span> Emp Confirmation</a></li>
                            <li role="tab" class="last current" aria-disabled="false"><a id="wizard_horizontal-t-3" aria-controls="wizard_horizontal-p-3"><span class="number">5.</span> Payments</a></li>
                        </ul>
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


                            <form action="<?= base_url('backend/order-s5/' . encryptIt($v_ordr['ord_id'])) ?>) ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="ord_time_sheet_rcvd" class="control-label mb-1">TimeSheet
                                            received</label>
                                        <input id="ord_time_sheet_rcvd" name="ord_time_sheet_rcvd" type="date" title="Click to enter date" class="form-control" required="" value="<?= $v_ordr['ord_time_sheet_rcvd'] ? $v_ordr['ord_time_sheet_rcvd'] : set_value('ord_time_sheet_rcvd') ?>">
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <label for="ord_time_sheet_mode" class="control-label mb-1">TimeSheet
                                            Mode</label>
                                        <select id="ord_time_sheet_mode" name="ord_time_sheet_mode" required="" dataid="<?= $v_ordr['ord_id'] ?>" class="form-control select2" data-parsley-trigger="change">
                                            <option value="">Select Mode</option>
                                            <option value="whatsapp" <?= set_select(
                                                                            'ord_time_sheet_mode',
                                                                            'whatsapp',
                                                                            ($v_ordr['ord_time_sheet_mode'] == 'whatsapp') ? TRUE : FALSE
                                                                        ) ?>>whatsapp</option>
                                            <option value="email" <?= set_select(
                                                                        'ord_time_sheet_mode',
                                                                        'email',
                                                                        ($v_ordr['ord_time_sheet_mode'] == 'email') ? TRUE : FALSE
                                                                    ) ?>>email
                                            </option>
                                            <option value="fax" <?= set_select(
                                                                    'ord_time_sheet_mode',
                                                                    'fax',
                                                                    ($v_ordr['ord_time_sheet_mode'] == 'fax') ? TRUE : FALSE
                                                                ) ?>>fax</option>
                                            <option value="online" <?= set_select(
                                                                        'ord_time_sheet_mode',
                                                                        'online',
                                                                        ($v_ordr['ord_time_sheet_mode'] == 'online') ? TRUE : FALSE
                                                                    ) ?>>Online Submitted</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <div class="form-group col-md-6">
                                        <label for="ord_time_sheet_process" class="control-label mb-1">TimeSheet
                                            Processed</label>
                                        <input id="ord_time_sheet_process" name="ord_time_sheet_process" type="date" title="Click to enter date" class="form-control" required="" value="<?= $v_ordr['ord_time_sheet_process'] ? $v_ordr['ord_time_sheet_process'] : set_value('ord_time_sheet_process') ?>">
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <label for="ord_time_sheet_approved" class="control-label mb-1">Time Sheet
                                            Status</label>
                                        <select id="ord_time_sheet_approved" name="ord_time_sheet_approved" onchange="sentVerificationEmail()" type="text" required="" class="form-control select2" data-parsley-trigger="change">
                                            <option value="">Select Status</option>
                                            <option value="Due" <?= set_select(
                                                                    'ord_time_sheet_approved',
                                                                    'Due',
                                                                    ($v_ordr['ord_time_sheet_approved'] == 'Due') ? TRUE : FALSE
                                                                ) ?>>Due
                                            </option>
                                            <option value="Received" <?=
                                                                        set_select(
                                                                            'ord_time_sheet_approved',
                                                                            'Received',
                                                                            ($v_ordr['ord_time_sheet_approved'] == 'Received') ? TRUE : FALSE
                                                                        ) ?>>Received</option>
                                            <option value="Sent_for_verification" <?=
                                                                                    set_select(
                                                                                        'ord_time_sheet_approved',
                                                                                        'Sent_for_verification',
                                                                                        ($v_ordr['ord_time_sheet_approved'] == 'Sent_for_verification') ? TRUE :
                                                                                            FALSE
                                                                                    ) ?>>Sent For Verification</option>
                                            <option value="Approved" <?=
                                                                        set_select(
                                                                            'ord_time_sheet_approved',
                                                                            'Approved',
                                                                            ($v_ordr['ord_time_sheet_approved'] == 'Approved') ? TRUE : FALSE
                                                                        ) ?>>Approved</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-12">
                                        <label for="ord_comment1" class="control-label mb-1">Comment</label>
                                        <textarea id="ord_comment1" name="ord_comment1" type="text" placeholder="Drop Comments here..." class="form-control"><?= $v_ordr['ord_comment1'] ? $v_ordr['ord_comment1'] : set_value('ord_comment1') ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-3 ">
                                        <label for="ord_invoice_id" class="control-label mb-1">SRAL Invoice ID</label>
                                        <input id="ord_invoice_id" name="ord_invoice_id" type="text" class="form-control" required value="<?= $v_ordr['ord_invoice_id'] ? $v_ordr['ord_invoice_id'] : set_value('ord_invoice_id') ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ord_ord_invoice_datetime_sheet_approved" class="control-label mb-1">SRAL Invoice Date</label>
                                        <input id="ord_invoice_date" name="ord_invoice_date" type="date" required title="Click to enter date" class="form-control" value="<?= $v_ordr['ord_invoice_date'] ? $v_ordr['ord_invoice_date'] : set_value('ord_invoice_date') ?>">
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <label for="ord_invoice_by" class="control-label mb-1">Invoiced By</label>
                                        <input id="ord_invoice_by" name="ord_invoice_by" type="text" class="form-control" required value="<?= $v_ordr['ord_invoice_by'] ? $v_ordr['ord_invoice_by'] : set_value('ord_invoice_by') ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ord_sage_refer_no" class="control-label mb-1">Sage Invoice
                                            ID</label>
                                        <input id="ord_sage_refer_no" name="ord_sage_refer_no" type="text" required class="form-control" value="<?= $v_ordr['ord_sage_refer_no'] ? $v_ordr['ord_sage_refer_no'] : set_value('ord_sage_refer_no') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="ord_invoice_refer" class="control-label mb-1">Invoice Details
                                        </label>
                                        <textarea id="ord_invoice_refer" name="ord_invoice_refer" type="text" placeholder="use Comma ',' to separate values. Like you used in above 'Locum Process Date & Time Details'" required="" class="form-control"><?= $v_ordr['ord_invoice_refer'] ? $v_ordr['ord_invoice_refer'] : set_value('ord_invoice_refer') ?></textarea>

                                    </div>

                                    <div class="form-group col-md-3 ">
                                        <label for="ord_paymnt_rcvd_date" class="control-label mb-1">Client Payment
                                            Received</label>
                                        <input id="ord_paymnt_rcvd_date" name="ord_paymnt_rcvd_date" type="date" title="Click to enter date" class="form-control" required value="<?= $v_ordr['ord_paymnt_rcvd_date'] ? $v_ordr['ord_paymnt_rcvd_date'] : set_value('ord_paymnt_rcvd_date') ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ord_payment_status" class="control-label mb-1">Client Payment
                                            Status</label>
                                        <select id="ord_payment_status" name="ord_payment_status" required class="form-control select2" data-parsley-trigger="change">
                                            <option value="">Select status</option>
                                            <option value="Sent" <?= set_select(
                                                                        'ord_payment_status',
                                                                        'Sent',
                                                                        ($v_ordr['ord_payment_status'] == 'Sent') ? TRUE : False
                                                                    ) ?>>Sent
                                            </option>
                                            <option value="Due" <?= set_select(
                                                                    'ord_payment_status',
                                                                    'Due',
                                                                    ($v_ordr['ord_payment_status'] == 'Due') ? TRUE : False
                                                                ) ?>>Due</option>
                                            <option value="Rceived" <?= set_select(
                                                                        'ord_payment_status',
                                                                        'Rceived',
                                                                        ($v_ordr['ord_payment_status'] == 'Rceived') ? TRUE : False
                                                                    ) ?>>Received
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-3">
                                        <label for="ord_pay_to_dr_date" class="control-label mb-1">Paid to
                                            Employee</label>
                                        <input id="ord_pay_to_dr_date" name="ord_pay_to_dr_date" type="date" title="Click to enter date" class="form-control" value="<?= $v_ordr['ord_pay_to_dr_date'] ? $v_ordr['ord_pay_to_dr_date'] : set_value('ord_pay_to_dr_date') ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ord_emp_pay_status" class="control-label mb-1">Employee Payment
                                            Status</label>
                                        <select id="ord_emp_pay_status" name="ord_emp_pay_status" required class="form-control select2" data-parsley-trigger="change">
                                            <option value="">Select status</option>
                                            <option value="Paid" <?= set_select(
                                                                        'ord_emp_pay_status',
                                                                        'Paid',
                                                                        ($v_ordr['ord_emp_pay_status'] == 'Paid') ? TRUE : False
                                                                    ) ?>>Paid
                                            </option>
                                            <option value="Due" <?= set_select(
                                                                    'ord_emp_pay_status',
                                                                    'Due',
                                                                    ($v_ordr['ord_emp_pay_status'] == 'Due') ? TRUE : False
                                                                ) ?>>Due</option>
                                            <option value="Rceived" <?= set_select(
                                                                        'ord_emp_pay_status',
                                                                        'Rceived',
                                                                        ($v_ordr['ord_emp_pay_status'] == 'Rceived') ? TRUE : False
                                                                    ) ?>>Rceived
                                            </option>
                                            <option value="Sent" <?= set_select(
                                                                        'ord_emp_pay_status',
                                                                        'Sent',
                                                                        ($v_ordr['ord_emp_pay_status'] == 'Sent') ? TRUE : False
                                                                    ) ?>>Sent
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ord_comment2" class="control-label mb-1">Payment Remarks</label>
                                        <textarea id="ord_comment2" name="ord_comment2" type="text" placeholder="Write your Payment remarks here...." class="form-control"><?= $v_ordr['ord_comment2'] ?></textarea>
                                    </div>
                                </div>
                                <div style="float:right;">
                                    <a id="payment-button" href="<?= base_url('backend/orders') ?>" class="btn btn-lg btn-dark btn-block">
                                        <span id="payment-button-amount">Cancel</span>
                                    </a>
                                    <a id="payment-button" href="<?= base_url('backend/order-s4/' . encryptIt($v_ordr['ord_id'])) ?>" class="btn btn-lg btn-secondary btn-block">
                                        <span id="payment-button-amount">Back to Step 4 </span>
                                    </a>
                                    &nbsp; &nbsp;
                                    <?php if(isset($v_ordr['ord_vat_save'])): ?>
                                    <a id="payment-button" href="<?= base_url('backend/end-locum/'.encryptIt($v_ordr['ord_id'])) ?>" class="btn btn-lg btn-warning btn-block" Onclick="return confirm('Are You sure? You want to END Locum?');">

                                        <span id="payment-button-amount">End Locum</span>
                                    </a>
                                    &nbsp; &nbsp;
                                    <?php endif; ?>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block" Onclick="return confirm('Are You sure? You want to Finish and Lock this?');">
                                        <span id="payment-button-amount">Save & Lock</span>
                                    </button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>