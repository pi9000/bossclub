<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $settings->title }} </title>
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href="{{ asset('themes/front/mzdspin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel='stylesheet' href='{{ asset('themes/front/mzdspin/css/dewaspin.css') }}'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="icon" href="{{ $settings->favicon }}" />
    <script src="{{ asset('themes/front/mzdspin/js/jquery.min.js') }}"></script>
    <style>
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 22px;
            border-radius: 45px;
            border: 1px solid gray;
            text-align: center;
        }

        .inner {
            grid-area: inner-div;
            position: absolute;
            overflow: hidden;
            width: 100%;
            height: auto;
            transform: translate(-50%, 0%) matrix(1, 0, 0, 1, 0, 0);
            z-index: 99;
            top: -54px;
        }

        .toast p,
        .toast span {
            color: #fffd00;
            -webkit-animation: 2.5s linear 2s infinite glow;
            animation: 2.5s linear 2s infinite glow;
        }

        .ticket-container {
            margin-top: -22px;
            transform: scale(0.66);
            text-align: center;
            max-width: 577px;
        }

        button.submit {
            font-size: 22px;
            width: 70%;
            background: linear-gradient(to bottom, #ec0000 16%, #7b0000 44%, #ec0000 99%);
            color: #ffc107;
            padding: 5px 15px;
            border: 0px;
            box-shadow: 2px 2px 2px grey;
            border-radius: 30px;
        }

        .mzd {
            margin-top: -30px;
        }

        .swal2-actions button {
            width: 100% !important;
            left: auto !important;
        }

        .tos {
            max-height: 300px;
            color: #fff;
            overflow: auto;
            border: 1px solid #fff;
            text-align: left;
            padding: 10px;
        }

        .logo-web-mob {
            display: none;
            width: 100%;
            margin-bottom: 20px;
            animation: ld-shake-v 3s infinite linear;
            filter: drop-shadow(4px 6px 8px black);
            animation: ld-shake-v 3s infinite linear;
        }

        .logo-web {
            width: 100%;
            margin-bottom: 20px;
            animation: ld-shake-v 3s infinite linear;
            filter: drop-shadow(4px 6px 8px black);
            animation: ld-shake-v 3s infinite linear;
        }

        #welcome {
            background: linear-gradient(to bottom, maroon 16%, #4d0000 44%, #6d0000 99%);
            position: absolute;
        }

        .row>* {
            padding-right: 0 !important;
            padding-left: 0 !important;
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        body {
            background: url({{ $settings->background }}) center/100% 100% no-repeat fixed #222
        }

        .toast,
        button {
            position: relative;
            transform: none;
            left: 0 !important;
            background: linear-gradient(to bottom, #ec0000 16%, #7b0000 44%, #ec0000 99%);
            border-radius: 34px;
            box-shadow: 0 2px 0 #ed0001
        }

        .btn:hover {
            border-color:
                #078dff
        }

        .btn {
            border: var(--bs-btn-border-width) solid #ed0001;
        }

        .toast {
            width: 100%;
            max-width: 100%;
            position: relative;
            transform: none !important;
            left: 0 !important;
            top: 0;
            margin: auto;
        }

        .vsb {
            opacity: 1
        }

        .toast:not(.show) {
            display: block
        }

        #spinwhel {
            padding: 10px;
            border: 1px solid #ed0001
        }

        .wheelContainer {
            left: 60%;
            font-size: 13px;
            max-width: 604px;
        }

        @media only screen and (min-width:801px) {
            body {
                zoom: 1.3
            }

            .toast p,
            .toast span {
                font-size: 25px;
                line-height: 30px
            }
        }

        .pegContainer path,
        .shape .gradient-bg {
            display: none;
        }

        .spinBtn2 {
            display: none
        }

        #header-shape-gradient {
            --color-stop: #f12c06;
            --color-bot: #faed34
        }

        .wheelSVG {
            position: relative;
            overflow: visible;
            width: 100%;
            left: 0 !important;
            height: auto;
            transform: none !important;
        }

        @media only screen and (max-width:768px) {

            body,
            html {
                width: 100% !important;
                height: auto !important;
                overflow-x: hidden !important;
                overflow-y: auto !important;
                background: url({{ $settings->background_mobile }}) center/100% 100% no-repeat fixed #222
            }

            .logo-web-mob {
                display: block;
                margin-top: 20px;
                width: 65%;
                /* Atur lebar 65% */
                margin: 20px auto 0;
            }

            .logo-web {
                display: none;
            }

            .row.mzd {
                margin-top: -50px;
            }

            .mb-40 {
                margin-bottom: 41px;
            }

            .wheelSVG {
                position: absolute;
                overflow: visible;
                width: 134%;
                height: auto;
                margin-top: -50px;
                left: 50% !important;
                transform: translate(-57%, 0%) matrix(1, 0, 0, 1, 0, 0) !important;
            }

            #redeem_container {
                margin-top: 420px;
                margin-bottom: 100px;
                width: 100%;
            }

            .ticket-container {
                margin-top: -67px;
                transform: scale(0.8);
                text-align: center;
                max-width: 100%;
            }

            .toast {
                top: 0;
                min-height: 0
            }

            .wheelContainer {
                margin-top: 30px;
                width: 100%;
                max-width: 326px;
                left: 58%;
            }
        }

        .op-0,
        .shape {
            display: none
        }

        .wheelOutline {
            filter: drop-shadow(2px 4px 6px black)
        }

        #floatcenter {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .6);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999
        }

        #welcome {
            width: 582px;
            max-width: 90%;
            top: 50%;
            left: 50%;
            padding: 20px;
            padding-left: 0;
            padding-right: 0;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            text-align: center;
            line-height: 1.75;
            color: #ccc;
            border-radius: 30px;
        }

        #agree {
            padding: 6px;
            padding-top: 3px;
            cursor: pointer;
            background: #ed0001;
            color: #f0f0f0;
            font-weight: 700;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #agree:hover {
            background: #000
        }

        h2 {
            color: #26d200;
            margin-bottom: 20px
        }

        .form-control {
            margin-top: 20px
        }

        .d-none,
        .sa-icon {
            display: none !important
        }

        #ilg {
            margin-top: 10px
        }

        .sweet-alert {
            background-color: #141414
        }

        #alert,
        #congrats {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .35);
            transition-duration: .25s;
            z-index: 9
        }

        .confetti {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0
        }

        #confetti2 {
            left: initial;
            right: 0
        }

        @media only screen and (min-width:1024px) {

            #alert-message,
            #congrats-message {
                width: initial
            }

            .confetti {
                width: 50%
            }
        }

        #alert-message,
        #congrats-message {
            background: #1a1a1a;
            color: #2ddf06;
            padding: 20px;
            width: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        #close-alert,
        #close-congrats {
            font-size: 2em;
            position: absolute;
            right: -10px;
            top: -15px;
            background: #062b08;
            color: #fff;
            cursor: pointer;
            border-radius: 100%;
            width: 35px;
            height: 35px;
            line-height: 30px;
            text-align: center
        }

        #alert.hidden,
        #congrats.hidden,
        .confetti.hidden {
            transition-duration: .25s;
            -webkit-transition-duration: .25s;
            -moz-transition-duration: .25s;
            opacity: 0;
            z-index: -1
        }

        .blink {
            font-size: 18px;
            text-transform: capitalize;
            text-decoration: blink;
            font-weight: 700;
            -webkit-animation-name: blinker;
            -webkit-animation-duration: .6s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-timing-function: ease-in-out;
            -webkit-animation-direction: alternate
        }

        @-webkit-keyframes blinker {
            from {
                color: red
            }

            to {
                color: #ff0
            }
        }

        #ticket h2,
        #welcome h1 {
            background: radial-gradient(ellipse at bottom, #fff, transparent, transparent) 50% 100%/50% 50% no-repeat;
            font-size: 1.8rem;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            -webkit-animation: 1s ease-in .2s forwards reveal, 2.5s linear 2s infinite glow;
            animation: 1s ease-in .2s forwards reveal, 2.5s linear 2s infinite glow
        }

        @-webkit-keyframes reveal {
            80% {
                letter-spacing: 8px
            }

            100% {
                background-size: 300% 300%
            }
        }

        @keyframes reveal {
            80% {
                letter-spacing: 8px
            }

            100% {
                background-size: 300% 300%
            }
        }

        @-webkit-keyframes glow {
            40% {
                text-shadow: 0 0 8px #fff
            }
        }

        @keyframes glow {
            40% {
                text-shadow: 0 0 8px #fff
            }
        }

        #welcome p {
            text-align: justify
        }

        #welcome img {
            max-width: 210px
        }

        #form-wrapper form {
            clear: both;
            font-family: 'Fjalla One', Arial, sand-serif;
            margin: 23px;
            font-size: 30px;
            color: #ededed;
            letter-spacing: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            line-height: 32px;
            -webkit-transition: line-height .2s;
            transition: line-height .2s
        }

        .popup-container {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 1000;
            background: #080808b0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            zoom: 0.8;
        }

        .swal2-close {
            margin-bottom: 0 !important;
            box-shadow: none;
        }

        .swal2-container {
            zoom: 0.8;
        }

        .popup-body {
            width: 347px;
            height: 600px;
            margin: 2% auto;
            background: #313131;
            border-radius: 0px;
            color: white;
        }

        @media (max-width: 992px) {
            .popup-body {
                margin: 10% auto;
            }
        }

        .popup-header {
            height: 48px;
            width: 100%;
            background: #ebe41c;
            float: left;
            color: #000;
        }

        .popup-close {
            cursor: pointer;
            width: 36px;
            height: 36px;
            background: white;
            color: black;
            float: right;
            padding: 5px;
            border-radius: 100px;
            position: absolute;
            margin-top: -10px;
            margin-left: -9px;
        }

        .popup-container-ads {
            background-repeat: no-repeat;
            margin: 10% auto;
            border-radius: 18px;
            background-size: 100%;
        }

        ::-webkit-scrollbar {
            width: 3px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        @keyframes ld-shake-v {
            0% {
                animation-timing-function: cubic-bezier(0.1441, 0.1912, 0.6583, 1.1029);
                transform: translate(0, 0);
            }

            31% {
                animation-timing-function: cubic-bezier(0.0667, 0.1419, 0.6667, 1.1415);
                transform: translate(0, 7.800000000000001%);
            }

            45% {
                animation-timing-function: cubic-bezier(0.0542, 0.1151, 0.5697, 1.181);
                transform: translate(0, -4.680000000000001%);
            }

            59% {
                animation-timing-function: cubic-bezier(0.0497, 0.1058, 0.4541, 1.231);
                transform: translate(0, 2.8100000000000005%);
            }

            73% {
                animation-timing-function: cubic-bezier(0.0808, 0.1711, 0.4109, 1.2519);
                transform: translate(0, -1.6800000000000002%);
            }

            87% {
                animation-timing-function: cubic-bezier(0.2073, 0.3705, 0.4064, 0.8839);
                transform: translate(0, 1.01%);
            }

            100% {
                transform: translate(0, -0.78%);
            }
        }

        .livechat {
            width: 80px;
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 99999;
        }

        .livechat:hover {
            filter: brightness(1.3);
            -webkit-filter: brightness(1.3);
            transition: all 0.45s ease-in-out;
        }

        .livechat img {
            display: block;
            width: 100%;
            filter: drop-shadow(4px 6px 8px black);
            animation: ld-shake-v 1s infinite linear;
        }

        sup {
            top: -0.5em;
        }
    </style>
</head>

<body>
    <div style="position:absolute;top:0;left:0;width:100%;height:100%;">
        <img src="{{ asset('uploads/confetti.gif') }}" id="confetti1" class="confetti hidden">
        <img src="{{ asset('uploads/confetti.gif') }}" id="confetti2" class="confetti hidden">
        <img class="logo-web-mob text-center" src="{{ $settings->logo }}">
        <div class="row mzd">

            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="shape">
                <defs>
                    <linearGradient id="header-shape-gradient" x2="0.35" y2="1">
                        <stop offset="0%" stop-color="var(--color-stop)" />
                        <stop offset="30%" stop-color="var(--color-stop)" />
                        <stop offset="100%" stop-color="var(--color-bot)" />
                    </linearGradient>
                </defs>
                <g>
                    <polygon class="gradient-bg" points="0,0 100,0 0,66" />
                </g>
            </svg>
            <div class="col-md-6 mb-40">
                <div class="wheelContainer" style="display:none">
                    <svg class="wheelSVG" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" text-rendering="optimizeSpeed">
                        <defs>
                            <filter id="shadow" x="-100%" y="-100%" width="550%" height="550%">
                                <feOffset in="SourceAlpha" dx="0" dy="0" result="offsetOut"></feOffset>
                                <feGaussianBlur stdDeviation="9" in="offsetOut" result="drop" />
                                <feColorMatrix in="drop" result="color-out" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 .3 0" />
                                <feBlend in="SourceGraphic" in2="color-out" mode="normal" />
                            </filter>
                        </defs>
                        <g class="mainContainer">
                            <g class="wheel" />
                        </g>
                        <g class="centerCircle" />
                        <g class="wheelOutline" />
                        <g class="pegContainer">
                            <path class="peg" fill="#EEEEEE"
                                d="M22.139,0C5.623,0-1.523,15.572,0.269,27.037c3.392,21.707,21.87,42.232,21.87,42.232s18.478-20.525,21.87-42.232C45.801,15.572,38.623,0,22.139,0z" />
                        </g>
                        <g class="valueContainer" />
                        <image xlink:href="{{ $settings->spinner }}" width="1174" height="968" x="-73" y="-100">
                        </image>
                    </svg>
                    <div
                        style="position: absolute;box-shadow: rgba(21, 21, 21, 0.5) 0px 0px 20px; left: 50%; transform: translate(-50%, 0%) matrix(1, 0, 0, 1, 0, 158.75); visibility: visible; background-color: rgb(34 36 33); opacity: 1;">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="redeem_container" class="justify-content-center" style="display:none">
                    <div id="ticket">
                        <div class="ticket-container">
                            <img class="logo-web text-center" src="{{ $settings->logo }}">
                            <div class="toast">
                                <p></p>
                            </div>
                            <form id='form' method='post'>
                                <input type='text' class='' required name='username' placeholder='Username'
                                    id='username' value="{{ auth()->user()->username }}" autocomplete="false"
                                    readonly><input type='text' class='' required name='kupon_number'
                                    placeholder='Spin Count' id='kupon_number' autocomplete="false"
                                    value="Spin Left : {{ auth()->user()->spin_quota }}" readonly>
                                <small id="error_message_voucher" class="text-warning form-label mb-3"></small>
                                <br>
                                <button type="submit" id="submit" class="submit"
                                    style="margin-top: 10px;"><b>{{ $settings->spin_text }}</b></button>
                                <div class="row" style="display: none;">
                                    <div class="col-md-6" style="margin-top: 20px;"><button id='submit'
                                            type="submit" class="submit"
                                            onclick='getHistory()'><b>{{ $settings->history_text }}</b></button>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px;"><button type="submit"
                                            name="submit" class="submit"
                                            onclick="getRewardLevel()"><b>{{ $settings->prize_text }}</b></button>
                                    </div>
                                </div>
                            </form>
                            <button id="spinwhel" class="spinBtn d-none">SPIN!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="popup-container-history" class="popup-container" style="display: none;">
            <div id="popup-body" class="popup-body" style="height: 563px;">
                <div class="popup-close" onclick="close_popup_history()">
                    <center><b>x</b></center>
                </div>
                <div id="popup-header" class="popup-header">
                    <center>
                        <h6 id="title-popup-win" style="padding: 10px;"><b>Last 50 Spin History List</b></h6>
                    </center>
                </div>

                <div style="overflow-y: scroll;height: 91.5%;width: 100%;">
                    <div style="padding: 5px;">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th align="center" valign="center" style="width: 10%; text-align: center;">NO
                                    </th>
                                    <th align="center" valign="center" style="width: 50%;">USERNAME</th>
                                    <th align="center" valign="center" style="width: 40%; text-align: center;">WINNER
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="history-container">
                                <tr>
                                    <td style="width: 10%; padding: 5px; text-align: center;">1</td>
                                    <td style="width: 50%; padding: 5px;">Username</td>
                                    <td style="width: 40%; padding: 5px; text-align: center;">IDR 18.000,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <audio src="https://files.linkcdn.site/ls/mjsong.mp4" id="my_audio" loop="loop" ></audio>
        <audio src="{{ asset('themes/front/mzdspin/sound/bonus.mp3') }}" id="bonus" loop="loop"></audio>
        <audio id="congratsAudio" src="{{ asset('themes/front/mzdspin/sound/winning.mp3') }}"></audio>
        <div id="alert" class="hidden">
            <div id="alert-message">
                <div id="close-alert">&times;</div>
                <span id="alert-text"></span>
            </div>
        </div>
        <script type="text/javascript">
            function MouseSound() {
                var fileUrl = "/uploads/touch.mp3";
                var audio = new Audio(fileUrl);
                audio.volume = 1;
                audio.play();
            }

            /*window.addEventListener('click', MouseSound , false);*/
            // var isNS = (navigator.appName == 'Netscape') ? 1 : 0;
            // if (navigator.appName == 'Netscape') document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);

            function mischandler() {
                return false;
            }

            // function mousehandler(e) {
            //     var myevent = (isNS) ? e : event;
            //     var eventbutton = (isNS) ? myevent.which : myevent.button;
            //     if ((eventbutton == 2) || (eventbutton == 3)) {
            //         return false;
            //     }
            // }
            // document.oncontextmenu = mischandler;
            // document.onmousedown = mousehandler;
            // document.onmouseup = mousehandler;
        </script>
        <script src='{{ asset('themes/front/mzdspin/js/mzdCore.js') }}'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/plugins/TextPlugin.min.js'></script>
        <script src='{{ asset('themes/front/mzdspin/js/mzdSpin.js') }}'></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(function() {
                $(".wheelContainer, #redeem_container").fadeIn(2000);
                $("#welcome, .livechat").fadeIn(1000);

                document.getElementById('my_audio').play();

                const baseUrl = window.location.origin;
                const agentId = "{{ auth()->user()->agent_id }}";
                const token = "{{ csrf_token() }}";

                // Ambil data JSON
                const loadJSON = (cb) => $.getJSON("/games_luckywheel_data", cb);
                const loadJSON2 = (cb, id) => $.getJSON(`/startspin`, cb);

                // Validasi form
                async function formValidation() {
                    $("#submit").prop("disabled", true);
                    $("#error_message_voucher").text("Please wait...");

                    let username = $("#username").val(),
                        coupon = $("#kupon_number").val();

                    let res = await $.post(`${baseUrl}/spin/check`, {
                        username,
                        agent: agentId,
                        coupon,
                        _token: token
                    });

                    let bonusSound = new Audio("{{ asset('themes/front/mzdspin/sound/bonus.mp3') }}"),
                        spinSound = new Audio("{{ asset('themes/front/mzdspin/sound/spins.mp3') }}");

                    if (res.status == 'success') {
                        localStorage.setItem("spin-ticket", JSON.stringify({
                            username,
                            coupon
                        }));
                        spinSound.play();
                        $("#bonus")[0].play();
                        initLoggedin(res);
                        $("#spinwhel").removeClass("d-none");
                        $("#form").addClass("d-none");
                    } else {
                        $("#alert").removeClass("hidden");
                        $("#close-alert").on("click", () => $("#alert").addClass("hidden"));
                        $("#alert-text").text(res.message);
                        $("#error_message_voucher").empty();
                        $("#submit").prop("disabled", false);
                        window.location.reload();
                    }
                }

                $("#form").on("submit", function(e) {
                    e.preventDefault();

                    formValidation();
                });

                window.close_popup_history = () => {
                    $("button[name=history]").prop('disabled', false);
                    $("#popup-container-history").fadeOut(500);
                };

                function myResult(e) {
                    let n = document.getElementById("congratsAudio");
                    let s = document.getElementById("spinwhel");
                    var t = document.getElementById("confetti1"),
                        a = document.getElementById("confetti2");
                    s.style.display = 'none';
                    n.currentTime = 3;
                    n.play();
                    document.getElementById('bonus').pause();
                    t.classList.remove("hidden");
                    console.log(e)
                    a.classList.remove("hidden");
                    if (e.win) {
                        $.post("/updateResult", {
                            user: "{{ auth()->user()->extplayer }}",
                            _token: token,
                            prize: e.win
                        });
                    }
                   setTimeout(function() {
    location.reload();
}, 5000);
                }

                function myResult2(e) {
                    console.log("not logged in")
                }

                function myError(e) {
                    console.log("Spin Count: " + e.spinCount + " - Message: " + e.msg)
                }

                function myError2(e) {
                    console.log("not logged in")
                }

                function myGameEnd(e) {
                    console.log(e)
                }

                function init() {
                    loadJSON(function(e) {
                        var spinBtn = document.querySelector(".submit");
                        new Spin2WinWheel().init({
                            data: e,
                            onResult: myResult,
                            onGameEnd: myGameEnd,
                            onError: myError2,
                            spinTrigger: spinBtn
                        })
                    });
                }


                function initLoggedin(e) {
                    loadJSON2(function(e) {
                        var spinBtn = document.querySelector(".submit");
                        new Spin2WinWheel().init({
                            data: e,
                            onResult: myResult,
                            onGameEnd: myGameEnd,
                            onError: myError2,
                            spinTrigger: spinBtn
                        })
                    }, e);
                }

                init();

            });
        </script>

</body>

</html>
