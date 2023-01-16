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
    color: #fff;
    padding: 10px;
    border: 1px solid #e0e0e0;
    border-radius: 20px;
    height: auto;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: -2px 2px 14px 4px #38393c7d;

}

.box-content>p {
    margin-bottom: 4px;
}

#event-text {
    width: 50%;
}

#event-text>p {
    font-size: 13px;
    margin-bottom: 10px !important;
}

h4 {
    font-size: 22px !important;
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
    font-size: 18px;
    background: #e008a6;
    width: 50%;
    height: 40px;
    line-height: 20px;
    border-radius: 20px;
    font-weight: 600;
    margin-right: 0vw;
    letter-spacing: 2px;
}

.event-box {
    margin-bottom: 5rem !important;
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
    <div class="event-box">
        <div class=" box-card col-sm-12 mt-4 mb-3">
            <button type="button" class="btn btn-outline-danger"><?= $desc->name ?>
                <p class="p-btn">
                    <i class="fa fa-calendar" aria-hidden="true"></i> <?= $desc->from_date ?> to <?= $desc->to_date ?>
                </p>
            </button>
        </div>

        <?php 
    // echo "<pre>";
    // var_dump($events);
    // die;
        if($role == 'O'){
            ?>
        <div class="box-card text-center mb-3">
            <button class="btn btn-outline-danger medium-btn"
                style="color:#fff;line-height: 15px !important;padding-right: 10px;border:transparent !important;"
                data-bs-toggle="modal" data-bs-target="#addEvent"><i class="fa fa-pencil" aria-hidden="true"></i> Add
                Event</button>
        </div>
        <?php
        }

        if(count($events) > 0){
            ?>

        <div class="text-center mb-3">
            <p class="lg-heading">All Events</p>
        </div>


        <?php 
            foreach($events as $event){
                ?>
        <div class="box-card col-sm-12 mb-3">
            <div class="box-content">
                <div id="event-text">
                    <h4><?= $event['event_name'] ?></h4>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> :
                        <?= date('H:i A',strtotime($event['event_time'])) ?></p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <?= $event['venue'] ?> </p>
                </div>
                <div id="event-btn">
                    <?php 
                        if($role=='P'){
                            ?>
                    <button type="button" class="btn mini-btn" style="width:100%;"
                        id="event_register"
                        onclick="window.location.href='<?= base_url('Event/details/'.$event['event_id']) ?>'">View <i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    <?php
                        }
                        else if($role=='O'){
                            ?>
                    <button type="button" class="btn mini-btn" style="width:100%;" id="event_edit"
                        onclick="window.location.href='<?= base_url('Event/details/'.$event['event_id']) ?>'">Edit <i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
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

</body>

<!-- Modal -->
<div class="modal fade" id="addEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Event</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <form id="event_form" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id') ?>">

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="event_name" id="event_name" autocomplete="off"
                            placeholder="Name Of The Event" style="color: #000 !important;">
                        <label for="event_name">Name Of The Event</label>
                    </div>

                    <div class="form-group mb-2">
                        <label for="category" style="position: absolute;top: 10vh !important;">Add Multiple
                            Category</label>
                        <input type="text" id="#inputTag" value="" data-role="tagsinput" name="category" id="category"
                            autocomplete="off">
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
                        <input type="time" class="form-control" name="event_time" id="event_time" autocomplete="off"
                            placeholder="Event Time" style="color:#000 !important;">
                        <label for="event_time">Time</label>
                    </div>

                    <div class="form-group mb-2">
                        <label>Upload Logo</label>
                        <div class="input-group custom-file-button">
                            <input type="file" name="event_img" class="form-control" id="inputGroupFile"
                                style="color:#000 !important;">
                            <span class="file-logo"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger btn-custom" id="event_add" onclick="sub_event()"
                    style="width:80%">Add <span style="float: right;font-size: 22px;padding-right: 10px;"><i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
            </div>
        </div>
    </div>
</div>


<script>
$(() => {
    $("#inputTag").tagsinput('items');
    $("#date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });
});

function sub_event() {
    //var data = $("#event_form").serializeArray();
    var formData = new FormData($('#event_form')[0]);
    console.log(formData);

  
    $.ajax({
        type: 'post',
        url: '<?= base_url('Event/add_event') ?>',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        beforeSend: function() {
            $('#event_add').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        },
        success: function(res) {
            let data = JSON.parse(res);
            toasterOptions();
            toastr.options.onHidden = function() {
                location.reload();
            }
            if (data.code == 200) {
                // $('#pro_add').html('Add');
                $("#event_add").html(
                    'Add <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>'
                );
                toastr.success('ProShow Added Successfully.', 'Successful');
            }
            else if(data.code==403){
                $("#event_add").html(
                    'Add <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>'
                );
                toastr.error(data.upload_error,"O'opps");
            }
        }
    });
}
</script>