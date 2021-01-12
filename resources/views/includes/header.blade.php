<header>
    <div class="container flex">
        <div class="logo">
            <img src="images/logo.jpg" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/about-us')}}">About Us</a></li>
                <li><a href="{{url('/how-it-works')}}">How It Works</a></li>
                <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">LOGIN</button>
                        <div class="dropdown-content">
                            <a href="{{url('/login')}}">LOGIN - DOCTOR</a>
                            <a href="{{url('/login')}}">LOGIN - CLIENT</a>
                        </div>
                    </div>
                </li>
                <li><a href="{{url('/en')}}">EN</a></li>
                <li><a href="{{url('/es')}}">ES</a></li>
            </ul>
        </div>
    </div>
</header>