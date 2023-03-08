<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Client Details</h2>
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
                            <h3 class="text-center title-2">Client Details</h3>
                        </div>
                        <hr>
                        <form action="<?= base_url('backend/client_details/' . encryptIt($cli['cl_id'])) ?>" method="post"
                            autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8"
                            data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                            <div class="form-group col-md-4 ">
                                <label for="cl_usr" class="control-label mb-1">Username</label>
                                <input id="cl_usr" name="cl_usr" type="text" class="form-control"
                                    value="<?= $cli['cl_usr'] ?>" disabled>
                                
                            </div>
                            <div class="form-group col-md-4 ">
                                <label for="cl_cont_email" class="control-label mb-1">Email</label>
                                <input id="cl_cont_email" name="cl_cont_email" type="email" class="form-control"
                                    value="<?= $cli['cl_cont_email'] ?>" >
                            </div>
                            <div class="form-group col-md-4 ">
                            <label for="cl_reg_as" class="control-label mb-1">Register As</label>
                                    <select id="cl_reg_as" name="cl_reg_as" class="form-control select2"  data-parsley-trigger="change" required="">
                                        <option value="">Select Category</option>
                                        <?php foreach($cl_cat as $clrow):?>
                                        <option value="<?= $clrow['reg_cat_id']?>" <?= set_select('cl_reg_as',$clrow['reg_cat_id'], ( !empty($fieldType) && $fieldType == $clrow['reg_cat_id'] ? TRUE : FALSE )); ?>><?= $clrow['reg_cat_name']?></option>
                                        <?php endforeach; ?>
                                    </select>  
                            </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="cl_h_name" class="control-label mb-1">Hospital Name</label>
                                    <input id="cl_h_name" name="cl_h_name" type="text" class="form-control" required="">
                                </div>
                               
                                <div class="col-md-6 ">
                                
                                <label for="cl_address" class="control-label mb-1">Address</label>
                                <input id="cl_address" name="cl_address" type="text" class="form-control" required="">
                        </div>   
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                <label for="cl_eircode" class="control-label mb-1">Eircode</label>
                                    <input id="cl_eircode" name="cl_eircode" type="text" class="form-control eircode" required="">
                                    
                                </div>
                                <div class="form-group col-md-6 ">
                                <label for="cl_county" class="control-label mb-1">County</label>
                                    <input id="cl_county" name="cl_county" type="text" class="form-control" required="">
                                        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="cl_cont_name" class="control-label mb-1">Personnel Name</label>
                                    <input id="cl_cont_name" name="cl_cont_name" type="text" class="form-control" required="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="cl_cont_phone" class="control-label mb-1">Personnel Contact Number</label>
                                    <input id="cl_cont_phone" name="cl_cont_phone" type="number" class="form-control" required="">
                            
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="form-group col-md-6 ">
                            <label for="cl_cont_desig" class="control-label mb-1">Personnel Designation</label>
                                    <input id="cl_cont_desig" name="cl_cont_desig" type="text" class="form-control" required="">
                                      
                            </div>
                                   
                                </div>
                            

                            <div style="float:right !important;"> 
                               

                                <a id="payment-button" href="<?= base_url('backend/clients') ?>"
                                    class="btn btn-lg btn-dark text-light btn-block">
                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                            &nbsp; &nbsp;
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Record</span>
                                </button>
                            </div>
                            <br>
                            
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