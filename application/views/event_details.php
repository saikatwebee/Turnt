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
    height: 24vh;
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
    height: 95vh;
    /* background-color: rgba(0, 35, 82, 0.7); */
    background-color: rgb(0 35 82 / 80%);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 999
}

.category-flex {
    margin-top: 28px;
    flex-direction: row;
    justify-content: space-around;
    border: 1px solid #fff;
    height: 16vh;
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
                    <div class="flex-btn"><button type="button" class="btn mini-btn"
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