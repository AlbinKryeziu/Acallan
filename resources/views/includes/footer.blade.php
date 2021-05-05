
<footer class="section footer-classic context-dark bg-image">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-2 col-xl-5">
                <div class="pr-xl-4">
                    <a class="brand" href="index.html"><img class="brand-logo-light" src="{{ asset('images/logo-footer.jpg') }}" alt="" width="140" height="37" srcset="images/logo-footer.jpg" /></a>
                    <br />
                    <p>@lang('container_tittle')</p>
                    <!-- Rights-->
                    <p class="rights"></p>
                </div>
            </div>
            <br />
            <div class="col-md-2 p-4">
                <h4>@lang('sitemap')</h4>
                <br>
                <h6 class="p-1"><a href="{{ url('/') }}" style="color: black"><h6>@lang('home')</h6></a>
                <h6 class="p-1"><a href="{{ url('about-us') }}" style="color: black"><h6>@lang('aboutUs')</h6></a>
                <h6 class="p-1"><a href="{{ url('contact-us') }}" style="color: black"><h6>@lang('contactUs')</h6></a>
                
            </div>
            <div class="col-md-2 col-xl-2 p-4">
                <h4>@lang('platform')</h4>
            <br>
            <h6 class="p-1"><a href="{{url('/login')}}" style="color: black">@lang('login')</a></h6>
            <h6 class="p-1"><a href="{{url('/register')}}" style="color: black">@lang('register')</a></h6>
                
            </div>
            <div class="col-md-2 col-xl-2 p-4">
                <h4>@lang('platform')</h4>
            <br>
            <h6 class="p-1">@lang('footer_location')</h6>
            <h6 class="p-1">rahulkashyap@promedrep.com</h6>
                
            </div>
        </div>
    </div>
</footer>
