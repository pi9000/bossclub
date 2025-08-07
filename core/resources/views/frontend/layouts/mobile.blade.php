<div class="header-mobile">
    <div id="mobilePageLoadingBar" class="progress-bar progress-bar-success" role="progressbar"
        style="height:4px;width:1%;position:absolute;z-index:999;display:none;"></div>
    <div class="header-mobile__marquee">
        <i class="fas fa-bullhorn"></i>
        <marquee class="marquee">{{ general()->title }}</marquee>
    </div>
    <div class="header-mobile__top">
        @auth
        <div class="mobile-balance">
            <div class="balance-number" data-toggle="modal" data-target="#accountBalance"><a class="wallet-amount"
                    id="wallet-amount">MYR&nbsp<span name="mainBalance"> {{ number_format(auth()->user()->balance,2) }} </span></a></div>
            <a href="#" name="refreshWallet"><span><i class="fa fa-sync"></i></span></a>
        </div>
        @endauth
        @guest
        <div class="mobile-help">
            <a href="{{ url('/') }}">
                <i class="fas fa-trophy"></i>
            </a>
        </div>
        @endguest
        <div class="mobile-logo">
            <a href="{{ url('/') }}">
                <img src="{{ general()->logo }}" alt="WebsiteLogo" width="125" height="27">
            </a>
        </div>
        <div class="mobile-right">
            <div class="mobile-menu sidenav-toggle" class="mobile-menu">
                <div class="mobile-menu--line">
                    <img src="../assets/themes/9/img/theme2-icons/mobile-nav.svg">
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile__nav">
        <div class="swiper-container header-mobile-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://images.linkcdn.cloud/global/nav-addons/promo_category.png" width="45" height="10"
                        style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
                    <a href="javascript:;" onclick="routeNav('/slot')">
                        <div class="header-mobile__item" id="header-mobile-item-slot">
                            <img src="{{ asset('/') }}assets/themes/9/img/theme2-icons/category/slot.svg">
                            <span>@lang('public.slot')</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30" height="10"
                style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
                    <a href="javascript:;" onclick="routeNav('/casino')">
                        <div class="header-mobile__item" id="header-mobile-item-casino">
                            <img src="../assets/themes/9/img/theme2-icons/category/casino.svg">
                            <span>@lang('public.casino')</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/lottery')">
                        <div class="header-mobile__item" id="header-mobile-item-lottery">
                            <img src="../assets/themes/9/img/theme2-icons/category/lottery.svg">
                            <span>4D RESULTS</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/sportsbook')">
                        <div class="header-mobile__item" id="header-mobile-item-sportsbook">
                            <img src="../assets/themes/9/img/theme2-icons/category/sport.svg">
                            <span>@lang('public.sportsbook')</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/arcade')">
                        <div class="header-mobile__item" id="header-mobile-item-arcade">
                            <img src="../assets/themes/9/img/theme2-icons/category/arcade.svg">
                            <span>@lang('public.arcade')</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/promotion')">
                        <div class="header-mobile__item" id="header-mobile-item-poker">
                            <img src="../assets/themes/9/img/theme2-icons/bonus.svg">
                            <span>@lang('public.promosi')</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
