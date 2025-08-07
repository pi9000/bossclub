@extends('frontend.layouts.main')
@section('content')
    <main id="main-route">
        <div class="main-content register post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="register__container">
                            <div class="page-header"><i class="fas fa-user-alt mr-2"></i>| @lang('public.regis_form')</div>
                            <form id="register-form" method="POST" action="{{ route('register') }}" data-parsley-validate=""
                                novalidate="novalidate">
                                {{ csrf_field() }}
                                <input type="hidden" name="ipAddress" value="{{ request()->ip() }}">
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="register__note">
                                                <div class="note__head">@lang('public.catatan') :</div>
                                                <div class="note__content">
                                                    @lang('public.catatan_username')<br>
                                                    @lang('public.catatan_password')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div
                                                class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                                <label for="username_register">@lang('public.username_regis')</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control input-custom" type="text" value=""
                                                    name="username" id="username_register" minlength="6" maxlength="15"
                                                    placeholder="@lang('public.username_regis')" data-parsley-trigger="keyup"
                                                    style="text-transform: lowercase" autocomplete="off" autofocus>
                                                <span id="username_register-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div
                                                class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                                <label for="password">@lang('public.password_regis')</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control input-custom" type="password" name="password"
                                                    id="password_register" minlength="8" maxlength="25"
                                                    placeholder="@lang('public.password_regis')" data-parsley-trigger="keyup"
                                                    autocomplete="off">
                                                <span id="password_register-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div
                                                class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                                <label for="rePassword">@lang('public.password_regis2')</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control input-custom" type="password"
                                                    name="password_confirmation" id="password_confirmation" minlength="8"
                                                    maxlength="25" placeholder="@lang('public.password_regis2')"
                                                    data-parsley-equalto="#password" data-parsley-trigger="keyup"
                                                    autocomplete="off">
                                                <span id="password_confirmation-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="phoneInput">
                                        <div class="row">
                                            <div
                                                class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                                <label for="phone">@lang('public.phone_regis')</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+60</span>
                                                    </div>
                                                    <input class="form-control input-custom" value="" type="text"
                                                        name="phone" id="phone" minlength="8" maxlength="20"
                                                        placeholder="123456789" data-parsley-type="number"
                                                        data-parsley-trigger="keyup" autocomplete="off">
                                                </div>
                                                <span id="phone-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div
                                                class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                                <label for="referral">@lang('public.reff_code')</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control input-custom" type="text" name="referral"
                                                    id="referral" minlength="4" maxlength="25"
                                                    placeholder="Referral Code (Optional)" value="{{ $refferal }}"
                                                    autocomplete="off">
                                                <span id="referral-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div
                                                class="col-lg-4 form-label d-flex align-items-center justify-content-start">
                                                <label for="captcha">Captcha*</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="cap-img">
                                                    <div class="cap-content">
                                                        <img id="captcha" src="{{ captcha_src() }}">
                                                        <button id="refreshCaptcha" class="btn btn-sm btn-info">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="cap-content">
                                                    <input class="form-control input-code" type="text" name="captcha"
                                                        id="captcha" placeholder="Captcha" data-parsley-type="number"
                                                        data-parsley-trigger="keyup">
                                                </div>
                                                <span id="captcha-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="term" class="register-terms">
                                                    <input type="checkbox" name="term" id="term">
                                                    <span class="text-justify">@lang('public.check_regis') <u><a
                                                                href="/help">@lang('public.check_regis2')</a></u>
                                                        @lang('public.check_regis3')</span>
                                                </label>
                                                <span id="term-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button id="registerButton" class="daftar btn-custom button-submit"
                                                type="submit">
                                                @lang('public.submit_regis')
                                                <div id="progressButton" class="progress-line"></div>
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post__container ">
                        <div class="other-post">
                            <div class="other-header">@lang('public.promo_regis')</div>
                            @foreach ($promotion as $promot)
                                <a href="{{ route('promotiond', $promot->slug) }}">
                                    <div class="other-item">
                                        <div class="img">
                                            <img src="{{ env('AWS_URL') }}{{ $promot->gambar }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="title">{{ $promot->judul }}</div>

                                            <div class="read-more">@lang('public.selengkapnya')</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
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
@endsection

