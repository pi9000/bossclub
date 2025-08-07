<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 align-self-center d-flex">
                <div class="nav-time" id="headerTime"></div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="nav-marquee">
                    <i class="fas fa-bullhorn"></i>
                    <marquee class="marquee">{{ general()->title }}</marquee>
                </div>
            </div>
            <div class="col-lg-3 align-self-center">
                <div class="nav-right">
                    <button class="btn-currency" data-toggle="modal" data-target="#currencyModal">Ringgit</button>
                    <button class="btn-language" data-toggle="modal" data-target="#languageModal">
                        <span>{{ flags(session()->get('locale'))->name }}</span>
                        <img class="flag-image" src="{{ flags(session()->get('locale'))->image }}">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <div id="pageLoadingBar" class="progress-bar progress-bar-success" role="progressbar" style="height:4px;width:1%;position:absolute;z-index:999;"></div>
    <div class="header-mid">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="mid-icon">
                        <a href="">
                            <div class="icon-item">
                                <i class="fab fa-android"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="icon-item ">
                                <i class="fas fa-info"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 align-self-center">
                    <div class="mid-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ general()->logo }}" alt="WebsiteLogo" width="125" height="27">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    @auth
                    <div class="mid-menu">
                        <a href="{{ route('transaksi') }}">
                            <div class="menu-item ">
                                @lang('public.transaksi')
                            </div>
                        </a>
                        <a class="wallet-amount" id="wallet-amount" href="#" data-toggle="modal" data-target="#accountBalance">
                            <div class="menu-item">
                                MYR
                                <span id="mainBalance" name="mainBalance">{{ number_format(auth()->user()->balance,2) }}</span>
                                <a href="#" name="refreshWallet"><span><i class="fa fa-sync"></i></span></a>
                            </div>
                        </a>
                        <a href="javascript:void(0)" onclick="openHeaderWidget()">
                            <div class="menu-item menu-item--profile">
                                <div class="user-level">
                                    <img src="{{ asset('assets/themes/9/img/user-status/New Player.svg') }}" alt="">
                                </div>
                                <span>{{ auth()->user()->username }}</span>
                                <span><i class="fas fa-caret-down"></i></span>
                                <div id="header-widget">
                                    <button class="nav-item" onclick="location.href = '{{ route('profile') }}'">
                                        <div class="nav-icon"><i class="fas fa-user-alt"></i></div>
                                        <div class="nav-name">@lang('public.akun_saya')</div>
                                    </button>
                                    <button class="nav-item" onclick="location.href = '{{ route('profile') }}'">
                                        <div class="nav-icon"><i class="fas fa-gamepad"></i></div>
                                        <div class="nav-name">@lang('public.id_pengguna_game')</div>
                                    </button>
                                    <button class="nav-item" onclick="location.href = '{{ route('profile') }}'">
                                        <div class="nav-icon"><i class="fas fa-lock"></i></div>
                                        <div class="nav-name">@lang('public.password')</div>
                                    </button>
                                    <button class="nav-item nav-item--logout" onclick="location.href = '{{ route('member.logout') }}'">
                                        <div class="nav-icon"><i class="fas fa-sign-out-alt"></i></div>
                                        <div class="nav-name">@lang('public.logout')</div>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endauth @guest
                    <div class="mid-login">
                        <button class="login-button btn-custom btn-custom-sm btn-custom-outline" type="button" type="button" data-toggle="modal" data-target="#loginModal">@lang('public.login-button')</button>
                        <button class="register-button btn-custom btn-custom-sm" onclick="window.location.href = 'register'">@lang('public.register-button')</button>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-navbar">
    <div class="navbar-nav">
        <div class="nav-item">
            <a class="nav-link" href="javascript:;" onclick="routeNav('/')">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/home.svg') }}" width="80">
                <span>@lang('public.home')</span>
            </a>
        </div>
        <div class="nav-item">
            <img src="https://images.linkcdn.cloud/global/nav-addons/promo_category.png" width="45" height="10" style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
            <a href="javascript:;" class="nav-link" onclick="routeNav('/slot')" style="cursor: pointer;">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/slot.svg') }}" width="80">
                <span>@lang('public.slot')</span>
            </a>
            <div class="nav-item__game">
                <div class="container text-center justify-content-center">
                    @foreach (navbar('slot') as $slot) @if($slot->GameType == 11)
                    <div class="game-item ">
                        <a onclick="routeNav('/slot')" href="javascript:;">
                        <img class="game-image" title="{{ $slot->provider }}" alt="{{ $slot->provider }}"
                        src="{{ $slot->icon }}">
                        <div class="game-name">{{ $slot->provider }}</div>
                        </a>
                        </div>
                        @else
                    <div class="game-item ">
                        <a onclick="routeNav('/slot/{{ $slot->slug }}')" href="javascript:;">
                            <img class="game-image" title="{{ $slot->provider }}" alt="{{ $slot->provider }}"
                            src="{{ $slot->icon }}">
                            <div class="game-name">{{ $slot->provider }}</div>
                            @if ($slot->status != 1)
                            <img title="Virtual Tech" alt="Virtual Tech" class="game-maintenance" src="{{ $slot->mt_logo }}">
                        @endif
                        </a>
                    </div>
                    @endif @endforeach
                </div>
            </div>
        </div>
        <div class="nav-item">
            <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30" height="10" style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
            <a href="javascript:;" class="nav-link" onclick="routeNav('/casino')" style="cursor: pointer;">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/casino.svg') }}" width="80">
                <span>@lang('public.casino')</span>
            </a>
            <div class="nav-item__game">
                <div class="container text-center justify-content-center">
                    @foreach (navbar('casino') as $casino)
                    <div class="game-item ">
                        <a onclick="routeNav('/casino')" href="javascript:;">
                            <img class="game-image" title="{{ $casino->provider }}" alt="{{ $casino->provider }}"
                            src="{{ $casino->icon }}">
                            <div class="game-name">{{ $casino->provider }}</div>
                            @if ($casino->status != 1)
                            <img title="Virtual Tech" alt="Virtual Tech" class="game-maintenance" src="{{ $slot->mt_logo }}">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nav-item">
            <a href="javascript:;" onclick="routeNav('/lottery')" class="nav-link"style="cursor: pointer;">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/lottery.svg') }}" width="80">
                <span>4D RESULTS</span>
            </a>
            <div class="nav-item__game">
                <div class="container text-center justify-content-center">
                    @foreach (navbar('lottery') as $sprt)
                    <div class="game-item ">
                        <a onclick="routeNav('/lottery/{{ $sprt->slug }}')" href="javascript:;">
                            <img class="game-image" title="{{ $sprt->provider }}" alt="{{ $sprt->provider }}"
                                src="{{ $sprt->icon }}">
                            <div class="game-name">{{ $sprt->provider }}</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nav-item">
            <a href="javascript:;" class="nav-link" onclick="routeNav('/sportsbook')" style="cursor: pointer;">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/sport.svg') }}" width="80">
                <span>@lang('public.sport')</span>
            </a>
            <div class="nav-item__game">
                <div class="container text-center justify-content-center">
                    @foreach (navbar('sportsbook') as $sprt)
                    <div class="game-item ">
                        <a onclick="routeNav('/sportsbook')" href="javascript:;">
                            <img class="game-image" title="{{ $sprt->provider }}" alt="{{ $sprt->provider }}"
                            src="{{ $sprt->icon }}">
                            <div class="game-name">{{ $sprt->provider }}</div>
                            @if ($sprt->status != 1)
                            <img title="Virtual Tech" alt="Virtual Tech" class="game-maintenance" src="{{ $slot->mt_logo }}">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nav-item">
            <a href="javascript:;" class="nav-link" onclick="routeNav('/arcade')" style="cursor: pointer;">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/arcade.svg') }}" width="80">
                <span>@lang('public.arcade')</span>
            </a>
            <div class="nav-item__game">
                <div class="container text-center justify-content-center">
                    @foreach (navbar('arcade') as $arcd)
                    <div class="game-item ">
                        <a onclick="routeNav('/arcade')" href="javascript:;">
                            <img class="game-image" title="{{ $arcd->provider }}" alt="{{ $arcd->provider }}"
                            src="{{ $arcd->icon }}">
                            <div class="game-name">{{ $arcd->provider }}</div>
                            @if ($arcd->status != 1)
                            <img title="Virtual Tech" alt="Virtual Tech" class="game-maintenance" src="{{ $slot->mt_logo }}">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="javascript:;" onclick="routeNav('/promotion')">
                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/promo.svg') }}" width="80">
                <span>@lang('public.promosi')</span>
            </a>
        </div>
    </div>
