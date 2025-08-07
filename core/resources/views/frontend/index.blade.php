@extends('frontend.layouts.main')
@section('content')
<!-- Account Balance -->
@desktop
<main id="main-route">
    <div class="main-content home">
        <section class="home__slider">
            <div class="container">
                <div class="swiper-container main-slider">
                    <div class="swiper-wrapper">
                        @foreach ($banner as $banners)
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="{{ $banners->gambar }}" data-alt="" width="1120" height="250">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>

        <section class="home__jackpot">
            <div class="container">
                <div class="jackpot-background">
                    <div class="jackpot-wrapper">
                        <h1>@lang('public.jp_progres')</h1>
                        <div class="wrapper-amount">
                            MYR <span id="amount-jackpot"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home__game home__game--popular">
            <div class="container">
                <div class="game-container">
                    <div class="game-container__header">
                        <div class="game-title">
                            <div class="icon">
                                <img src="{{ asset('assets/themes') }}/9/img/theme2-icons/category/popular.svg"
                                    width="80">
                            </div>
                            <h6>@lang('public.game_pop')</h6>
                        </div>
                        <div class="game-action">
                            <div class="action-button">
                                <a href="javascript:;" onclick="routeNav('/popular')"
                                    class="btn-custom btn-custom--sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                            <div class="action-navigation">
                                <button class="btn-custom btn-custom--sm navigation-prev--popular">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                                <button class="btn-custom btn-custom--sm navigation-next--popular">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="game-container__list">
                        <div class="swiper-container home-popular-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($popular as $pop)
                                <div class="games-holder swiper-slide">
                                    <a class="main sekarang main-sekarang-alert" @guest href="javascript:;"
                                        onclick="gameAlert()" @endguest @auth
                                        href="{{ url('gameIframe?gameType='.$pop->GameType.'&providerCode='.$pop->ProviderCode.'&gameCode='.$pop->GameCode.'&provider_id='.$pop->provider_id) }}"
                                        target="_blank" @endauth>
                                        <div class="games-img">
                                            <img src="{{ $pop->Game_image }}" width="110" height="80">
                                        </div>
                                        <div class="hover-play">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home__game home__game--slot">
            <div class="container">
                <div class="game-container">
                    <div class="game-container__header">
                        <div class="game-title">
                            <div class="icon">
                                <img src="{{ asset('assets/themes') }}/9/img/theme2-icons/category/slot.svg" width="80">
                            </div>
                            <h6>@lang('public.slot')</h6>
                        </div>
                        <div class="game-action">
                            <div class="action-button">
                                <a href="javascript:;" onclick="routeNav('/slot')"
                                    class="btn-custom btn-custom--sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                            <div class="action-navigation">
                                <button class="btn-custom btn-custom--sm navigation-prev--slot">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                                <button class="btn-custom btn-custom--sm navigation-next--slot">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="game-container__category-list">
                        <div class="swiper-container slot-swiper">
                            <div class="swiper-wrapper">
                                @foreach (navbar('slot') as $slot)
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a onclick="routeNav('/slot/{{ $slot->slug }}')" href="javascript:;">
                                                <div class="slide-img">
                                                    <img title="{{ $slot->provider }}" alt="{{ $slot->provider }}"
                                                        src="{{ $slot->banner }}">
                                                    <div class="hover-play">
                                                        <h6>{{ $slot->provider }}</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home__game home__game--casino">
            <div class="container">
                <div class="game-container">
                    <div class="game-container__header">
                        <div class="game-title">
                            <div class="icon">
                                <img src="{{ asset('assets/themes') }}/9/img/theme2-icons/category/casino.svg"
                                    width="80">
                            </div>
                            <h6>@lang('public.casino')</h6>
                        </div>
                        <div class="game-action">
                            <div class="action-button">
                                <a href="javascript:;" onclick="routeNav('/casino')"
                                    class="btn-custom btn-custom--sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                            <div class="action-navigation">
                                <button class="btn-custom btn-custom--sm navigation-prev--casino">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                                <button class="btn-custom btn-custom--sm navigation-next--casino">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="game-container__category-list">
                        <div class="swiper-container casino-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="Pragmatic Play LC" alt="Pragmatic Play LC"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/plc.webp">
                                                    <div class="hover-play">
                                                        <h6>Pragmatic Play LC</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="AFB CASINO" alt="AFB CASINO"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/afc.webp">
                                                    <div class="hover-play">
                                                        <h6>AFB CASINO</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="WE CASINO" alt="WE CASINO"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/wec.webp">
                                                    <div class="hover-play">
                                                        <h6>WE CASINO</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="WM Casino" alt="WM Casino"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/wmc.webp">
                                                    <div class="hover-play">
                                                        <h6>WM Casino</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="OG Casino" alt="OG Casino"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/ogs.webp">
                                                    <div class="hover-play">
                                                        <h6>OG Casino</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="Playtech Casino" alt="Playtech Casino"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/pca.webp">
                                                    <div class="hover-play">
                                                        <h6>Playtech Casino</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="GD88" alt="GD88"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/gd8.webp">
                                                    <div class="hover-play">
                                                        <h6>GD88</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="ALLBET" alt="ALLBET"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/alb.webp">
                                                    <div class="hover-play">
                                                        <h6>ALLBET</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="Dream Gaming" alt="Dream Gaming"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/drg.webp">
                                                    <div class="hover-play">
                                                        <h6>Dream Gaming</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="Asia Gaming" alt="Asia Gaming"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/agc.webp">
                                                    <div class="hover-play">
                                                        <h6>Asia Gaming</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="Sexy Gaming" alt="Sexy Gaming"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/seg.webp">
                                                    <div class="hover-play">
                                                        <h6>Sexy Gaming</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="LG88" alt="LG88"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/lg8.webp">
                                                    <div class="hover-play">
                                                        <h6>LG88</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-border">
                                        <div class="slide-item">
                                            <a href="javascript:;" onclick="gameAlert()">
                                                <div class="slide-img">
                                                    <img title="Evolution" alt="Evolution"
                                                        src="https://images.linkcdn.cloud/global/game-skin8/banner/casino/evo.webp">
                                                    <div class="hover-play">
                                                        <h6>Evolution</h6>
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home__game home__game--promo">
            <div class="container">
                <div class="game-container">
                    <div class="game-container__header">
                        <div class="game-title">
                            <div class="icon">
                                <img src="{{ asset('assets/themes/9/img/theme2-icons/category/promo.svg') }}"
                                    width="80">
                            </div>
                            <h6>@lang('public.promosi')</h6>
                        </div>
                        <div class="game-action">
                            <div class="action-button">
                                <a href="{{ url('/promotion') }}" class="btn-custom btn-custom--sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                            <div class="action-navigation">
                                <button class="btn-custom btn-custom--sm navigation-prev--promo">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                                <button class="btn-custom btn-custom--sm navigation-next--promo">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="game-container__promo-list">
                        <div class="swiper-container promo-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($promotion as $promt)
                                <div class="swiper-slide">
                                    <a href="{{ route('promotiond',$promt->slug) }}">
                                        <div class="list-item">
                                            <div class="item-image">
                                                <img src="{{ env('AWS_URL') }}{{ $promt->gambar }}" alt="">
                                            </div>
                                            <div class="item-context">
                                                <h6>{{ $promt->judul }}.</h6>
                                                <button class="btn-custom">@lang('public.selengkapnya')</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home__seo">
            <div class="container">
                <div class="game__seo">
                    <div hidden id="title-seo">{{ general()->deskripsi }}</div>
                    <div class="seo-content showFooter">
                        <h1 style="text-align:center;">{{ general()->deskripsi }}
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="home__payment">
            <div class="container">
                <div class="payment-title">
                    <h6>@lang('public.sys_payment')</h6>
                </div>
                <div class="payment-list">
                    <div class="swiper-container bank-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/9XYWYKTS/mbb.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img
                                            src="https://i.postimg.cc/bwsp8vMc/cimb.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/qq4pdxfj/amb.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/yY67QjyN/hlb.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/bN6pKnm9/rhb.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/gJ9YgPg9/pbb.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/NFDBG2BY/TNG.webp">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bank-border">
                                    <div class="bank-status online">@lang('public.online')</div>
                                    <div class="bank-item">
                                        <img src="https://i.postimg.cc/0Qp93H4z/tether.webp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($popup)
        <div class="modal fade" id="homePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="announcement-title">
                        <div class="icon"><i class="fas fa-bullhorn"></i></div>
                        <h3 class="text-uppercase">@lang('public.perhatian')</h3>
                    </div>
                    <div class="modal-body">
                        <div class="announcement-content">
                            <figure class="image">
                                <img src="{{ $popup->gambar }}" alt="announcement-title">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

