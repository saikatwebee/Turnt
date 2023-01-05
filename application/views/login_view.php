<style>
.login_btn {
    width: 100%;
    border-radius: 20px;
    font-weight: 600;
}

.login-form {
    padding: 10px;
    width: 35%;
    margin: auto;
}

@media only screen and (max-width: 768px) {
    .login-form {
        width: 90%;
        margin-top: 0vh;
    }
}
</style>

<body>
    <!-- <section class="container-fluid"> -->
    <div class="common-poster">
        <img src="<?= base_url('assets/img/loadimg.png') ?>" class="img-logo" alt="..." style="width: 100px;margin-right:30%;">
        <button type="button" class="btn btn-outline-danger"
            onclick="window.location.href='<?= base_url('auth/createProfile') ?>'">Sign up</button>
    </div>

    <div class="under">
        <p class="custom-underline"><span style="font-weight: 700;color: #FFF; font-size:35px; letter-spacing:2px;">Sign
                in</span></p>
    </div>
    <div class="login-form">
        <form id="log_form">

            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="lof-email" autocomplete="off" name="email"
                    placeholder="Enter Email">
                <label for="lof-email">Enter Your Email</label>
            </div>
            <div class="form-floating form-pass-log">
                <input type="password" class="form-control" id="log-password" autocomplete="off" name="password"
                    placeholder="Enter Password">
                <label for="log-password">Enter Your Password</label>
                <span class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
            </div>


        </form>


    </div>
   

    <div class="text-center mb-3 bottom-btn-div">
        <button type="button" class="btn btn-danger btn-custom" id="login_btn" onclick="sub_log()">Sign In <span
                style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right"
                    aria-hidden="true"></i></span></button>
    </div>


</body>

<script>
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $('[name="password"]');
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

function sub_log() {
    var formData = $("#log_form").serializeArray();
    var em = $("[name='email']").val();
    var ps = $("[name='password']").val();


    if (em == "") {
        if ($('div').hasClass('error_em')) {
            $(".error_em").remove();
            $("[name='email']").after(
                "<div style='color: #ea108f;' class='error_em'><b>Email is required!</b></div>");
        } else {
            $("[name='email']").after(
                "<div style='color: #ea108f;' class='error_em'><b>Email is required!</b></div>");
        }
    }
    if (ps == "") {
        if ($('div').hasClass('error_ps')) {
            $(".error_ps").remove();
            $(".form-pass-log").after(
                "<div style='color: #ea108f;' class='error_ps'><b>Password is required!</b></div>");
        } else {
            $(".form-pass-log").after(
                "<div style='color: #ea108f;' class='error_ps'><b>Password is required!</b></div>");
        }
    }

    if (em != '' && ps != '') {
        $.ajax({
            type: 'post',
            url: '<?= base_url('auth/check_login') ?>',
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $('#login_btn').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            },
            success: function(data) {
                console.log(data);
                toasterOptions();
                toastr.options.onHidden = function() {
                    $("#log_form").trigger('reset');
                     window.location.href = '<?= base_url('home/dashboard') ?>';
                }
                if (data.code == 200) {
                    $('#login_btn').html('Sign In <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                    toastr.success('You have Successfully Logged in', 'Successful');
                } else {
                    toastr.error('You have entered wrong Email or Password', 'Invalid');
                }
            }
        });
    }
}
</script>


</html>