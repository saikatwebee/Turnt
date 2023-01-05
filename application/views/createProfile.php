<style>
body,
html {
    width: 100%;
    height: 100%;
    opacity: 1;
    /* overflow: hidden; */

}

.ptc-form {
    padding: 10px;
    width: 35%;
    margin: auto;

}

.org-form {
    padding: 15px;
    width: 35%;
    margin: auto;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #E00A86;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: #fff;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #7e57c2;
}

input:focus+.slider {
    box-shadow: 0 0 1px #7e57c2;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

.radioSwitch {
    display: flex;
    justify-content: center;
    align-items: center;

}

.switch-label {
    margin: 4px;
    padding: 4px;
}

#ptc,
#org {
    font-size: 22px;
    font-weight: 600;
    color: #fff;
}
.flex-box{
    display: flex;
    justify-content: space-evenly;
}


@media only screen and (max-width:768px) {

    .ptc-form,
    .org-form {

        width: 90%;
        margin-top: 0vh;
    }

}
</style>

<body>
    <div class="common-poster">
        <img src="<?= base_url('assets/img/loadimg.png') ?>" class="img-logo" alt="..." style="width: 100px;margin-right:30%;">
        <button type="button" class="btn btn-outline-danger"
            onclick="window.location.href='<?= base_url('auth/login') ?>'">Login</button>
    </div>

    <div class="under">
        <p class="custom-underline"><span
                style="font-weight: 700;color: #FFF; font-size:35px; letter-spacing:2px;">Create Profile</span></p>
    </div>

    <fieldset class="radioSwitch">
        <label class="switch-label" id="ptc">Participant</label>
        <label class="switch switch-label">
            <input type="checkbox" name="check_role">
            <span class="slider round"></span>
        </label>
        <label class="switch-label" id="org">Organizer</label>
    </fieldset>
    
    <div class="org-form hide-card">
        <form id="org_form">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="name" id="fest-name" autocomplete="off"
                    placeholder="Enter Your Fest Name">
                <label for="fest-name">Enter Your Fest Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="clg" id="org-name" autocomplete="off"
                    placeholder="Enter Your Organization Name">
                <label for="org-name">Enter Your Organization Name</label>
            </div>
            <div class="flex-box">
                <div class="form-floating mb-4 flex-item">
                    <input type="text" class="form-control" name="from_date" id="from-date" autocomplete="off"
                        placeholder="Enter From Date" style="width: 98%;">
                    <label for="from-date">From Date</label>
                </div>
                <div class="form-floating mb-4 flex-item">
                    <input type="text" class="form-control" name="to_date" id="to-date" autocomplete="off"
                        placeholder="Enter To Date">
                    <label for="to-date">To Date</label>
                </div>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="phone" id="org-phone" autocomplete="off"
                    placeholder="Enter Phone No">
                <label for="org-phone">Enter Your Phone No</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" autocomplete="off" id="org-email" name="email"
                    placeholder="Enter Email">
                <label for="org-email">Enter Your Email</label>
            </div>
            <div class="form-floating form-pass-org">
                <input type="password" class="form-control" autocomplete="off" id="org-password" name="password"
                    placeholder="Enter Password">
                <label for="org-password">Enter Your Password</label>
                <span class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
            </div>
            <input type="hidden" name="role" value="O">
            <!-- <div class="text-end mb-3 mt-4">
                <button type="button" class="btn btn-danger btn-custom" id="org_btn" onclick="sub_org()">Next</button>
            </div> -->
        </form>
        <!-- <hr class="line"> -->
    </div>
    <div class="ptc-form">
        <form id="ptc_form">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="name" id="ptc-name" autocomplete="off"
                    placeholder="Enter Your Organization Name">
                <label for="ptc-name">Enter Your Name</label>
            </div>



            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="dob" id="ptc-dob" autocomplete="off"
                    placeholder="Enter Your DOB">
                <label for="ptc-dob">Enter Your Date of Birth</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="clg" id="ptc-clg" autocomplete="off"
                    placeholder="Enter Your clg">
                <label for="ptc-clg">Enter Your College Name</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="phone" id="ptc-phone" autocomplete="off"
                    placeholder="Enter Phone No">
                <label for="ptc-phone">Enter Your Phone No</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="ptc-email" autocomplete="off" name="email"
                    placeholder="Enter Email">
                <label for="ptc-email">Enter Your Email</label>
            </div>
            <div class="form-floating form-pass-ptc">
                <input type="password" class="form-control" id="ptc-password" autocomplete="off" name="password"
                    placeholder="Enter Password">
                <label for="ptc-password">Enter Your Password</label>
                <span class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
            </div>
            <input type="hidden" name="role" value="P">

        </form>
        <!-- <hr class="line"> -->

    </div>

    <div class="text-center mb-3 bottom-btn-div" style="margin-top:5vh;">
        <button type="button" class="btn btn-danger btn-custom" id="ptc_btn">Sign up <span
                style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right"
                    aria-hidden="true"></i></span></button>
    </div>

