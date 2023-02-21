<?php if(!empty($c_det['cl_h_name'] && $c_det['cl_cont_name'] )) { ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        New Order</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a>
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
                        <form action="<?= base_url('client/new-order') ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                        
                            
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="ord_speciality" class="control-label mb-1">Speciality</label>
                                    <select id="ord_speciality" name="ord_speciality" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($sp_row as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?= set_select('ord_speciality',$srow['spec_id'], ( !empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE )); ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label for="ord_grade" class="control-label mb-1">Grade</label>
                                    <select id="ord_grade" name="ord_grade"  class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($gr_row as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?= set_select('ord_grade',$grow['grade_id'], ( !empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE )); ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="ord_required_from" class="ord_required_from-label mb-1">Locum Required From</label>
                                    <input id="ord_required_from" name="ord_required_from" type="datetime-local" class="form-control" required="" value="<?= set_value('ord_required_from') ?>">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="ord_required_to" class="control-label mb-1">Locum Required To</label>
                                    <input id="ord_required_to" name="ord_required_to" type="datetime-local" class="form-control" required="" value="<?= set_value('ord_required_to') ?>">
                                </div>
                            </div>
                            

                            
                            

                            

                            <div style="float:right;">
                            <a id="payment-button" href="<?= base_url('client/orders') ?>" class="btn btn-lg btn-dark btn-block">

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
<?php } else {
    header("Location: profile");
    $session = session();
    $session->setFlashdata('error', 'First Complete your Profile');
    exit();
  exit();
 } ?>
    