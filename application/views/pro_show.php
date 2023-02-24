<style>
.box-card {
    width: 100%;
    padding: 10px;
}

.box-card>button {
    width: 90%;
    font-weight: 600;
    height: 20vh;
    font-size: 24px;
    margin-left: 5%;
    border: 2px solid #fff !important;
}

input {
    border-bottom: 1px solid #9e9e9ea8 !important;
}

.form-floating>label {
    color: #000 !important;
}

.p-btn {
    font-size: 14px;
    margin-top: 14px;
    font-weight: 500;
}

.box-content {
    width: 90%;
    font-weight: 600;
    margin-left: 5%;
    /* text-align: center; */
    color: #fff;
    padding: 10px;
    border: 1px solid #e0e0e0;
    border-radius: 20px;
    /* background-image: linear-gradient(to left top, #342f81, #642f8c, #902991, #ba1d8f, #e00a86); */
    /* background-image: linear-gradient(to right top, #342f81, #4b2b6b, #522b58, #502e49, #48333e); */
    height: auto;

    display: flex;
    justify-content: space-evenly;
    /* box-shadow: 0 3px 10px rgb(0 0 0 / 20%); */
    /* box-shadow: -2px 2px 14px 4px #c5cae90f; */
    box-shadow: -2px 2px 14px 4px #9091924a;


}

.box-content>p {
    margin-bottom: 4px;
}

#pro-text {
    width: 50%;
    margin-left: 5vw;
    margin-top: 2vh;
}

#pro-logo {
    width: 100%;
    height: 100%;
    border-radius: 10px;
}

.pro-show {
    margin-bottom: 5rem !important;
}

#pro-img {
    border-radius: 10px;
    width: 50%;
    height: 25vh;
}

#pro-text>p {
    font-size: 10px;
    margin-bottom: 3px !important;
}

h4 {
    font-size: 18px !important;
    letter-spacing: 2px;
}

.flex-box {
    display: flex;
}

/* .mini-btn {
    border-color: transparent !important;
    color: #fff !important;
    font-size: 14px;
    background: #fa0e7e;
} */

.mini-btn {
    border-color: transparent !important;
    color: #fff !important;
    font-size: 11px;
    background: #e008a6;
    width: 50%;
    height: 40px;
    line-height: 20px;
    border-radius: 20px;
    font-weight: 600;
    margin-right: 0vw;
    letter-spacing: 2px;
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

input:focus,
input:active,
input:hover {
    border-bottom: 1px solid #342f81a6 !important;
}
</style>

<body>
    <div class="pro-show">
        <div class=" box-card col-sm-12 mt-4 mb-3">
            <button type="button" class="btn btn-outline-danger"><?= $desc->name ?>
                <p class="p-btn">
                    <i class="fa fa-calendar" aria-hidden="true"></i> <?= $desc->from_date ?> to <?= $desc->to_date ?>
                </p>
            </button>
        </div>
        <?php 
        if($role == 'O'){
            ?>
        <div class="box-card text-center mb-3">
            <button class="btn btn-outline-danger medium-btn"
                style="color:#fff;line-height: 15px !important;padding-right: 10px;border:transparent !important;"
                data-bs-toggle="modal" data-bs-target="#addPro"><i class="fa fa-pencil" aria-hidden="true"></i> Add
                Proshow</button>
        </div>
        <?php
        }

        if(count($pro_shows) > 0){
            ?>
        <div class="text-center mb-3">
            <p class="lg-heading">All Proshows</p>
        </div>
        <?php
            foreach($pro_shows as $val){
                ?>

        <div class="box-card col-sm-12 mb-3">
            <div class="box-content">
                <div id="pro-img">
                    <?php
                                if($val->pro_img!=null || $val->pro_img!=''){
                                    $img_src = base_url('assets/proshow/'.$val->pro_img);
                                }
                                else{
                                    $img_src = base_url('assets/proshow/default-pro.jpg');
                                }
                            ?>
                    <img src="<?= $img_src ?>" alt="" id="pro-logo">
                </div>
                <div id="pro-text">
                    <h4><?= $val->celeb_name ?></h4>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> :
                        <?= date('H:i A',strtotime($val->from_time)) ?> to
                        <?= date('H:i A',strtotime($val->to_time)) ?></p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <?= $val->venue ?> </p>
                    <?php 
                            if($role == 'P'){
                                ?>
                    <div class="text-center mt-4">
                        <button type="button" class="btn mini-btn" style="width:85%;" id="pro_register"
                            onclick="window.location.href='<?= base_url('ProShow/details/'.$val->id) ?>'">Register <i
                                class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <?php
                            }
                            else if($role=='O'){
                                ?>
                    <div class="text-center mt-4">
                        <button type="button" class="btn mini-btn" id="pro_edit"
                            onclick="window.location.href='<?= base_url('ProShow/details/'.$val->id) ?>'"
                            style="width:75%;"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                    </div>
                    <?php
                            }
                        ?>
                </div>


            </div>
        </div>
        <?php
            }
           }
        ?>
    </div>
    </div>
</body>

<!-- Modal -->
<div class="modal fade" id="addPro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Proshow</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <form id="proshow_form" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id') ?>">

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="celeb_name" id="celeb_name" autocomplete="off"
                            placeholder="Celebrity Name" style="color: #000 !important;">
                        <label for="celeb_name">Celebrity Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="venue" id="venue" autocomplete="off"
                            placeholder="Venue" style="color:#000 !important;">
                        <label for="venue">Venue</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="location" id="location" autocomplete="off"
                            placeholder="Location" style="color:#000 !important;">
                        <label for="location">Location</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="date" id="date" autocomplete="off"
                            placeholder="Date" style="color:#000 !important;">
                        <label for="date">Date</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="time" class="form-control" name="from_time" id="from_time" autocomplete="off"
                            placeholder="From Time" style="color:#000 !important;">
                        <label for="from_time">From Time</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="time" class="form-control" name="to_time" id="to_time" autocomplete="off"
                            placeholder="To Time" style="color:#000 !important;">
                        <label for="to_time">To Time</label>
                    </div>
                    <div class="form-group mb-2 mt-3">
                        <label>Upload Logo</label>
                        <div class="input-group custom-file-button">
                            <input type="file" name="pro_img" class="form-control" id="inputGroupFile"
                                style="color:#000 !important;">
                            <span class="file-logo"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger btn-custom" id="pro_add" onclick="sub_pro()"
                    style="width:80%">Add <span style="float: right;font-size: 22px;padding-right: 10px;"><i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
            </div>
        </div>
    </div>
</div>

<script>
function sub_pro() {

    var formData = new FormData($('#proshow_form')[0]);


    $.ajax({
        type: 'post',
        url: '<?= base_url('ProShow/addPro') ?>',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        beforeSend: function() {
            $('#pro_add').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        },
        success: function(res) {
            let data = JSON.parse(res);
            toasterOptions();
            toastr.options.onHidden = function() {
                location.reload();
            }
            if (data.code == 200) {
                // $('#pro_add').html('Add');
                $("#pro_add").html(
                    'Add <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>'
                );
                toastr.success('ProShow Added Successfully.', 'Successful');
            }
            else if(data.code==403){
                $("#pro_add").html(
                    'Add <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>'
                );
                toastr.error(data.upload_error,"O'opps");
            }
        }
    });
}

$(function() {
    $("#date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });


});
</script>