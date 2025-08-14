@mobile
    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes'>
        <meta name="theme-color" content="#49328D">
        <meta name="msapplication-TileColor" content="#49328D">
        <meta name="msapplication-navbutton-color" content="#49328D">
        <meta name="apple-mobile-web-app-status-bar-style" content="#49328D">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ general()->icon_web }}">
        <!-- Canonical -->
        <link rel="canonical" href="{{ url('/') }}" />
        <!-- End Canonical -->
        <meta name="description" itemprop="description" content="{{ general()->deskripsi }}" />
        <meta name="keywords" content="{{ general()->keyword }}" />
        <title>{{ general()->title }}</title>
        <!-- Custom Tags -->
        <link rel="canonical" href="{{ url('/') }}">
        <title>{{ general()->title }}</title>
        <meta name="description" content="{{ general()->deskripsi }}" />
        <meta content="true" name="HandheldFriendly" />
        <meta content="width" name="MobileOptimized" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:site_name" content="{{ general()->title }}" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:description" content="{{ general()->deskripsi }}" />
        <meta name="twitter:title" content="{{ general()->title }}" />
        <meta name="twitter:site" content="@" />
        <meta name="copyright" content="{{ general()->title }}">
        <meta name="robots" content="index, follow" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- End Custom Tags -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "{{ general()->title }}",
            "url": "{{ url('/') }}"
        }
    </script>
        <link rel="preload" as="font"
            href="{{ asset('assets/themes/9/font/font-awesome/webfonts/fa-solid-900.woff2') }}" type="font/woff2"
            crossorigin="anonymous">
        <link rel="preload" as="font"
            href="{{ asset('assets/themes/9/font/font-awesome/webfonts/fa-brands-400.woff2') }}" type="font/woff2"
            crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/9/css/global.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/9/font/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" id="templateStyle" type="text/css"
            href="{{ asset('assets/custom/css/' . general()->warna . '.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/9/sass/custom7ee6.css?v=2.0.1690') }}">

        {!! general()->costum_script !!}
    </head>

    <body>
        <style>
            .popup {
                position: relative;
                cursor: pointer;
            }

            .popup .popuptext {
                visibility: hidden;
                width: 170px;
                background: radial-gradient(circle, #00FF00 50%, #006400 100%);
                color: black;
                text-align: center;
                border-radius: 4px;
                padding: 4px 0;
                position: fixed;
                z-index: 9999;
                top: 63px;
                left: 100px;
                margin-left: -80px;
                font-size: 12px;
                font-weight: bold;
            }

            .popup .show {
                visibility: visible;
                -webkit-animation: fadeinout 6s cubic-bezier(0.18, 0.89, 0.32, 1.28) forwards;
                animation: fadeinout 6s cubic-bezier(0.18, 0.89, 0.32, 1.28) forwards;
            }

            #imageid {
                float: left;
                width: 15%;
            }

            @-webkit-keyframes fadeinout {

                0%,
                100% {
                    opacity: 0;
                }

                16.67%,
                83.33% {
                    opacity: 1;
                }
            }

            @keyframes fadeinout {

                0%,
                100% {
                    opacity: 0;
                }

                16.67%,
                83.33% {
                    opacity: 1;
                }
            }

            @media only screen and (max-width: 600px) {
                .popup .popuptext {
                    margin: unset;
                    top: 88%;
                    left: 85px;
                    transform: translate(-50%, -50%);
                }
            }
        </style>
        <div class="popup">
            <div class="popuptext" id="myPopup">
                <img id="imageid">
                <div id="winner-title"><img id="imageid"><strong>@lang('public.congrat')</strong></div>
                <div id="winner-info"></div>
            </div>
        </div>
        <script>
            let popupCount = 0; // Counter to track the number of popups shown
            const maxPopups = 3; // Maximum number of popups to show

            function getRandomRoundedInt(min, max) {
                const randomNumber = Math.floor(Math.random() * (max - min)) + min;
                return Math.round(randomNumber / 10) * 10; // Round to the nearest 10
            }

            function generateString(characters, length) {
                return Array.from({
                    length
                }, () => characters[Math.floor(Math.random() * characters.length)]).join('');
            }

            function generateAmounts() {
                const amounts = [];

                // 86% values between 70 and 1000 (86 entries)
                for (let i = 0; i < 86; i++) {
                    amounts.push(`RM${getRandomRoundedInt(70, 1000)}.00`);
                }

                // 8% values between 1000 and 2000 (8 entries)
                for (let i = 0; i < 8; i++) {
                    amounts.push(`RM${getRandomRoundedInt(1000, 2000)}.00`);
                }

                // 4% values between 2000 and 4000 (4 entries)
                for (let i = 0; i < 4; i++) {
                    amounts.push(`RM${getRandomRoundedInt(2000, 4000)}.00`);
                }

                // 2% values between 4000 and 35000 (2 entries)
                for (let i = 0; i < 2; i++) {
                    amounts.push(`RM${getRandomRoundedInt(4000, 35000)}.00`);
                }

                return amounts;
            }

            function showPopup() {
                if (popupCount >= maxPopups) {
                    clearInterval(popupInterval); // Stop showing popups after the limit is reached
                    return;
                }

                popupCount++; // Increment the popup count

                const amounts = generateAmounts();
                const randomAmount = amounts[getRandomRoundedInt(0, amounts.length)]; // Use getRandomRoundedInt here

                // Generate the username
                const visiblePart = generateString('bcdfghjklmnpqrstvwxyz', 2); // First 2 visible alphabets
                const hiddenPart = '*****'; // Middle 5 characters as *
                const lastChar = generateString('bcdfghjklmnpqrstvwxyz1234567890', 1); // Last character (number or alphabet)
                const username = visiblePart + hiddenPart + lastChar; // Combine all parts

                // Update the winner info
                document.getElementById("winner-info").innerHTML = `${username} @lang('public.withdraw') ${randomAmount}`;

                // Show the popup
                const popup = document.getElementById("myPopup");
                popup.classList.add("show");

                // Hide the popup after 6 seconds
                setTimeout(() => popup.classList.remove("show"), 6000);
            }

            // Show popup every 8 seconds, up to a maximum of 10 times
            const popupInterval = setInterval(showPopup, 8000);
        </script>


        @include('frontend.layouts.mobile')

        <!-- Account Balance -->

        @include('frontend.layouts.sidenav')

        @yield('content')

        <a href="javascript:;" name="spinwheel-play">
            <div class="btn-spinwheel">
                <img src="https://images.linkcdn.cloud/global/icon-footer/spinwheel.webp" width="90px" height="90px"
                    alt="Spinwheel">
            </div>
        </a>


        @guest
            <div class="footer-mobile">
                <div class="footer-mobile__login">
                    <button class="login-button" type="button" type="button" data-toggle="modal"
                        data-target="#loginModal">@lang('public.login-button')</button>
                    <button class="register-button"
                        onclick="window.location.href = '{{ route('register') }}'">@lang('public.register-button')</button>
                </div>
            </div>
        @endguest

        @auth
            <div class="footer-mobile">
                <div class="footer-mobile__nav">
                    <a class="nav-link @if (url()->current() == url('/')) active @endif" href="{{ url('/') }}">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/home.svg') }}" width="80">
                            </div>
                            <div class="nav-label">@lang('public.home')</div>
                        </div>
                    </a>
                    <a class="nav-link @if (url()->current() == route('transaksi')) active @endif" href="{{ route('transaksi') }}">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="nav-label">@lang('public.deposit')</div>
                        </div>
                    </a>
                    <a class="nav-link @if (url()->current() == route('promotion')) active @endif" href="{{ route('promotion') }}">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <img src="{{ asset('assets/themes/9/img/theme2-icons/bonus.svg') }}" width="80">
                            </div>
                            <div class="nav-label">@lang('public.bonus')</div>
                        </div>
                    </a>
                    <a class="nav-link @if (url()->current() == route('profile')) active @endif" href="{{ route('profile') }}">
                        <div class="nav-item">
                            <div class="nav-icon member-icon">
                                <img src="{{ asset('assets/themes/9/img/user-status/New Player.svg') }}" alt="">
                            </div>
                            <div class="nav-label">@lang('public.akun_saya')</div>
                        </div>
                    </a>
                    <a class="nav-link " href="https://wa.me/{{ contact()->no_whatsapp }}/" target="_blank">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="nav-label">@lang('public.live_chat')</div>
                        </div>
                    </a>
                </div>
            </div>
        @endauth


        <!-- Modal -->
        <div class="modal fade custom-popup" id="loginModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('public.formulir_login')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="modal-body-form">
                            <form name="login-form">
                                <div class="form-item">
                                    <div class="item-title">@lang('public.username_login')</div>
                                    <input class="form-control input-custom" value="" minlength="1"
                                        maxlength="25" name="usernameLogin" style="text-transform: lowercase"
                                        type="text" placeholder="@lang('public.username_login')" autocomplete="off" required>
                                </div>
                                <div class="form-item">
                                    <div class="item-title">@lang('public.password_login')</div>
                                    <input class="form-control input-custom" value="" minlength="5"
                                        maxlength="50" name="passwordLogin" type="password"
                                        placeholder="@lang('public.password_login')" autocomplete="off" required>
                                </div>
                                <div class="form-button">
                                    <button name="buttonLogin" type="submit"
                                        class="btn-custom">@lang('public.login-button')</button>
                                </div>
                                <div class="form-register">
                                    <span>@lang('public.dont_acc'), <a
                                            href="{{ route('register') }}">@lang('public.register-button')!</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div align="center" id="foot_banner1"
            style="
    z-index: 9999;
    width: 165px;
    margin: 0 auto;
    overflow: hidden;
    display: scroll;
    position: fixed;
    top: 270px;
    left: 2px;
  ">
        </div>


        <script src="{{ asset('assets/themes/9/js/vendor.js') }}"></script>
        <script src="{{ asset('assets/themes/9/js/global7ee6.js?v=2.0.1690') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/themes/9/js/vendor-auth.js') }}"></script>
        <script src="{{ asset('assets/themes/9/js/index7ee6.js?v=2.0.1690') }}"></script>
        <script src="{{ asset('assets/themes/9/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/clipboard.min.js') }}"></script>
        <script>
            var clipboard = new ClipboardJS('.btn');

            clipboard.on('success', function(e) {
                console.info('Action:', e.action);
                console.info('Text:', e.text);
                console.info('Trigger:', e.trigger);

                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                console.error('Action:', e.action);
                console.error('Trigger:', e.trigger);
            });
        </script>

        @guest
            <script>
                $("a[name=spinwheel-play]").on("click", function(event) {
                    event.preventDefault();
                    return Swal.fire({
                        icon: 'info',
                        title: "Perhatian.",
                        html: "Something wrong, please try again later.",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                });
            </script>
        @endguest

        @auth
            <script>
                $("a[name=spinwheel-play]").on("click", function(event) {
                    event.preventDefault();
                    var win = window.open('', 'spinwheel');
                    win.location = "{{ url('games_luckywheel') }}";
                });
            </script>
        @endauth

        <script>
            function numberAmount(number) {
                let format = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2
                }).format(number)
                return format.toString()
            }

            $(document).ready(function() {
                $(this).scrollTop(0);

                $(".routeTo").on("click", function() {
                    const url = $(this).data("route")
                    window.location.replace(url)
                });

                @auth

                function reloadBalance() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('api.balance') }}",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success == true) {
                                $('span[name*=mainBalance]').text(Number(response.balance).toFixed(2));
                                $('span[id=balance-common-total]').text(Number(response.balance).toFixed(
                                    2));
                            }
                        }
                    });
                }



                reloadBalance();
                $("a[name=refreshWallet]").on("click", function(e) {
                    e.preventDefault();
                    $('span[name*=mainBalance]').html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                    );
                    reloadBalance();
                })
            @endauth
            });

            window.addEventListener("popstate", (event) => {
                location.reload();
            });

            $("a[name=playGames]").on("click", function() {
                fbq('trackCustom', "PlayGame")
            });
        </script>
        <script>
            $(document).ready(function() {
                $(this).scrollTop(0);

                $('#homePopup').modal('show');
            });
            $('#mobilePageLoadingBar').hide()
            window.onpopstate = function() {
                let path = window.location.pathname;
                routeNav(path);
            }

            function handler(e) {
                e.stopPropagation();
                e.preventDefault();
            }


            function routeNav(path) {
                if (path == window.location.pathname) return;
                history.pushState(null, null, path);
                $(".sidenav").removeClass('sidenav-open');
                $(".modal").modal("hide");
                $("#overlay").hide();
                let url = "{{ url('/') }}" + window.location.pathname;
                if (path == '/') {
                    window.location.replace("{{ url('/') }}")
                    return false;
                }
                $(".header-form>a").removeClass('active')
                let elem = document.getElementById("mobilePageLoadingBar");
                let width = 1;
                $.ajax({
                    type: "GET",
                    url: url,
                    beforeSend: () => {
                        $('#mobilePageLoadingBar').show()
                        document.addEventListener("click", handler, true);
                        let id = setInterval(frame, 100);

                        function frame() {
                            if (width >= 100) {
                                clearInterval(id);
                            } else {
                                width++;
                                elem.style.width = width + '%';
                            }
                        }
                    },
                    success: function(page) {
                        document.removeEventListener("click", handler, true);
                        width = 100;
                        elem.style.width = width + '%';
                        $("main[id=main-route]").empty().append(page);
                        $("title").text($("#title-seo").text());
                        const script = $("scope-script").html()
                        $("scope-script").remove()
                        setTimeout(() => {
                            $("html, body").animate({
                                scrollTop: "0"
                            }, 1000);
                            $('#mobilePageLoadingBar').hide()
                            elem.style.width = '1%';
                            $("custom-script").empty().append(script);
                            filterGameSelection('all')
                        }, 500);
                    },
                    error: function(e) {
                        window.location.replace("{{ url('/') }}")
                        return false;
                    }
                });
            }


            $('.show-popup-language').click(function() {
                $('.sidenav').removeClass('sidenav-open');
                document.getElementById("overlay").style.display = "none";
            });

            $('.show-popup-currency').click(function() {
                $('.sidenav').removeClass('sidenav-open');
                document.getElementById("overlay").style.display = "none";
            });

            $('.voucher-button').click(function() {
                $('.sidenav').removeClass('sidenav-open');
                document.getElementById("overlay").style.display = "none";
            });

            $('.sidenav__close').click(function() {
                $('.sidenav').removeClass('sidenav-open');
                document.getElementById("overlay").style.display = "none";
            });

            function customScrollbar() {
                const categoryContainerSwiper = new Swiper('.header-mobile-swiper', {
                    direction: "horizontal",
                    slidesPerView: "auto",
                    freeMode: true,
                    spaceBetween: 5,
                });
            }

            customScrollbar()

            function jackpotHome() {
                var amount = document.getElementById('amount-jackpot');
                var start = new Date("July 30, 2000 00:00:00");
                var current;
                update();

                // Increase the interval to slow down the updates (500 milliseconds)
                setInterval(update, 900);

                function update() {
                    var current = ((new Date() - start) / (24 * 3600 * 500)); // Adjust the denominator as needed
                    var num2 = Math.floor((Math.random() * 2) + 1);
                    current = current * 10000 + num2;
                    if (amount) amount.innerText = formatMoney(current);
                }

                function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
                    try {
                        decimalCount = Math.abs(decimalCount);
                        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

                        const negativeSign = amount < 0 ? "-" : "";

                        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                        let j = (i.length > 3) ? i.length % 3 : 0;

                        return negativeSign +
                            (j ? i.substr(0, j) + thousands : '') +
                            i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) +
                            (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
                    } catch (e) {
                        console.log(e)
                    }
                }
            }

            jackpotHome();

            function openHeaderWidget() {
                var headerWidget = document.getElementById("header-widget")

                if (headerWidget.classList.contains('active')) {
                    headerWidget.classList.remove('active')
                } else {
                    headerWidget.classList.add('active')
                }
            }
        </script>
        <script>
            function maxInputAmount(wallet) {
                const amountWd = $("#withdrawAmount")
                const maxWd = parseFloat(amountWd.attr('max'))
                let walletAvail = parseFloat($(`#${wallet}Desc`).text())
                walletAvail = isNaN(walletAvail) ? 0 : walletAvail;
                if (walletAvail != 0) {
                    if (walletAvail < maxWd) {
                        amountWd.attr('max', walletAvail)
                    }
                }
            }

            window.showError = (title, message) => {
                return Swal.fire({
                    icon: 'info',
                    title: title,
                    html: message,
                    timerProgressBar: true,
                    timer: 5000,
                });
            }

            $(".game-search>.form-control-sm").on("focus", function() {
                if ($(this).val().length == 0) {
                    $(".game-search").width('100%');
                    $(".form-control-sm").width('100%');
                }
            })

            $(".game-search>.form-control-sm").on("focusout", function() {
                if ($(this).val().length == 0) {
                    $(".game-search").width('');
                    $(".form-control-sm").width('');
                }
            })


            $("form[name=login-form]").on('submit', function(e) {
                e.preventDefault();
                let formData = {};
                $.each($(this).serializeArray(), function(i, val) {
                    formData[val.name] = val.value
                });
                formData.usernameLogin = formData.usernameLogin.replace(/\s/g, '');
                let btnTxt = $("button[name=buttonLogin]").html()
                $.ajax({
                    url: "{{ route('login') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        username: formData.usernameLogin,
                        password: formData.passwordLogin
                    },
                    beforeSend: function() {
                        $("input[name='usernameLogin']").attr('readonly', true)
                        $("input[name='passwordLogin']").attr('readonly', true)
                        $("button[name=buttonLogin]").attr('disabled', true)
                        $("button[name=buttonLogin]").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        );
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            let msg = '';
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                timer: 3000,
                                title: "@lang('public.login_success')"
                            });
                            if (msg == '') {
                                setTimeout(function() {
                                    location.reload();
                                }, 300);
                            }
                        } else if (data.code == 250) {
                            let msg = '';
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                timer: 3000,
                                title: "@lang('public.msg_sorry')"
                            });
                            if (msg == '') {
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        } else {
                            let msg = '';
                            $.each(data.errors, function(index, valueOfElement) {
                                msg += valueOfElement + '<br />'
                            });
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                timer: 3000,
                                title: "@lang('public.msg_sorry')"
                            });
                            if (msg == '') {
                                location.reload();
                            }
                            $("input[name='usernameLogin']").removeAttr('readonly')
                            $("input[name='passwordLogin']").removeAttr('readonly')
                            $("input[name='passwordLogin']").val('')
                            $("button[name=buttonLogin]").removeAttr('disabled')
                            $("button[name=buttonLogin]").html(btnTxt)
                        }
                    },
                    error: function(data) {
                        let msg = '';
                        $.each(data.responseJSON.errors, function(index, valueOfElement) {
                            msg += valueOfElement + '<br />'
                        });
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: "@lang('public.wrong_password')"
                        });
                        if (msg == '') {
                            location.reload();
                        }
                        $("input[name='usernameLogin']").removeAttr('readonly')
                        $("input[name='passwordLogin']").removeAttr('readonly')
                        $("input[name='usernameLogin']").val('')
                        $("input[name='passwordLogin']").val('')
                        $("button[name=buttonLogin]").removeAttr('disabled')
                        $("button[name=buttonLogin]").html(btnTxt)
                    }
                });
            });

            function gameAlert() {
                return Swal.fire({
                    icon: 'info',
                    title: "@lang('public.perhatian')",
                    html: "@lang('public.loginto_play')",
                    timerProgressBar: true,
                    timer: 5000,
                });
            }

            function gamemaintenance() {
                return Swal.fire({
                    icon: 'info',
                    title: "Opps.",
                    html: "@lang('public.maintenance')",
                    timerProgressBar: true,
                    timer: 5000,
                });
            }

            setInterval(() => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.cron') }}",
                    success: function(response) {
                        if (response.status == 'Success') {
                            console.log(response.status);
                        }
                    }
                });
            }, 5000);
        </script>

        @stack('script')


        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "Congrats.",
                    html: "{{ session('success') }}",
                    timer: 5000,
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "Opps.",
                    html: "{{ session('error') }}",
                    timer: 5000,
                });
            </script>
        @endif

        @if (session('loged'))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    timer: 3000,
                    title: "{{ session('loged') }}"
                });
            </script>
        @endif

        <div class="modal fade" id="AgeCheck" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="background: rgba(0, 0, 0, 0.51);padding-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content p-2" style="border-radius: 0;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img alt="WebsiteLogo"
                                src=https://cdn.dpd88.com/revplay1/Fkv1dAnCZobZrjeEQSfG1qHhPUY1sWHmlzQfsdBY.gif
                                width="250" class="d-block mx-auto" style="filter: drop-shadow(2px 2px 2px black);">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="announcement-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center font-weight-bold">VERIFICATION NOTICE</h3>
                                    <p class="text-justify">
                                    <ul>
                                        <p>By entering this website, you acknowledge and confirm: </p>
                                        <li>I am agree to <b>BOSSCLUB</b> terms and conditions.</li>
                                        <li>I am over the age of 21 and will comply with the above statement.</li>
                                    </ul>
                                    </p>
                                </div>
                                <a href="#" class="d-block mx-auto"><img
                                        src="https://images.linkcdn.cloud/global/default/contact/keppitfun.webp"
                                        alt="game responsibly" class="w-100"></a>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-5">
                                    <button type="button" class="btn btn-success btn-block"
                                        data-dismiss="modal">Enter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <custom-script>
        <script type="text/javascript">
            var mobileSwiperSlot = new Swiper('.mobile-swiper-slot', {
                centeredSlides: true,
                loop: true,
                effect: "coverflow",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: true,
                },
                breakpoints: {
                    600: {
                        slidesPerView: 4,
                    },
                    425: {
                        slidesPerView: 3,
                    },
                    320: {
                        slidesPerView: 2,
                    },
                },
            });

            var mobileSwiperCasino = new Swiper('.mobile-swiper-casino', {
                centeredSlides: true,
                loop: true,
                effect: "coverflow",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: true,
                },
                breakpoints: {
                    600: {
                        slidesPerView: 4,
                    },
                    425: {
                        slidesPerView: 3,
                    },
                    320: {
                        slidesPerView: 2,
                    },
                },
            });

            var swiperPromo = new Swiper('.mobile-swiper-promo', {
                slidesPerView: 4,
                breakpoints: {
                    1600: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--promo",
                    prevEl: ".navigation-prev--promo",
                },
            });
        </script>

        @stack('costum-sc')
    </custom-script>
