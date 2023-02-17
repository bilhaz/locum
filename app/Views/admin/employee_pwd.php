<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">

                <!-- <div id="wrapper"> -->
                <div class="col-lg-5 offset-lg-3 align-items-center">
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
                                    <p class="fs-5 mb-0">Change Password For Employee</p>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('backend/employee-pwd/' . encryptIt($e_up['emp_id'])) ?>" method="post" data-parsley-validate="" id="forma" autocomplete="off">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" value="<?= $e_up['emp_email'] ?>" disabled>
                                        </div>
                                        <br>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="emp_pwd" id="emp_pwd" placeholder="Password" required="">
                                            <label>Password</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confrim Password" required="">
                                            <label>Confirm Password</label>
                                        </div>

                                        <div class="my-3">
                                            <button type="submit" class="btn btn-primary w-100 px-3 py-2 mb-2">Update</button>
                                        </div>
                                    </form>
                                    <div class="d-grid gap-2 mt-3 pt-3">

                                        <a id="cancel" href="<?= base_url('backend/employees') ?>" class="btn btn-lg btn-dark btn-block">

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
    </div>
</div>