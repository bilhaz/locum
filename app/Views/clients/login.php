<div id="layout" class="theme-green">

    <div id="wrapper">
        <div class="d-flex h100vh align-items-center auth-main w-100">
            <div class="auth-box">
                <div class="top mb-2">
                    <div class="logo">
                        <img src="<?= base_url('public/images/sralogo-icon.png') ?>" width="60" height="60" />
                    </div>
                </div>
                <div class="card shadow p-lg-2">
                    <div class="card-header">
                        <p class="fs-5 mb-0">Client Login</p>
                        <p style="font-size:9pt;text-justify: inter-word;" class="mb-0 alert alert-success">You can log into your account and view your current and previous orders. 
Any changes you make to your order will be notified to us.  You can email us or call us to make any changes as well.</p>
<p style="font-size:9pt;text-justify: inter-word;" class="mb-0 alert alert-success">Please login to your account with the Login and password here. </p>
                    </div>
                    <div class="card-body">
                        <form class="mb-1" action="<?= base_url('client/login')?>" method="post">
                            <?php  if (isset($validation)) : 
                            ?>
                            <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() 
                            ?>
                            </div>
                            <?php endif;
                            ?>
                            <?php if (session()->get('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->get('error') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->get('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-check-circle"></i> <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="cl_usr"  value="<?= set_value('cl_usr') ?>">
                                <label>Username</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" name="cl_cont_pwd" >
                                <label>Password</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 px-3 py-2">LOGIN</button>
                        </form>
                        
                            <p class="mb-1"><a href="<?= base_url('client/forgot-password') ?>"><i class="fa fa-lock me-2"></i>Forgot password?</a></p>
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


