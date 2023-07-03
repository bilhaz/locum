<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        First Response</h2>
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
                            <li role="tab" class="first current" aria-disabled="false" aria-selected="false"><a id="wizard_horizontal-t-0" aria-controls="wizard_horizontal-p-0"><span class="number">1.</span> First Response</a>
                            </li>
                            <li role="tab" class="second disabled" aria-disabled="false" aria-selected="true"><a id="wizard_horizontal-t-1" aria-controls="wizard_horizontal-p-1"><span class="number">2.</span> Locum Process</a></li>
                            <li role="tab" class="third disabled" aria-disabled="true"><a id="wizard_horizontal-t-2" aria-controls="wizard_horizontal-p-2"><span class="number">3.</span> Client Confirmation</a></li>
                            <li role="tab" class="fourth disabled" aria-disabled="false"><a id="wizard_horizontal-t-3" aria-controls="wizard_horizontal-p-3"><span class="number">4.</span> Emp Confirmation</a></li>
                            <li role="tab" class="last disabled" aria-disabled="false"><a id="wizard_horizontal-t-3" aria-controls="wizard_horizontal-p-3"><span class="number">5.</span> Payments</a></li>
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


                            <form action="<?= base_url('backend/order-s1/' . encryptIt($v_ordr['ord_id'])) ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="cl_id" class="control-label mb-1">Order From</label>
                                        <select id="cl_id" name="cl_id" class="select2 form-control" required="" data-parsley-trigger="change">
                                            <option value="">Select Client</option>
                                            <?php foreach ($c_det as $crow) : ?>
                                                <option value="<?= $crow['cl_id'] ?>" <?= set_select('cl_id', $crow['cl_id'], ($v_ordr['cl_id'] == $crow['cl_id']) ? TRUE : FALSE); ?>><?= $crow['cl_cont_name'] . ' (' . $crow['cl_h_name'] . ')' ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="ord_speciality" class="control-label mb-1">Speciality</label>
                                        <select id="ord_speciality" name="ord_speciality" class="form-control select2" required="" data-parsley-trigger="change">
                                            <option value="">Select Speciality</option>
                                            <?php foreach ($sp_row as $srow) : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?= set_select('ord_speciality', $srow['spec_id'], ($v_ordr['ord_speciality'] == $srow['spec_id']) ? TRUE : FALSE); ?>><?= $srow['spec_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ord_grade" class="control-label mb-1">Grade</label>
                                        <select id="ord_grade" name="ord_grade" class="form-control select2" required="" data-parsley-trigger="change">
                                            <option value="">Select Grade</option>
                                            <?php foreach ($gr_row as $grow) : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?= set_select('ord_grade', $grow['grade_id'], ($v_ordr['ord_grade'] == $grow['grade_id']) ? TRUE : FALSE); ?>><?= $grow['grade_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="ord_required_from" class="ord_required_from-label mb-1">Locum Required From</label>
                                        <input id="ord_required_from" name="ord_required_from" type="datetime-local" class="form-control" required="" placeholder="Click to enter date and time" title="Click to enter date and time" value="<?= $v_ordr['ord_required_from'] ? $v_ordr['ord_required_from'] : set_value('ord_required_from') ?>">
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="ord_required_to" class="control-label mb-1">Locum Required To</label>
                                        <input id="ord_required_to" name="ord_required_to" type="datetime-local" class="form-control" required="" placeholder="Click to enter date and time" title="Click to enter date and time" value="<?= $v_ordr['ord_required_to'] ? $v_ordr['ord_required_to'] : set_value('ord_required_to') ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ord_datetime_detail" class="control-label mb-1">Locum Date & Time Details</label>
                                    <textarea id="ord_datetime_detail" name="ord_datetime_detail" class="form-control" required="" placeholder="Use comma separation for putting multiple dates and time for e.g: ' 23-02-2024 to 23-03-2024 08 to 21, 28-02-2023 18 to 22' "><?= $v_ordr['ord_datetime_detail'] ? $v_ordr['ord_datetime_detail'] : set_value('ord_datetime_detail') ?></textarea>
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
</div>
