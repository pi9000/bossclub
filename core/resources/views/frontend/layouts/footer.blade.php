<section class="mobile__seo">
    <div class="container">
        <div class="game__seo">
            <div hidden id="title-seo">{{ general()->title }}</div>
            <div class="seo-mobile showFooter">
                <div class="seo-content showFooter">
                    <h1>
                        <strong>@lang('public.play_win') {{ general()->judul }}-@lang('public.num_1')</strong>
                    </h1>
                    <p>
                        @lang('public.foot_1') {{ general()->judul }}, @lang('public.foot_2') {{ general()->judul }}, @lang('public.foot_3'){{ general()->judul }} @lang('public.foot_4')
                    </p>
                    <br>
                    <h3>@lang('public.foot_5') {{ general()->judul }}</h3>
                    <ul>
                        <li><strong>Slots at {{ general()->judul }}</strong> are the best choice for online slot enthusiasts in Malaysia.</li>
<li>{{ general()->judul }} is the number 1 online slot site in Malaysia with exciting Online slot games.</li>
<li>We offer big winning opportunities and responsive, friendly customer service.</li>
<li>Join us now and experience the thrill of playing online slots at the best site in Malaysia!</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h2>
                        Enjoy Big Winning Opportunities by Playing Slots at {{ general()->judul }}
                    </h2>
                   <p>We are proud to provide an experience of <strong>Slot {{ general()->judul }}</strong> that is not only enjoyable but also offers big winning opportunities. In online slot games, winning chances are key, and at {{ general()->judul }}, we provide great opportunities to achieve victories and win big prizes.</p>
<p>We offer a wide variety of exciting and entertaining slot games, with each game offering different chances of winning. From classic games to the latest and most innovative games, we ensure our players have many options to choose from.</p>
<h2>
    Join Us and Experience the Thrill of Playing Slots at {{ general()->judul }}
</h2>
<p>
    To join us and experience the thrill of playing Slots at {{ general()->judul }}, you simply need to follow a few easy steps. First, you need to register an account by filling out the registration form available on our website.
</p>
<p>
    After registering, you can make a deposit to start playing. We offer various easy and secure payment methods to facilitate your deposit process.
</p>
<p>
    Once your deposit is successful, you can choose the WCM88 Slot game you want to play and begin. Enjoy stunning graphics and enticing bonus features to achieve victories and win big prizes.
</p>
<p>
    Additionally, by joining us, you can also enjoy various benefits such as deposit bonuses, cashback, and other exciting promotions. Don't miss the chance to win big and experience the thrill of playing WCM88 Slots at {{ general()->judul }}.
</p>
                    <br>
                    <p>&nbsp;</p>
                    <p class="text-center mt-3">&copy; {{ general()->judul }}. Copyright Reserved | 18+</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if($popup)
<div class="modal fade show" id="homePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-modal="true" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="announcement-title">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h3 class="text-uppercase">Attention.</h3>
            </div>
            <div class="modal-body">
                <div class="announcement-content">
                    <figure class="image">
                        <img src="{{ $popup->gambar }}" alt="announcement-title">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var closeButton = document.querySelector("#homePopup .close");
        if (closeButton) {
            closeButton.addEventListener("click", function() {
                document.cookie = "popup_closed=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
                document.getElementById('homePopup').style.display = 'none';
            });
        }
    });
</script>
