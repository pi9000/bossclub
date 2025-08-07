@extends('frontend.layouts.main')
@section('content')
<main id="main-route">
    <div class="main-content post">
        <div class="container">
            <nav class="breadcrumb-container">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item" text="BOSSCLUB" url="{{ url('/') }}">
                        <a href="{{ url('/') }}" class="breadcrumb-link" target="_self">{{ general()->judul }}</a>
                    </li>
                    <li class="breadcrumb-item" text="Promotion" url="{{ url('/promotion') }}">
                        <a href="{{ url('/promotion') }}" class="breadcrumb-link" target="_self">@lang('public.promosi')</a>
                    </li>
                    <li class="breadcrumb-item" text="Deposit-pulsa-tanpa-potongan-telkomsel-xl-axis-three"
                        url="{{ url()->current() }}">
                        <a href="{{ url()->current() }}" class="breadcrumb-link" target="_self">{{ $now->judul }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="post__container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main-post">
                            <a href="{{ url('/promotion') }}" class="post-back btn-custom"><i
                                    class="fas fa-angle-left"></i> Back</a>
                            <div class="post-img">
                                <img src="{{ $now->gambar }}" alt="">
                            </div>
                            <div class="post-title">{{ $now->judul }}</div>
                            <div class="post-date"><span>Posted on: </span>2021-04-11 10:45:11</div>
                            <div class="post-content">
                                {!! $now->text !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="other-post">
                            <div class="other-header">@lang('public.promo_regis')</div>
                            @foreach ($promotion as $promo)
                            <a href="{{ route('promotiond',$promo->slug) }}">
                                <div class="other-item">
                                    <div class="img">
                                        <img src="{{ $promo->gambar }}"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <div class="title">{{ $promo->judul }}</div>
                                        <div class="read-more">@lang('public.selengkapnya')</div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
