<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Assesment</h2>
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
                            <h3 class="text-center title-2">Upload Assesment</h3>
                        </div>
                        <hr>
                        <form action="<?= base_url('employee/upl-asses/' . encryptIt($e_ord['ord_id'])) ?>" method="post"
                            autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8"
                            data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Assesment</label>
                                <input class="form-control" type="file" name="ord_assignment" id="formFile"
                                    data-parsley-max-file-size="2000" required="" />
                            </div>
                            
                            

                            <div style="float:right;">
                            <a id="payment-button" href="<?= base_url('employee/ord-view/'. encryptIt($e_ord['ord_id'])) ?>"
                                    class="btn btn-lg btn-dark btn-block">

                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                &nbsp; &nbsp;
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Record</span>
                                </button>
                            </div>
                            <br>
                            <div>
                                
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