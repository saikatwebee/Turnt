<style>
.purchase-box {
    margin-bottom: 5rem !important;
}

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
#ptc,
#org {
    font-size: 22px;
    font-weight: 600;
    color: #fff;
}
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #E00A86;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: #fff;
    -webkit-transition: .4s;
    transition: .4s;
}
input:checked+.slider {
    background-color: #7e57c2;
}

input:focus+.slider {
    box-shadow: 0 0 1px #7e57c2;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

.radioSwitch {
    display: flex;
    justify-content: center;
    align-items: center;

}

.switch-label {
    margin: 4px;
    padding: 4px;
}
</style>

<div class="purchase-box">
    <div class="box-card text-center mt-4 mb-3">
        <p class="lg-heading">Your Purchase</p>
    </div>

    <fieldset class="radioSwitch">
        <label class="switch-label" id="ptc">Proshows</label>
        <label class="switch switch-label">
            <input type="checkbox" name="check_role">
            <span class="slider round"></span>
        </label>
        <label class="switch-label" id="org">Events</label>
    </fieldset>
</div>