</main>
@enddesktop

@mobile
<main id="main-route">
    <div class="main-content home">
        <section class="home__slider">
            <div class="container">
                <div class="swiper-container main-slider">
                    <div class="swiper-wrapper">
                        @foreach ($banner as $banners)
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="{{ $banners->gambar }}" data-alt="" width="1120" height="250">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>

        <section class="home__jackpot">
            <div class="container">
                <div class="jackpot-background">
                    <div class="jackpot-wrapper">
                        <h1>@lang('public.jp_progres')</h1>
                        <div class="wrapper-amount">
                            MYR <span id="amount-jackpot"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start of Mobile Popular Game -->
        <section class="mobile__games mobile__games--popular">
            <div class="container">
                <div class="games-container">
                    <div class="games-container__header">
                        <div class="games-title">
                            <div class="icon">
                                <img src="../assets/themes/9/img/theme2-icons/category/popular.svg" width="80">
                            </div>
                            <h6>@lang('public.game_pop')</h6>
                        </div>
                        <div class="games-action">
                            <div class="action-button">
                                <a href="javascript:;" onclick="routeNav('/popular')"
                                    class="btn-custom btn-custom-sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-games-list">
                        @foreach ($popular as $pop)
                        <div class="games-holder">
                            <a class="main sekarang main-sekarang-alert" @guest href="javascript:;"
                                onclick="gameAlert()" @endguest @auth
                                href="{{ url('gameIframe?gameType='.$pop->GameType.'&providerCode='.$pop->ProviderCode.'&gameCode='.$pop->GameCode) }}"
                                target="_blank" @endauth>
                                <div class="games-img">
                                    <img src="{{ $pop->Game_image }}" width="110" height="80">
                                </div>
                                <div class="games-name">{{ $pop->GameName }}</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Mobile Popular Game -->

        <!-- Start of Category List -->
        <section class="mobile__games mobile__games--slot">
            <div class="container">
                <div class="games-container">
                    <div class="games-container__header">
                        <div class="games-title">
                            <div class="icon">
                                <img src="../assets/themes/9/img/theme2-icons/category/slot.svg" width="80">
                            </div>
                            <h6>@lang('public.slot')</h6>
                        </div>
                        <div class="games-action">
                            <div class="action-button">
                                <a href="/slot" class="btn-custom btn-custom-sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-provider-list">
                        <div class="swiper-container mobile-swiper-slot">
                            <div class="swiper-wrapper">
                                @foreach (navbar('slot') as $slot)
                                <div class="swiper-slide">
                                    <div class="item-holder">
                                        <a onclick="routeNav('/slot/{{ $slot->slug }}')" href="javascript:;">
                                            <div class="item-img">
                                                <img title="{{ $slot->provider }}" alt="{{ $slot->provider }}"
                                                    src="{{ $slot->banner }}">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mobile__games mobile__games--casino">
            <div class="container">
                <div class="games-container">
                    <div class="games-container__header">
                        <div class="games-title">
                            <div class="icon">
                                <img src="../assets/themes/9/img/theme2-icons/category/casino.svg" width="80">
                            </div>
                            <h6>@lang('public.casino')</h6>
                        </div>
                        <div class="games-action">
                            <div class="action-button">
                                <a href="/casino" class="btn-custom btn-custom-sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-provider-list">
                        <div class="swiper-container mobile-swiper-casino">
                            <div class="swiper-wrapper">
                                @foreach (navbar('casino') as $casinos)
                                <div class="swiper-slide">
                                    <div class="item-holder">
                                        <a href="javascript:;" onclick="routeNav('/casino')">
                                            <div class="item-img">
                                                <img title="{{  $casinos->provider }}" alt="{{  $casinos->provider }}"
                                                    src="{{  $casinos->banner }}">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Category List -->

        <!-- Start of Mobile Popular Game -->
        <section class="mobile__games mobile__games--promo">
            <div class="container">
                <div class="games-container">
                    <div class="games-container__header">
                        <div class="games-title">
                            <div class="icon">
                                <img src="../assets/themes/9/img/theme2-icons/category/promo.svg" width="80">
                            </div>
                            <h6>@lang('public.promosi')</h6>
                        </div>
                        <div class="games-action">
                            <div class="action-button">
                                <a href="https://BOSSCLUB.com/promotion" class="btn-custom btn-custom-sm">@lang('public.tampilkan_lainya')</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-promo-list">
                        <div class="swiper-container mobile-swiper-promo">
                            <div class="swiper-wrapper">
                                @foreach ($promotion as $promt)
                                <div class="swiper-slide">
                                    <a href="{{ route('promotiond',$promt->slug) }}">
                                        <div class="list-item">
                                            <div class="item-image">
                                                <img src="{{ env('AWS_URL') }}{{ $promt->gambar }}" alt="">
                                            </div>
                                            <div class="item-context">
                                                <h6>{{ $promt->judul }}.</h6>
                                                <button class="btn-custom">@lang('public.selengkapnya')</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Mobile Popular Game -->

        <section class="mobile__seo">
            <div class="container">
                <div class="game__seo">
                    <div hidden id="title-seo">{{ general()->deskripsi }}</div>
                    <div class="seo-mobile showFooter">
                        <div class="seo-mob-content">
                            <h1 style="text-align:center;">{{ general()->deskripsi }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home__payment">
    <div class="container">
        <div class="payment-title">
            <h6>@lang('public.sys_payment')</h6>
        </div>
        <div class="payment-list row justify-content-center">
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/9XYWYKTS/mbb.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/bwsp8vMc/cimb.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/qq4pdxfj/amb.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/yY67QjyN/hlb.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/bN6pKnm9/rhb.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/gJ9YgPg9/pbb.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/NFDBG2BY/TNG.webp">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bank-border text-center">
                    <div class="bank-status online">@lang('public.online')</div>
                    <div class="bank-item">
                        <img class="img-fluid" src="https://i.postimg.cc/0Qp93H4z/tether.webp">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>

</main>
@endmobile

@endsection
