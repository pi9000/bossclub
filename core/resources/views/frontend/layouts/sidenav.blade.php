<div id="overlay"></div>
<div class="sidenav">
    <div class="sidenav__close"><i class="fas fa-times"></i></div>
    <div class="sidenav__logo">
        <img src="{{ general()->logo }}" alt="WebsiteLogo">
    </div>
    <div class="sidenav__header">
        <div class="header-title">
            <h5>@lang('public.welcome') @auth {{ auth()->user()->username }} @endauth</h5>
            @guest
            <h6>@lang('public.login1')</h6>
            @endguest
        </div>
        @guest
        <div class="header-content">
            <div class="content-button">
                <button class="btn-login btn-custom btn-custom-outline sidenav-login" type="button" type="button"
                    data-toggle="modal" data-target="#loginModal">@lang('public.login-button')</button>
                <button class="btn-register btn-custom"
                    onclick="window.location.href = '{{ route('register') }}'">@lang('public.register-button')</button>
            </div>
        </div>
        @endguest
    </div>
    <div class="sidenav__menu">
        <a class="menu-link" href="{{ url('/') }}">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/category/home.svg">
                </div>
                <div class="label">@lang('public.home')</div>
            </div>
        </a>

        @auth
        <a class="menu-link transaksi-toggle" href="javascript:void(0)">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/transaksi.svg">
                </div>
                <div class="label">@lang('public.transaksi')</div>
                <div class="arrow"><i class="fas fa-angle-right"></i></div>
            </div>
        </a>
        <div class="sidenav-dropdown transaksi-toggle-menu">
            <a class="menu-link" name="transactionSidebar" id="depositSidebar"
                href="{{ url('/transaksi') }}">
                <div class="menu-item">
                    <div class="label">@lang('public.deposit')</div>
                </div>
            </a>
            <a class="menu-link" name="transactionSidebar" id="withdrawSidebar"
                href="{{ url('/transaksi') }}">
                <div class="menu-item">
                    <div class="label">@lang('public.withdraw')</div>
                </div>
            </a>
        </div>
        <a class="menu-link permainan-toggle" href="javascript:void(0)">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/game.svg">
                </div>
                <div class="label">@lang('public.permainan')</div>
                <div class="arrow"><i class="fas fa-angle-right"></i></div>
            </div>
        </a>
        <div class="sidenav-dropdown permainan-toggle-menu">
            <a class="menu-link" name="gamesPicker" data-menu="slot" href="javascript:;" id="slotSidebar"
                onclick="routeNav('/slot')">
                <div class="menu-item">
                    <div class="label">@lang('public.slot')</div>
                </div>
            </a>
            <a class="menu-link" name="gamesPicker" data-menu="casino" href="javascript:;" id="casinoSidebar"
                onclick="routeNav('/casino')">
                <div class="menu-item">
                    <div class="label">@lang('public.casino')</div>
                </div>
            </a>
            <a class="menu-link" name="gamesPicker" data-menu="sport" href="javascript:;" id="sportSidebar"
                onclick="routeNav('/sportsbook')">
                <div class="menu-item">
                    <div class="label">@lang('public.sportsbook')</div>
                </div>
            </a>
            <a class="menu-link" name="gamesPicker" data-menu="arcade" href="javascript:;" id="arcadeSidebar"
                onclick="routeNav('/arcade')">
                <div class="menu-item">
                    <div class="label">@lang('public.arcade')</div>
                </div>
            </a>
        </div>
        <a class="menu-link bonus-toggle" href="javascript:void(0)">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/transaksi.svg">
                </div>
                <div class="label">@lang('public.bonus')</div>
                <div class="arrow"><i class="fas fa-angle-right"></i></div>
            </div>
        </a>
        @endauth

        <a class="menu-link" href="{{ route('promotion') }}">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/category/promo.svg">
                </div>
                <div class="label">@lang('public.promosi')</div>
            </div>
        </a>
        <a class="menu-link" href="{{ url('/') }}">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/category/news.svg">
                </div>
                <div class="label">@lang('public.berita')</div>
            </div>
        </a>
        <a class="menu-link" href="/help">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/category/other.svg">
                </div>
                <div class="label">@lang('public.bantuan')</div>
            </div>
        </a>
        <a class="menu-link" href="/contact">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/contact.svg">
                </div>
                <div class="label">@lang('public.contact_us')</div>
            </div>
        </a>

        <a class="menu-link" href="{{ route('member.logout') }}">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/logout.svg">
                </div>
                <div class="label">@lang('public.logout')</div>
            </div>
        </a>
    </div>
    <div class="sidenav__menu">

        <a class="menu-link show-popup-currency" href="javascript:void(0)" data-toggle="modal"
            data-target="#currencyModal">
            <div class="menu-item">
                <div class="icon">
                    <img src="../assets/themes/9/img/theme2-icons/currency.svg">
                </div>
                <div class="label">@lang('public.currency') - MYR</div>
            </div>
        </a>

        <a class="menu-link show-popup-language" href="javascript:void(0)" data-toggle="modal" data-target="#languageModal">
            <div class="menu-item">
                <div class="icon">
                    <img src="{{ flags(session()->get('locale'))->image }}">
                </div>
                <div class="label">@lang('public.reg_lang') - {{ flags(session()->get('locale'))->name }}</div>
                <div class="flag-icon">
                    <img src="{{ flags(session()->get('locale'))->image }}">
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Account Balance -->

<div class="modal custom-popup fade" id="accountBalance" tabindex="-1" aria-labelledby="accountBalanceLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body">
                <div class="popup-account-balance">
                    <div class="balance-header">
                        <h6>@lang('public.dompet')</h6>
                        <div class="acc-balance"><span name="mainBalance"></span></div>
                    </div>
                    <div class="balance-category d-flex align-items-center">
                        <div class="category-name m-0">@lang('public.dompet_utama')</div>
                        <div class="acc-balance ml-auto"><span id="balance-common-total"></span></div>
                    </div>
                </div>
            </div>
            <div class="balance-button">
                <a href="{{ url('transaksi#deposit') }}" id="depositModal" type="button"
                    class="btn-custom">@lang('public.deposit')</a>
                <a href="{{ url('transaksi#withdraw') }}" id="withdrawModal" type="button"
                    class="btn-custom">@lang('public.withdraw')</a>
            </div>
        </div>
    </div>
</div>


<!-- Language Modal -->
<div class="modal fade custom-popup" id="languageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>

            <div class="language-header">
                <h3>@lang('public.reg_lang')</h3>
                <div class="header-flag">
                    <img src="{{ flags(session()->get('locale'))->image }}">
                    <h6>{{ flags(session()->get('locale'))->name }}</h6>
                </div>
            </div>

            <div class="modal-body">
                <div class="language-list">
                    @foreach (flag() as $flags)
                    <a href="{{ route('setlang',$flags->code) }}">
                        <div class="list-item">
                            <div class="item-flag">
                                <img src="{{ $flags->image }}">
                            </div>
                            <div class="item-content">
                                <h5>{{ $flags->name }}</h5>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Currency Modal -->
<div class="modal fade custom-popup" id="currencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>

            <div class="language-header">
                <h3>Currency</h3>
                <div class="header-flag">
                    <h6>Ringgit Malaysia</h6>
                </div>
            </div>

            <div class="modal-body">
                <div class="language-list">
                </div>
            </div>
        </div>
    </div>
</div>
