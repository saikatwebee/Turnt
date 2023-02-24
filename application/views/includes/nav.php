
<link rel="stylesheet" href="https://unpkg.com/balloon-css@1.2.0/balloon.min.css">
<style>
    a {
  display: inline-block;
  text-decoration: none;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.logo-div {
    left: 80%;
    padding: 6px 0px 0px 12px;
}

.width-toggle,
.container {
  margin: 0px;
  padding: 0px;
  background: white;
}
/* .width-toggle, .portrait .width-toggle,
.container, .portrait
.container {
  width: 320px;
} */
.landscape .width-toggle, .landscape
.container {
  width: 480px;
}
.wide .width-toggle, .wide
.container {
  width: 600px;
}

.width-toggle {
  margin: 20px auto 50px;
  padding: 15px;
  text-align: center;
  font-size: 0;
}
.width-toggle,
.width-toggle * {
  box-sizing: border-box;
}
.width-toggle a {
  display: inline-block;
  margin: 0 5px;
  padding: 10px;
  border: 1px solid #DDD;
  color: #261835;
  font-size: 12px;
  text-transform: uppercase;
}

header {
    min-height: 60px;
    background: #261835;
    border-bottom: 1px solid transparent;
}
header,
header * {
  position: relative;
  box-sizing: border-box;
  overflow: hidden;
}
header,
header a {
  color: white;
}
header a.nav-toggle,
header ul.nav {
  background: transparent;
}
header a.nav-toggle {
  z-index: 100;
  display: inline-block;
  width: 60px;
  height: 60px;
  padding: 15px;
}
header a.nav-toggle span {
  display: block;
  width: 100%;
  height: 100%;
  border: 1px solid white;
}
header h1,
header ul.nav {
  min-height: 60px;
}
header ul.nav li,
header ul.nav li a {
  display: inline-block;
  padding: 5px;
  margin-left: 8px;
}

.ver1 header {
  padding: 0 60px 0 0;
  white-space: nowrap;
}
.ver1 header > * {
  display: inline-block;
  vertical-align: middle;
}
.ver1 header h1,
.ver1 header ul {
  width: 100%;
}
.ver1 header h1 {
  max-width: 100%;
}
.ver1 header a.nav-toggle {
  margin-right: -60px;
}
.ver1 header ul {
  max-width: 0;
}
.ver1 header.nav-active {
  padding: 0 0 0 60px;
}
.ver1 header.nav-active h1 {
  max-width: 0;
}
.ver1 header.nav-active a.nav-toggle {
  margin: 0;
  margin-left: -60px;
}
.ver1 header.nav-active ul {
  max-width: 100%;
}

.ver2 header {
  white-space: nowrap;
}
.ver2 header .slide > * {
  display: inline-block;
  vertical-align: middle;
  margin-right: -4px;
}
.ver2 header h1,
.ver2 header ul {
  width: 100%;
  min-height: auto;
  max-height: 60px;
}
.ver2 header h1 {
  padding-left: 60px;
}
.ver2 header ul {
  padding-left: 5px;
  padding-right: 60px;
  white-space: normal;
}
.ver2 header ul li a {
  padding: 18px 5px;
}
.ver2 header a.nav-toggle {
  margin: 0 -64px 0 0;
  font-size: 25px;
  transform: translateX(0);
  -moz-transition: margin 0.75s ease;
  -o-transition: margin 0.75s ease;
  -webkit-transition: margin 0.75s ease;
  transition: margin 0.75s ease;
}
.ver2 header .slide {
  overflow: visible;
  transform: translateX(-100%);
  -moz-transition: -moz-transform 0.75s ease;
  -o-transition: -o-transform 0.75s ease;
  -webkit-transition: -webkit-transform 0.75s ease;
  transition: transform 0.75s ease;
  -webkit-backface-visibility: hidden;
}
.ver2 header.nav-active .slide {
  overflow: visible;
  transform: translateX(0%);
}
.ver2 header.nav-active a.nav-toggle {
  margin: 0 -60px;
}
a:hover{
    color: #fff !important;
}
#imgLogo{
    width: 15%;
    margin-left: 50%;
}
@media only screen and (max-width:768px){
    #imgLogo{
    width: 15%;
    margin-left: 2%;
}
}
</style>

<body>
    <!-- <div class="width-toggle">
        <a href="#" class="portrait">Portrait</a>
        <a href="#" class="landscape">Landscape</a>
        <a href="#" class="wide">Widest</a>
    </div> -->


<div class="overlay-chat"></div>
    <div class="ver2">
        <header>
            <div class="slide">
                <ul class="nav">
                    <li data-toggle="tooltip" title="Home"><a href="<?= base_url('home/dashboard') ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li data-toggle="tooltip" title="Profile"><a href="<?= base_url('home/profile') ?>"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                  <?php 
                    if($this->session->userdata('role')=='O'){
                      ?>
                        <li data-toggle="tooltip" title="Proshows"><a href="<?= base_url('ProShow') ?>"><i class="fa fa-music" aria-hidden="true"></i></a></li>
                    <li data-toggle="tooltip" title="Events"><a href="<?= base_url('Event') ?>"><i class="fa fa-rocket" aria-hidden="true"></i></a></li>
                      <?php
                    }
                    else if($this->session->userdata('role')=='P'){
                      ?>
                      <li data-toggle="tooltip" title="Proshows"><a href="<?= base_url('plane/purchase') ?>"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                     
                      <?php
                    }
                    ?>
                    
                    
                    <li data-toggle="tooltip" title="Logout"><a href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>

                    
               
                </ul>
               
                <a href="#" class="nav-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
               <div class="logo-div"><img src="<?= base_url('assets/img/loadimg.png') ?>" class="img-logo" id="imgLogo" alt="..." style="width: 15%;"></div>
            </div>
        </header>
    </div>

</body>
<script>
  $('.nav-toggle').click(function(e){
  e.preventDefault();
  $(this).parents('header').toggleClass('nav-active');
});

$('.width-toggle a').click(function(){
    var size = $(this).attr('class');
  
    $('body').removeAttr('class').addClass(size);
});

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip({animation: true,placement: "bottom",trigger: "hover"});   
});
</script>
</html>