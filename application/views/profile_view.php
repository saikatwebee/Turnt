<style>
body,
html {
    width: 100%;
    height: 100%;
    /* background: rgba(80, 13, 143, 1); */
    opacity: 1;
    /* overflow: hidden; */
}

.profile-form {
    padding: 8px 20px;
    width: 35%;
    margin: auto;

}

.profile-box {
    margin-bottom: 5rem !important;
}

.box-card {
    width: 100%;
    padding: 10px;
}
.box-card>button {
    width: 90%;
    font-weight: 600;
    height: 20vh;
    font-size: 24px;
    /* margin-left: 5%; */
    border: 2px solid #fff !important;
}

.box-card>p {
    margin-bottom: 14px !important;
}




.container {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: transparent !important;
}

.image {
    opacity: 1;
    display: block;
    border-radius: 50%;
    width: 30%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
}

.middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
}

.container:hover .image {
    opacity: 0.3;
}

.container:hover .middle {
    opacity: 1;
}

.text {
    color: #ccc;
    font-size: 18px;
    padding: 16px 32px;
    margin-top: 7vh;
    font-weight: 500;
}

.pbox-btn {
    margin-top: 6vh;
    margin-bottom: 10vh;

}

.custom-file-button input[type=file] {
    margin-left: -2px !important;
}

.custom-file-button input[type=file]::-webkit-file-upload-button {
    display: none;
}

.custom-file-button input[type=file]::file-selector-button {
    display: none;
}

.custom-file-button:hover label {
    background-color: #dde0e3;
    cursor: pointer;
}

.input-group-text {
    background: #342f81 !important;
    color: #fff !important;
    padding-left: 12px !important;
    border-radius: 16px;
}

.file-logo {
    position: absolute;
    right: 4vw;
}
#pro-label{
    color: #ccc;
    font-weight: 300;
    font-size: 13px;
}

@media only screen and (max-width:768px) {

    .profile-form {

        width: 100%;
        margin-top: 0vh;
    }

}
</style>

<body>
<?php
        if($profile_img!=null || $profile_img!=''){
            $img_src = base_url('assets/profile/'.$profile_img);
        }
        else{
            $img_src = base_url('assets/profile/avatar-turnt.jpg');
        }
    ?>
    <div class="profile-box">
        <div class="box-card text-center mt-4 mb-3">
            <p class="lg-heading">Your Profile</p>
        </div>

        <div class="container">
           
            <img src="<?= $img_src ?>" alt="Avatar" class="image" onclick="file_open()">
            <div class="middle" onclick="file_open()">
                <div class="text">Upload</div>
            </div>
        </div>

        <div class="profile-form mb-3">
            <form id="profile_form" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" id="profile-name"
                        autocomplete="off" placeholder="Organization Name">
                    <label for="profile-name">Name</label>
                </div>
                <?php 
                if($this->session->userdata('role')=='P'){
                    ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="dob" value="<?= $dob ?>" id="profile-dob"
                        autocomplete="off" placeholder="DOB">
                    <label for="profile-dob">Date of Birth</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?= $clg ?>" name="clg" id="profile-clg"
                        autocomplete="off" placeholder="clg">
                    <label for="profile-clg">College Name</label>
                </div>
                <?php 
                }
            ?>

                <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="phone" value="<?= $phone ?>" id="profile-phone"
                        autocomplete="off" placeholder="Enetr Phone No">
                    <label for="profile-phone">Enetr Your Phone No</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" value="<?= $email ?>" id="profile-email" autocomplete="off"
                        name="email" placeholder="Enter Email">
                    <label for="profile-email">Enter Your Email</label>
                </div>
                <!--Upload image hidden input -->
                <!-- <input type="file" name="profile_img" id="logoImg" style="display: none;"> -->
                <div class="form-group mb-2">
                        <label id="pro-label">Upload Profile Picture</label>
                        <div class="input-group custom-file-button">
                            <input type="file" name="profile_img" class="form-control" id="inputGroupFile">
                            <span class="file-logo text-white"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>

                    </div>
                <input type="hidden" name="role" value="P">
                <!-- <div class="text-center mb-3 mt-4">
                <button type="button" class="btn btn-danger btn-custom"
                    onclick="window.location.href='<?= base_url('home/dashboard') ?>'">Back</button>
                <button type="button" class="btn btn-danger btn-custom" id="profileBtn"
                    onclick="sub_profile()">Edit</button>

            </div> -->
            </form>
            <!-- <hr class="line"> -->

            <div class="text-center pbox-btn">
                <button type="button" class="btn btn-danger btn-custom" id="profileBtn" onclick="sub_profile()">Submit
                    <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right"
                            aria-hidden="true"></i></span></button>
            </div>


        </div>
    </div>

