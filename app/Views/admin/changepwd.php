<div id="main-content">
<div class="container-fluid">
<div class="block-header py-lg-4 py-3">
<div class="row g-3">
<div class="col-md-6 col-sm-12">
<h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Change Your Password</h2>
<ul class="breadcrumb mb-0">
<li class="breadcrumb-item"><a target="_blank" href="<?= base_url('backend/dashboard') ?>">SRA Locum</a></li>

</ul>
</div>

</div>
</div>
<div class="row clearfix">
<div class="col-lg-8 offset-lg-1">
<div class="card mb-4">
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
                                <h3 class="text-center title-2">Type Your New Password</h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('backend/pwdupd') ?>" method="post" validate="validate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">New Password</label>
                                    <input id="cc-pament" name="usr_pwd" type="password" placeholder="New Pass..." class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Confirm Password</label>
                                    <input id="cc-name" name="password_confirm" type="password" placeholder="Confirm Pass..." class="form-control cc-name valid" data-val="true" aria-invalid="false" aria-describedby="cc-name-error">
                                </div>


                                <div>
                                    <br>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                        
                                        <span id="payment-button-amount">Change Password</span>
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