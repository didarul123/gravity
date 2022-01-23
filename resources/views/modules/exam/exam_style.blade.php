{{-- Exam page  --}}
<style>
    /* section */
    section .light {
    min-height: inherit;
    display: flex;
    justify-content: left;
    align-items: left;
    flex-direction: column;
    position: relative;
    }
    section .light::before,
    section .light::after {
    content: "";
    display: block;
    border-radius: 100%;
    position: absolute;
    }
    .light {
    --primary: hsl(250, 100%, 44%);
    --other: hsl(0, 0%, 14%);
    background: hsl(0, 0%, 98%);
    }
    .dark {
    --primary: hsl(1, 100%, 68%);
    --other: hsl(0, 0%, 90%);
    background: hsl(0, 0%, 10%);
    }
    /* label */
    label {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: nowrap;
    margin: 12px 0;
    cursor: pointer;
    position: relative;
    }
    /* input */
    input {
    opacity: 0;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
    }
    /* .design */
    .design {
    width: 16px;
    height: 16px;
    border: 1px solid var(--other);
    border-radius: 100%;
    margin-right: 16px;
    position: relative;
    }
    .design::before,
    .design::after {
    content: "";
    display: block;
    width: inherit;
    height: inherit;
    border-radius: inherit;
    position: absolute;
    transform: scale(0);
    transform-origin: center center;
    }
    .design:before {
    background: var(--other);
    opacity: 0;
    transition: .3s;
    }
    .design::after {
    background: var(--primary);
    opacity: .4;
    transition: .6s;
    }
    /* .text */
    .text {
    color: var(--other);
    font-weight: bold;
    }
    /* checked state */
    input:checked+.design::before {
    opacity: 1;
    transform: scale(.4);
    position: absolute;
    left: -1px;
    }
    /* other states */
    input:hover+.design,
    input:focus+.design {
    border: 1px solid var(--primary);
    }
    input:hover+.design:before,
    input:focus+.design:before {
    background: var(--primary);
    }
    input:hover~.text {
    color: var(--primary);
    }
    input:focus+.design::after,
    input:active+.design::after {
    opacity: .1;
    transform: scale(2.6);
    }
    .abs-site-link {
    position: fixed;
    bottom: 20px;
    left: 20px;
    color: hsla(0, 0%, 0%, .6);
    background: hsla(0, 0%, 98%, .6);
    font-size: 16px;
    }
    .numberungw{
    width: 20px;
    height: 20px;
    line-height: 20px;
    color: #323232;
    text-align: center;
    border:1px solid #ddd;
    margin: 0 20px 0 0;
    }
    #progressbar {
    background-color: black;
    border-radius: 13px; /* (height of inner div) / 2 + padding */
    padding: 3px;
    width: 200px;
    margin: 0 0 5px;
    }
    #progressbar > div {
    background-color: orange;
    width: 20%; /* Adjust with JavaScript */
    height: 20px;
    border-radius: 10px;
    } 
    .text-right1{
    float: right;
    } 
    .pull_left {
    float: left;
    }
    .pull_right {
    float: right;
    }
    /*TIMER START*/
    div.countdown-bar {
    width: 0;
    height: 20px;
    border: 1px solid #ff6400 !important;
    background-color: #ff6400 !important;
    }
    div.countdown-bar div:nth-of-type(1) {
    width: 0;
    height: 100%
    }
    div.countdown-bar div:nth-of-type(2) {
    width: 100%;
    height: 100%
    }
    .timerr_rm01 img {
    position: absolute;
    left: -49px;
    top: -1px;
    width: 29px;
    }
    .timerr_rm02 {
    border: 1px solid #ff6400 !important;
    background-color: #FFF !important;
    }
    .timerr_rm03 span {
    font-size: 19px !important;
    font-weight: 400 !important;
    font-family: 'Roboto', sans-serif !important;
    color: #FFF !important;
    }
    /*TIMER END*/

    b{
        font-weight: normal;
    }
</style>