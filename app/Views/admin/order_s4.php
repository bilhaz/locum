<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Employee Confirmation</h2>
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
                            <li role="tab" class="last current" aria-disabled="true"><a id="wizard_horizontal-t-3" href="#wizard_horizontal-h-3" aria-controls="wizard_horizontal-p-3"><span class="number">4.</span> Employee Confirmation</a></li>
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


                            <form action="<?= base_url('backend/order-s4/' . encryptIt($v_ordr['ord_id'])) ?>) ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_ref_no" class="control-label mb-1">Locum Confirmation
                                            No.</label>
                                        <input type="text" id="ord_ref_no" name="ord_ref_no" class="form-control" placeholder="Locum Reference Number" value="<?= $v_ordr['ord_ref_no'] ? $v_ordr['ord_ref_no'] : set_value('ord_ref_no') ?>" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label for="ord_status" class="control-label mb-1">Cancel By Client</label>
                                        <select id="ord_cancel_bcl" name="ord_cancel_bcl" class="form-control select2">
                                            <option value="1" <?php if ($v_ordr['ord_cancel_bcl'] == "1") { ?> echo selected="selected" <?php } ?>>Cancel
                                            </option>
                                            <option value="" <?php if ($v_ordr['ord_cancel_bcl'] == "0") { ?> echo selected="selected" <?php } ?>>Active
                                            </option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="ord_status" class="control-label mb-1">Cancel By Dr.</label>
                                        <select id="ord_cancel_bdr" name="ord_cancel_bdr" class="form-control select2">
                                            <option value="1" <?php if ($v_ordr['ord_cancel_bdr'] == "1") { ?> echo selected="selected" <?php } ?>>Cancel
                                            </option>
                                            <option value="" <?php if (empty($v_ordr['ord_cancel_bdr'])) { ?> echo selected="selected" <?php } ?>>Active
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ord_confirmation_date" class="control-label mb-1"><b>Confirmation
                                                Date</b></label>
                                        <input id="ord_confirmation_date" name="ord_confirmation_date" type="date" title="Click to enter date" class="form-control" disabled value="<?= $v_ordr['ord_confirmation_date'] ? $v_ordr['ord_confirmation_date'] : set_value('ord_confirmation_date') ?>">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <?php if ($v_ordr['ord_cancel_bcl'] == "1") : ?>
                                        <div class="form-group col-md-3">
                                            <label for="ord_status" class="control-label mb-1">Client remarks</label>
                                            <input type="text" class="form-control" value="<?= $v_ordr['ord_cl_cremarks'] ?>" disabled>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($v_ordr['ord_cancel_bdr'] == "1") : ?>
                                        <div class="form-group col-md-4">
                                            <label for="ord_status" class="control-label mb-1">Employee remarks</label>
                                            <input type="text" class="form-control" value="<?= $v_ordr['ord_dr_cremarks'] ?>" disabled>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group">
                                        <label for="cl_id" class="control-label mb-1">Order From</label>
                                        <select id="cl_id" name="cl_id" class="select2 form-control" data-parsley-trigger="change" disabled>
                                            <option value="">Select Client</option>
                                            <?php foreach ($c_det as $crow) : ?>
                                                <option value="<?= $crow['cl_id'] ?>" <?php if ($v_ordr['cl_id'] == $crow['cl_id']) { ?> echo selected="selected" <?php } ?>>
                                                    <?= $crow['cl_cont_name'] . ' (' . $crow['cl_h_name'] . ')' ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label for="ord_speciality" class="control-label mb-1">Speciality</label>
                                        <select id="ord_speciality" name="ord_speciality" class="form-control select2" data-parsley-trigger="change" disabled>
                                            <option value="">Select Speciality</option>
                                            <?php foreach ($sp_row as $srow) : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?php if ($v_ordr['ord_speciality'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>>
                                                    <?= $srow['spec_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ord_grade" class="control-label mb-1">Grade</label>
                                        <select id="ord_grade" name="ord_grade" class="form-control select2" data-parsley-trigger="change" disabled>
                                            <option value="">Select Grade</option>
                                            <?php foreach ($gr_row as $grow) : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?php if ($v_ordr['ord_grade'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>>
                                                    <?= $grow['grade_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emp_id" class="control-label mb-1">Doctor/Nurse Assigned to</label>
                                        <select id="emp_id" name="emp_id" class="form-control select2" disabled data-parsley-trigger="change">
                                            <option value="">Select Employee</option>
                                            <?php foreach ($emp_row as $erow) : ?>
                                                <option value="<?= $erow['emp_id'] ?>" <?= set_select(
                                                                                            'emp_id',
                                                                                            $erow['emp_id'],
                                                                                            ($v_ordr['emp_id'] == $erow['emp_id']) ? TRUE : FALSE
                                                                                        );
                                                                                        ?>>
                                                    <?= $erow['emp_fname'] . ' ' . $erow['emp_lname'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="ord_required_from" class="ord_required_from-label mb-1">Locum
                                            Required From</label>
                                        <input id="ord_required_from" name="ord_required_from" type="datetime-local" class="form-control" placeholder="Click to enter date and time" disabled title="Click to enter date and time" value="<?= $v_ordr['ord_required_from'] ?>">
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="ord_required_to" class="control-label mb-1">Locum Required
                                            To</label>
                                        <input id="ord_required_to" name="ord_required_to" type="datetime-local" class="form-control" placeholder="Click to enter date and time" disabled title="Click to enter date and time" value="<?= $v_ordr['ord_required_to'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ord_datetime_detail" class="control-label mb-1">Locum Date & Time
                                        Details</label>
                                    <textarea id="ord_datetime_detail" name="ord_datetime_detail" class="form-control" disabled placeholder="Use comma separation for putting multiple dates and time for e.g: ' 23-02-2024 to 23-03-2024 08 to 21, 28-02-2023 18 to 22' "><?= $v_ordr['ord_datetime_detail'] ?></textarea>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_process_details_from" class="control-label mb-1">Locum Process
                                            From</label>
                                        <input id="ord_process_details_from" name="ord_process_details_from" type="datetime-local" title="Click to enter date and time" disabled class="form-control" value="<?= $v_ordr['ord_process_details_from'] ? $v_ordr['ord_process_details_from'] : set_value('ord_process_details_from') ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ord_process_details_to" class="control-label mb-1">Locum Process
                                            To</label>
                                        <input id="ord_process_details_to" name="ord_process_details_to" type="datetime-local" title="Click to enter date and time" disabled class="form-control" value="<?= $v_ordr['ord_process_details_to'] ? $v_ordr['ord_process_details_to'] : set_value('ord_process_details_to') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_process_date" class="control-label mb-1">Processed Date</label>
                                        <input id="ord_process_date" name="ord_process_date" type="date" title="Click to enter date" class="form-control" disabled value="<?= $v_ordr['ord_process_date'] ? $v_ordr['ord_process_date'] : set_value('ord_process_date') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ord_prosdatetime_detail" class="control-label mb-1">Locum Process Date &
                                        Time Details</label>
                                    <textarea id="ord_prosdatetime_detail" name="ord_prosdatetime_detail" class="form-control" disabled placeholder="Use comma separation for putting multiple dates and time for e.g: ' 23-02-2024 to 23-03-2024 08 to 21, 28-02-2023 18 to 22' "><?= $v_ordr['ord_prosdatetime_detail'] ? $v_ordr['ord_prosdatetime_detail'] : set_value('ord_prosdatetime_detail') ?></textarea>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_normal_hrs" class="control-label mb-1">No of Normal/Flat
                                            Hrs</label>
                                        <input id="ord_normal_hrs" name="ord_normal_hrs" oninput="calculate();calculateTp()" type="text" disabled class="form-control" value="<?= $v_ordr['ord_normal_hrs'] ? $v_ordr['ord_normal_hrs'] : set_value('ord_normal_hrs') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_normal_hrs_rt" class="control-label mb-1">Rate for Normal
                                            Hrs</label>
                                        <input id="ord_normal_hrs_rt" name="ord_normal_hrs_rt" type="text" oninput="calculateTp()" class="form-control" disabled value="<?= $v_ordr['ord_normal_hrs_rt'] ? $v_ordr['ord_normal_hrs_rt'] : set_value('ord_normal_hrs_rt') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="nh_p_type" class="control-label mb-1">Hours / Fullday /
                                            Halfday</label>
                                        <select id="nh_p_type" name="nh_p_type" class="form-control select2" disabled data-parsley-trigger="change">
                                            <option value="">Select Pay Type</option>
                                            <option value="1" <?= set_select(
                                                                    'nh_p_type',
                                                                    '1',
                                                                    ($v_ordr['nh_p_type'] == '1') ? TRUE : FALSE
                                                                ) ?>>Hour</option>
                                            <option value="2" <?= set_select(
                                                                    'nh_p_type',
                                                                    '2',
                                                                    ($v_ordr['nh_p_type'] == '2') ? TRUE : FALSE
                                                                ) ?>>FullDay</option>
                                            <option value="3" <?= set_select(
                                                                    'nh_p_type',
                                                                    '3',
                                                                    ($v_ordr['nh_p_type'] == '3') ? TRUE : FALSE
                                                                ) ?>>HalfDay</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_on_call_hrs" class="control-label mb-1">No of OnCall Hrs</label>
                                        <input id="ord_on_call_hrs" name="ord_on_call_hrs" oninput="calculate();calculateTp()" disabled type="text" class="form-control" value="<?= $v_ordr['ord_on_call_hrs'] ? $v_ordr['ord_on_call_hrs'] : set_value('ord_on_call_hrs') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_ocall_rt" class="control-label mb-1">Rate for OnCall Hrs</label>
                                        <input id="ord_ocall_rt" name="ord_ocall_rt" type="text" class="form-control" oninput="calculateTp()" disabled value="<?= $v_ordr['ord_ocall_rt'] ? $v_ordr['ord_ocall_rt'] : set_value('ord_ocall_rt') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="oc_p_type" class="control-label mb-1">Hours / Fullday /
                                            Halfday</label>
                                        <select id="oc_p_type" name="oc_p_type" class="form-control select2" disabled data-parsley-trigger="change">
                                            <option value="">Select Pay Type</option>
                                            <option value="1" <?= set_select(
                                                                    'oc_p_type',
                                                                    '1',
                                                                    ($v_ordr['oc_p_type'] == '1') ? TRUE : FALSE
                                                                ) ?>>Hour</option>
                                            <option value="2" <?= set_select(
                                                                    'oc_p_type',
                                                                    '2',
                                                                    ($v_ordr['oc_p_type'] == '2') ? TRUE : FALSE
                                                                ) ?>>FullDay</option>
                                            <option value="3" <?= set_select(
                                                                    'oc_p_type',
                                                                    '3',
                                                                    ($v_ordr['oc_p_type'] == '3') ? TRUE : FALSE
                                                                ) ?>>HalfDay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_off_site_hrs" class="control-label mb-1">No of OffSite
                                            Hrs</label>
                                        <input id="ord_off_site_hrs" name="ord_off_site_hrs" oninput="calculate();calculateTp()" disabled type="text" class="form-control" value="<?= $v_ordr['ord_off_site_hrs'] ? $v_ordr['ord_off_site_hrs'] : set_value('ord_off_site_hrs') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_osite_rt" class="control-label mb-1">Rate for OffSite
                                            Hrs</label>
                                        <input id="ord_osite_rt" name="ord_osite_rt" type="text" class="form-control" oninput="calculateTp()" disabled value="<?= $v_ordr['ord_osite_rt'] ? $v_ordr['ord_osite_rt'] : set_value('ord_osite_rt') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="os_p_type" class="control-label mb-1">Hours / Fullday /
                                            Halfday</label>
                                        <select id="os_p_type" name="os_p_type" class="form-control select2" disabled data-parsley-trigger="change">
                                            <option value="">Select Pay Type</option>
                                            <option value="1" <?= set_select(
                                                                    'os_p_type',
                                                                    '1',
                                                                    ($v_ordr['os_p_type'] == '1') ? TRUE : FALSE
                                                                ) ?>>Hour</option>
                                            <option value="2" <?= set_select(
                                                                    'os_p_type',
                                                                    '2',
                                                                    ($v_ordr['os_p_type'] == '2') ? TRUE : FALSE
                                                                ) ?>>FullDay</option>
                                            <option value="3" <?= set_select(
                                                                    'os_p_type',
                                                                    '3',
                                                                    ($v_ordr['os_p_type'] == '3') ? TRUE : FALSE
                                                                ) ?>>HalfDay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_bh_week_hrs" class="control-label mb-1">No of BH/Weekend
                                            Hrs</label>
                                        <input id="ord_bh_week_hrs" name="ord_bh_week_hrs" oninput="calculate();calculateTp()" disabled type="text" class="form-control" value="<?= $v_ordr['ord_bh_week_hrs'] ? $v_ordr['ord_bh_week_hrs'] : set_value('ord_bh_week_hrs') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_bhw_rt" class="control-label mb-1">Rate for BH/Weekend
                                            Hrs</label>
                                        <input id="ord_bhw_rt" name="ord_bhw_rt" type="text" class="form-control" oninput="calculateTp()" disabled value="<?= $v_ordr['ord_bhw_rt'] ? $v_ordr['ord_bhw_rt'] : set_value('ord_bhw_rt') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="bhw_p_type" class="control-label mb-1">Hours / Fullday /
                                            Halfday</label>
                                        <select id="bhw_p_type" name="bhw_p_type" class="form-control select2" disabled data-parsley-trigger="change">
                                            <option value="">Select Pay Type</option>
                                            <option value="1" <?= set_select(
                                                                    'bhw_p_type',
                                                                    '1',
                                                                    ($v_ordr['bhw_p_type'] == '1') ? TRUE : FALSE
                                                                ) ?>>Hour</option>
                                            <option value="2" <?= set_select(
                                                                    'bhw_p_type',
                                                                    '2',
                                                                    ($v_ordr['bhw_p_type'] == '2') ? TRUE : FALSE
                                                                ) ?>>FullDay</option>
                                            <option value="3" <?= set_select(
                                                                    'bhw_p_type',
                                                                    '3',
                                                                    ($v_ordr['bhw_p_type'] == '3') ? TRUE : FALSE
                                                                ) ?>>HalfDay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="total" class="control-label mb-1">Total Worked Hours</label>
                                        <input id="total" name="ord_total_hrs" oninput="payingdoc()" type="text" disabled class="form-control" value="<?= $v_ordr['ord_total_hrs'] ? $v_ordr['ord_total_hrs'] : set_value('ord_total_hrs') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_pay_to_dr" class="control-label mb-1">Total Pay to Employee</label>
                                        <input id="ord_pay_to_dr" oninput="payingdoc()" name="ord_pay_to_dr" type="text" required="" class="form-control" value="<?= $v_ordr['ord_pay_to_dr'] ? $v_ordr['ord_pay_to_dr'] : set_value('ord_pay_to_dr') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_paying_to_dr" class="control-label mb-1">Total Paying to
                                            Employee&nbsp;<small class="text-danger">(Office use only)</small></label>
                                        <input id="totpay" name="ord_paying_to_dr" oninput="calculateDiff()" required="" type="text" class="form-control" value="<?= $v_ordr['ord_paying_to_dr'] ? $v_ordr['ord_paying_to_dr'] : set_value('ord_paying_to_dr') ?>" readonly>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label for="ord_admin_charges" class="control-label mb-1">Admin Charges</label>
                                        <input id="ord_admin_charges" oninput="calculateTa()" name="ord_admin_charges" disabled type="text" class="form-control" value="<?= $v_ordr['ord_admin_charges'] ? $v_ordr['ord_admin_charges'] : set_value('ord_admin_charges') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_adminchrg_intern" class="control-label mb-1">Total of Admin
                                            Charges&nbsp;<small class="text-danger">(Office use only)</small></label>
                                        <input id="Tadmin" name="ord_adminchrg_intern" oninput="calculateDiff()" disabled type="text" class="form-control" value="<?= $v_ordr['ord_adminchrg_intern'] ? $v_ordr['ord_adminchrg_intern'] : set_value('ord_adminchrg_intern') ?>">

                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_hosp_earn" class="control-label mb-1">Total Earning from
                                            Client&nbsp;<small class="text-danger">(Office use only)</small></label>
                                        <input id="ord_hosp_earn" oninput="calculateTa();calculateDiff();" disabled name="ord_hosp_earn" type="text" class="form-control" value="<?= $v_ordr['ord_hosp_earn'] ? $v_ordr['ord_hosp_earn'] : set_value('ord_hosp_earn') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label for="diff" class="control-label mb-1">Diff (Profit) + Admin
                                            Charges</label>
                                        <input id="diff" name="ord_diff_profit_admin" type="text" required="" class="form-control" value="<?= $v_ordr['ord_diff_profit_admin'] ? $v_ordr['ord_diff_profit_admin'] : set_value('ord_diff_profit_admin') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="vat_rate" class="control-label mb-1">VAT Rate</label>
                                        <select id="vat_rate" name="vat_rate" class="form-control select2" required="" data-parsley-trigger="change">
                                            <option value="23" <?= set_select(
                                                                    'vat_rate',
                                                                    '23',
                                                                    ($v_ordr['vat_rate'] == '23') ? TRUE : FALSE
                                                                ) ?>>23%</option>
                                            <option value="0" <?= set_select(
                                                                    'vat_rate',
                                                                    '0',
                                                                    ($v_ordr['vat_rate'] == '0') ? TRUE : FALSE
                                                                ) ?>>0%</option>
                                            <option value="$v_ordr['vat_rate']" <?= set_select(
                                                                    'vat_rate',
                                                                    $v_ordr['vat_rate'],
                                                                    ($v_ordr['vat_rate'] == $v_ordr['vat_rate']) ? TRUE : FALSE
                                                                ) ?>><?=$v_ordr['vat_rate']?>%</option>
                                        </select>                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_vat_sale" class="control-label mb-1">VAT on Sale</label>
                                        <input id="ord_vat_sale" name="ord_vat_sale" oninput="calculatevat()" type="text" disabled class="form-control" value="<?= $v_ordr['ord_vat_sale'] ? $v_ordr['ord_vat_sale'] : set_value('ord_vat_sale') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_vat_purch" class="control-label mb-1">VAT on Purchase</label>
                                        <input id="ord_vat_purch" name="ord_vat_purch" oninput="calculatevat()" type="text" required="" class="form-control" value="<?= $v_ordr['ord_vat_purch'] ? $v_ordr['ord_vat_purch'] : set_value('ord_vat_purch') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="vat" class="control-label mb-1">VAT SAVED</label>
                                        <input id="vat" name="ord_vat_save" type="text" class="form-control" required="" value="<?= $v_ordr['ord_vat_save'] ? $v_ordr['ord_vat_save'] : set_value('ord_vat_save') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ord_time_sheet_rcvd" class="control-label mb-1">TimeSheet
                                            received</label>
                                        <input id="ord_time_sheet_rcvd" name="ord_time_sheet_rcvd" type="date" title="Click to enter date" class="form-control" required="" value="<?= $v_ordr['ord_time_sheet_rcvd'] ? $v_ordr['ord_time_sheet_rcvd'] : set_value('ord_time_sheet_rcvd') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-4 ">
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
                                                                    ($v_ordr['ord_time_sheet_mode'] == 'fax') ? TRUE : FALSE
                                                                ) ?>>Online Submitted</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ord_time_sheet_process" class="control-label mb-1">TimeSheet
                                            Processed</label>
                                        <input id="ord_time_sheet_process" name="ord_time_sheet_process" type="date" title="Click to enter date" class="form-control" required="" value="<?= $v_ordr['ord_time_sheet_process'] ? $v_ordr['ord_time_sheet_process'] : set_value('ord_time_sheet_process') ?>">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="ord_time_sheet_approved" class="control-label mb-1">Time Sheet
                                            Status</label>
                                        <select id="ord_time_sheet_approved" name="ord_time_sheet_approved" type="text" required="" class="form-control select2" data-parsley-trigger="change">
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
                                        <label for="ord_paymnt_rcvd_date" class="control-label mb-1">Payment
                                            Received</label>
                                        <input id="ord_paymnt_rcvd_date" name="ord_paymnt_rcvd_date" type="date" title="Click to enter date" class="form-control" required value="<?= $v_ordr['ord_paymnt_rcvd_date'] ? $v_ordr['ord_paymnt_rcvd_date'] : set_value('ord_paymnt_rcvd_date') ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ord_payment_status" class="control-label mb-1">Payment
                                            Status</label>
                                        <select id="ord_payment_status" name="ord_payment_status" required class="form-control select2" data-parsley-trigger="change">
                                            <option value="">Select status</option>
                                            <option value="Paid" <?= set_select(
                                                                        'ord_payment_status',
                                                                        'Paid',
                                                                        ($v_ordr['ord_payment_status'] == 'Paid') ? TRUE : False
                                                                    ) ?>>Paid
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
                                                                    ) ?>>Rceived
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
                                    &nbsp; &nbsp;
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                        <span id="payment-button-amount">View Email</span>
                                    </button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function checkCancellation() {
        if (document.getElementById("ord_cancel_bdr").value === "1") {
            if (confirm("Are you sure?"))
                window.location.href = "<?= base_url("backend/change_doctor_cancelled_order/" . encryptIt($v_ordr['ord_id'])) ?>" + "/" + document.getElementById("emp_id").value;
        }
    }
</script>