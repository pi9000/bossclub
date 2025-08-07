@extends('frontend.layouts.main')
@section('content')
<main id="main-route">
    <div class="main-content contact-us">
        <div class="container">
            <div class="page-header">@lang('public.contact_us')</div>
            <div class="contact-us__content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="https://bossclubcs2.wasap.my" target="_blank" rel="noreferrer">
                            <div class="contact-us__item">
                                <div class="item-header whatsapp">
                                    WHATSAPP</div>
                                <div class="item-content">
                                    <h5 class="title">@lang('public.ws_cs1')</h5>
                                    <div class="description">@lang('public.ws_content1')</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="https://bossclub.wasap.my" target="_blank" rel="noreferrer">
                            <div class="contact-us__item">
                                <div class="item-header whatsapp">
                                    WHATSAPP</div>
                                <div class="item-content">
                                    <h5 class="title">@lang('public.ws_cs2')</h5>
                                    <div class="description">@lang('public.ws_content2')</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="https://t.me/bossclub_cs" target="_blank" rel="noreferrer">
                            <div class="contact-us__item">
                                <div class="item-header telegram">
                                    TELEGRAM</div>
                                <div class="item-content">
                                    <h5 class="title">@lang('public.tg_cs1')</h5>
                                    <div class="description">@lang('public.tg_content1')</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="https://t.me/bossclub_cs" target="_blank" rel="noreferrer">
                            <div class="contact-us__item">
                                <div class="item-header telegram">
                                    TELEGRAM CHANNEL</div>
                                <div class="item-content">
                                    <h5 class="title">@lang('public.tg_channel')</h5>
                                    <div class="description">@lang('public.tg_content2')</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
