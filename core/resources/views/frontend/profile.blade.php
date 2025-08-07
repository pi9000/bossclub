@extends('frontend.layouts.main')
@section('content')
    <main id="main-route">
        <div class="main-content profile">
            <div class="container">
                <div class="profile__container">
                    <div class="page-header">Profile</div>
                    <div class="profile__tab">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-account-tab" data-toggle="pill"
                                        data-target="#v-pills-account" type="button" role="tab"
                                        aria-controls="v-pills-account" aria-selected="true"><i
                                            class="fas fa-user-circle"></i><span>@lang('public.akun_saya')</span></button>
                                    <button class="nav-link" id="v-password-tab" data-toggle="pill"
                                        data-target="#v-password" type="button" role="tab" aria-controls="v-password"
                                        aria-selected="false"><i
                                            class="fas fa-lock"></i><span>@lang('public.password')</span></button>
                                    <button class="nav-link" onclick="location.href = '{{ route('member.logout') }}'"><i
                                            class="fas fa-sign-out-alt"></i><span>@lang('public.logout')</span></button>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane text-white fade show active" id="v-pills-account" role="tabpanel"
                                        aria-labelledby="v-pills-account-tab">
                                        <div class="profile-tab__holder my-account">
                                            <div class="tab-header">@lang('public.acc_info')</div>
                                            <div class="tab-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-7 h-auto">
                                                        <div class="my-account__info my-account__holder">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="profile-item">
                                                                        <div class="item-label">@lang('public.username')
                                                                        </div>
                                                                        <h5>{{ auth()->user()->username }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="profile-status">
                                                                        <div class="item-label">
                                                                            @lang('public.member_status')</div>
                                                                        <div class="status-content">
                                                                            <h5>@lang('public.new_play')</h5>
                                                                            <img src="{{ asset('assets/themes/9/img/user-status/New Player.svg') }}"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="profile-item">
                                                                        <div class="item-label">@lang('public.phone')</div>
                                                                        <h5>+60{{ auth()->user()->no_hp }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="profile-item">
                                                                        <div class="item-label">@lang('public.reff_code')
                                                                        </div>
                                                                        <div>
                                                                            <span
                                                                                id="refferalCode"></span>
                                                                            <div class="kyc-btn-grid">
                                                                                <a href="#" id="copyReff"
                                                                                    class="btn-custom btn-custom-sm text-center">
                                                                                    @lang('public.copy')
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (auth()->user()->nama_bank == '-')
                                                        <div class="col-lg-5">
                                                            <div class="my-account__bank my-account__holder">
                                                                <div class="bank-header">
                                                                    <h5>@lang('public.bank_det')</h5>
                                                                    <button class="btn-custom btn-custom-sm"
                                                                        id="profile-add-bank" data-toggle="modal"
                                                                        data-target="#bankDetail">Add Bank</button>
                                                                </div>
                                                                <div
                                                                    class="profile-bank-swiper swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                                                                    <div class="swiper-wrapper" id="otherBank"
                                                                        aria-live="polite"
                                                                        style="transform: translate3d(0px, 0px, 0px);">
                                                                    </div>
                                                                    <div
                                                                        class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                                                                        <span
                                                                            class="swiper-pagination-bullet swiper-pagination-bullet-active"
                                                                            tabindex="0" role="button"
                                                                            aria-label="Go to slide 1"></span>
                                                                    </div>
                                                                    <span class="swiper-notification" aria-live="assertive"
                                                                        aria-atomic="true"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-lg-5">
                                                            <div class="my-account__bank my-account__holder">
                                                                <div class="bank-header">
                                                                    <h5>@lang('public.bank_det')</h5>
                                                                </div>
                                                                <div class="profile-bank-swiper swiper-container">
                                                                    <div class="swiper-wrapper" id="otherBank">
                                                                        <div class="swiper-slide">
                                                                            <div class="bank-details">
                                                                                <div class="acc-info">
                                                                                    <div class="bank-holder">
                                                                                        {{ auth()->user()->nama_lengkap }}
                                                                                    </div>
                                                                                    <div class="bank-type">
                                                                                        @lang('public.rekening_utama')
                                                                                    </div>
                                                                                </div>
                                                                                <div class="acc-number">
                                                                                    {{ auth()->user()->nomor_rekening }}
                                                                                </div>
                                                                                <div class="acc-bank">
                                                                                    <div class="bank-name">
                                                                                        {{ strtoupper(auth()->user()->nama_bank) }}
                                                                                    </div>
                                                                                    <div class="bank-icon">
                                                                                        <img src="https://img-cdngames.s3.amazonaws.com/bank/{{ auth()->user()->nama_bank }}.png"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="my-account__content my-account__holder">
                                                    <div class="info-content text-center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane text-white fade" id="v-password" role="tabpanel"
                                        aria-labelledby="v-password-tab">
                                        <div class="profile-tab__holder change-password">
                                            <div class="tab-header">@lang('public.password')</div>
                                            <div class="tab-wrapper">
                                                <div class="change-password-form">
                                                    <form id="change-password-form">
                                                        <div class="form-group">
                                                            <div class="title">@lang('public.old_password')</div>
                                                            <input type="password" autocomplete="false" id="oldPassword"
                                                                name="oldPassword"
                                                                class="input-custom form-control form-control"
                                                                placeholder="@lang('public.old_password')">
                                                            <label style="font-size: 13px;" class="error"
                                                                for="oldPassword" id="oldPassword-error"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="title">@lang('public.new_password')</div>
                                                            <input type="password" autocomplete="false" id="password"
                                                                name="password"
                                                                class="input-custom form-control form-control"
                                                                placeholder="@lang('public.new_password')">
                                                            <label style="font-size: 13px;" class="error" for="password"
                                                                id="password-error"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="game-details-cont">
                                                                <div class="title">@lang('public.password_regis2')</div>
                                                                <input type="password" autocomplete="false"
                                                                    id="passwordConfirmation" name="passwordConfirmation"
                                                                    class="input-custom form-control"
                                                                    placeholder="@lang('public.password_regis2')">
                                                                <label style="font-size: 13px;" class="error"
                                                                    for="passwordConfirmation"
                                                                    id="passwordConfirmation-error"></label>
                                                            </div>
                                                        </div>
                                                        <div class="change-password-button">
                                                            <button type="submit" id="changePassword"
                                                                class="btn-submit btn-custom">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane text-white fade" id="v-pills-downline" role="tabpanel"
                                        aria-labelledby="v-pills-downline-tab">
                                        <div class="profile-tab__holder downline-list">
                                            <div class="tab-content page-form">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem quae
                                                laudantium quis non iusto? Incidunt aliquid a labore ducimus officia, natus
                                                aperiam quaerat, cumque eaque dignissimos facere alias in illum.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-popup fade" id="bankDetail" tabindex="-1" aria-labelledby="bankDetailLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="modal-body">
                        <div class="popup-bank-detail">
                            <div class="bank-detail-header">
                                <h4>@lang('public.bank_det')</h6>
                            </div>
                            <form id="addOptBankForm" method="POST" action="{{ route('optionalBankCreate') }}">
                                @csrf
                                <input type="hidden" name="newData" value="true">
                                <div class="add-bank-form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="add-bank-cont">
                                                <div class="title">@lang('public.accName_regis')</div>
                                                <input id="optAccountName" name="optAccountName" class="form-control-sm"
                                                    type="text" placeholder="@lang('public.accNumber_regis')">
                                                <span id="optAccountName-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add-bank-cont">
                                                <div class="title">@lang('public.bank_regis_pilih')</div>
                                                <select class="form-control form-control-sm" name="chooseOptionalBank"
                                                    id="chooseOptionalBank">
                                                    <option value="">--- @lang('public.bank_regis_pilih') ---</option>
                                                    <optgroup label="bank">
                                                        <option value="mbb" data-max="15" data-min="10">
                                                            MayBank
                                                        </option>
                                                        <option value="cimb" data-max="15" data-min="10">
                                                            CIMB Bank
                                                        </option>
                                                        <option value="pbb" data-max="15" data-min="10">
                                                            Public Bank
                                                        </option>
                                                        <option value="hlb" data-max="15" data-min="10">
                                                            Hong Leong Bank
                                                        </option>
                                                        <option value="rhb" data-max="15" data-min="10">
                                                            RHB Bank
                                                        </option>
                                                        <option value="amb" data-max="15" data-min="10">
                                                            AmBank
                                                        </option>
                                                        <option value="afb" data-max="15" data-min="10">
                                                            Affin Bank
                                                        </option>
                                                        <option value="bsn" data-max="15" data-min="10">
                                                            Bank Simpanan Nasional
                                                        </option>
                                                        <option value="bimb" data-max="15" data-min="10">
                                                            Bank Islam
                                                        </option>
                                                        <option value="bmmb" data-max="15" data-min="10">
                                                            Bank Muamalat
                                                        </option>
                                                        <option value="bry" data-max="15" data-min="10">
                                                            Bank Rakyat
                                                        </option>
                                                        <option value="ocbc" data-max="15" data-min="10">
                                                            OCBC Bank
                                                        </option>
                                                        <option value="uob" data-max="15" data-min="10">
                                                            UOB Bank
                                                        </option>
                                                        <option value="alb" data-max="15" data-min="10">
                                                            Alliance Bank
                                                        </option>
                                                        <option value="citi" data-max="15" data-min="10">
                                                            CITI Bank
                                                        </option>
                                                        <option value="hsbc" data-max="15" data-min="10">
                                                            HSBC Bank
                                                        </option>
                                                        <option value="scb" data-max="15" data-min="10">
                                                            Standard Charted Bank
                                                        </option>
                                                        <option value="mbsb" data-max="15" data-min="10">
                                                            MBSB Bank
                                                        </option>
                                                        <option value="boc" data-max="15" data-min="10">
                                                            Bank Of China
                                                        </option>
                                                        <option value="kwt" data-max="15" data-min="10">
                                                            Kuwait Bank
                                                        </option>
                                                        <option value="mtrade" data-max="15" data-min="10">
                                                            Merchantrade
                                                        </option>
                                                        <option value="tng" data-max="15" data-min="10">
                                                            Touch N Go
                                                        <option value="dbs" data-max="15" data-min="10">
                                                            DBS Bank
                                                        </option>
                                                    </optgroup>
                                                </select>
                                                <span id="chooseOptionalBank-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add-bank-cont">
                                                <div class="title" id="labelAccNumb">@lang('public.accNumber_regis')</div>
                                                <div class="input-group input-group-sm">
                                                    <input class="form-control" type="text" name="optAccountNumber"
                                                        id="optAccountNumber" minlength="8" maxlength="20"
                                                        autocomplete="off" placeholder="@lang('public.accNumber_regis')" required>
                                                </div>
                                                <span id="optAccountNumber-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bank-button" id="bankButton">
                                    <a class="btn-custom btn-custom-sm cancel add-bank">Add Bank.</a>
                                    <button id="submitBank" class="btn-custom btn-custom-sm ">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection

@push('script')
    <script>
        $('#copyReff').click(function(e) {
            e.preventDefault();
            const buttonText = $(this).text()
            const refText = $('#refferalCode').text();
            $(this).html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="loading"></span>`
            )
            let $temp = $("<input>");
            $("body").append($temp);
            const text = $temp.val("{{ url('/') }}/register?reff=" + refText).select();
            document.execCommand("copy");
            $('#refferalCode').text("Copied..")
            setTimeout(() => {
                $('#refferalCode').text(refText)
                $temp.remove();
                $(this).text(buttonText)
            }, 1000)
        });

        $("button[id=submitBank]").hide()

        $('.add-bank').click(function() {
            $('.form-control').removeClass('is-valid').removeClass('is-invalid')
            $('input[name="newData"]').val("true")
            $("form[id=addOptBankForm]")[0].reset()
            $('.add-bank-form').slideToggle();
            const $this = $(this);
            $this.toggleClass('add-bank');
            if ($this.hasClass('add-bank')) {
                $("button[id=submitBank]").hide()
                $this.text("Add Bank.");
            } else {
                $("button[id=submitBank]").show()
                $this.text("Cancel");
            }
        });


        $("form[id=addOptBankForm]").validate({
            onkeyup: false,
            rules: {
                optAccountName: {
                    required: true
                },
                chooseOptionalBank: {
                    required: true
                },
                optAccountNumber: {
                    required: true,
                    validatePhone: true
                },
            },
            messages: {
                optAccountName: {
                    required: "The :attribute field is required.",
                },
                chooseOptionalBank: {
                    required: "The :attribute field is required.",
                },
                optAccountNumber: {
                    required: "The :attribute field is required.",
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

        function allowedKey(event, regex) {
            let reg = new RegExp(regex);
            let k = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!reg.test(k)) {
                event.preventDefault();
                return false;
            }
        }

        $('#optAccountName').bind('keypress', function(event) {
            return allowedKey(event, "^[a-zA-Z ]+$")
        });
        $('#optAccountNumber').bind('keypress', function(event) {
            return allowedKey(event, "^[0-9]+$")
        });


        var timer;
        $('#optAccountNumber').on('focusout', function() {
            $("#optAccountNumber-error").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
            let norek = $('#optAccountNumber').val()
            if (norek.length > 6) {
                clearTimeout(timer);
                timer = setTimeout(userNumberCheck, 2000);
            } else {
                $("#optAccountNumber-error").hide()
            }
        });

        function userNumberCheck() {
            let norek = $('#optAccountNumber').val()
            if (norek.length < 6) {
                $("#optAccountNumber-error").hide();
                return false;
            }
            let url = "{{ route('user.norek') }}"
            $("#optAccountNumber-error").show();
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    norek: norek
                },
                success: function(data) {
                    if (data.success === false) {
                        $("#optAccountNumber").removeClass('is-invalid').addClass('is-valid')
                        $("#optAccountNumber-error").text(data.error);
                    } else {
                        $("#optAccountNumber").removeClass('is-valid').addClass('is-invalid')
                        $("#optAccountNumber-error").text(data.error);
                    }
                },
            });
        };

        $("#change-password-form").validate({
            onkeyup: false,
            rules: {
                oldPassword: {
                    required: true,
                    minlength: 8
                },
                password: {
                    required: true,
                    minlength: 8
                },
                passwordConfirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: '#password'
                },
            },
            messages: {
                oldPassword: {
                    required: "@lang('public.empty_password')",
                    minlength: "@lang('public.password_length')"
                },
                password: {
                    required: "@lang('public.empty_password')",
                    minlength: "@lang('public.password_length')"
                },
                passwordConfirmation: {
                    required: "@lang('public.empty_password')",
                    minlength: "@lang('public.password_length')",
                    equalTo: "@lang('public.password_confirm')"
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element)
            },
            highlight: function(element, errorClass) {
                $(element).closest(".form-control-sm").addClass("is-invalid");
            },
            unhighlight: function(element, errorClass) {
                $(element).closest(".form-control-sm").removeClass("is-invalid").addClass("is-valid");
            },
            submitHandler: function(form) {
                changePass()
            }
        });

        function changePass() {
            const el = $('#changePassword')
            const elText = $('#changePassword').text()
            el.html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="loading"></span>`
            )
            const oldPassword = $('#oldPassword').val()
            const password = $('#password').val()
            const passwordConfirmation = $('#passwordConfirmation').val()

            $.ajax({
                type: "POST",
                url: "{{ route('update.password') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    oldPassword: oldPassword,
                    password: password,
                    passwordConfirmation: passwordConfirmation,
                },
                success: function(response) {
                    if (response.success === true) {
                        $('#changePassword').text(elText)
                        Swal.fire(response.error, response.message, 'success', 1500)
                        setTimeout(() => {
                            location.reload()
                        }, 1500)
                    } else {
                        const data = response.message;
                        let msg = '';
                        if (typeof data == "string") {
                            msg += data
                        } else {
                            $.each(data, function(key, val) {
                                msg += `
                                    ${val}<br/>
                                `
                            });
                        }
                        $('#changePassword').text(elText)
                        Swal.fire(response.error, msg, 'warning', 1500)
                    }
                }
            });
        };
    </script>
@endpush
