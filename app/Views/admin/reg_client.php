<div id="main-content">
    <div class="container-fluid">
        <!-- <div id="wrapper"> -->
        <div class="col-lg-4 offset-lg-3 align-items-center">
        <div class="d-flex h50vh align-items-center w-100">
            <div class="row clearfix">
                <div class="top mb-1">
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <div class="logo">


                    </div>
                </div>
                <div class="card shadow p-lg-4">
                    <div class="card-header">
                        <p class="fs-5 mb-0">Register Client</p>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('backend/reg_client') ?>" method="post" data-parsley-validate="" id="forma" autocomplete="off">
                            <div class="form-floating mb-1">
                                <input type="email" class="form-control" name="cl_cont_email" id="cl_cont_email" placeholder="name@example.com" required="">
                                <label>Email address</label>
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="cl_usr" id="cl_usr" placeholder="john.ellen" required="">
                                <label>Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="cl_cont_pwd" id="cl_cont_pwd" placeholder="Password" required="">
                                <label>Password</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="cnfrm_pwd" id="cnfrm_pwd" placeholder="Confrim Password" required="">
                                <label>Confirm Password</label>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-primary w-100 px-3 py-2 mb-2">REGISTER</button>
                            </div>
                        </form>
                        <div class="d-grid gap-2 mt-3 pt-3">

                            <a id="cancel" href="<?= base_url('backend/clients') ?>" class="btn btn-lg btn-dark btn-block">

                                <span id="cancel">Cancel</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