</body>

<script>
function file_open() {
   $("[name='profile_img']").trigger("click");
}
$(function() {
    $("#profile-dob").datepicker({
        changeMonth: true,
        changeYear: true
    });
});

function sub_profile() {
    // var formData = $("#profile_form").serializeArray();
    var formData = new FormData( $("#profile_form")[0]);
    var nm = $("#profile-name").val();
    var ph = $("#profile-phone").val();
    var em = $("#profile-email").val();
    var dob = $("#profile-dob").val();
    var clg = $("#profile-clg").val();

    var role = "<?= $this->session->userdata('role') ?>";


    if (nm == "") {
        if ($('div').hasClass('error_nm1')) {
            $(".error_nm1").remove();
            $("#profile-name").after(
                "<div style='color: #BB173B;' class='error_nm1'><b>This is required!</b></div>");
        } else {
            $("#profile-name").after(
                "<div style='color: #BB173B;' class='error_nm1'><b>This is required!</b></div>");
        }
    }
    if (ph == "") {
        if ($('div').hasClass('error_ph1')) {
            $(".error_ph1").remove();
            $("#profile-phone").after(
                "<div style='color: #BB173B;' class='error_ph1'><b>Phone No is required!</b></div>");
        } else {
            $("#profile-phone").after(
                "<div style='color: #BB173B;' class='error_ph1'><b>Phone No is required!</b></div>");
        }
    }
    if (em == "") {
        if ($('div').hasClass('error_em1')) {
            $(".error_em1").remove();
            $("#profile-email").after(
                "<div style='color: #BB173B;' class='error_em1'><b>Email is required!</b></div>");
        } else {
            $("#profile-email").after(
                "<div style='color: #BB173B;' class='error_em1'><b>Email is required!</b></div>");
        }
    }

    if (role == 'P') {
        if (dob == "") {
            if ($('div').hasClass('error_dob1')) {
                $(".error_dob1").remove();
                $("#profile-dob").after(
                    "<div style='color: #BB173B;' class='error_dob1'><b>Dob is required!</b></div>");
            } else {
                $("#profile-dob").after(
                    "<div style='color: #BB173B;' class='error_dob1'><b>Dob is required!</b></div>");
            }
        }

        if (clg == "") {
            if ($('div').hasClass('error_clg1')) {
                $(".error_clg1").remove();
                $("#profile-clg").after(
                    "<div style='color: #BB173B;' class='error_clg1'><b>College  Name is required!</b></div>");
            } else {
                $("#profile-clg").after(
                    "<div style='color: #BB173B;' class='error_clg1'><b>College  Name is required!</b></div>");
            }
        }
    }



    if (role == 'P') {
        if (nm != '' && em != '' && ph != '' && clg != '' && dob != '') {
            sub_fun(formData);
        }
    } else if (role == 'O') {
        if (nm != '' && em != '' && ph != '') {
            sub_fun(formData);
        }
    }

}

function sub_fun(formData) {
    $.ajax({
        type: 'post',
        url: '<?= base_url('home/profile_ajax') ?>',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        beforeSend: function() {
            $('#profileBtn').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        },
        success: function(res) {
            console.log(res);
            let data = JSON.parse(res);
            toasterOptions();
            toastr.options.onHidden = function() {
                location.reload();
            }
            if (data.code == 200) {
                $('#profileBtn').html(
                    'Submit <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>'
                );
                toastr.success('Your Profile has been Updated.', 'Successful');
            }
            else if(data.code==403){
                $('#profileBtn').html(
                    'Submit <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>'
                );
                toastr.error(data.upload_error,"O'opps");
            }
        }
    });
}
</script>