@push('costum-sc')
    <script>
        $(document).ready(function() {
            $('#refreshCaptcha').click(function(e) {
                e.preventDefault();
                $('#captcha').attr('src', window.location.origin + '/captcha/default?' + Math.random())
            });
        });

        function loadingBar() {
            let i = 0;
            if (i == 0) {
                i = 1;
                let elem = document.getElementById("progressButton");
                let width = 1;
                let id = setInterval(frame, 10);

                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }

        var timer;
        // $('#accNumber').on('focusout', function() {
        //     $("#accNumber-error").html(
        //         `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        //     let norek = $('#accNumber').val()
        //     if (norek.length > 6) {
        //         clearTimeout(timer);
        //         timer = setTimeout(userNumberCheck, 2000);
        //     } else {
        //         $("#accNumber-error").hide()
        //     }
        // });

        // function userNumberCheck() {
        //     let norek = $('#accNumber').val()
        //     if (norek.length < 6) {
        //         $("#accNumber-error").hide();
        //         return false;
        //     }
        //     let url = "{{ route('user.norek') }}"
        //     $("#accNumber-error").show();
        //     $.ajax({
        //         type: 'post',
        //         url: url,
        //         data: {
        //             _token: "{{ csrf_token() }}",
        //             norek: norek
        //         },
        //         success: function(data) {
        //             if (data.success === false) {
        //                 $("#accNumber").removeClass('is-invalid').addClass('is-valid')
        //                 $("#accNumber-error").text(data.error);
        //             } else {
        //                 $("#accNumber").removeClass('is-valid').addClass('is-invalid')
        //                 $("#accNumber-error").text(data.error);
        //             }
        //         },
        //     });
        // };

        $('#phone').on('focusout', function() {
            $("#phone-error").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
            let phone = $('#phone').val()
            if (phone.length > 6) {
                clearTimeout(timer);
                timer = setTimeout(userphoneCheck, 2000);
            } else {
                $("#phone-error").hide()
            }
        });

        function userphoneCheck() {
            let phone = $('#phone').val()
            if (phone.length < 6) {
                $("#phone-error").hide();
                return false;
            }
            let url = "{{ route('user.phone') }}"
            $("#phone-error").show();
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    phone: phone
                },
                success: function(data) {
                    if (data.success === false) {
                        $("#phone").removeClass('is-invalid').addClass('is-valid')
                        $("#phone-error").text(data.error);
                    } else {
                        $("#phone").removeClass('is-valid').addClass('is-invalid')
                        $("#phone-error").text(data.error);
                    }
                },
            });
        };

        $('#username_register').on('focusout', function() {
            $("#username_register-error").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
            let username = $('#username_register').val()
            if (username.length > 6) {
                clearTimeout(timer);
                timer = setTimeout(userCheck, 2000);
            } else {
                $("#username_register-error").hide()
            }
        });

        function userCheck() {
            let username = $('#username_register').val()
            if (username.length < 6) {
                $("#username_register-error").hide();
                return false;
            }
            let url = "{{ route('user.check') }}"
            $("#username_register-error").show();
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    username: username
                },
                success: function(data) {
                    if (data.success === false) {
                        $("#username_register").removeClass('is-invalid').addClass('is-valid')
                        $("#username_register-error").text(data.error);
                    } else {
                        $("#username_register").removeClass('is-valid').addClass('is-invalid')
                        $("#username_register-error").text(data.error);
                    }
                },
            });
        };

        $("#phone").on('input propertychange paste', function() {
            var reg = /^0+/gi;
            if (this.value.match(reg)) {
                this.value = this.value.replace(reg, '');
            }
        });

        function allowedKey(event, regex) {
            let reg = new RegExp(regex);
            let k = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!reg.test(k)) {
                event.preventDefault();
                return false;
            }
        }

        $('#username_register').bind('keypress', function(event) {
            return allowedKey(event, "^[a-zA-Z0-9]+$")
        });
        $('#phone').bind('keypress', function(event) {
            return allowedKey(event, "^[0-9]+$")
        });
        // $('#accName').bind('keypress', function(event) {
        //     return allowedKey(event, "^[a-zA-Z ]+$")
        // });
        // $('#accNumber').bind('keypress', function(event) {
        //     return allowedKey(event, "^[0-9]+$")
        // });

        jQuery.validator.addMethod("validatePhone", function(value, element) {
            let currency = "IDR"
            if ($('select[id=bank] :selected').parent().attr('label') != "bank") {
                if (currency == "IDR" && $("input[name=phone]").val()[0] != 8) {
                    return false;
                } else {
                    return true
                }
            } else {
                return true;
            }
        }, "Invalid number, please check your phone number again.");

        $("#register-form").validate({
            onkeyup: false,
            rules: {
                username: {
                    required: true,
                    minlength: 6
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: '#password_register'
                },
                // bank: {
                //     required: true
                // },
                phone: {
                    required: true,
                    validatePhone: true
                },
                // accName: {
                //     required: true
                // },
                // accNumber: {
                //     required: true
                // },
                captcha: {
                    required: true
                },
                term: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "@lang('public.empty_username')",
                    minlength: "@lang('public.userName_length')"
                },
                password: {
                    required: "@lang('public.empty_password')",
                    minlength: "@lang('public.password_length')"
                },
                password_confirmation: {
                    required: "@lang('public.empty_password')",
                    minlength: "@lang('public.password_length')",
                    equalTo: "@lang('public.password_confirm')"
                },
                // bank: {
                //     required: "@lang('public.sel_bank')",
                // },
                phone: {
                    required: "@lang('public.empty_phone')",
                },
                // accName: {
                //     required: "@lang('public.empty_AccName')"
                // },
                // accNumber: {
                //     required: "@lang('public.empty_AccNum')"
                // },
                captcha: {
                    required: "@lang('public.empty_captcha')"
                },
                term: {
                    required: "@lang('public.empty_term')"
                }
            },
            errorPlacement: function(error, element) {
                let error_id = element.attr("id")
                error.insertAfter($(`span[id=${error_id}-error]`))
            },
            highlight: function(element, errorClass) {
                $(element).closest(".form-control").addClass("is-invalid");
            },
            unhighlight: function(element, errorClass) {
                $(element).closest(".form-control").removeClass("is-invalid").addClass("is-valid");
            }
        });

        $("input[id=accNumber]").attr("maxlength", 99)
        $("select[id=bank]").on("change", function(e) {
            e.preventDefault()
            const cat = $('select[id=bank] :selected').parent().attr('label');
            if (cat == "bank") {
                $("#accountName").show()
                $("#accountNumber").show()
                $("#phoneInput").show()
                $("input[name=phone]").val("");
                $("input[name=accNumber]").unbind("keyup");
                const max = $("select[id=bank]").find(':selected').data('max')
                const min = $("select[id=bank]").find(':selected').data('min')
                if (max == 0) {
                    $("input[name=accNumber]").removeAttr("minlength").removeAttr("maxlength")
                    return false
                }
                $("input[name=accNumber]").attr("minlength", min).attr("maxlength", max)
            } else if (cat == "epayment") {
                $("#phoneInput").hide()
                $("input[name=accNumber]").attr("minlength", 8).attr("maxlength", 13)
                $("#accountNumber").show()
                $($("input[name=accNumber]")).on('keyup', function() {
                    $("input[name=phone]").val(this.value)
                });
                $("#accountName").show()
                $("span[id=accName-error]").html("<small>" +
                    "Please ensure the name matches the bank you have selected." + "</small>")
                $("span[id=phone-error]").html("<small>" +
                    "Please ensure the name matches the number you have selected." + "</small>")
            } else {
                $("#accountName").hide()
                $("#accountNumber").hide()
                $("#phoneInput").show()
                $($("#phone")).on('keyup', function() {
                    $("#accNumber").val("0" + this.value)
                });
                $("#accName").val($('#username_register').val())
            }
        })
    </script>
@endpush