@endmobile

@desktop
    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes'>
        <meta name="theme-color" content="#49328D">
        <meta name="msapplication-TileColor" content="#49328D">
        <meta name="msapplication-navbutton-color" content="#49328D">
        <meta name="apple-mobile-web-app-status-bar-style" content="#49328D">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ general()->icon_web }}">
        <!-- Canonical -->
        <link rel="canonical" href="{{ url('/') }}" />
        <!-- End Canonical -->
        <meta name="description" itemprop="description" content="{{ general()->deskripsi }}" />
        <meta name="keywords" content="{{ general()->keyword }}" />
        <title>{{ general()->title }}</title>
        <!-- Custom Tags -->
        <link rel="canonical" href="{{ url('/') }}">
        <link rel="amphtml" href="https://folkloresque.net/" />
        <title>{{ general()->title }}</title>
        <meta name="description" content="{{ general()->deskripsi }}" />
        <meta content="true" name="HandheldFriendly" />
        <meta content="width" name="MobileOptimized" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="../iili.io/dfTgF0Q.png">
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:site_name" content="{{ general()->title }}" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:description" content="{{ general()->deskripsi }}" />
        <meta name="twitter:title" content="{{ general()->title }}" />
        <meta name="twitter:site" content="@" />
        <meta name="twitter:image" content="../iili.io/dfTgF0Q.png" />
        <meta name="copyright" content="{{ general()->title }}">
        <meta name="robots" content="index, follow" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- End Custom Tags -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "{{ general()->title }}",
            "url": "{{ url('/') }}"
        }
    </script>
        <link rel="preload" as="font"
            href="{{ asset('assets/themes/9/font/font-awesome/webfonts/fa-solid-900.woff2') }}" type="font/woff2"
            crossorigin="anonymous">
        <link rel="preload" as="font"
            href="{{ asset('assets/themes/9/font/font-awesome/webfonts/fa-brands-400.woff2') }}" type="font/woff2"
            crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/9/css/global.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/9/font/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" id="templateStyle" type="text/css"
            href="{{ asset('assets/custom/css/' . general()->warna . '.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/9/sass/custom7ee6.css?v=2.0.1690') }}">
        <style>
            button.btn-copy {
                padding: 2px;
                color: #fff;
                background-color: #7d7d7d;
                border-color: #7d7d7d;
                border-top: solid 2px #7d7d7d;
                border-left: solid 2px #7d7d7d;
                border-right: solid 2px #7d7d7d;
                border-bottom: solid 2px #7d7d7d;
            }

            button.btn-copy:hover {
                background-color: #7d7d7d;
            }

            input#code:focus {
                outline: none !important;
            }

            .btn-circle {
                border-radius: 50%;
                position: relative;
                top: -37px;
                float: right;
                border-color: #7d7d7d;
            }
        </style>

        {!! general()->costum_script !!}
    </head>

    <body>
        <style>
            .popup {
                position: relative;
                cursor: pointer;
            }

            .popup .popuptext {
                visibility: hidden;
                width: 250px;
                background: radial-gradient(circle, #00FF00 50%, #006400 100%);
                color: black;
                text-align: center;
                border-radius: 4px;
                padding: 4px 0;
                position: fixed;
                z-index: 9999;
                top: 63px;
                left: 100px;
                margin-left: -80px;
                font-size: 14px;
                font-weight: bold;
            }

            .popup .show {
                visibility: visible;
                -webkit-animation: fadeinout 6s cubic-bezier(0.18, 0.89, 0.32, 1.28) forwards;
                animation: fadeinout 6s cubic-bezier(0.18, 0.89, 0.32, 1.28) forwards;
            }

            #imageid {
                float: left;
                width: 15%;
            }

            @-webkit-keyframes fadeinout {

                0%,
                100% {
                    opacity: 0;
                }

                16.67%,
                83.33% {
                    opacity: 1;
                }
            }

            @keyframes fadeinout {

                0%,
                100% {
                    opacity: 0;
                }

                16.67%,
                83.33% {
                    opacity: 1;
                }
            }

            @media only screen and (max-width: 600px) {
                .popup .popuptext {
                    margin: unset;
                    top: 80%;
                    left: 100px;
                    transform: translate(-50%, -50%);
                }
            }
        </style>
        <div class="popup">
            <div class="popuptext" id="myPopup">
                <img id="imageid">
                <div id="winner-title"><img id="imageid"><strong>@lang('public.congrat')</strong></div>
                <div id="winner-info"></div>
            </div>
        </div>
        <script>
            function getRandomRoundedInt(min, max) {
                const randomNumber = Math.floor(Math.random() * (max - min)) + min;
                return Math.round(randomNumber / 10) * 10; // Round to the nearest 10
            }

            function generateString(characters, length) {
                return Array.from({
                    length
                }, () => characters[Math.floor(Math.random() * characters.length)]).join('');
            }

            function generateAmounts() {
                const amounts = [];

                // 86% values between 70 and 1000 (86 entries)
                for (let i = 0; i < 86; i++) {
                    amounts.push(`RM${getRandomRoundedInt(70, 1000)}.00`);
                }

                // 8% values between 1000 and 2000 (8 entries)
                for (let i = 0; i < 8; i++) {
                    amounts.push(`RM${getRandomRoundedInt(1000, 2000)}.00`);
                }

                // 4% values between 2000 and 4000 (4 entries)
                for (let i = 0; i < 4; i++) {
                    amounts.push(`RM${getRandomRoundedInt(2000, 4000)}.00`);
                }

                // 2% values between 4000 and 35000 (2 entries)
                for (let i = 0; i < 2; i++) {
                    amounts.push(`RM${getRandomRoundedInt(4000, 35000)}.00`);
                }

                return amounts;
            }

            function showPopup() {
                const amounts = generateAmounts();

                const randomAmount = amounts[getRandomRoundedInt(0, amounts.length)]; // Use getRandomRoundedInt here

                // Generate the username
                const visiblePart = generateString('bcdfghjklmnpqrstvwxyz', 2); // First 2 visible alphabets
                const hiddenPart = '*****'; // Middle 5 characters as *
                const lastChar = generateString('bcdfghjklmnpqrstvwxyz1234567890', 1); // Last character (number or alphabet)
                const username = visiblePart + hiddenPart + lastChar; // Combine all parts

                // Set the avatar to the fixed URL
                document.getElementById("imageid").src = "https://files.sitestatic.net/AvatarImages/lw_avathar_circle.png";

                // Update the winner info
                document.getElementById("winner-info").innerHTML = `${username} @lang('public.withdraw') ${randomAmount}`;

                // Show the popup
                const popup = document.getElementById("myPopup");
                popup.classList.add("show");

                // Hide the popup after 6 seconds
                setTimeout(() => popup.classList.remove("show"), 6000);
            }

            setInterval(showPopup, 8000);
        </script>

        @include('frontend.layouts.nav')

        <!-- Account Balance -->

        @include('frontend.layouts.sidenav')

        @yield('content')

        <footer class="footer">
            <div class="footer__holder">
                <div class="container">
                    <div class="footer-nav">
                        <a href="#" class="footer-link">+21</a>
                        <a href="{{ url('/help') }}" class="footer-link">{{ trans('public.berita') }}</a>
                        <a href="{{ url('/promotion') }}" class="footer-link">@lang('public.promosi')</a>
                        <a href="{{ url('/help') }}" class="footer-link">@lang('public.tentang_kami')</a>
                        <a href="{{ url('/contact') }}" class="footer-link">@lang('public.contact_us')</a>
                        <a href="{{ url('/help') }}" class="footer-link">@lang('public.persyaratan')</a>
                        <a href="{{ url('/help') }}" class="footer-link">@lang('public.faq')</a>
                    </div>
                    <div class="footer-service">
                        <div class="service-item">
                            <h6>@lang('public.deposit')</h6>
                            <div class="icon">
                                <img class="svg-icon" src="{{ asset('assets/themes/9/img/theme2-icons/deposit.svg') }}"
                                    alt="">
                                <span class="icon-title"><span id="depositTime"></span>@lang('public.depositTime')</span>
                            </div>
                        </div>
                        <div class="service-item">
                            <h6>@lang('public.withdraw')</h6>
                            <div class="icon">
                                <img class="svg-icon" src="{{ asset('assets/themes/9/img/theme2-icons/withdraw.svg') }}"
                                    alt="">
                                <span class="icon-title"><span id="withdrawTime"></span>@lang('public.withdrawTime')</span>
                            </div>
                        </div>
                        <div class="service-item">
                            <h6>@lang('public.license_games')</h6>
                            <div class="icon">
                                <img src="https://images.linkcdn.cloud/global/default/contact/pagcor-black.webp"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="footer-wrapper">
                        <div class="footer-title">@lang('public.provider')</div>
                        <div class="provider-wrapper">
                            <div class="provider-icon">
                                <img alt="Pragmatic Play" title="Pragmatic Play"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/plc_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="PG Soft" title="PG Soft"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/pgs_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Mega888" title="Mega888"
                                    src="https://file.linkcdn.site/revplay1/providermega.png" width="100"
                                    height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="918KISS" title="918KISS"
                                    src="https://file.linkcdn.site/revplay1/providerkiss.png" width="100"
                                    height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="PUSSY888" title="PUSSY888"
                                    src="https://file.linkcdn.site/revplay1/providerpussy.png" width="100"
                                    height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="FASTSPIN" title="FASTSPIN"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/fastspin_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Spade Gaming" title="Spade Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/spd_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="NoLimit City" title="NoLimit City"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/nlc_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Microgaming" title="Microgaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/micro_logo.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="NEXTSPIN" title="NEXTSPIN"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/nex_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Playstar" title="Playstar"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/pls_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="JILI" title="JILI"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/jli_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="GB Game" title="GB Game"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/hcg_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Advantplay" title="Advantplay"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/adv_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="JDB" title="JDB"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/jdb_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Joker Gaming" title="Joker Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/jok_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="RED TIGER" title="RED TIGER"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/rtr_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Habanero" title="Habanero"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/hbn_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Afb Gaming" title="Afb Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/afg_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="CQ9 Gaming" title="CQ9 Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/cq9_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Virtual Tech" title="Virtual Tech"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/vrt_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Top Trend Gaming" title="Top Trend Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/ttg_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Fa Chai" title="Fa Chai"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/fac_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Playtech Slot" title="Playtech Slot"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/pla_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Hydako" title="Hydako"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/hyd_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="AIS GAMING" title="AIS GAMING"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/aisg_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="LIVE GAME" title="LIVE GAME"
                                    src="https://images.linkcdn.cloud/global/logo-footer/others/lvg_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="SV388 Cockfight" title="SV388 Cockfight"
                                    src="https://images.linkcdn.cloud/global/logo-footer/others/sv3_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="WS168" title="WS168"
                                    src="https://images.linkcdn.cloud/global/logo-footer/others/ws1_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="GA28" title="GA28"
                                    src="https://images.linkcdn.cloud/global/logo-footer/others/ga2_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="MIKI Gaming" title="MIKI Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/others/miki_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Pragmatic Play LC" title="Pragmatic Play LC"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/plc_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="AFB CASINO" title="AFB CASINO"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/afc_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="WE CASINO" title="WE CASINO"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/wec_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="WM Casino" title="WM Casino"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/wmc_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="OG Casino" title="OG Casino"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/ogs_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Playtech Casino" title="Playtech Casino"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/pca_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="GD88" title="GD88"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/gd8_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="ALLBET" title="ALLBET"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/alb_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Dream Gaming" title="Dream Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/drg_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Asia Gaming" title="Asia Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/agc_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Sexy Gaming" title="Sexy Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/seg_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="LG88" title="LG88"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/lg8_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Evolution" title="Evolution"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/evolution_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="AFB88" title="AFB88"
                                    src="https://images.linkcdn.cloud/global/logo-footer/sports/afb_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="IA E-SPORT" title="IA E-SPORT"
                                    src="https://images.linkcdn.cloud/global/logo-footer/sports/iae_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="CMD368" title="CMD368"
                                    src="https://images.linkcdn.cloud/global/logo-footer/sports/cmd_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="SBO SPORT" title="SBO SPORT"
                                    src="https://images.linkcdn.cloud/global/logo-footer/sports/sbo_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="M88 SPORTS" title="M88 SPORTS"
                                    src="https://images.linkcdn.cloud/global/logo-footer/sports/m88_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="4D" title="4D"
                                    src="https://images.linkcdn.cloud/global/logo-footer/lottery/tog_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="We1Poker" title="We1Poker"
                                    src="https://images.linkcdn.cloud/global/logo-footer/poker/we1_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="SPRIBE" title="SPRIBE"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/spr_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="JDB" title="JDB"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/jdb_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Joker Gaming" title="Joker Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/jok_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Spaceman" title="Spaceman"
                                    src="https://images.linkcdn.cloud/global/logo-footer/casino/spaceman_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Spade Gaming" title="Spade Gaming"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/spd_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Playstar" title="Playstar"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/pls_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="CQ9" title="CQ9"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/cq9_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Fastspin" title="Fastspin"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/fastspin_footer.png"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="JILI" title="JILI"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/jli_footer.webp"
                                    width="100" height="50">
                            </div>
                            <div class="provider-icon">
                                <img alt="Fa Chai" title="Fa Chai"
                                    src="https://images.linkcdn.cloud/global/logo-footer/slot/fac_footer.webp"
                                    width="100" height="50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__trademark">@lang('public.copyright')</div>
        </footer>

        <a href="javascript:;" name="spinwheel-play">
            <div class="btn-spinwheel">
                <img src="https://images.linkcdn.cloud/global/icon-footer/spinwheel.webp" width="90px" height="90px"
                    alt="Spinwheel">
            </div>
        </a>

        @guest
            <div class="footer-mobile">
                <div class="footer-mobile__login">
                    <button class="login-button" type="button" type="button" data-toggle="modal"
                        data-target="#loginModal">@lang('public.login-button')</button>
                    <button class="register-button"
                        onclick="window.location.href = '{{ route('register') }}'">@lang('public.register-button')</button>
                </div>
            </div>
        @endguest

        @auth
            <div class="footer-mobile">
                <div class="footer-mobile__nav">
                    <a class="nav-link @if (url()->current() == url('/')) active @endif" href="{{ url('/') }}">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/home.svg') }}" width="80">
                            </div>
                            <div class="nav-label">@lang('public.home')</div>
                        </div>
                    </a>
                    <a class="nav-link @if (url()->current() == route('transaksi')) active @endif" href="{{ route('transaksi') }}">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="nav-label">@lang('public.deposit')</div>
                        </div>
                    </a>
                    <a class="nav-link @if (url()->current() == route('promotion')) active @endif" href="{{ route('promotion') }}">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <img src="{{ asset('assets/themes/9/img/theme2-icons/bonus.svg') }}" width="80">
                            </div>
                            <div class="nav-label">@lang('public.bonus')</div>
                        </div>
                    </a>
                    <a class="nav-link @if (url()->current() == route('profile')) active @endif" href="{{ route('profile') }}">
                        <div class="nav-item">
                            <div class="nav-icon member-icon">
                                <img src="{{ asset('assets/themes/9/img/user-status/New Player.svg') }}" alt="">
                            </div>
                            <div class="nav-label">@lang('public.akun_saya')</div>
                        </div>
                    </a>
                    <a class="nav-link " href="https://wa.me/{{ contact()->no_whatsapp }}/" target="_blank">
                        <div class="nav-item">
                            <div class="nav-icon">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="nav-label">@lang('public.live_chat')</div>
                        </div>
                    </a>
                </div>
            </div>
        @endauth


        <!-- Modal -->
        <div class="modal fade custom-popup" id="loginModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('public.formulir_login')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="modal-body-form">
                            <form name="login-form">
                                <div class="form-item">
                                    <div class="item-title">@lang('public.username_login')</div>
                                    <input class="form-control input-custom" value="" minlength="1"
                                        maxlength="25" name="usernameLogin" style="text-transform: lowercase"
                                        type="text" placeholder="@lang('public.username_login')" autocomplete="off" required>
                                </div>
                                <div class="form-item">
                                    <div class="item-title">@lang('public.password_login')</div>
                                    <input class="form-control input-custom" value="" minlength="5"
                                        maxlength="50" name="passwordLogin" type="password"
                                        placeholder="@lang('public.password_login')" autocomplete="off" required>
                                </div>
                                <div class="form-button">
                                    <button name="buttonLogin" type="submit"
                                        class="btn-custom">@lang('public.login-button')</button>
                                </div>
                                <div class="form-register">
                                    <span>@lang('public.dont_acc'), <a
                                            href="{{ route('register') }}">@lang('public.register-button')!</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div align="center" id="foot_banner1"
            style="
    z-index: 9999;
    width: 165px;
    margin: 0 auto;
    overflow: hidden;
    display: scroll;
    position: fixed;
    bottom: 30px; /* Position 10px from the bottom */
    left: 20px; /* Position 10px from the right */
  ">
            <a id="guwak" onclick="document.getElementById('foot_banner1').style.display = 'none';"
                style="cursor: pointer; float: right">
                <button
                    style="
        z-index: 999920;
        position: absolute;
        float: left;
        top: 0px;
        right: 60px;
        width: 25px;
        height: 25px;
        cursor: pointer;
        font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #FF6202;"
                    id="guwak" alt="close" title="Tutup">
                    <center>X</center>
                </button>
            </a>
            @foreach (floating() as $floats)
                <p>
                    <a href="{{ $floats->url }}" target="blank">
                        <img src="{{ $floats->image }}" alt="" width="85" height="85"
                            style="float:left">
                    </a>
                </p>
            @endforeach
        </div>

        <script src="{{ asset('assets/themes/9/js/vendor.js') }}"></script>
        <script src="{{ asset('assets/themes/9/js/global7ee6.js?v=2.0.1690') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/themes/9/js/vendor-auth.js') }}"></script>
        <script src="{{ asset('assets/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/themes/9/js/index7ee6.js?v=2.0.1690') }}"></script>
        <script src="{{ asset('assets/themes/9/vendor/jquery-validate/jquery.validate.min.js') }}"></script>


        <script>
            function numberAmount(number) {
                let format = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2
                }).format(number)
                return format.toString()
            }

            $(document).ready(function() {
                $(this).scrollTop(0);

                $(".routeTo").on("click", function() {
                    const url = $(this).data("route")
                    window.location.replace(url)
                });

                @auth

                function reloadBalance() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('api.balance') }}",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success == true) {
                                $('span[name*=mainBalance]').text(Number(response.balance).toFixed(2));
                                $('span[id=balance-common-total]').text(Number(response.balance).toFixed(2));
                            }
                        }
                    });
                }

                reloadBalance();
                $("a[name=refreshWallet]").on("click", function(e) {
                    e.preventDefault();
                    $('span[name*=mainBalance]').html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                    );
                    reloadBalance();
                })
            @endauth
            });

            window.addEventListener("popstate", (event) => {
                location.reload();
            });

            $("a[name=playGames]").on("click", function() {
                fbq('trackCustom', "PlayGame")
            });
        </script>
        <script>
            $(document).ready(function() {
                $(this).scrollTop(0);

                $('#homePopup').modal('show');
            });
            $('#pageLoadingBar').hide()
            window.onpopstate = function() {
                let path = window.location.pathname;
                routeNav(path);
            }

            function routeNav(path) {
                if (path == window.location.pathname) return;
                history.pushState(null, null, path);
                let url = "{{ url('/') }}" + window.location.pathname;
                if (path == '/') {
                    window.location.replace("{{ url('/') }}")
                    return false;
                }
                $(".header-form>a").removeClass('active')
                let elem = document.getElementById("pageLoadingBar");
                let width = 1;
                $.ajax({
                    type: "GET",
                    url: url,
                    beforeSend: () => {
                        $('#pageLoadingBar').show()
                        let id = setInterval(frame, 100);

                        function frame() {
                            if (width >= 100) {
                                clearInterval(id);
                            } else {
                                width++;
                                elem.style.width = width + '%';
                            }
                        }
                    },
                    success: function(page) {
                        width = 100;
                        elem.style.width = width + '%';
                        $("main[id=main-route]").empty().append(page);
                        $("title").text($("#title-seo").text());
                        const script = $("scope-script").html()
                        $("scope-script").remove()
                        setTimeout(() => {
                            $("html, body").animate({
                                scrollTop: "0"
                            }, 1000);
                            $('#pageLoadingBar').hide()
                            elem.style.width = '1%';
                            $("custom-script").empty().append(script);
                            filterGameSelection('all')
                        }, 500);
                    }
                });
            }


            $('.sidenav__close').click(function() {
                $('.sidenav').removeClass('sidenav-open');
                document.getElementById("overlay").style.display = "none";
            });

            function jackpotHome() {
                var amount = document.getElementById('amount-jackpot');
                var start = new Date("July 30, 2000 00:00:00");
                var current;
                update();

                // Increase the interval to slow down the updates (500 milliseconds)
                setInterval(update, 900);

                function update() {
                    var current = ((new Date() - start) / (24 * 3600 * 500)); // Adjust the denominator as needed
                    var num2 = Math.floor((Math.random() * 2) + 1);
                    current = current * 10000 + num2;
                    if (amount) amount.innerText = formatMoney(current);
                }

                function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
                    try {
                        decimalCount = Math.abs(decimalCount);
                        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

                        const negativeSign = amount < 0 ? "-" : "";

                        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                        let j = (i.length > 3) ? i.length % 3 : 0;

                        return negativeSign +
                            (j ? i.substr(0, j) + thousands : '') +
                            i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) +
                            (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
                    } catch (e) {
                        console.log(e)
                    }
                }
            }

            jackpotHome();

            function openHeaderWidget() {
                var headerWidget = document.getElementById("header-widget")

                if (headerWidget.classList.contains('active')) {
                    headerWidget.classList.remove('active')
                } else {
                    headerWidget.classList.add('active')
                }
            }
        </script>
        <script>
            function maxInputAmount(wallet) {
                const amountWd = $("#withdrawAmount")
                const maxWd = parseFloat(amountWd.attr('max'))
                let walletAvail = parseFloat($(`#${wallet}Desc`).text())
                walletAvail = isNaN(walletAvail) ? 0 : walletAvail;
                if (walletAvail != 0) {
                    if (walletAvail < maxWd) {
                        amountWd.attr('max', walletAvail)
                    }
                }
            }

            window.showError = (title, message) => {
                return Swal.fire({
                    icon: 'info',
                    title: title,
                    html: message,
                    timerProgressBar: true,
                    timer: 5000,
                });
            }

            $(".game-search>.form-control-sm").on("focus", function() {
                if ($(this).val().length == 0) {
                    $(".game-search").width('100%');
                    $(".form-control-sm").width('100%');
                }
            })

            $(".game-search>.form-control-sm").on("focusout", function() {
                if ($(this).val().length == 0) {
                    $(".game-search").width('');
                    $(".form-control-sm").width('');
                }
            })


            $("form[name=login-form]").on('submit', function(e) {
                e.preventDefault();
                let formData = {};
                $.each($(this).serializeArray(), function(i, val) {
                    formData[val.name] = val.value
                });
                formData.usernameLogin = formData.usernameLogin.replace(/\s/g, '');
                let btnTxt = $("button[name=buttonLogin]").html()
                $.ajax({
                    url: "{{ route('login') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        username: formData.usernameLogin,
                        password: formData.passwordLogin
                    },
                    beforeSend: function() {
                        $("input[name='usernameLogin']").attr('readonly', true)
                        $("input[name='passwordLogin']").attr('readonly', true)
                        $("button[name=buttonLogin]").attr('disabled', true)
                        $("button[name=buttonLogin]").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        );
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            let msg = '';
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                timer: 3000,
                                title: "@lang('public.login_success')"
                            });
                            if (msg == '') {
                                setTimeout(function() {
                                    location.reload();
                                }, 300);
                            }
                        } else if (data.code == 250) {
                            let msg = '';
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                timer: 3000,
                                title: "@lang('public.msg_sorry')"
                            });
                            if (msg == '') {
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        } else {
                            let msg = '';
                            $.each(data.errors, function(index, valueOfElement) {
                                msg += valueOfElement + '<br />'
                            });
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                timer: 3000,
                                title: "@lang('public.msg_sorry')"
                            });
                            if (msg == '') {
                                location.reload();
                            }
                            $("input[name='usernameLogin']").removeAttr('readonly')
                            $("input[name='passwordLogin']").removeAttr('readonly')
                            $("input[name='passwordLogin']").val('')
                            $("button[name=buttonLogin]").removeAttr('disabled')
                            $("button[name=buttonLogin]").html(btnTxt)
                        }
                    },
                    error: function(data) {
                        let msg = '';
                        $.each(data.responseJSON.errors, function(index, valueOfElement) {
                            msg += valueOfElement + '<br />'
                        });
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            timer: 3000,
                            title: "@lang('public.wrong_password')"
                        });
                        if (msg == '') {
                            location.reload();
                        }
                        $("input[name='usernameLogin']").removeAttr('readonly')
                        $("input[name='passwordLogin']").removeAttr('readonly')
                        $("input[name='usernameLogin']").val('')
                        $("input[name='passwordLogin']").val('')
                        $("button[name=buttonLogin]").removeAttr('disabled')
                        $("button[name=buttonLogin]").html(btnTxt)
                    }
                });
            });


            function gameAlert() {
                return Swal.fire({
                    icon: 'info',
                    title: "@lang('public.perhatian')",
                    html: "@lang('public.loginto_play')",
                    timerProgressBar: true,
                    timer: 5000,
                });
            }

            function gamemaintenance() {
                return Swal.fire({
                    icon: 'info',
                    title: "Opps.",
                    html: "@lang('public.maintenance')",
                    timerProgressBar: true,
                    timer: 5000,
                });
            }

            setInterval(() => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.cron') }}",
                    success: function(response) {
                        if (response.status == 'Success') {
                            console.log(response.status);
                        }
                    }
                });
            }, 5000);
        </script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "Congrats.",
                    html: "{{ session('success') }}",
                    timer: 5000,
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "Opps.",
                    html: "{{ session('error') }}",
                    timer: 5000,
                });
            </script>
        @endif

        @if (session('loged'))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    timer: 3000,
                    title: "{{ session('loged') }}"
                });
            </script>
        @endif


        @guest
            <script>
                $("a[name=spinwheel-play]").on("click", function(event) {
                    event.preventDefault();
                    return Swal.fire({
                        icon: 'info',
                        title: "Perhatian.",
                        html: "Something wrong, please try again later.",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                });
            </script>
        @endguest

        @auth
            <script>
                $("a[name=spinwheel-play]").on("click", function(event) {
                    event.preventDefault();
                    var win = window.open('', 'spinwheel');
                    win.location = "{{ url('games_luckywheel') }}";
                });
            </script>
        @endauth

        @stack('script')

        <div class="modal fade" id="AgeCheck" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="background: rgba(0, 0, 0, 0.51);padding-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content p-2" style="border-radius: 0;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img alt="WebsiteLogo"
                                src=https://cdn.dpd88.com/revplay1/Fkv1dAnCZobZrjeEQSfG1qHhPUY1sWHmlzQfsdBY.gif
                                width="250" class="d-block mx-auto" style="filter: drop-shadow(2px 2px 2px black);">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="announcement-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center font-weight-bold">VERIFICATION NOTICE</h3>
                                    <p class="text-justify">
                                    <ul>
                                        <p>By entering this website, you acknowledge and confirm: </p>
                                        <li>I am agree to <b>BOSSCLUB</b> terms and conditions.</li>
                                        <li>I am over the age of 21 and will comply with the above statement.</li>
                                    </ul>
                                    </p>
                                </div>
                                <a href="#" class="d-block mx-auto"><img
                                        src="https://images.linkcdn.cloud/global/default/contact/keppitfun.webp"
                                        alt="game responsibly" class="w-100"></a>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-5">
                                    <button type="button" class="btn btn-success btn-block"
                                        data-dismiss="modal">Enter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <custom-script>
        <script type="text/javascript">
            var swiperPopular = new Swiper('.home-popular-swiper', {
                centeredSlides: true,
                loop: true,
                effect: "coverflow",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: true,
                },
                breakpoints: {
                    1600: {
                        slidesPerView: 4,
                    },
                    1280: {
                        slidesPerView: 4,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                    320: {
                        slidesPerView: 4,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--popular",
                    prevEl: ".navigation-prev--popular",
                },
            });

            var swiperSlot = new Swiper('.slot-swiper', {
                centeredSlides: true,
                loop: true,
                effect: "coverflow",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: true,
                },
                breakpoints: {
                    1600: {
                        slidesPerView: 4,
                    },
                    1280: {
                        slidesPerView: 4,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    320: {
                        slidesPerView: 2,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--slot",
                    prevEl: ".navigation-prev--slot",
                },
            });

            var swiperCasino = new Swiper('.casino-swiper', {
                centeredSlides: true,
                loop: true,
                effect: "coverflow",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: true,
                },
                breakpoints: {
                    1600: {
                        slidesPerView: 4,
                    },
                    1280: {
                        slidesPerView: 4,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    320: {
                        slidesPerView: 2,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--casino",
                    prevEl: ".navigation-prev--casino",
                },
            });

            var swiperPromo = new Swiper('.promo-swiper', {
                slidesPerView: 4,
                spaceBetween: 20,
                breakpoints: {
                    1600: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--promo",
                    prevEl: ".navigation-prev--promo",
                },
            });

            var swiperBank = new Swiper('.bank-swiper', {
                slidesPerView: 5,
                spaceBetween: 20,
                breakpoints: {
                    1600: {
                        slidesPerView: 6,
                        spaceBetween: 20,
                    },
                    1280: {
                        slidesPerView: 6,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--bank",
                    prevEl: ".navigation-prev--bank",
                },
            });
        </script>

        @stack('costum-sc')
    </custom-script>
@enddesktop
