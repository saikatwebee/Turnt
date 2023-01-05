<style>
body{
    background-image: url(<?= base_url('assets/img/400.jpeg') ?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;


}
</style>
<!-- <img src="<?= base_url('assets/img/404.jpg') ?>" alt="404-page"> -->
<!-- http://localhost/Turnt/assets/img/404.jpeg -->

<body onload="wait()">
    
</body>
<script>
    const wait = ()=>{
        setTimeout(()=>{
            history.back();
        },3000);
       
    }
</script>