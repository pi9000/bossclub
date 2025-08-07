@extends('frontend.layouts.verify')
@section('content')
<main>
    <div class="main-content register post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="register__container">
                        <div class="page-header">@lang('public.verify_form')</div>
                        <form id="register-form" method="POST" action="{{ route('verify_otp') }}" data-parsley-validate="" novalidate="novalidate">
                            {{ csrf_field() }}
                            <input type="hidden" name="ipAddress" value="{{ request()->ip() }}">
                            <div class="register-form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                            <label for="phone">@lang('public.phone_regis')</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+60</span>
                                                </div>
                                                <input class="form-control input-custom is-valid" value="{{ auth()->user()->no_hp }}" type="text" name="phone" minlength="8" maxlength="20" placeholder="@lang('public.phone_regis')" autocomplete="off" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                            <label for="accName">@lang('public.verify')</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control input-custom" value="" type="text" name="otp" minlength="4" maxlength="4" placeholder="@lang('public.verify')" autocomplete="off">
                                                <div class="input-group-prepend">
                                                    <button onclick="resendCode();" type="button" class="btn btn-sm btn-info">
                                                        @lang('public.resend_code')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button id="registerButton" class="daftar btn-custom button-submit" type="submit">
                                            @lang('public.submit_regis')
                                            <div id="progressButton" class="progress-line"></div>
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="game__seo">
            <div hidden id="title-seo">{{ general()->title }}</div>
            <div class="seo-content showFooter">

            </div>
        </div>
    </div>
</main>

<script>
    function resendCode() {
        $.ajax({
        type: "GET",
        url: "{{ route('resend_code') }}",
        success: function(response) {
            if (response.success == true) {
                Swal.fire({
                    title: "Success!",
                    text: "The verification code has been sent",
                    icon: "success"
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: response.message,
                    icon: "error"
                });
            }
        }
    });
    }

</script>
@endsection