@if(request()->ajax())
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
                <div class="page-header">{{ $pageTitle }}</div>
                <div class="game-list-container">
                    @foreach ($provider as $item)
                    @if($item->GameType == 11)
                    @if($item->slug == 'mega888')
                    <div class="game-holder">
                        <a @guest onclick="gameAlert()" @endguest @auth type="button" data-toggle="modal"
                            data-target="#gameApkModalalmega888" @endauth>
                            <div class="game-bottom">
                            </div>
                            <div class="game-img">
                                <img title="mega888" alt="mega888" src="https://file.linkcdn.site/revplay1/nmegab.webp">
                                <div class="hover-play">
                                    <h6>Mega888</h6>
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @auth
                    <div class="modal fade custom-popup gameApkModalal" id="gameApkModalalmega888" tabindex="-1"
                        role="dialog" aria-labelledby="gameApkModallable" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>

                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img alt="WebsiteLogo" src=https://file.linkcdn.site/revplay1/nmegab.webp
                                                width="75" class="d-block mx-auto"
                                                style="filter: drop-shadow(2px 2px 2px black);">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="modal-body-form">
                                        <form action="{{ route('transfer_money') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="provider" value="Mega888">
                                            <div class="form-item">
                                                <div class="item-title">@lang('public.game_id')</div>
                                                <input class="form-control input-custom"
                                                    value="{{ auth()->user()->mega888_id }}" name="id_game" type="text"
                                                    readonly>
                                                <button type="button"
                                                    onclick="copyTextFunc('{{ auth()->user()->mega888_id }}')"
                                                    class="btn btn-copy btn-circle">
                                                    COPY
                                                </button>
                                            </div>
                                            <div class="form-item">
                                                <div class="item-title">@lang('public.game_password')</div>
                                                <input class="form-control input-custom"
                                                    value="{{ auth()->user()->mega888_password }}" name="password_game"
                                                    type="text" readonly>
                                                <button type="button"
                                                    onclick="copyTextFunc('{{ auth()->user()->mega888_password }}')"
                                                    class="btn btn-copy btn-circle">
                                                    COPY
                                                </button>
                                            </div>

                                            <div class="form-item">
                                                <div id="title_amount_Mega888" class="item-title d-none">Amount</div>
                                                <input id="amount_Mega888" class="form-control input-custom d-none" name="amount"
                                                    type="number">
                                            </div>
                                            <div class="form-button mt-1">
                                                <button type="submit" name="type" value="1"
                                                    class="btn-custom mt-2" id="transfer_Mega888">@lang('public.transfer_game')</button>
                                                <button type="submit" name="type" value="2" id="submit_Mega888"
                                                    class="btn-custom mt-2 d-none">@lang('public.withdraw_game')</button>
                                                <button id="confirm_Mega888" type="button" onclick="withdraw_game('Mega888')"
                                                    class="btn-custom mt-2">@lang('public.withdraw_game')</button>
                                                <button type="button" class="btn-custom mt-2"
                                                    onclick="window.open('{{ env('LINK_MEGA888') }}');">@lang('public.download')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @elseif($item->slug == 'pussy888')
                    <div class="game-holder">
                        <a @guest onclick="gameAlert()" @endguest @auth type="button" data-toggle="modal"
                            data-target="#gameApkModalalpussy888" @endauth>
                            <div class="game-bottom">
                            </div>
                            <div class="game-img">
                                <img title="Pussy888" alt="Pussy888"
                                    src="https://file.linkcdn.site/revplay1/npussyb.webp">
                                <div class="hover-play">
                                    <h6>Pussy888</h6>
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @auth
                    <div class="modal fade custom-popup gameApkModalal" id="gameApkModalalpussy888" tabindex="-1"
                        role="dialog" aria-labelledby="gameApkModallable" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>

                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img alt="WebsiteLogo" src=https://file.linkcdn.site/revplay1/npussyb.webp
                                                width="75" class="d-block mx-auto"
                                                style="filter: drop-shadow(2px 2px 2px black);">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="modal-body-form">
                                        <form action="{{ route('transfer_money') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="provider" value="Pussy888">
                                            <div class="form-item">
                                                <div class="item-title">@lang('public.game_id')</div>
                                                <input class="form-control input-custom"
                                                    value="{{ auth()->user()->pussy888_id }}" name="id_game" type="text"
                                                    readonly>
                                                <button type="button"
                                                    onclick="copyTextFunc('{{ auth()->user()->pussy888_id }}')"
                                                    class="btn btn-copy btn-circle">
                                                    COPY
                                                </button>
                                            </div>
                                            <div class="form-item">
                                                <div class="item-title">@lang('public.game_password')</div>
                                                <input class="form-control input-custom"
                                                    value="{{ auth()->user()->pussy888_password }}" name="password_game"
                                                    type="text" readonly>
                                                <button type="button"
                                                    onclick="copyTextFunc('{{ auth()->user()->pussy888_password }}')"
                                                    class="btn btn-copy btn-circle">
                                                    COPY
                                                </button>
                                            </div>

                                            <div class="form-item">
                                                <div id="title_amount_Pussy888" class="item-title d-none">Amount</div>
                                                <input id="amount_Pussy888" class="form-control input-custom d-none" name="amount"
                                                    type="number">
                                            </div>
                                            <div class="form-button mt-1">
                                                <button type="submit" name="type" value="1"
                                                    class="btn-custom mt-2" id="transfer_Pussy888">@lang('public.transfer_game')</button>
                                                <button type="submit" name="type" value="2" id="submit_Pussy888"
                                                    class="btn-custom mt-2 d-none">@lang('public.withdraw_game')</button>
                                                <button id="confirm_Pussy888" type="button" onclick="withdraw_game('Pussy888')"
                                                    class="btn-custom mt-2">@lang('public.withdraw_game')</button>
                                                <button type="button" class="btn-custom mt-2"
                                                    onclick="window.open('{{ env('LINK_MEGA888') }}');">@lang('public.download')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @elseif($item->slug == 's918kiss')
                    <div class="game-holder">
                        <a @guest onclick="gameAlert()" @endguest @auth type="button" data-toggle="modal"
                            data-target="#gameApkModalals918kiss" @endauth>
                            <div class="game-bottom">
                            </div>
                            <div class="game-img">
                                <img title="s918kiss" alt="s918kiss" src="https://file.linkcdn.site/revplay1/nkissb.webp">
                                <div class="hover-play">
                                    <h6>918Kiss</h6>
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @auth
                    <div class="modal fade custom-popup gameApkModalal" id="gameApkModalals918kiss" tabindex="-1"
                        role="dialog" aria-labelledby="gameApkModallable" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>

                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img alt="WebsiteLogo" src=https://file.linkcdn.site/revplay1/nkissb.webp
                                                width="75" class="d-block mx-auto"
                                                style="filter: drop-shadow(2px 2px 2px black);">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="modal-body-form">
                                        <form action="{{ route('transfer_money') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="provider" value="918Kiss">
                                            <div class="form-item">
                                                <div class="item-title">@lang('public.game_id')</div>
                                                <input class="form-control input-custom"
                                                    value="{{ auth()->user()->s918kiss_id }}" na="meid_game" type="text"
                                                    readonly>
                                                <button type="button"
                                                    onclick="copyTextFunc('{{ auth()->user()->s918kiss_id }})'"
                                                    class="btn btn-copy btn-circle">
                                                    COPY
                                                </button>
                                            </div>
                                            <div class="form-item">
                                                <div class="item-title">@lang('public.game_password')</div>
                                                <input class="form-control input-custom"
                                                    value="{{ auth()->user()->s918kiss_password }}" name="password_game"
                                                    type="text" readonly>
                                                <button type="button"
                                                    onclick="copyTextFunc('{{ auth()->user()->s918kiss_password }}')"
                                                    class="btn btn-copy btn-circle">
                                                    COPY
                                                </button>
                                            </div>
                                            <div class="form-item">
                                                <div id="title_amount_918Kiss" class="item-title d-none">Amount</div>
                                                <input id="amount_918Kiss" class="form-control input-custom d-none" name="amount"
                                                    type="number">
                                            </div>
                                            <div class="form-button mt-1">
                                                <button type="submit" name="type" value="1"
                                                    class="btn-custom mt-2" id="transfer_918Kiss">@lang('public.transfer_game')</button>
                                                <button type="submit" name="type" value="2" id="submit_918Kiss"
                                                    class="btn-custom mt-2 d-none">@lang('public.withdraw_game')</button>
                                                <button id="confirm_918Kiss" type="button" onclick="withdraw_game('918Kiss')"
                                                    class="btn-custom mt-2">@lang('public.withdraw_game')</button>
                                                <button type="button" class="btn-custom mt-2"
                                                    onclick="window.open('{{ env('LINK_MEGA888') }}');">@lang('public.download')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @endif
                    @else
                    <div class="game-holder">
                        <a onclick="routeNav('/slot/{{ $item->slug }}')" href="javascript:;">
                            <div class="game-bottom">
                            </div>
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
                    @endif
                    @endforeach
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
<script>
    function withdraw_game(id) {
        document.getElementById("amount_" + id).classList.remove("d-none");
        document.getElementById("title_amount_" + id).classList.remove("d-none");
        document.getElementById("submit_" + id).classList.remove("d-none");
        document.getElementById("transfer_" + id).classList.add("d-none");
        document.getElementById("confirm_" + id).classList.add("d-none");
        $("#amount_" + id).prop('required',true);

    }
    function copyTextFunc(text){
    navigator.clipboard.writeText(text);
    alert("Copied: " + text);
}
</script>

@else
@include('frontend.games.slots')
@endif
