
	<div class="login-body">
            <div class="container" style="background-color: #fff"><br><br><br><br>
			<div class="row">
         <div class="col-xs-12 col-sm-4 col-md-4">
             <h1 style="color:#ff7200 !important;font-size:18px;border-bottom:1px solid #efefef;margin-bottom:20px;padding-bottom:10px;">Login</h1>
            <form action="<?=site_url('home/signing_in')?>" method="post" id="loginModalForm" name="loginModalForm">
              <div class="form-group">
                    <label for="email"><span class="tred">*</span> Email</label>
                   <div style="" class="input-group login-field">
                    <span class="input-group-addon input-icon"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">          
                   </div>
              </div> 
               <div class="form-group">
                    <label for="password"><span class="tred">*</span> Password</label>
                  <div style="" class="input-group login-field">
                    <span class="input-group-addon input-icon"><i class="fa fa-lock"></i></span>             
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                  </div>   
              </div>
                <div class="col-md-12">
                                <div class="alert-primary text-center danger text-danger" > <?= $this->session->flashdata('login_msg') ?></div>
                            </div>
<!--               <div class="form-group">
                <p class="fontSmall">you have an account <a class="orange-color tmargin5" data-toggle="modal" data-target="#forgot_password_modal">forgot password?</a>?</p>
               </div>-->
                              <div class="col-md-12"><div class="row"><div class="col-md-12" style="height:23px"></div></div></div>
               <div class="row">
                   <div class="col-md-6">
                                                    <!--<a href="https://www.facebook.com/dialog/oauth?client_id=242661129512239&amp;redirect_uri=https%3A%2F%2Fwww.oshi.pk%2Flogin&amp;state=173147a8d3383cf44534717fc34f0c80&amp;sdk=php-sdk-3.2.3&amp;scope=email%2Cpublic_profile" class="btn facebook-login btn-block" role="button"><i class="fa fa-facebook " aria-hidden="true"></i> Login With Facebook</a>-->
                                           </div>
                   <div class="col-md-6">
                        <div class="form-group">            
                            <button type="submit" name="login" class="btn btn-green  pull-right"><i class="fa fa-sign-in"></i> Login</button>
                        </div>
                   </div>
               </div>
              </form>
             
        </div>
        
                            <div class="hidden-xs col-sm-1 col-md-1 text-center line" style="min-height:350px;">
       &nbsp;
       <div class="sep" style="width:1px;background:#cccccc;margin:0 0 0 -1px;position:absolute;top:0;bottom:0;left:50%;">
           <div class="sepText" style="width:75px;height:25px;background:#ffffff;margin:-15px 0 0px -36px;padding:5px 0;position:absolute;top:50%;left:50%;line-height:18px;text-align:center;">
                OR
            </div>
        </div>
        
        </div>
        
         <div class="col-xs-12 col-sm-7 col-md-7">
             <h1 style="color:#ff7200 !important;font-size:18px;border-bottom:1px solid #efefef;margin-bottom:20px;padding-bottom:10px;">
                Register 
                <!--<span class="tgreen pull-right">
                    <a class="btn btn-green" href="#registration-benefits" data-toggle="modal" data-target="#registration-benefits">
                        Registration Benefits
                    </a>
                </span>-->
            </h1>
            
                        
            <form method="post" action="<?=site_url('home/register')?>" name="signupForm">
                                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name"><span class="tred">*</span> Full Name</label>
                        <input type="text" class="form-control" name="name"  value="<?= $this->input->post('name')?>" placeholder="Full Name" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><span class="tred">*</span> E-mail Address</label>
                        <input type="email" class="form-control" name="email"  value="<?=  set_value('email')?>" placeholder="Email" required="">
                    </div>           
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="mobile"><span class="tred">*</span> Mobile</label>
                        <input type="text" name="mobile" class="mobile form-control"  value="<?= $this->input->post('name')?>" placeholder="Mobile Number" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="label-black control-label"><span class="tred">*</span> City</label>
                        <input class="form-control" id="city" name="city" required="required" value="<?= $this->input->post('city')?>">                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address"><span class="tred">*</span> Address</label>
                        <input type="text" name="address" class="mobile form-control" value="<?= $this->input->post('address')?>" placeholder="Address" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="password"><span class="tred">*</span> Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Create Password" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confpassword" class="label-black control-label"><span class="tred">*</span> Re-Enter Password</label>
                        <input type="password" class="form-control" name="confpassword" placeholder="Re-type Password" required="">
                    </div>
                </div>
                <div class="col-md-12">
                                <div class="alert-primary text-center danger text-danger" > 
                                                <?= validation_errors(); ?>
                                </div>
                </div>
                <div class="row">
<!--                    <div class="form-group col-sm-6">
                        <label for="refered_by" class="label-black control-label">Refered By - email (optional)</label>
                        <input type="email" class="form-control" name="refered_by" value="" placeholder="Enter Email">
                    </div>-->
                    <div class="col-xs-12 col-sm-12 tright">
                        <div class="row">
                            <div class="col-md-12" style="height:20px"></div>
                        </div>                        
                        <button type="submit" name="signup" class="btn btn-orange  pull-right"><i class="fa fa-sign-out"></i> Sign Up</button>
                        <br><br>
                    </div>
                </div>            
            </form>
             <div class="col-md-12">
                                <div class="alert-primary text-center" > <?= $this->session->flashdata('signup_msg') ?></div>
                            </div>
             <br>
            
                        
        </div>
        
    </div>
		</div>
	</div>
	

