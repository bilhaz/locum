<!DOCTYPE html>
<html lang="en">

<div id="layout" class="theme-green">

    <div id="wrapper">
        <div class="d-flex h100vh align-items-center auth-main w-100">
            <div class="auth-box">
                <div class="top mb-4">
                    <div class="logo">
                        <<svg width="130px" height="40px" viewBox="0 0 85.5 50.9">
                            <img src="<?= base_url('public/images/sralogo-icon.png') ?>" width="60" height="60" />
                            </svg>
                    </div>
                </div>
                <div class="card shadow p-lg-4">
                    <div class="card-header">
                        <p class="fs-5 mb-0">Reset Password</p>
                    </div>

                    <div class="card-body">
                        <p>Please enter your email address below to receive instructions for resetting password.</p>
                        <form action id="form-re" method="post" class="needs-validation">
                            <p class="alert alert-success d-none" id="success_mail">

                            </p>
                            <p class="alert alert-danger d-none" id="error_mail">

                            </p>
                            <div class="form-floating mb-1">
                                <input type="email" name="re-email" id="re-email" class="form-control" placeholder="name@example.com" required value="<?= set_value('re-email') ?>">
                                <label>Email address</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 px-3 py-2">RESET PASSWORD</button>
                            <div class="text-center mt-3">
                                <span class="helper-text">Know your password? <a href="<?= base_url('employee/login') ?>">Login</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $("#form-re").submit(function(e) {
        e.preventDefault();
        var data = {
            email: $('#re-email').val()
        };
        $("#form-re input, #form-re button").attr('disabled', 'disabled');
        $("#form-re input, #form-re button").html('Sending, please wait...');

        $.ajax({
            url: "<?= base_url('employee/passwordReset') ?>",
            type: "POST",
            dataType: "JSON",
            data: data,
            success: function(result) {
                $("#form-re input, #form-re button").removeAttr('disabled');
                $("#form-re input, #form-re button").html('Reset');
                if (result.info != 0) {

                    $("#form-re #success_mail").removeClass("d-none");
                    $("#form-re #error_mail").addClass("d-none");
                    $("#form-re #success_mail").text(result.msg);
                   
                    // $("#form-re input").val('');
                } else if (result.info) {
                    console.log(result.msg);
                    $("#form-re #error_mail").text(result.msg);
                    $("#form-re #success_mail").addClass("d-none");
                    $("#form-re #error_mail").removeClass("d-none");
                    
                }
            },
            error: function(err, status, xhr) {
                $("#form-re input, #form-re button").removeAttr('disabled');
                $("#form-re input, #form-re button").html('Reset');
                $("#form-re #error_mail").text('Error occured while sending you email, Please try again later.');
                $("#form-re #success_mail").addClass("d-none");
                $("#form-re #error_mail").removeClass("d-none");
                //                        console.log(err);
                //                        console.log(status);
                //                        console.log(xhr);
            }
        });
        return false;
    });
</script>