</body>

<script>
$(function() {
    $("#ptc-dob").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });

    $("#from-date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });

    $("#to-date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });

});
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $('[name="password"]');
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


$(document).on("click", "#ptc_btn", () => {
    if ($("[name='check_role']").is(':checked'))
        sub_org();
    else
        sub_ptc();
});

function sub_org() {
    var formData = $("#org_form").serializeArray();
    var fest = $("#fest-name").val();
    var from_date = $("#from-date").val();
    var to_date = $("#to-date").val();
    var nm = $("#org-name").val();
    var ph = $("#org-phone").val();
    var em = $("#org-email").val();
    var ps = $("#org-password").val();

    if(fest == ""){
        if ($('div').hasClass('error_fest')) {
            $(".error_fest").remove();
            $("#fest-name").after(
                "<div style='color: #ea108f;' class='error_fest'><b>Fest Name is required!</b></div>");
        } else {
            $("#fest-name").after(
                "<div style='color: #ea108f;' class='error_fest'><b>Fest Name is required!</b></div>");
        }
    }
    if (nm == "") {
        if ($('div').hasClass('error_nm1')) {
            $(".error_nm1").remove();
            $("#org-name").after(
                "<div style='color: #ea108f;' class='error_nm1'><b>Organization Name is required!</b></div>");
        } else {
            $("#org-name").after(
                "<div style='color: #ea108f;' class='error_nm1'><b>Organization Name is required!</b></div>");
        }
    }

    if (from_date == "") {
        if ($('div').hasClass('error_from_date')) {
            $(".error_from_date").remove();
            $("#form-date").after(
                "<div style='color: #ea108f;' class='error_from_date'><b>From Date is required!</b></div>");
        } else {
            $("#form-date").after(
                "<div style='color: #ea108f;' class='error_from_date'><b>From Date is required!</b></div>");
        }
    }

    if (to_date == "") {
        if ($('div').hasClass('error_to_date')) {
            $(".error_to_date").remove();
            $("#to-date").after(
                "<div style='color: #ea108f;' class='error_to_date'><b>Organization Name is required!</b></div>");
        } else {
            $("#to-date").after(
                "<div style='color: #ea108f;' class='error_to_date'><b>Organization Name is required!</b></div>");
        }
    }


    if (ph == "") {
        if ($('div').hasClass('error_ph1')) {
            $(".error_ph1").remove();
            $("#org-phone").after(
                "<div style='color: #ea108f;' class='error_ph1'><b>Phone No is required!</b></div>");
        } else {
            $("#org-phone").after(
                "<div style='color: #ea108f;' class='error_ph1'><b>Phone No is required!</b></div>");
        }
    }
    if (em == "") {
        if ($('div').hasClass('error_em1')) {
            $(".error_em1").remove();
            $("#org-email").after(
                "<div style='color: #ea108f;' class='error_em1'><b>Email is required!</b></div>");
        } else {
            $("#org-email").after(
                "<div style='color: #ea108f;' class='error_em1'><b>Email is required!</b></div>");
        }
    }
    if (ps == "") {
        if ($('div').hasClass('error_ps1')) {
            $(".error_ps1").remove();
            $(".form-pass-org").after(
                "<div style='color: #ea108f;' class='error_ps1'><b>Password is required!</b></div>");
        } else {
            $(".form-pass-org").after(
                "<div style='color: #ea108f;' class='error_ps1'><b>Password is required!</b></div>");
        }
    }

    if (fest!='' && from_date!='' && to_date!='' && nm != '' && em != '' && ph != '' && ps != '') {
        $.ajax({
            type: 'post',
            url: '<?= base_url('auth/org_ajax') ?>',
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $('#ptc_btn').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            },
            success: function(data) {
                console.log(data);
                toasterOptions();
                toastr.options.onHidden = function() {
                    $("#org_form").trigger('reset');
                    window.location.href = '<?= base_url('home/dashboard') ?>';
                }
                if (data.code == 200) {
                    $('#ptc_btn').html('Sign up <spanstyle="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right"aria-hidden="true"></i></spanstyle=>');
                    toastr.success('You have Successfully Registered', 'Successful');
                }
            }
        });
    }
}

