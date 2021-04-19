<header>
    <div class="container flex">
        <div class="logo">
            <img src="images/logo.jpg" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{url('/')}}">{{__('home')}}</a></li>
                <li><a href="{{url('/about-us')}}">@lang('aboutUs')</a></li>
                <li><a href="{{url('/how-it-works')}}">@lang('howItWork')</a></li>
                <li><a href="{{url('/contact-us')}}">@lang('contactUs')</a></li>
                @guest
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">LOGIN</button>
                        <div class="dropdown-content">
                            <a href="{{url('/login')}}">LOGIN - DOCTOR</a>
                            <a href="{{url('/login')}}">LOGIN - CLIENT</a>
                        </div>
                    </div>
                </li>
                @endguest
                <li><a href="lang/en">En</a></li>
                <li><a href="lang/es">Es</a></li>
            </ul>
        </div>
    </div>
</header>