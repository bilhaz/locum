<div id="main-content">
    <div class="container-fluid">
        <?php if (!$expired) : ?>
            <form action="<?= base_url('employee/changePassword_Request') ?>" method="post" class="needs-validation">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <?php if (session()->getflashdata('success')) : ?>

                            <div class="col-xs-12 alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <?php echo session()->getflashdata('success'); ?>
                            </div>

                        <?php endif; ?>

                        <?php if (session()->getflashdata('requestMsgErr')) : ?>

                            <div class="col-xs-12 alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <?= session()->getflashdata('requestMsgErr') ?>
                            </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- <div id="wrapper"> -->
            <div class="col-lg-4 offset-lg-2 align-items-center">
                <div class="d-flex h50vh align-items-center w-100">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="top mb-1">
                                <div class="logo text-center">

                                    <img src="<?= base_url('public/images/sralogo-icon.png') ?>" width="30%" height="30%" />


                                </div>
                            </div>
                            <div class="card shadow p-lg-4">
                                <div class="card-header">
                                    <p class="fs-5 mb-0">Enter Your New Password</p>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="reset_token" value="<?= $reset_token ?>">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                                        <label>Password</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confrim Password" required="">
                                        <label>Confirm Password</label>
                                    </div>
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-success w-100 px-3 py-2 mb-2">Change</button>
                                    </div>
            

    </div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>

<?php else : ?>

    <div style="width:200%;padding-left:25%;">
        <span class="alert alert-danger">Token expired</span>
    </div>

<?php endif; ?>