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

.p-btn {
    font-size: 14px;
    margin-top: 14px;
    font-weight: 500;
}

.desc-text {
    font-size: 35px;
    font-weight: 600;
}

#event_desc {
    text-align: justify;
    border-radius: 20px;
    background: transparent;
    font-size: 13px;
    padding: 15px;
}
.medium-btn:active,
.medium-btn:focus,
.medium-btn:hover {
    background: #342f81 !important;
    border-color: transparent !important;
    color: #fff !important;
}

.dashboard {
    margin-bottom: 5rem !important;
}
</style>

<body>
    <div class="dashboard">
        <div class=" box-card col-sm-12 mt-4 mb-3">
            <button type="button" class="btn btn-outline-danger"><?= $desc->name ?>
                <p class="p-btn">
                    <i class="fa fa-calendar" aria-hidden="true"></i> <?= $desc->from_date ?> to <?= $desc->to_date ?>
                </p>
            </button>
        </div>
        <?php 

if($role=='O'){
    ?>
        <div class="box-card">
            <div class="text-center">
                <p class="lg-heading">Description</p>
            </div>
            <form id="descForm">
                <div class="form-group p-15">
                    <textarea name="desc" id="event_desc" cols="30" rows="6" class="form-control"
                        oninput="checkFun(event.target.value)"
                        value="<?= trim($desc->desc) ?>"><?php if(isset($desc->desc)){echo trim($desc->desc);}else{echo "";}?></textarea>
                </div>
                
                <div class="text-center">
                    <button type="button" class="btn small-btn" id="desc_edit" disabled><i
                            class="fa fa-pencil" aria-hidden="true"></i>
                        Edit</button>
                </div>
               
            </form>
        </div>
        <?php
}
else if($role =='P'){
    if($desc->desc!="" || $desc->desc!=null){
    ?>
        <div class="box-card">
            <div class="text-center">
                <p class="lg-heading">Description</p>
            </div>
            <form>
                <div class="form-group p-15">
                    <textarea name="desc" id="event_desc" cols="30" rows="6" class="form-control" readonly="true"
                       value="<?= trim($desc->desc) ?>"><?php if(isset($desc->desc)){echo trim($desc->desc);}else{echo "";}?></textarea>
                </div>
            </form>
        </div>
        <?php
    }
}
?>
        <?php if($role=='O'){   
    ?>
        <div class="box-card col-sm-12 mb-3">
            <button class="btn btn-outline-danger medium-btn" style="color:#fff; border: transparent !important;"
                onclick="window.location.href='<?= base_url('ProShow') ?>'"><span><i class="fa fa-music"
                        aria-hidden="true"></i></span> Proshows</button>
        </div>
        <div class="box-card col-sm-12">
            <button class="btn btn-outline-danger medium-btn" style="color:#fff;border: transparent !important;"
                onclick="window.location.href='<?= base_url('Event') ?>'"><span><i class="fa fa-rocket"
                        aria-hidden="true"></i></span> Events</button>
        </div>
        <?php

}
else if($role=='P'){
    ?>
        <div class="box-card col-sm-12 mb-3">
            <button class="btn btn-outline-danger medium-btn" style="color:#fff;border: transparent !important;"
                onclick="window.location.href='<?= base_url('ProShow/list/'.$desc->id) ?>'"><span><i class="fa fa-music"
                        aria-hidden="true"></i></span> Proshows</button>
        </div>
        <div class="box-card col-sm-12">
            <button class="btn btn-outline-danger medium-btn" style="color:#fff;border: transparent !important;"
                onclick="window.location.href='<?= base_url('Event/list/'.$desc->id) ?>'"><span><i class="fa fa-rocket"
                        aria-hidden="true"></i></span> Events</button>
        </div>
        <?php
} ?>
    </div>


</body>

<script>
function checkFun(val) {
   if (val.length > 0) 
        $("#desc_edit").prop("disabled", false);
    else if(val.length == 0)
        $("#desc_edit").prop("disabled", true);
}   

$(document).on("click","#desc_edit",(event)=>{
    var btn = event.target;
    var formData = $("#descForm").serializeArray();
    //validation will add later...
    $.ajax({
        type: 'post',
        url: '<?= base_url('home/updateDesc') ?>',
        data: formData,
        beforeSend: function() {
            $(btn).html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        },
        success: function(res) {
            let data = JSON.parse(res);
            toasterOptions();
            toastr.options.onHidden = function() {
                location.reload();
            }
            if (data.code == 200) {
                $(btn).html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
                toastr.success('Description Updated.', 'Successful');
            }
            if (data.length == 0) {
                $(btn).html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
                $("#event_desc").css("border", "2px solid #fa0e7e");
            }
        }
    });

});


// $(document).on("click","#desc_add",(event)=>{
//     var btn = event.target;
//     var formData = $("#descForm").serializeArray();
//     //validation will add later...
//     var desc = $("#event_desc").val();
//     if(desc==""){

//     }
//     $.ajax({
//         type: 'post',
//         url: '<?= base_url('home/addDesc') ?>',
//         data: formData,
//         beforeSend: function() {
//             $(btn).html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
//         },
//         success: function(res) {
//             let data = JSON.parse(res);
//             toasterOptions();
//             toastr.options.onHidden = function() {
//                 location.reload();
//             }
//             if (data.code == 200) {
//                 $(btn).html('<i class="fa fa-pencil" aria-hidden="true"></i> Add');
//                 toastr.success('Description Added.', 'Successful');
//             }
            
//         }
//     });

// });




</script>