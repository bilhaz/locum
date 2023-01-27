



<div class="page-content--bge5">
<div class="container">
<div class="login-wrap">
<div class="login-content">
<div class="login-logo">
<a href="#" >
<img src="<?= base_url('public/assets/images/icon/sralogo-icon.png')?>" alt="SRA Employee">
<p style="color: black; font-weight:680; font-size:x-large; ">Doctor Login</p>
</a>
</div>
<div class="login-form">
<?php if (isset($validation)) : ?>
<div class="alert alert-danger" role="alert">
<?= $validation->listErrors() ?>
</div>
<?php endif;?>

<form action="" method="post">

<div class="form-group">
<label>Email Address</label>
<input class="au-input au-input--full" type="email" name="email" placeholder="Email">
</div>
<div class="form-group">
<label>Password</label>
<input class="au-input au-input--full" type="password" name="password" placeholder="Password">
</div>
<div class="login-checkbox">
<!-- <label>
<input type="checkbox" name="remember">Remember Me
</label> -->
<!-- <label>
<a href="#">Forgotten Password?</a>
</label> -->
</div>
<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
<!-- <div class="social-login-content">

</div> -->
</form>
<!-- <div class="register-link">
<p>
Don't you have account?
<a href="#">Sign Up Here</a>
 </p>
</div> -->
</div>
</div>
</div>
</div>
</div>


