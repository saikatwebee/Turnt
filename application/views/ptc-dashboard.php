<style>
.ptc-dashboard {
    margin-bottom: 5rem !important;
}

.box-card {
    width: 50%;
    padding: 10px;
}

.big-btn {
    width: 100%;
    padding: 10px;
}

.big-btn>button {
    width: 100%;
    font-weight: 600;
    height: 25vh;
    font-size: 35px;
}

.big-btn>button .p-btn {
    font-size: 16px !important;
}

.box-card>button {
    width: 100%;
    font-weight: 600;
    height: 20vh;
    font-size: 24px;
    letter-spacing: 0px;
    border: 2px solid #fff !important;
}

.d-block {
    border-radius: 6px;
}

.org-desc {
    padding: 15px;
}

.p-btn {
    font-size: 10px;
    margin-top: 14px;
    font-weight: 500;
}

.multi-owl .item {
    height: 15rem;
    padding: 1rem;
}

.single-owl .item {
    height: 15rem;
    padding: 1rem;
}

.multi-owl {
    margin-bottom: 2vh;
}

.single-owl {
    margin-bottom: 12vh;
}
.see-all{
    width:30%;
    letter-spacing:0px;
    background: #fa0e7e;
    border-color: transparent;
}


</style>

<body>
    <div class="ptc-dashboard">
    <div class="text-center mt-4 mb-3">
        <p class="lg-heading">Fests</p>
    </div>

    <!--List Of Organizers-->
    <div class="org-desc mb-3">
        <div class="row">
            <?php 
                    // echo "<pre>";
                    // var_dump($listCount);
                    // var_dump($list);
                    $i=0;
                foreach($list as $key => $row){
                    if($listCount > 0){
                        if($listCount==1){
                            //single col-12 box
                            ?>
            <div class=" box-card col-sm-12">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>
            </div>
            <?php

                        }
                        elseif($listCount == 2){
                            ?>
            <div class=" box-card col-sm-6">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>
            </div>
            <?php
                        }
                        elseif($listCount == 3){
                         
                            if ($key === array_key_last($list)) {
                                //last item
                                ?>
            <div class="big-btn col-sm-12">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>

            </div>
            <?php
                            }
                            else{
                                ?>
            <div class=" box-card col-sm-6">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>
            </div>
            <?php
                            }
                        }
                        else if($listCount == 4){
                          // col-6 box ..max 4
                          ?>
            <div class=" box-card col-sm-6">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>
            </div>
            <?php

                        }
                        else if($listCount > 4){
                            // 4 box with see all button
                            if ($key === array_key_last($list)) {
                                //last item
                                ?>
            <div class="big-btn col-sm-12 hide-card">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>

            </div>
            <?php
                            }
                            else{
                                ?>
            <div class="box-card col-sm-6">
                <button type="button" class="btn btn-outline-danger"
                    onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                    <p class="p-btn"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->from_date ?> to
                        <?= $row->to_date ?></p>
                </button>
            </div>
            <?php
                            }
                        }

                    }
                    else{
                        //upcoming event
                        ?>
            <div class="big-btn col-sm-12">
                <button type="button" class="btn btn-outline-danger">Upcoming Fest</button>
            </div>
            <?php

                    }
                    $i++;
                }
                   
                ?>

        </div>
        <?php
            if($listCount > 4){
                ?>
        <div class="text-center mt-3">
            <button class="btn btn-outline-danger see-all" onclick="window.location.href='<?= base_url('home/active_fest') ?>'">See All <i class="fa fa-arrows-h" aria-hidden="true"></i></button>
        </div>
        <?php
            }
        ?>

    </div>



    <div class="text-center mb-3">
        <p class="md-heading">Upcoming Proshows</p>
    </div>

    <div class="owl-carousel owl-theme multi-owl">
        <div class="item"><img src="<?= base_url('assets/img/celeb1.jpg')?>"></div>
        <div class="item"><img src="<?= base_url('assets/img/celeb2.jpg')?>"></div>
        <div class="item"><img src="<?= base_url('assets/img/celeb3.jpg')?>"></div>


    </div>

    <div class="text-center mb-3">
        <p class="md-heading">Upcoming Events</p>
    </div>

    <div class="owl-carousel owl-theme single-owl">
        <div class="item"><img src="<?= base_url('assets/img/event1.jpg')?>"></div>
        <div class="item"><img src="<?= base_url('assets/img/event2.jpg')?>"></div>
        <div class="item"><img src="<?= base_url('assets/img/event3.jpg')?>"></div>
        <div class="item"><img src="<?= base_url('assets/img/event4.jpg')?>"></div>
        <div class="item"><img src="<?= base_url('assets/img/event5.jpg')?>"></div>

    </div>

    </div>

   

    <!-- </section> -->
</body>
<script>
var multi_owl = $('.multi-owl');
var single_owl = $('.single-owl');
multi_owl.owlCarousel({
    items: 2,
    loop: true,
    dots: false,
    margin: 5,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
});
single_owl.owlCarousel({
    items: 1,
    loop: true,
    dots: false,
    margin: 5,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
});
</script>