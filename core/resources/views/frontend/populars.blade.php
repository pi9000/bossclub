@extends('frontend.layouts.main')
@section('content')
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <nav class="breadcrumb-container">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item" text="BOSSCLUB" url="{{ url('/') }}">
                        <a href="{{ url('/') }}" class="breadcrumb-link" target="_self">{{ general()->judul }}</a>
                    </li>
                    <li class="breadcrumb-item" text="Fachai" url="{{ url()->current() }}">
                        <a href="{{ url()->current() }}" class="breadcrumb-link" target="_self">@lang('public.popular')</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="slot-game__container">
                <div class="slot-game-header">
                    <h3>@lang('public.popular')</h3>
                </div>
                <div class="slot-game-list">
                    @foreach ($games as $item)
                    <div class="slot-game-item slot-tg xslot">
                        <a class="main sekarang main-sekarang-alert" @guest href="javascript:;" onclick="gameAlert()"
                            @endguest @auth
                            href="{{ url('gameIframe?gameType='.$item->GameType.'&providerCode='.$item->ProviderCode.'&gameCode='.$item->GameCode.'&provider_id='.$item->provider_id) }}"
                            target="_blank" @endauth>
                            <div class="slot-game-tag hot">
                                <div class="info"><i class="fab fa-hotjar"></i> @lang('public.permainan_baru')</div>
                            </div>
                            <div class="slot-game-img">
                                <img src="{{ $item->Game_image }}" style="" loading="lazy">
                            </div>
                            <div class="hover-play">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="progress baradjust rounded-0">
                                <div class="progress-bar progress-bar-striped progress-bar-animated @if (generateRandomRTP() > 85) bg-success @else bg-info @endif"
                                    id="progress-rtp" role="progressbar" style="width:{{ generateRandomRTP() }}%;"
                                    aria-valuenow="{{ generateRandomRTP() }}" aria-valuemin="0" aria-valuemax="100">
                                    RTP {{ generateRandomRTP() }}%
                                </div>
                            </div>
                            <div class="games-bottom">
                                <div class="bottom-info">
                                    <div class="name">{{ $item->GameName }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="game mt-5">
                <div class="game__seo">
                    <div hidden id="title-seo">BOSSCLUB: @lang('public.popular')</div>
                    <div class="seo-content showFooter">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
