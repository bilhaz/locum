<div id="layout" class="theme-green">

    <div id="wrapper">
        <div class="d-flex h100vh align-items-center auth-main w-100">
            <div class="auth-box">
                <div class="top mb-4">
                    <div class="logo">
                   
                        <img src="<?= base_url('public/images/sralogo-icon.png') ?>" width="60" height="60" />                        
                    </div>
                </div>
                <div class="card shadow p-lg-4">
                    <div class="card-header">
                        <p class="fs-5 mb-0">Doctor Login</p>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('employee/login')?>" method="post">
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
                                <input type="email" class="form-control" name="emp_email"  value="<?= set_value('emp_email') ?>">
                                <label>Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="emp_pwd" >
                                <label>Password</label>
                            </div>
                            <div class="form-check my-3">
                                <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label> -->
                            </div>
                            <button type="submit" class="btn btn-primary w-100 px-3 py-2">LOGIN</button>
                        </form>
                        <div class="mt-3 pt-3 border-top">
                        <p class="mb-1"><a href="<?= base_url('employee/forgot-password') ?>"><i class="fa fa-lock me-2"></i>Forgot password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


