
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
    letter-spacing: 0px !important;
    border: 2px solid #fff !important;
}

.p-btn {
    font-size: 14px;
    margin-top: 14px;
    font-weight: 500;
}
.active-fest{
    margin-bottom: 5rem !important;
}

</style>
<body>
    <div class="active-fest">
    <div class="text-center mt-4 mb-3">
        <p class="lg-heading">All Active Fests</p>
    </div>

    <div class="row">
        <?php 
    
    foreach($list as $row){
        ?>
        <div class=" box-card col-sm-12 mb-3 active-box">
            <button type="button" class="btn btn-outline-danger"
                onclick="window.location.href='<?= base_url('home/org_list/'.$row->id) ?>'"><?= $row->name ?>
                <p class="p-btn">(<?= $row->from_date ?> to <?= $row->to_date ?>)</p>
            </button>
        </div>
        <?php 
    }
?>
    </div>
    </div>

    
</body>