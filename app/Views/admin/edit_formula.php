<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>New Grade</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mb-4">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-title">
                                <h3 class="text-center title-2">Add New Grade</h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('backend/edit-formula/' . encryptIt($form['id'])) ?>" method="post">
                                <div class="form-group">
                                    <label for="formula" class="control-label mb-1">Grade</label>
                                    <input id="formula" name="formula" type="text" class="form-control" value="<?= $form['formula'] ?>" placeholder="Enter Grade" aria-required="true" aria-invalid="false">
                                </div>



                                <br>
                                <div style="float:right !important;">
                                    
                                    <a id="payment-button" href="<?= base_url('backend/formula') ?>" class="btn btn-lg btn-dark text-light btn-block">
                                        <span id="payment-button-amount">Cancel</span>
                                    </a>
                                    &nbsp; &nbsp;
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                        <span id="payment-button-amount">Update</span>
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