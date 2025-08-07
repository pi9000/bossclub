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
                <div class="page-header">4D Results</div>
                <div class="game-list-container">
                    @foreach ($provider as $item)
                    <div class="game-holder">
                        <a onclick="routeNav('/lottery/{{ $item->slug }}')" href="javascript:;">
                            <div class="game-bottom"></div>
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
                <div class="lottery-iframe" style="margin-top: 5px; text-align: center;">
                    <iframe src="https://4dyes3.com/pop.php?view=home" frameborder="0" width="100%" height="1200px"></iframe>
                    <br>
                    <small>Powered by <a href='https://BOSSCLUB.live' target="_blank">BOSSCLUB</a></small>
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
