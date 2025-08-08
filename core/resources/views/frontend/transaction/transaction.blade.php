@extends('frontend.layouts.main')
@section('content')
    <style>
        .styled {
            border: 0;
            line-height: 2.5;
            padding: 0 10px;
            font-size: 0.875rem;
            text-align: center;
            color: #fff;
            text-shadow: 1px 1px 1px #000;
            border-radius: 5px;
            background-color: rgb(17 58 51 / 100%);
            background-image: linear-gradient(to top left,
                    rgb(0 0 0 / 20%),
                    rgb(0 0 0 / 20%) 30%,
                    rgb(0 0 0 / 0%));
            box-shadow:
                inset 1px 1px 2px rgb(255 255 255 / 60%),
                inset -1px -1px 2px rgb(0 0 0 / 60%);
        }

        .styled:hover {
            background-color: rgb(119 208 7 / 100%);
        }

        .styled:active {
            box-shadow:
                inset -1px -1px 2px rgb(119 208 7 / 60%),
                inset 1px 1px 2px rgb(0 0 0 / 60%);
        }

        .styled.active {
            background-color: rgb(119 208 7 / 100%) !important;
            box-shadow:
                inset -1px -1px 2px rgb(119 208 7 / 60%) !important,
                inset 1px 1px 2px rgb(0 0 0 / 60%) !important;
            color: #fff;
        }

        .headr_button {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            gap: 7px;
            /* Add spacing between buttons */
            flex-wrap: wrap;
            /* Wrap buttons if needed */
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = document.querySelectorAll(".headr_button .styled");

            // Set the "Bank Transfer" button as active by default
            const defaultButton = document.getElementById("navmanual");
            if (defaultButton) {
                defaultButton.classList.add("active");
            }

            buttons.forEach((button) => {
                button.addEventListener("click", () => {
                    // Remove active class from all buttons
                    buttons.forEach((btn) => btn.classList.remove("active"));

                    // Add active class to the clicked button
                    button.classList.add("active");
                });
            });
        });
    </script>

    <main id="main-route">
        <div class="main-content transaksi">
            <div class="container">
                <ul class="component-tabs nav nav-tabs" id="transactionTabs">
                    <li class="nav-item">
                        <a class="button-pills nav-link active" id="nav-deposit-tab" data-toggle="tab" href="#nav-deposit"
                            role="tab" aria-controls="nav-deposit" aria-expanded="false">
                            <i class="fas fa-wallet"></i>
                            <span>@lang('public.deposit')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="button-pills nav-link" id="nav-withdraw-tab" data-toggle="tab" href="#nav-withdraw"
                            role="tab" aria-controls="nav-withdraw" aria-expanded="false">
                            <i class="fas fa-coins"></i>
                            <span>@lang('public.withdraw')</span>
                        </a>
                    </li>
                </ul>
                <div class="component-tab-content tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="nav-deposit" role="tabpanel"
                        aria-labelledby="nav-deposit-tab">
                        <div class="transaksi-grid row">
                            <div class="col-lg-8">
                                <div class="transaksi-form">
                                    <div class="transaksi-formulir page-form">
                                        <div class="page-form__header headr_button">
                                            <button type="button" class="styled btn-sm active" id="navmanual">
                                                Bank Transfer
                                            </button>

                                            <button type="button" class="styled btn-sm" id="navfpx">
                                                FPX Online
                                            </button>

                                            <button type="button" class="styled btn-sm" id="navreload">
                                                TNG Reload
                                            </button>
                                        </div>
                                        <div class="page-form__content" id="nav-navmanual" style="display: show;">
                                            <div class="transaksi-payment-holder">
                                                <div class="transaksi-payment transaction-payment-swiper swiper-container">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($bank as $ba)
                                                            <div class="swiper-slide payment-item">
                                                                <div class="payment-status online"></div>
                                                                <div class="payment-body">
                                                                    <div class="payment-icon">
                                                                        <img src="{{ $ba->icon }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="payment-navigation">
                                                    <button class="btn-custom btn-custom-sm navigation-prev--payment">
                                                        <i class="fas fa-angle-left"></i>
                                                    </button>
                                                    <button class="btn-custom btn-custom-sm navigation-next--payment">
                                                        <i class="fas fa-angle-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <form id="formDeposit" enctype="multipart/form-data" method="post"
                                                action="{{ route('transaksi.deposit') }}">
                                                @csrf
                                                <div class="transaksi-formulir flip-card">
                                                    <div class="flip-front">
                                                        <div class="formulir-form">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.dari_bank')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select class="custom-selection form-control"
                                                                            id="dari_bank" name="dari_bank">
                                                                            <option value="" selected=""
                                                                                disabled="">---
                                                                                @lang('public.bank_regis_pilih') ---
                                                                            </option>
                                                                            <option
                                                                                value="{{ auth()->user()->nama_bank }} / {{ auth()->user()->nomor_rekening }} / {{ auth()->user()->nama_pemilik }}">
                                                                                {{ strtoupper(auth()->user()->nama_bank) }}
                                                                                -
                                                                                {{ auth()->user()->nomor_rekening }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.jumlah_deposit')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input name="nominal" required=""
                                                                            id="depositAmount"
                                                                            class="input-custom form-control" type="number"
                                                                            placeholder="30.00">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.bank_regis_pilih')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select class="custom-selection form-control"
                                                                            id="bankSelect" name="metode">
                                                                            <option value="">---
                                                                                @lang('public.bank_regis_pilih') ---
                                                                            </option>
                                                                            @foreach ($bank as $bks)
                                                                                <option value="{{ $bks->id }}"
                                                                                    data-code="{{ $bks->nama_bank }}"
                                                                                    data-min="10" data-max="3000"
                                                                                    data-rate="100">{{ $bks->nama_bank }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @foreach ($bank as $banks)
                                                                <div class="form-group bankOption"
                                                                    id="bank-{{ $banks->id }}" style="display: none;">
                                                                    <input type="hidden" name="nama_bank"
                                                                        value="{{ $banks->nama_bank }}">
                                                                    <div class="row">
                                                                        <div class="col-lg-3"></div>
                                                                        <div class="col-lg-6">
                                                                            <div class="card">
                                                                                <div class="card-header text-center p-1">
                                                                                    <img class="img-fluid"
                                                                                        style="max-height: 150px"
                                                                                        src="{{ $banks->icon }}">
                                                                                </div>
                                                                                <div class="card-body text-dark"
                                                                                    style="font-weight: 600; font-size: 11px;">
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            @lang('public.akun_tujuan'):
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            {{ $banks->nama_pemilik }}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            @lang('public.rek_tujuan'):
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-auto flex-shrink-1">
                                                                                            <a href="javascript:;"
                                                                                                class="ml-2 p-1"
                                                                                                name="copyAddress"
                                                                                                id="{{ $banks->id }}">
                                                                                                <span
                                                                                                    id="addressText-{{ $banks->id }}">{{ $banks->nomor_rekening }}</span>
                                                                                                <span name="buttonCopy"><i
                                                                                                        class="fas fa-copy"></i></span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            Min. Deposit:
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            MYR
                                                                                            {{ number_format(general()->min_depo) }}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            Max. Deposit:
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            MYR 50,000.00
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach


                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.pilih_bonus')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select class="custom-selection form-control"
                                                                            name="bonus" id="bonus">
                                                                            <option value="tanpabonus" selected="">
                                                                                @lang('public.tanpa_bonus')
                                                                            </option>
                                                                            @foreach ($bonus as $bonuse)
                                                                                <option value="{{ $bonuse->id }}"
                                                                                    {{ bonusecheck($bonuse->id, auth()->user()->id) }}>
                                                                                    {{ $bonuse->judul }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label style="font-size: 14px;"
                                                                        id="notesLabel">@lang('public.notesd')</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div id="chooseMode" class="">
                                                                        <div class="input-group-prepend"
                                                                            style="display: none;">
                                                                            <span id="chooseModeText"
                                                                                class="input-group-text dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">SN</span>
                                                                            <div class="dropdown-menu">
                                                                                <span id="chooseModeSN"
                                                                                    class="dropdown-item">Serial
                                                                                    Number</span>
                                                                                <span id="chooseModeHP"
                                                                                    class="dropdown-item">@lang('public.dari_bank')</span>
                                                                            </div>
                                                                        </div>
                                                                        <input id="notes"
                                                                            class="input-custom form-control"
                                                                            name="Notes" maxlength="100" type="text"
                                                                            placeholder="...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="hidden" name="phoneCreditMode" />
                                                                    <label style="font-size: 10px;" class="formulir-desc">
                                                                        @lang('public.maksimal_note')</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label> @lang('public.bukti_pembayaran')</label>
                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <div class="custom-file">
                                                                            <input id="proof" name="gambar"
                                                                                type="file" class="custom-file-input"
                                                                                onchange="updateFileName()">
                                                                            <label for="proof"
                                                                                class="btn-custom full_width custom-file-label">@lang('public.pilih_file')</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="formulir-desc">Only *.jpg, *.jpeg,
                                                                            and
                                                                            *.png formats are allowed, maximum 1MB</label>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    function updateFileName() {
                                                                        var input = document.getElementById('proof');
                                                                        var label = input.nextElementSibling;

                                                                        if (input.files.length > 0) {
                                                                            var fileName = input.files[0].name;
                                                                            label.textContent = fileName;
                                                                        } else {
                                                                            label.textContent = "@lang('public.pilih_file')"; // Reset text if no file is selected
                                                                        }
                                                                    }
                                                                </script>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button name="deposit" type="submit"
                                                                            class="btn-custom full_width">@lang('public.submit_depo')</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="page-form__content" id="nav-navfpx" style="display: none;">
                                            <form id="formDeposit" enctype="multipart/form-data" method="post"
                                                action="{{ route('transaksi.deposit.auto') }}">
                                                @csrf
                                                <input type="hidden" name="dari_bank"
                                                    value="{{ auth()->user()->nama_bank }} / {{ auth()->user()->nomor_rekening }} / {{ auth()->user()->nama_pemilik }}">
                                                <div class="transaksi-formulir flip-card">
                                                    <div class="flip-front">
                                                        <div class="formulir-form">
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.jumlah_deposit')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input name="nominal" required=""
                                                                            id="depositAmount"
                                                                            class="input-custom form-control"
                                                                            type="number" placeholder="30.00">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.pilih_bonus')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select class="custom-selection form-control"
                                                                            name="bonus" id="bonus">
                                                                            <option value="tanpabonus" selected="">
                                                                                @lang('public.tanpa_bonus')
                                                                            </option>
                                                                            @foreach ($bonus as $bonuse)
                                                                                <option value="{{ $bonuse->id }}"
                                                                                    {{ bonusecheck($bonuse->id, auth()->user()->id) }}>
                                                                                    {{ $bonuse->judul }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button name="deposit" type="submit"
                                                                            class="btn-custom full_width">@lang('public.submit_depo')</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="page-form__content" id="nav-navreload" style="display: none;">
                                            <form id="formDeposit" enctype="multipart/form-data" method="post"
                                                action="{{ route('transaksi.deposit.reload') }}">
                                                @csrf
                                                <input type="hidden" name="dari_bank"
                                                    value="{{ auth()->user()->nama_bank }} / {{ auth()->user()->nomor_rekening }} / {{ auth()->user()->nama_pemilik }}">
                                                <div class="transaksi-formulir flip-card">
                                                    <div class="flip-front">
                                                        <div class="formulir-form">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.tujuan')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select class="custom-selection form-control"
                                                                            name="bank">
                                                                            <option selected value="Touch N Go">Touch N Go
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.jumlah_deposit')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input name="nominal" required=""
                                                                            id="depositAmount"
                                                                            class="input-custom form-control"
                                                                            type="number" placeholder="30.00">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label style="font-size: 14px;"
                                                                        id="notesLabel">@lang('PIN Number')</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div id="chooseMode" class="">
                                                                        <div class="input-group-prepend"
                                                                            style="display: none;">
                                                                            <span id="chooseModeText"
                                                                                class="input-group-text dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">SN</span>
                                                                            <div class="dropdown-menu">
                                                                                <span id="chooseModeSN"
                                                                                    class="dropdown-item">Serial
                                                                                    Number</span>
                                                                                <span id="chooseModeHP"
                                                                                    class="dropdown-item">PIN Number</span>
                                                                            </div>
                                                                        </div>
                                                                        <input class="input-custom form-control"
                                                                            name="pin" maxlength="100" type="text"
                                                                            placeholder="Reload PIN Number" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-3 d-flex align-items-center">
                                                                        <label>@lang('public.pilih_bonus')</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <select class="custom-selection form-control"
                                                                            name="bonus" id="bonus">
                                                                            <option value="tanpabonus" selected="">
                                                                                @lang('public.tanpa_bonus')
                                                                            </option>
                                                                            @foreach ($bonus as $bonuse)
                                                                                <option value="{{ $bonuse->id }}"
                                                                                    {{ bonusecheck($bonuse->id, auth()->user()->id) }}>
                                                                                    {{ $bonuse->judul }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group text-center">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button name="deposit" type="submit"
                                                                            class="btn-custom full_width">@lang('public.submit_depo')</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <div class="modal custom-popup fade" id="bankDetail" tabindex="-1"
                                        aria-labelledby="bankDetailLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <div class="modal-body">
                                                    <div class="popup-bank-detail">
                                                        <div class="bank-detail-header">
                                                            <h4>My Account</h6>
                                                        </div>
                                                        <div class="bank-detail-info">
                                                            <h6 class="info-header">Main Account</h5>
                                                                <div class="bank-account">
                                                                    <div class="acc-details">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="acc-name">Account Name:
                                                                                    <span>rendzvous xiin</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="bank-name">Bank Name:
                                                                                    <span>Maybank</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="acc-number">Account Number:
                                                                                    <span>789123178</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="bank-detail-info">
                                                            <h6 class="info-header">Others Account</h5>
                                                                <div id="otherBank"></div>
                                                        </div>
                                                        <form id="addOptBankForm">
                                                            <input type="hidden" name="newData" value="true">
                                                            <div class="add-bank-form">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="add-bank-cont">
                                                                            <div class="title">
                                                                                Account Name
                                                                            </div>
                                                                            <input name="optAccountName"
                                                                                class="form-control-sm" type="text"
                                                                                value="rendzvous xiin" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="add-bank-cont">
                                                                            <div class="title">
                                                                                Select Bank
                                                                            </div>
                                                                            <select class="form-control form-control-sm"
                                                                                name="chooseOptionalBank"
                                                                                id="chooseOptionalBank">
                                                                                <option value="">--- Select Bank ---
                                                                                </option>
                                                                                <optgroup label="bank">
                                                                                    <option value="mbb" data-id="5984"
                                                                                        data-max="15" data-min="10">
                                                                                        MBB
                                                                                    </option>
                                                                                    <option value="cimb" data-id="5987"
                                                                                        data-max="15" data-min="10">
                                                                                        CIMB
                                                                                    </option>
                                                                                    <option value="pbb" data-id="5989"
                                                                                        data-max="15" data-min="10">
                                                                                        PBB
                                                                                    </option>
                                                                                    <option value="hlb" data-id="5993"
                                                                                        data-max="15" data-min="10">
                                                                                        HLB
                                                                                    </option>
                                                                                    <option value="rhb" data-id="5995"
                                                                                        data-max="15" data-min="10">
                                                                                        RHB
                                                                                    </option>
                                                                                    <option value="amb" data-id="5996"
                                                                                        data-max="15" data-min="10">
                                                                                        AMB
                                                                                    </option>
                                                                                    <option value="afb" data-id="5997"
                                                                                        data-max="15" data-min="10">
                                                                                        AFB
                                                                                    </option>
                                                                                    <option value="bsn" data-id="5998"
                                                                                        data-max="15" data-min="10">
                                                                                        BSN
                                                                                    </option>
                                                                                    <option value="bimb" data-id="5999"
                                                                                        data-max="15" data-min="10">
                                                                                        BIMB
                                                                                    </option>
                                                                                    <option value="bmmb" data-id="6000"
                                                                                        data-max="15" data-min="10">
                                                                                        BMMB
                                                                                    </option>
                                                                                    <option value="ocbc" data-id="6001"
                                                                                        data-max="15" data-min="10">
                                                                                        OCBC
                                                                                    </option>
                                                                                    <option value="uob" data-id="6002"
                                                                                        data-max="15" data-min="10">
                                                                                        UOB
                                                                                    </option>
                                                                                    <option value="alb" data-id="6003"
                                                                                        data-max="15" data-min="10">
                                                                                        ALB
                                                                                    </option>
                                                                                    <option value="citi" data-id="6004"
                                                                                        data-max="15" data-min="10">
                                                                                        CITI
                                                                                    </option>
                                                                                    <option value="hsbc" data-id="6005"
                                                                                        data-max="15" data-min="10">
                                                                                        HSBC
                                                                                    </option>
                                                                                    <option value="scb" data-id="6006"
                                                                                        data-max="15" data-min="10">
                                                                                        SCB
                                                                                    </option>
                                                                                    <option value="mbsb" data-id="6007"
                                                                                        data-max="15" data-min="10">
                                                                                        MBSB
                                                                                    </option>
                                                                                    <option value="boc" data-id="6008"
                                                                                        data-max="15" data-min="10">
                                                                                        BOC
                                                                                    </option>
                                                                                    <option value="kwt" data-id="6009"
                                                                                        data-max="15" data-min="10">
                                                                                        KWT
                                                                                    </option>
                                                                                    <option value="mtrade" data-id="6010"
                                                                                        data-max="15" data-min="10">
                                                                                        MTRADE
                                                                                    </option>
                                                                                    <option value="tng" data-id="6011"
                                                                                        data-max="15" data-min="10">
                                                                                        TNG
                                                                                    </option>
                                                                                    <option value="dbs" data-id="6812"
                                                                                        data-max="15" data-min="10">
                                                                                        DBS
                                                                                    </option>
                                                                                </optgroup>
                                                                            </select>
                                                                            <span id="chooseOptionalBank-error"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="add-bank-cont">
                                                                            <div class="title" id="labelAccNumb">
                                                                                Account Number
                                                                            </div>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-prepend"
                                                                                    id="phoneInputPrepend">
                                                                                    <span
                                                                                        class="input-group-text">+60</span>
                                                                                </div>
                                                                                <input class="form-control" type="text"
                                                                                    name="optAccountNumber"
                                                                                    id="optAccountNumber" minlength="8"
                                                                                    maxlength="20" autocomplete="off">
                                                                            </div>
                                                                            <span id="optAccountNumber-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bank-button" id="bankButton">
                                                                <a class="btn-custom btn-custom-sm cancel add-bank">Add
                                                                    Account</a>
                                                                <button id="submitBank"
                                                                    class="btn-custom btn-custom-sm">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-4 h-auto">
                                <div class="transaksi-info">
                                    <div class="info-content page-form">
                                        <div class="page-form__header">
                                            @lang('public.informasi')
                                        </div>
                                        <div class="page-form__content" style="font-size: 14px;">
                                            <ul>
                                                <li>@lang('public.info1')</li><br>
                                                <li>@lang('public.info2')</li><br>
                                                <li>@lang('public.info3')</li><br>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-holder page-form">
                                <div class="page-form__header">
                                    <div class="bottom-form">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-8">
                                                <div class="form-title">
                                                    @lang('public.riwayat_deposit')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-form__content">
                                    <div class="table-dataTable">
                                        <table class="table table-hover table-bordered" id="depositHistoryTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 20px;" class="text-left">#.</th>
                                                    <th scope="col" class="text-left">@lang('public.tanggal')</th>
                                                    <th scope="col" class="text-left w-25">@lang('public.tujuan')</th>
                                                    <th scope="col" class="text-left w-25">@lang('public.jumlah_deposit')
                                                    </th>
                                                    <th scope="col" class="text-center">@lang('public.status')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hdepo as $hsd)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $hsd->created_at }}</td>
                                                        <td>{{ $hsd->metode }}</td>
                                                        <td>MYR {{ number_format($hsd->total, 2) }}</td>
                                                        <td>
                                                            @if ($hsd->status == 'Pending')
                                                                <a
                                                                    class="btn btn-small btn-warning btn-sm">@lang('public.pending')</a>
                                                            @elseif ($hsd->status == 'Sukses')
                                                                <a
                                                                    class="btn btn-small btn-success btn-sm">@lang('public.sukses')</a>
                                                            @elseif ($hsd->status == 'Ditolak')
                                                                <a
                                                                    class="btn btn-small btn-danger btn-sm">@lang('public.ditolak')</a>
                                                            @else
                                                                <a
                                                                    class="btn btn-small btn-danger btn-sm">@lang('public.pending')</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-withdraw" role="tabpanel" aria-labelledby="nav-withdraw-tab">
                        <div class="transaksi-grid row">
                            <div class="col-lg-8">
                                <div class="transaksi-form">
                                    <div class="transaksi-formulir page-form">
                                        <div class="page-form__header">
                                            @lang('public.form_wd')
                                        </div>
                                        <div class="page-form__content">
                                            <div class="transaksi-payment-holder">
                                                <div class="transaksi-payment transaction-payment-swiper swiper-container">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($bank as $ba)
                                                            <div class="swiper-slide payment-item">
                                                                <div class="payment-status online"></div>
                                                                <div class="payment-body">
                                                                    <div class="payment-icon">
                                                                        <img src="{{ $ba->icon }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="payment-navigation">
                                                    <button class="btn-custom btn-custom-sm navigation-prev--payment">
                                                        <i class="fas fa-angle-left"></i>
                                                    </button>
                                                    <button class="btn-custom btn-custom-sm navigation-next--payment">
                                                        <i class="fas fa-angle-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <form id="formWithdraw" action="{{ route('transaksi.withdraw') }}"
                                                method="POST">
                                                @csrf
                                                <div class="transaksi-formulir">
                                                    <div class="formulir-form">
                                                        <div class="form-group">
                                                            <div class="row mt-3">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.akun_tujuan')</label>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <select class="custom-selection form-control"
                                                                        name="bank" id="bank">
                                                                        <option
                                                                            value="{{ auth()->user()->nama_bank }} / {{ auth()->user()->nomor_rekening }} / {{ auth()->user()->nama_pemilik }}"
                                                                            selected>
                                                                            {{ strtoupper(auth()->user()->nama_bank) }} -
                                                                            {{ auth()->user()->nomor_rekening }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.rek_tujuan')</label>
                                                                </div>
                                                                <div class="col-lg-5 ">
                                                                    <label
                                                                        class="readonly">{{ auth()->user()->nomor_rekening }}
                                                                        / {{ auth()->user()->nama_pemilik }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.dompet_utama')
                                                                        : </label>
                                                                </div>
                                                                <div class="col-lg-5 d-flex">
                                                                    <div class="balance-wd">
                                                                        MYR: <span id="mainDesc"
                                                                            class="originDesc">{{ number_format(auth()->user()->balance, 2) }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.jumlah_deposit')</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input name="jumlah" required=""
                                                                        class="input-custom form-control" type="number"
                                                                        placeholder="50.00">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.notesd')</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input id="notes"
                                                                        class="input-custom form-control"
                                                                        name="keterangan" maxlength="100" type="text"
                                                                        placeholder="...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button type="submit" class="btn-custom"
                                                                id="submit-withdraw">@lang('public.submit_depo')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 h-auto">
                                <div class="transaksi-info">
                                    <div class="info-content page-form">
                                        <div class="page-form__header">
                                            @lang('public.informasi')
                                        </div>
                                        <div class="page-form__content" style="font-size: 14px;">
                                            <ul>
                                                <li>@lang('public.w_info1')</li><br>
                                                <li>@lang('public.w_info2')</li><br>
                                                <li>@lang('public.w_info3')</li><br>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-holder page-form">
                                <div class="page-form__header">
                                    <div class="bottom-form">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-8">
                                                <div class="form-title">
                                                    @lang('public.withdraw_history')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-form__content">
                                    <div class="table-dataTable">
                                        <table class="table table-hover table-bordered" id="withdrawHistoryTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-left">#</th>
                                                    <th scope="col" class="text-left">@lang('public.tanggal')</th>
                                                    <th scope="col" class="text-left">@lang('public.catatan')</th>
                                                    <th scope="col" class="text-left">@lang('public.jumlah_deposit')</th>
                                                    <th scope="col" class="text-center">@lang('public.status')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hwd as $wdh)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $wdh->created_at }}</td>
                                                        <td>{{ $wdh->transaksi }} {{ $wdh->metode == 'Main Wallet' ? $wdh->dari_bank : '' }} {{ $wdh->metode == 'By System' ? $wdh->dari_bank : '' }}</td>
                                                        <td>MYR {{ number_format($wdh->total, 2) }}</td>
                                                        <td>
                                                            @if ($wdh->status == 'Pending')
                                                                <a
                                                                    class="btn btn-small btn-warning btn-sm">@lang('public.pending')</a>
                                                            @elseif ($wdh->status == 'Sukses')
                                                                <a
                                                                    class="btn btn-small btn-success btn-sm">@lang('public.sukses')</a>
                                                            @elseif ($wdh->status == 'Ditolak')
                                                                <a
                                                                    class="btn btn-small btn-danger btn-sm">@lang('public.ditolak')</a>
                                                            @else
                                                                <a
                                                                    class="btn btn-small btn-danger btn-sm">@lang('public.pending')</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-transfer" role="tabpanel" aria-labelledby="nav-transfer-tab">
                        <div class="transaksi-grid row">
                            <div class="col-lg-8">
                                <div class="transaksi-form">
                                    <div class="transaksi-formulir page-form">
                                        <div class="page-form__header">
                                            @lang('public.form_wd')
                                        </div>
                                        <div class="page-form__content">
                                            <form id="formtransfer" action="{{ route('transaksi.withdraw') }}"
                                                method="POST">
                                                <input type="hidden" name="type" value="wd_game">
                                                @csrf
                                                <div class="transaksi-formulir">
                                                    <div class="formulir-form">
                                                        <div class="form-group">
                                                            <div class="row mt-3">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.provider')</label>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <select class="custom-selection form-control"
                                                                        name="bank" id="bank">
                                                                        <option value="">---
                                                                            @lang('public.provider') ---
                                                                        </option>
                                                                        <option value="Mega888">Mega888</option>
                                                                        <option value="918Kiss">918Kiss</option>
                                                                        <option value="Pussy888">Pussy888</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-3 d-flex align-items-center">
                                                                    <label>@lang('public.tujuan')</label>
                                                                </div>
                                                                <div class="col-lg-5 ">
                                                                    <label class="readonly">@lang('public.dompet_utama')</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button type="submit"
                                                                class="btn-custom">@lang('public.submit_depo')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 h-auto">
                                <div class="transaksi-info">
                                    <div class="info-content page-form">
                                        <div class="page-form__header">
                                            @lang('public.informasi')
                                        </div>
                                        <div class="page-form__content">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-holder page-form">
                                <div class="page-form__header">
                                    <div class="bottom-form">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-8">
                                                <div class="form-title">
                                                    @lang('public.riwayat_deposit')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-form__content">
                                    <div class="table-dataTable">
                                        <table class="table table-hover table-bordered" id="withdrawHistoryTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-left">#</th>
                                                    <th scope="col" class="text-left">@lang('public.tanggal')</th>
                                                    <th scope="col" class="text-left">@lang('public.catatan')</th>
                                                    <th scope="col" class="text-left">@lang('public.jumlah_deposit')</th>
                                                    <th scope="col" class="text-center">@lang('public.status')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hwd as $wdh)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $wdh->created_at }}</td>
                                                        <td>{{ $wdh->transaksi }} {{ $wdh->dari_bank == 'Main Balance' ? $wdh->keterangan : '' }} {{ $wdh->metode == 'By System' ? $wdh->dari_bank : '' }}</td>
                                                        <td>MYR {{ number_format($wdh->total, 2) }}</td>
                                                        <td>
                                                            @if ($wdh->status == 'Pending')
                                                                <a
                                                                    class="btn btn-small btn-warning btn-sm">@lang('public.pending')</a>
                                                            @elseif ($wdh->status == 'Sukses')
                                                                <a
                                                                    class="btn btn-small btn-success btn-sm">@lang('public.sukses')</a>
                                                            @elseif ($wdh->status == 'Ditolak')
                                                                <a
                                                                    class="btn btn-small btn-danger btn-sm">@lang('public.ditolak')</a>
                                                            @else
                                                                <a
                                                                    class="btn btn-small btn-danger btn-sm">@lang('public.pending')</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@push('costum-sc')
    @if (auth()->user()->nama_bank == '-')
        <script>
            $(document).ready(function() {
                function onClose() {
                    window.location.href = "{{ route('profile') }}";
                }

                Swal.fire({
                    text: '\nPlease fill your banking details\n Redirect to profile in 4 seconds.',
                    icon: "info",
                    title: "Warning!",
                    onClose: onClose,
                    timer: 4000,
                    showConfirmButton: true,
                }).then(function() {
                    onClose();
                });

            });
        </script>
    @endif

    <script>
        function transaksiPaymentSwiper() {
            var transactionPaymentSwiper = new Swiper(".transaction-payment-swiper", {
                slidesPerView: 4,
                slidesPerGroup: 3,
                spaceBetween: 10,
                breakpoints: {
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    320: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                },
                navigation: {
                    nextEl: ".navigation-next--payment",
                    prevEl: ".navigation-prev--payment",
                },
                observer: true,
                observeParents: true,
            })
        }

        transaksiPaymentSwiper();
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js">
    </script>
    <script>
        $(document).ready(function() {
            // Ketika elemen <select> berubah
            $(".styled").click(function() {
                // Mendapatkan nilai yang dipilih
                var selectedValue = $(this).attr('id');

                // Hide only the deposit method forms
                $(".page-form__content[id^='nav-nav']").hide();

                // Menampilkan elemen dengan ID yang sesuai berdasarkan pilihan
                if (selectedValue !== "") {
                    $("#nav-" + selectedValue).show();
                }
            });
        });

        $(document).ready(function() {
            // Ketika elemen <select> berubah
            $("#bankSelect").change(function() {
                // Mendapatkan nilai yang dipilih
                var selectedValue = $(this).val();

                // Semua section yang memiliki class "bankOption" disembunyikan
                $(".bankOption").hide();

                // Menampilkan elemen dengan ID yang sesuai berdasarkan pilihan
                if (selectedValue !== "") {
                    $("#bank-" + selectedValue).show();
                }
            });
        });

        $('a[name=copyAddress]').on('click', function(e) {
            e.preventDefault();
            const code = this.id;
            const htmlExist = $(this).html();
            const buttonText = $("span[name=buttonCopy]").html()
            const addressText = $(`#addressText-${code}`)[0];
            $("span[name=buttonCopy]").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="loading"></span>`
                )
            let temp = document.createRange();
            temp.selectNodeContents(addressText)
            let select = window.getSelection();
            select.removeAllRanges();
            select.addRange(temp)
            document.execCommand("copy");
            setTimeout(() => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "@lang('public.copy_success')"
                });
                $(this).html(htmlExist)
                $("span[name=buttonCopy]").html(buttonText)
            }, 1000)
        });
    </script>
@endpush