</div>


<div class="header-mobile">
    <div id="mobilePageLoadingBar" class="progress-bar progress-bar-success" role="progressbar" style="height:4px;width:1%;position:absolute;z-index:999;display:none;"></div>
    <div class="header-mobile__marquee">
        <i class="fas fa-bullhorn"></i>
        <marquee class="marquee">{{ general()->title }}</marquee>
    </div>
    <div class="header-mobile__top">
        @auth
        <div class="mobile-balance">
            <div class="balance-number" data-toggle="modal" data-target="#accountBalance"><a class="wallet-amount" id="wallet-amount">MYR&nbsp<span name="mainBalance"> {{ number_format(auth()->user()->balance,2) }} </span></a></div>
            <a href="#" name="refreshWallet"><span><i class="fa fa-sync"></i></span></a>
        </div>
        @endauth @guest
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
                    <img src="https://images.linkcdn.cloud/global/nav-addons/promo_category.png" width="45" height="10" style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
                    <a href="javascript:;" onclick="routeNav('/slot')">
                        <div class="header-mobile__item" id="header-mobile-item-slot">
                            <img src="../assets/themes/9/img/theme2-icons/category/slot.svg">
                            <span>SLOT</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/casino')">
                        <div class="header-mobile__item" id="header-mobile-item-casino">
                            <img src="../assets/themes/9/img/theme2-icons/category/casino.svg">
                            <span>CASINO</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/lottery')">
                        <div class="header-mobile__item" id="header-mobile-item-lottery">
                            <img src="https://mposlotqq.org/themes/9/img/theme2-icons/category/lottery.svg">
                            <span>4D RESULTS</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/sportsbook')">
                        <div class="header-mobile__item" id="header-mobile-item-sportsbook">
                            <img src="../assets/themes/9/img/theme2-icons/category/sport.svg">
                            <span>SPORT</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" onclick="routeNav('/arcade')">
                        <div class="header-mobile__item" id="header-mobile-item-arcade">
                            <img src="../assets/themes/9/img/theme2-icons/category/arcade.svg">
                            <span>FISHING</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
