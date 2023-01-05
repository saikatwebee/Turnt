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
    height: 550px;
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
    height: 550px;
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
            $img_src = base_url('assets/proshows/'.$details->pro_img);
        }
        else{
            $img_src = base_url('assets/proshows/default-pro.jpg');
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
                        <button type="button" class="btn small-btn pro_edit"><i class="fa fa-pencil"
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