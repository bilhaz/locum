<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Profile</h2>
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
                            <h3 class="text-center title-2">Enter Details</h3>
                        </div>
                        <hr>
                        <form action="<?= base_url('client/profile') ?>" method="post"
                            autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8"
                            data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                            <div class="form-group col-md-6 ">
                                <label for="emp_email" class="control-label mb-1">Email</label>
                                <input id="emp_email" name="cl_cont_email" type="email" class="form-control"
                                    value="<?= $cli['cl_cont_email'] ?>" disabled>
                            </div>
                            <div class="form-group col-md-6 ">
                            <label for="cl_reg_as" class="control-label mb-1">Register As</label>
                                    <select id="cl_reg_as" name="cl_reg_as" class="form-control select2"  data-parsley-trigger="change" required="">
                                        <option value="">Select Category</option>
                                        <?php foreach($cl_cat as $clrow):?>
                                        <?php if(empty($cli['cl_reg_as'])) : ?>
                                        <option value="<?= $clrow['reg_cat_id']?>" <?= set_select('cl_reg_as',$clrow['reg_cat_id'], ( !empty($fieldType) && $fieldType == $clrow['reg_cat_id'] ? TRUE : FALSE )); ?>><?= $clrow['reg_cat_name']?></option>
                                        <?php else: ?>
                                        <option value="<?= $clrow['reg_cat_id']?>" <?php if ($cli['cl_reg_as'] == $clrow['reg_cat_id']) { ?> echo selected="selected" <?php } ?>><?= $clrow['reg_cat_name']?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>  
                            </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="cl_h_name" class="control-label mb-1">Hospital Name</label>
                                    <?php if(empty($cli['cl_h_name'])) : ?>
                                    <input id="cl_h_name" name="cl_h_name" type="text" class="form-control" required="">
                                    <?php else: ?>
                                    <input id="cl_h_name" name="cl_h_name" type="text" value="<?= $cli['cl_h_name'] ?>" class="form-control" required="">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="cl_gender" class="control-label mb-1">Gender</label>
                                    <select id="cl_gender" name="cl_gender" class="form-control select2"  data-parsley-trigger="change" required="">
                                    <?php if(empty($cli['cl_reg_as'])) : ?>    
                                    <option value="">Select Gender</option>
                                        <option value="M" <?= set_select('cl_gender','M', ( !empty($fieldType) && $fieldType == 'M' ? TRUE : FALSE )); ?> >Male</option>
                                        <option value="F" <?= set_select('cl_gender','F', ( !empty($fieldType) && $fieldType == 'F' ? TRUE : FALSE )); ?> >Female</option>
                                       <?php else: ?>
                                        <option value="">Select Gender</option>
                                        <option value="M" <?php if ($cli['cl_gender'] == "M") { ?> echo selected="selected" <?php } ?>>Male</option>
                                        <option value="F" <?php if ($cli['cl_gender'] == "F") { ?> echo selected="selected" <?php } ?>>Female</option>
                                        <?php endif; ?>
                                    </select>                                 
                                 </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="cl_cont_desig" class="control-label mb-1">Contact Personnel Designation</label>
                                    <?php if(empty($cli['cl_cont_desig'])) : ?> 
                                    <input id="cl_cont_desig" name="cl_cont_desig" type="text" class="form-control" required="">
                                    <?php else: ?>
                                    <input id="cl_cont_desig" name="cl_cont_desig" type="text" class="form-control" required="" value="<?= $cli['cl_cont_desig'] ?>">
                                        <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="cl_eircode" class="control-label mb-1">Eircode</label>
                                    <?php if(empty($cli['cl_eircode'])) : ?> 
                                    <input id="cl_eircode" name="cl_eircode" type="number" class="form-control"
                                        required="">
                                        <?php else: ?>
                                            <input id="cl_eircode" name="cl_eircode" type="number" class="form-control"
                                        required="" value="<?= $cli['cl_eircode'] ?>">
                                            <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="cl_cont_name" class="control-label mb-1">Contact Personnel Name</label>
                                    <?php if(empty($cli['cl_cont_name'])) : ?>
                                    <input id="cl_cont_name" name="cl_cont_name" type="text" class="form-control" required="">
                                    <?php else: ?>
                                    <input id="cl_cont_name" name="cl_cont_name" type="text" class="form-control" required="" value="<?= $cli['cl_cont_name'] ?>">
                                        <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cl_cont_phone" class="control-label mb-1">Contact Number</label>
                                    <?php if(empty($cli['cl_cont_phone'])) : ?>
                                    <input id="cl_cont_phone" name="cl_cont_phone" type="number" class="form-control" required="">
                                    <?php else: ?>
                                    <input id="cl_cont_phone" name="cl_cont_phone" type="number" class="form-control" required="" value="<?= $cli['cl_cont_phone'] ?>">
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="form-group col-md-6 ">
                                
                                    <label for="cl_address" class="control-label mb-1">Address</label>
                                    <?php if(empty($cli['cl_address'])) : ?>
                                    <input id="cl_address" name="cl_address" type="text" class="form-control" required="">
                                    <?php else: ?>
                                    <input id="cl_address" name="cl_address" type="text" class="form-control" required="" value="<?= $cli['cl_address'] ?>">
                                        <?php endif; ?>
                            </div>
                                    <div class="form-group col-md-6 ">
                                    <label for="cl_county" class="control-label mb-1">County</label>
                                    <?php if(empty($cli['cl_county'])) : ?>
                                    <input id="cl_county" name="cl_county" type="text" class="form-control" required="">
                                    <?php else: ?>
                                    <input id="cl_county" name="cl_county" type="text" class="form-control" required="" value="<?= $cli['cl_county'] ?>">
                                        <?php endif; ?>
                                </div>
                                </div>
                            

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Record</span>
                                </button>
                            </div>
                            <br>
                            <div>
                                <a id="payment-button" href="<?= base_url('client/dashboard') ?>"
                                    class="btn btn-lg btn-dark btn-block">

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
</div>
</div>
</div>