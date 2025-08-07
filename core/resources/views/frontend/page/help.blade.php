@extends('frontend.layouts.main')
@section('content')
    <main id="main-route">
        <div class="main-content help">
            <div class="container">
                <div class="page-header">@lang('public.bantuan')</div>
                <div class="help__content">
                    <!-- Start of Parent Nav Tab -->
                    <div class="nav nav-parent" id="v-parent-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" name="helpType" id="v-parent-About-Us-tab" data-toggle="pill"
                            href="#v-parent-About-Us" role="tab" aria-controls="v-parent-About-Us"
                            aria-selected="true">@lang('public.faqs')</a>
                        <a class="nav-link" name="helpType" id="v-parent-FAQs-tab" data-toggle="pill" href="#v-parent-FAQs"
                            role="tab" aria-controls="v-parent-FAQs" aria-selected="true">@lang('public.tentang_kami')</a>
                        <a class="nav-link" name="helpType" id="v-parent-General-Info-tab" data-toggle="pill"
                            href="#v-parent-General-Info" role="tab" aria-controls="v-parent-General-Info"
                            aria-selected="true">@lang('public.gen_info')</a>
                        <a class="nav-link" name="helpType" id="v-parent-How-to-Play-tab" data-toggle="pill"
                            href="#v-parent-How-to-Play" role="tab" aria-controls="v-parent-How-to-Play"
                            aria-selected="true">@lang('public.howto_play')</a>
                        <a class="nav-link" name="helpType" id="v-parent-Game-License-tab" data-toggle="pill"
                            href="#v-parent-Game-License" role="tab" aria-controls="v-parent-Game-License"
                            aria-selected="true">@lang('public.license_games')</a>
                        <a class="nav-link" name="helpType" id="v-parent-Responsible-tab" data-toggle="pill"
                            href="#v-parent-Responsible" role="tab" aria-controls="v-parent-Responsible"
                            aria-selected="true">@lang('public.responsible')</a>
                        <a class="nav-link" name="helpType" id="v-parent-Security-tab" data-toggle="pill"
                            href="#v-parent-Security" role="tab" aria-controls="v-parent-Security"
                            aria-selected="true">@lang('public.security')</a>
                        <a class="nav-link" name="helpType" id="v-parent-Terms-tab" data-toggle="pill"
                            href="#v-parent-Terms" role="tab" aria-controls="v-parent-Terms"
                            aria-selected="true">@lang('public.term')</a>
                            
                    </div>
                    <!-- End of Parent Nav Tab -->

                    <!-- Start of Parent Tab Content -->
                    <div class="tab-content" id="v-parent-tabContent">

                        <div class="tab-pane fade" name="helpDesc" id="v-parent-About-Us" role="tabpanel"
                            aria-labelledby="v-parent-About-Us-tab">
                            <div class="help-header">@lang('public.faqs')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#How-To-Deposit"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.howto_depo')</div>
                                    </div>
                                    <div id="How-To-Deposit" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 12:05:31
                                                <p>
                                                    <h3>@lang('public.howto_depo')</h3>
                                                    <br>
                                                        @lang('public.howto_depo1')
                                                    <br>
                                                        @lang('public.howto_depo3')
                                                    <br><br>
                                                        @lang('public.howto_depo2')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#How-To-Withdraw"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.howto_wd')</div>
                                    </div>
                                    <div id="How-To-Withdraw" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 12:15:04
                                                <p>
                                                    <h3>@lang('public.howto_wd')</h3>
                                                    <br>
                                                        @lang('public.howto_wd1')
                                                    <br>
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Add-Bank"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.add_bank')</div>
                                    </div>
                                    <div id="Add-Bank" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 12:49:47
                                                <p>
                                                    <h3>@lang('public.add_bank')</h3>
                                                    <br>
                                                        @lang('public.add_bank1')
                                                    <br>
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Payment-Method"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.payment_meth')</div>
                                    </div>
                                    <div id="Payment-Method" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p>
                                                    <h3>@lang('public.payment_meth')</h3>
                                                    <br>
                                                        @lang('public.payment_meth1')
                                                    <br>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Contact-Us"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.contact_us')</div>
                                    </div>
                                    <div id="Contact-Us" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 13:27:41
                                                <p>
                                                    <h3>@lang('public.contact_us')</h3>
                                                    <br>
                                                        WhatsApp 1: <a href="https://BOSSCLUBcs2.wasap.my" target="_blank">+60123456789</a>
                                                    <br>
                                                        WhatsApp 2: <a href="https://BOSSCLUBcs2.wasap.my" target="_blank">+60123456789</a>
                                                    <br>
                                                        Telegram 1: <a href="https://t.me/BOSSCLUB_cs" target="_blank">@BOSSCLUB</a>
                                                    <br>
                                                        Telegram Channel: <a href="https://t.me/BOSSCLUB_cs" target="_blank">@BOSSCLUB</a>
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" name="helpDesc" id="v-parent-FAQs" role="tabpanel"
                            aria-labelledby="v-parent-FAQs-tab">
                            <div class="help-header">@lang('public.tentang_kami')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#FAQs"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.tentang_kami')</div>
                                    </div>
                                    <div id="FAQs" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 13:41:12
                                                @lang('public.about_us1')
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" name="helpDesc" id="v-parent-General-Info" role="tabpanel"
                            aria-labelledby="v-parent-General-Info-tab">
                            <div class="help-header">@lang('public.gen_info')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#How-to-Get-Bonuses"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.howto_bonus')</div>
                                    </div>
                                    <div id="How-to-Get-Bonuses" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 14:37:42
                                                <p>
                                                    <h3>@lang('public.howto_bonus')</h3>
                                                    <br>
                                                        @lang('public.howto_bonus1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#What-Currency-Are-Accepted"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.what_cur')</div>
                                    </div>
                                    <div id="What-Currency-Are-Accepted" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 17:47:52
                                                <p>
                                                    <h3>@lang('public.what_cur')</h3>
                                                    <br>
                                                        @lang('public.what_cur1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Minimum-Bet"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.min_bet')</div>
                                    </div>
                                    <div id="Minimum-Bet" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 18:33:17
                                                <p>
                                                    <h3>@lang('public.min_bet')</h3>
                                                    <br>
                                                        @lang('public.min_bet1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Trustworthy-Site"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.trust_site')</div>
                                    </div>
                                    <div id="Trustworthy-Site" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 18:46:29
                                                <p>
                                                    <h3>@lang('public.trust_site')</h3>
                                                    <br>
                                                        @lang('public.trust_site1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" name="helpDesc" id="v-parent-How-to-Play" role="tabpanel"
                            aria-labelledby="v-parent-How-to-Play-tab">
                            <div class="help-header">@lang('public.howto_play')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#How-to-Play-Slot-Games"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.play_slot')</div>
                                    </div>
                                    <div id="How-to-Play-Slot-Games" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 18:52:39
                                                <p>
                                                    <h3>@lang('public.play_slot')</h3>
                                                    <br>
                                                        @lang('public.play_slot1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#How-to-Play-Live-Casino-Games"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.play_casi')</div>
                                    </div>
                                    <div id="How-to-Play-Live-Casino-Games" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 19:12:51
                                                <p>
                                                    <h3>@lang('public.play_casi')</h3>
                                                    <br>
                                                        @lang('public.play_casi1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#How-to-Play-APK-Games"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.play_apk')</div>
                                    </div>
                                    <div id="How-to-Play-APK-Games" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 19:34:16
                                                <p>
                                                    <h3>@lang('public.play_apk')</h3>
                                                    <br>
                                                        @lang('public.play_apk1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" name="helpDesc" id="v-parent-Game-License" role="tabpanel"
                            aria-labelledby="v-parent-Game-License-tab">
                            <div class="help-header">@lang('public.license_games')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Game-License"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.game_lic')</div>
                                    </div>
                                    <div id="Game-License" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 19:45:26
                                                <p>
                                                    <h3>@lang('public.game_lic')</h3>
                                                    <br>
                                                        @lang('public.game_lic1')
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" name="helpDesc" id="v-parent-Responsible" role="tabpanel"
                            aria-labelledby="v-parent-Responsible-tab">
                            <div class="help-header">@lang('public.responsible')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Responsible"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.responsible1')</div>
                                    </div>
                                    <div id="Responsible" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 19:51:11
                                                <h2>@lang('public.responsible1')</h2>
                                                @lang('public.respon_gamb')
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="tab-pane fade" name="helpDesc" id="v-parent-Security" role="tabpanel"
                            aria-labelledby="v-parent-Security-tab">
                            <div class="help-header">@lang('public.secure')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Security"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.secure')</div>
                                    </div>
                                    <div id="Security" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 20:21:35
                                                @lang('public.secure1')
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" name="helpDesc" id="v-parent-Terms" role="tabpanel"
                            aria-labelledby="v-parent-Terms-tab">
                            <div class="help-header">@lang('public.tnc')</div>
                            <div class="accordion help-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="help-toggle" data-toggle="collapse" data-target="#Terms"
                                            aria-expanded="true" aria-controls="collapseOne">@lang('public.tnc')</div>
                                    </div>
                                    <div id="Terms" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <p><em>Last Updated : </em>
                                                2021-04-10 20:37:48
                                                @lang('public.tnc1')
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Parent Tab Content -->
                </div>

    </main>
@endsection
