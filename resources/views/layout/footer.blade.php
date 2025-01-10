<div class="footer">
    <div class="footer-container d-flex flex-column flex-md-row bd-highlight justify-content-between">
        <div class="left d-flex flex-column">
            <img src="{{asset('assets/img/Logo_ALTERNATIVE.png') }}" alt="">
            <p>{{ __('footer.copyrigth') }}</p>
        </div>
        <div class="middle d-flex flex-column">
            <p><b>{{ __('footer.stay_connected') }}</b></p>
            <p>{{ __('footer.get_in_touch') }}</p>
            <div class="social-icons flex-row">
                <img src="{{asset('assets/img/email.png') }}" alt="">
                <img src="{{asset('assets/img/facebook.png') }}" alt="">
                <img src="{{asset('assets/img/instagram.png') }}" alt="">
            </div>
        </div>
        <div class="right d-flex flex-column">
            <p><b>{{ __('footer.need_help') }}</b></p>
            <p>{{ __('footer.visit') }}</p>
            <p><a href={{ route('support') }}>{{ __('footer.Support_and_FAQ') }}</a></p>
        </div>
    </div>
</div>