function sub_ptc() {
    var formData = $("#ptc_form").serializeArray();
    var nm = $("#ptc-name").val();
    var ph = $("#ptc-phone").val();
    var em = $("#ptc-email").val();
    var ps = $("#ptc-password").val();
    var clg = $("#ptc-clg").val();
    var dob = $("#ptc-dob").val();

    if (nm == "") {
        if ($('div').hasClass('error_nm2')) {
            $(".error_nm2").remove();
            $("#ptc-name").after(
                "<div style='color: #ea108f;' class='error_nm2'><b>Name is required!</b></div>");
        } else {
            $("#ptc-name").after(
                "<div style='color: #ea108f;' class='error_nm2'><b>Name is required!</b></div>");
        }
    }
    if (ph == "") {
        if ($('div').hasClass('error_ph2')) {
            $(".error_ph2").remove();
            $("#ptc-phone").after(
                "<div style='color: #ea108f;' class='error_ph2'><b>Phone No is required!</b></div>");
        } else {
            $("#ptc-phone").after(
                "<div style='color: #ea108f;' class='error_ph2'><b>Phone No is required!</b></div>");
        }
    }
    if (em == "") {
        if ($('div').hasClass('error_em2')) {
            $(".error_em2").remove();
            $("#ptc-email").after(
                "<div style='color: #ea108f;' class='error_em2'><b>Email is required!</b></div>");
        } else {
            $("#ptc-email").after(
                "<div style='color: #ea108f;' class='error_em2'><b>Email is required!</b></div>");
        }
    }
    if (ps == "") {
        if ($('div').hasClass('error_ps2')) {
            $(".error_ps2").remove();
            $(".form-pass-ptc").after(
                "<div style='color: #ea108f;' class='error_ps2'><b>Password is required!</b></div>");
        } else {
            $(".form-pass-ptc").after(
                "<div style='color: #ea108f;' class='error_ps2'><b>Password is required!</b></div>");
        }
    }

    if (clg == "") {
        if ($('div').hasClass('error_clg')) {
            $(".error_clg").remove();
            $("#ptc-clg").after(
                "<div style='color: #ea108f;' class='error_clg'><b>Password is required!</b></div>");
        } else {
            $("#ptc-clg").after(
                "<div style='color: #ea108f;' class='error_clg'><b>Password is required!</b></div>");
        }
    }

    if (dob == "") {
        if ($('div').hasClass('error_dob')) {
            $(".error_dob").remove();
            $("#ptc-dob").after(
                "<div style='color: #ea108f;' class='error_dob'><b>Password is required!</b></div>");
        } else {
            $("#ptc-dob").after(
                "<div style='color: #ea108f;' class='error_dob'><b>Password is required!</b></div>");
        }
    }



    if (nm != '' && em != '' && ph != '' && ps != '' && clg != '' && dob != '') {
        $.ajax({
            type: 'post',
            url: '<?= base_url('auth/ptc_ajax') ?>',
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $('#ptc_btn').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            },
            success: function(data) {
                console.log(data);
                toasterOptions();
                toastr.options.onHidden = function() {
                    $("#ptc_form").trigger('reset');
                    window.location.href = '<?= base_url('home/dashboard') ?>';
                }
                if (data.code == 200) {
                    $('#ptc_btn').html('Sign up <spanstyle="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right"aria-hidden="true"></i></spanstyle=>');
                    toastr.success('You have Successfully Registered', 'Successful');
                }
            }
        });
    }
}





$(document).on("change", "[name='check_role']", (e) => {
    if ($(e.target).is(':checked')) {
        console.log("checked");
        if ($(".org-form").hasClass("hide-card")) {
            $(".org-form").removeClass("hide-card");
            $(".org-form").addClass("show-card");
            $(".ptc-form").addClass("hide-card");

        }
    } else {
        console.log("Unchecked");
        if ($(".ptc-form").hasClass("hide-card")) {
            $(".ptc-form").removeClass("hide-card");
            $(".ptc-form").addClass("show-card");
            $(".org-form").addClass("hide-card");

        }
    }
});
</script>


</html>