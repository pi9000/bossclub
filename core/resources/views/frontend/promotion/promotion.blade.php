@if (request()->ajax())
<main id="main-route">
    <div class="main-content promo">
        <div class="container">
            <nav class="breadcrumb-container">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item" text="BOSSCLUB" url="{{ url('/') }}">
                        <a href="{{ url('/') }}" class="breadcrumb-link" target="_self">{{ general()->judul }}</a>
                    </li>
                    <li class="breadcrumb-item" text="Promotion" url="{{ url()->current() }}">
                        <a href="{{ url()->current() }}" class="breadcrumb-link" target="_self">@lang('public.promosi')</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="promo__container">
                <div class="page-header">@lang('public.promo_regis')</div>
                <div class="promo__list">
                    @foreach ($promotion as $promo)
                    <a href="{{ route('promotiond',$promo->slug) }}">
                        <div class="list-item">
                            <div class="item-image">
                                <img src="{{ $promo->gambar }}" alt="">
                            </div>
                            <div class="item-context">
                                <h6>{{ $promo->judul }}</h6>
                                <button class="btn-custom">@lang('public.selengkapnya')</button>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
                filterPromoSelection('all')
            });
    </script>
</main>
@else
@include('frontend.promotion.pr')
@endif
