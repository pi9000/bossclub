@extends('frontend.layouts.main')
@section('content')
<main id="main-route">
    <div class="main-content game">
        <div class="container">
            <nav class="breadcrumb-container">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item" text="BOSSCLUB" url="{{ url('/') }}">
                        <a href="{{ url('/') }}" class="breadcrumb-link" target="_self">{{ general()->judul }}</a>
                    </li>
                    <li class="breadcrumb-item" text="Slots" url="{{ url()->current() }}">
                        <a href="{{ url()->current() }}" class="breadcrumb-link" target="_self">{{ $pageTitle }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="game__list">
                <div class="page-header">{{ $pageTitle }}</div>
                <div class="game-list-container">
                    @foreach ($provider as $item)
                    <div class="game-holder">
                        <a @guest onclick="gameAlert()" @endguest @auth href="{{ url('gameIframe?gameType='.$item->GameType.'&providerCode='.$item->ProviderCode.'&gameCode='.$item->GameCode.'&provider_id='.$item->provider_id) }}" target="window-play" @endauth>
                            <div class="game-bottom">
                            </div>
                            <div class="game-img">
                                <img title="{{ $item->provider }}" alt="{{ $item->provider }}"
                                    src="{{ $item->banner }}">
                                <div class="hover-play">
                                    <h6>{{ $item->provider }}</h6>
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="game__seo">
                <div hidden id="title-seo">{{ general()->title }}</div>
                <div class="seo-content showFooter">
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
