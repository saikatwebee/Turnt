<style>
/* .event-details {
    margin-bottom: 5rem !important; 
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

.flex-items {
    width: 50%;
}

.event-flex {
    border: 2px solid #fff;
    border-radius: 20px;
    width: 90%;
    margin-left: 5vw;
    height: 30vh;
    box-shadow: -2px 2px 14px 4px #3949ab7d;
    letter-spacing: 2px;
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

.category-flex {
    margin-top: 7vh;
    flex-direction: row;
    justify-content: space-around;
    border: 1px solid #fff;
    height: 15vh;
    width: 90%;
    margin-left: 5vw;
    align-items: center;
    border-radius: 20px;
    /* box-shadow: -2px 2px 14px 4px #9091924a; */
}
</style>

<body>
    <?php
  //echo "<pre>"; var_dump($details);
    
    if($details['event_img']!=null || $details['event_img']!=''){
        $img_src = base_url('assets/event/'.$details['event_img']);
    }
    else{
        $img_src = base_url('assets/event/default-event.jpg');
    }
   
    ?>

    <section class="showcase event-details">
        <img src="<?= $img_src ?>" alt="Picture">
        <div class="overlay">
            <div class="box-card col-sm-12 mb-5 mt-4">
                <div class="flex-box heading-flex event-flex">
                    <h3><?= $details['event_name'] ?></h3>
                    <p class="p-btn">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <?= $details['event_date'] ?>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?= date('H:i A',strtotime($details['event_time'])) ?>
                    </p>
                    <p class="p-btn">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <?= $details['location'] ?>
                    </p>
                    <p class="p-btn"> Venue : <?= $details['venue'] ?></p>
                    <?php
                    if($this->session->userdata('role') == 'O'){
                        ?>
                            <div class="flex-btn"><button type="button" class="btn mini-btn event_edit"
                            style="width:100%;" >Edit <i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></button></div>
                        <?php
                    }
                    ?>
                </div>

                <?php 
                $cat_arr = $details['category'];
               
                foreach($cat_arr as $val){
                    ?>
                <div class="flex-box category-flex mb-3">
                    <div class="flex-items">
                        <h4><?= $val->name ?></h4>
                    </div>
                    <?php 
                        if($this->session->userdata('role') == 'P'){
                            ?>
                    <div class="flex-btn"><button type="button" class="btn mini-btn"
                            style="width:100%;" data-id="<?=  $val->id ?>">Register <i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></button></div>
                    <?php

                        }
                        else if($this->session->userdata('role') == 'O'){
                            ?>
                    <div class="flex-btn"><button type="button" class="btn mini-btn cat_edit"
                            style="width:100%;" data-id="<?=  $val->id ?>">Edit <i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></button></div>
                    <?php
                         }
                   ?>

                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>
</body>

<div class="modal fade" id="updateCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Event Category</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <form id="catForm">
                <input type="hidden" name="cat_id"  id="cat_id" value="">
                <input type="hidden" name="event_id"  id="event_id" value="<?= $details['event_id'] ?>">
                  
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            placeholder="Name" style="color:#000 !important;">
                        <label for="name">Name of Category</label>
                    </div>
                   
                   
                </form>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger btn-custom" id="catEdit" 
                    style="width:80%">Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Event</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                <input type="hidden" name="event_id"  id="event_id" value="">

                  
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
                        <label for="event_time">To Time</label>
                    </div>
                   
                </form>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger btn-custom" id="eventEdit" 
                    style="width:80%">Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        
    $("#date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd'
    });
 });
    $(document).on("click",".event_edit",(e)=>{
       var event_id = "<?= $details['event_id'] ?>";
       $("#updateEvent").modal('show');
        $.ajax({
            type:'post',
            url:'<?= base_url('Event/getEvent') ?>',
            data:{'id':event_id},
            success:function(response){
               var res = JSON.parse(response);
               console.log(res);
               $('[name="venue"]').val(res.venue);
                $('[name="location"]').val(res.location);
                $('[name="date"]').val(res.event_date);
                $('[name="event_time"]').val(res.event_time);
                
                $("#event_id").val(res.event_id);
            }
        });
   });

   $(document).on("click","#eventEdit",()=>{
        var formData = $("#eventForm").serializeArray();
        //console.log(formData);
        $.ajax({
            type:'post',
            url:'<?= base_url('Event/updateEvent') ?>',
            data:formData,
            beforeSend: function() {
                $('#eventEdit').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            },
            success:function(response){
               
                if(response){
                    var res = JSON.parse(response);
                    
               if(res.code==200){
                $('#eventEdit').html('Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                toasterOptions();
                toastr.options.onHidden = function() {
                    location.reload();
                }
                    toastr.success('Event Updated Successfully.', 'Successful');
                }
                }
                else{
                    $('#eventEdit').html('Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                    toastr.warning('Please edit atleast one', 'Oops');
                }
               
            }
        });
    });

    $(document).on("click",".cat_edit",(e)=>{
        var cat_id = e.target.getAttribute('data-id');
        var event_id = "<?= $details['event_id'] ?>";
        $("#updateCat").modal('show');

        $.ajax({
            type:'post',
            url:'<?= base_url('Event/getCat') ?>',
            data:{
                'id':cat_id,
                'event_id':event_id
            },
            success:function(response){
               var res = JSON.parse(response);
               console.log(res);
               $('[name="name"]').val(res.name);
                $("#cat_id").val(res.id);
            }
        });

    });


    $(document).on("click","#catEdit",()=>{
        var formData = $("#catForm").serializeArray();
        //console.log(formData);
        $.ajax({
            type:'post',
            url:'<?= base_url('Event/updateCat') ?>',
            data:formData,
            beforeSend: function() {
                $('#catEdit').html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            },
            success:function(response){
               
                if(response){
                    var res = JSON.parse(response);
                    
               if(res.code==200){
                $('#catEdit').html('Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                toasterOptions();
                toastr.options.onHidden = function() {
                    location.reload();
                }
                    toastr.success('Event Category Updated Successfully.', 'Successful');
                }
                }
                else{
                    $('#catEdit').html('Save <span style="float: right;font-size: 22px;padding-right: 10px;"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>');
                    toastr.warning('Please edit atleast one', 'Oops');
                }
               
            }
        });
    });


</script>