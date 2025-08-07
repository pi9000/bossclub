@if(request()->ajax())
<main id="main-route">
    <div class="main-content lottery">
        <div class="container">
            <nav class="breadcrumb-container">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item" text="BOSSCLUB" url="{{ url('/') }}">
                        <a href="{{ url('/') }}" class="breadcrumb-link" target="_self">{{ general()->judul }}</a>
                    </li>
                    <li class="breadcrumb-item" text="Lottery" url="{{ url('/lottery') }}">
                        <a href="{{ url('/lottery') }}" class="breadcrumb-link" target="_self">Lottery</a>
                    </li>
                    <li class="breadcrumb-item" text="4d" url="{{ url()->current() }}">
                        <a href="{{ url()->current() }}" class="breadcrumb-link" target="_self">{{ $pageTitle }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="lottery__container">
                <div class="page-header">Current Market Information</div>
                <div class="lottery-grid">

                    @foreach ($data as $item)
                    <div class="lotto-border" title="Play Now">
                        <a class="main sekarang main-sekarang-alert" @guest href="javascript:;" onclick="gameAlert()" @endguest @auth href="{{ route('games.games',$item->slug) }}" target="window-play" @endauth>
                            <div class="lotto-item">
                                <div class="lotto-flag">
                                    <img src="{{ $item->logo }}">
                                </div>
                                <div class="lotto-info">
                                    <div class="lotto-country">{{ $item->title }}</div>
                                    <div class="lotto-number">{{ $item->keluaran }}</div>
                                    <div class="lotto-date">{{ date('D', strtotime($item->tanggal)) }}, {{ $item->tanggal }}</div>
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

</main>
@else
@include('frontend.games.lot')
@endif
