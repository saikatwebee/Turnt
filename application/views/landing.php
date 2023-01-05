<style>
:root {
    --yellow: #E00A86;
    --red: #342F81;
    --blue: #862880;
    --violet: #5F2B7E;
}

body,
html {
    width: 100%;
    height: 100%;
    /* background: rgba(80, 13, 143, 1); */
    /* background: #1E1E1E; */
    /* background: #000; */
    opacity: 1;
    overflow: hidden;
}

.v11_2 {
    /* color: rgba(200, 7, 49, 1); */
    color: #757575;
    position: absolute;
    top: 50%;
    left: 53%;
    text-shadow: 0px 4px 50px rgb(0 0 0 / 50%);
    font-family: Aqum;
    font-weight: 600;
    font-size: 115px;
    letter-spacing: 25px;
    opacity: 1;
    transform: translate(-50%, -50%);
}

.loader {
    position: absolute;
    top: 70%;
    left: 53%;
    transform: translate(-50%, -50%);
}

.contain {
    display: flex;
    justify-content: center;
    align-items: center;
}

.dot {
    width: 2vw;
    height: 2vw;
    border-radius: 100%;
    margin: 3vw;
    background-image: linear-gradient(145deg, rgba(255, 255, 255, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
    animation: bounce 1.5s 0.5s linear infinite;
}

#yellow {
    background-color: var(--yellow);
}

#red {
    background-color: var(--red);
    animation-delay: 0.1s;
}

#blue {
    background-color: var(--blue);
    animation-delay: 0.2s;
}

#violet {
    background-color: var(--violet);
    animation-delay: 0.3s;
}

@keyframes bounce {

    0%,
    50%,
    100% {
        transform: scale(1);
        filter: blur(0px);
    }

    25% {
        transform: scale(0.6);
        filter: blur(3px);
    }

    75% {
        filter: blur(3px);
        transform: scale(1.4);
    }
}



.v7 {

    position: absolute;
    width: 62.63px;
    height: 69.86px;
    left: 276.43px;
    top: 337.21px;

    background: #342F81;
    transform: matrix(-1, 0, 0, 1, 0, 0);
}

.v8 {
    position: absolute;
    width: 62.63px;
    height: 69.86px;
    left: 216.28px;
    top: 411.8px;

    background: #342F81;
    transform: rotate(-60.18deg);
}

.v9 {
    position: absolute;
    width: 62.63px;
    height: 52.08px;
    left: 147.65px;
    top: 449.83px;

    background: #862880;
    transform: rotate(-60.18deg);
}

.v10 {
    position: absolute;
    width: 62.63px;
    height: 69.86px;
    left: 244.22px;
    top: 504.28px;

    background: #5F2B7E;
    transform: matrix(0.49, -0.87, -0.87, -0.49, 0, 0);
}

.v6 {
    position: absolute;
    width: 62.63px;
    height: 69.86px;
    left: 146px;
    top: 337px;
    clip-path: polygon(45% 17%, 57% 33%, 11% 65%, 0 49%);
    background: #E00A86;
}

.v11 {
    position: absolute;
    width: 26.66px;
    height: 29.97px;
    left: 147.86px;
    top: 396.74px;

    background: #B31F81;
}

.img-center {
    display: block;
    width: 15%;
    position: absolute;
    top: 25%;
    left: 53%;
    transform: translate(-50%, -50%);
}

@media only screen and (max-width:768px) {
    .v13_2 {

        right: -19vw;
    }

    .v11_2 {
        font-size: 48px;
        letter-spacing: 29px;
    }

    .loader {
        top: 57%;
        left: 50%;
    }

    .img-center {
        width: 53%;
        top: 32%;
    }
}
</style>

<body>
    <img src="<?= base_url('assets/img/loadimg.png')?>" class="img-center" alt="...">

    <span class="v11_2">TURNT</span>


    <div class="v14_2"></div>
    <div class="v13_2"></div> -->
    <!-- <div class="loader"></div> -->
    <div class="loader">
        <div class="contain">
            <div class="dot" id="yellow"></div>
            <div class="dot" id="red"></div>
            <div class="dot" id="blue"></div>
            <div class="dot" id="violet"></div>
        </div>
    </div>
</body>

<script>
setTimeout(() => {
    window.location.href = "<?= base_url('auth/createProfile') ?>";
}, 3000);
</script>

</html>