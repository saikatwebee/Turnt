<style>
/* .pro-show-details {
    margin-bottom: 3rem !important; 
} */

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

input {
    border-bottom: 1px solid #000 !important;

}

.form-floating>label {
    color: #000 !important;
}

.p-btn {
    font-size: 14px;
    margin-top: 0px !important;
    margin-bottom: 7px !important;

}



h4 {
    font-size: 18px !important;
}

.flex-box {
    display: flex;
}

body {

    overflow-x: hidden;
}

.showcase {
    width: 100%;
    height: 95vh;
    position: relative;
    color: white;
    text-align: center;
}

.showcase img {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99
}

.showcase .overlay {
    width: 100%;
    height: 110vh;
    /* background-color: rgba(0, 35, 82, 0.7); */
    background-color: rgb(0 35 82 / 80%);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 999
}

.separator {
    margin-top: 8vh;
}
</style>

<body>

    <?php
        if($details->pro_img!=null || $details->pro_img!=''){
            $img_src = base_url('assets/proshow/'.$details->pro_img);
        }
        else{
            $img_src = base_url('assets/proshow/default-pro.jpg');
        }
    ?>

    <section class="showcase pro-show-details">
        <img src="<?= $img_src ?>" alt="Picture">
        <div class="overlay">


            <div class="box-card col-sm-12 mb-3 mt-4">
                <button type="button" class="btn btn-outline-danger"
                    style="border-color:#fff;color:#fff;"><?= $desc->name ?>
                    <p class="p-btn" style="margin-top: 10px !important;">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <?= $desc->from_date ?> to
                        <?= $desc->to_date ?>
                    </p>
                </button>

                <div class="separator">
                    <div class="flex-box heading-flex mt-3 mb-3">
                        <h3><?= $details->celeb_name ?></h3>
                        <p class="p-btn">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> <?= $details->date ?></span>
                            <span style="margin-left:1vw;">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?= date('H:i A',strtotime($details->from_time)) ?> to
                                <?= date('H:i A',strtotime($details->to_time)) ?>
                            </span>
                        </p>
                        <p class="p-btn"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $details->location ?></span> </p>
                        <p class="p-btn">Venue :  <?= $details->venue ?></p>
                    </div>
                    <?php 
                    if($this->session->userdata('role') == 'P'){
                        ?>
                    <div class="text-center mb-3">
                        <button type="button" class="btn small-btn pro_register">Register <i
                                class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <?php
                    }
                    else if($this->session->userdata('role') == "O"){
                        ?>
                    <div class="text-center mb-3">
                        <button type="button" class="btn small-btn pro_edit"  value="<?= $this->uri->segment(3) ?>"><i class="fa fa-pencil"
                                aria-hidden="true"></i> Edit</button>
                    </div>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </section>
</body>


 <div class="modal fade" id="updatePro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Proshow</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <form id="proshowForm" enctype="multipart/form-data">
                <input type="hidden" name="pro_id" id="pro_id">

                  
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
                        <input type="text" class="form-control" name="date" id="datee" autocomplete="off"
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
                   
                </form>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger btn-custom" id="pro_edit" onclick="update_pro()"
                    style="width:80%">Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).on("click",".pro_edit",()=>{
      var pro_id =  $(".pro_edit").val();
      $("#updatePro").modal('show');
        $.ajax({
            type:'post',
            url:'<?= base_url('ProShow/getProDet') ?>',
            data:{'pro_id':pro_id},
            success:function(response){
               var res = JSON.parse(response);
               console.log(res.date);
                $('[name="venue"]').val(res.venue);
                $('[name="location"]').val(res.location);
                $('[name="date"]').val(res.date);
                $('[name="from_time"]').val(res.from_time);
                $('[name="to_time"]').val(res.to_time);
                $("#pro_id").val(res.id);
            }
        });
    });

    function update_pro(){
        var formData =  $("#proshowForm").serializeArray();

        $.ajax({
            type:'post',
            url:'<?=  base_url('ProShow/updateProshow') ?>',
            data:formData,
            beforeSend: function() {
            $('#pro_edit').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            },
            success:function(response){
                if(response){
                    var res = JSON.parse(response);
               if(res.code==200){
                $('#pro_edit').html('Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                toasterOptions();
                toastr.options.onHidden = function() {
                    location.reload();
                }
                    toastr.success('ProShow Updated Successfully.', 'Successful');
                }
                }
                else{
                    $('#pro_edit').html('Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                    toastr.warning('Please edit atleast one', 'Oops');
                }
               
            }
        });
    }
    

     $(function() {
        //$("#updatePro").modal('show');
    $("#datee").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });


});
   
</script>