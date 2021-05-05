<footer>
    <div class="container content flex">
        <div class="column-1">
            <div class="logo">
                <img src="images/logo-footer.jpg" alt="">
                <p style="margin-top:30px;padding-right: 60px;font-size:16px;">@lang('container_tittle')</p>
            </div>
        </div>
        <div class="column column-2">
            <h4>@lang('sitemap')</h4>
            <br>
            <a href="{{ url('/') }}" style="color: black"><h6>@lang('home')</h6></a>
            <a href="{{ url('about-us') }}" style="color: black"><h6>@lang('aboutUs')</h6></a>
            <a href="{{ url('contact-us') }}" style="color: black"><h6>@lang('contactUs')</h6></a>
        </div>
        <div class="column column-3">
            <h4>@lang('platform')</h4>
            <br>
            <h6><a href="{{url('/login')}}" style="color: black">@lang('login')</a></h6>
            <h6><a href="{{url('/register')}}" style="color: black">@lang('register')</a></h6>
        </div>
        <div class="column column-4">
            <h4>@lang('contactUs')</h4>
            <br>
            <h6>@lang('footer_location')</h6>
            <h6>rahulkashyap@promedrep.com</h6>
        </div>
    </div>
</footer>