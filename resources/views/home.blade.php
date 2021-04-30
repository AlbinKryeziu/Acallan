<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logofini.png') }}" />
</head>
<style>
    @import 'css/main.css';
    @import 'css/app.css';
    @import 'css/homepage.css';
</style>

<body>
    @include('includes/header')

    <div class="container">
        
    </div>
    <div class="banner bg-overlay">
        <div class="container content">
            <h1 class="banner-title center"><span class="red-text">Virtual</span> ProMedRep </h1>
            <p class="banner-sub-title center">@lang('home_banner')</p>
            @guest
                
            
            <div class="buttons flex">
                <div class="button" style="background-color: #ED1B24;"><a href="{{url('/register')}}" style="color: white;">{{__('register')}}</a></div>
                <div class="button" style="background-color: white;"><a href="{{url('/login')}}" style="color:#0E1A35;">{{__('login')}}</a></div>
            </div>
            @endguest
        </div>
    </div>

    <div class="section section-1">
        <div class="container content">
            <h1 class="title">{{__('home_title')}}</h1>
            <p class="center">{{__('container_tittle')}}</p>
            <div class="box-container flex">
                <div class="shadow-box center shadow-box-1">
                    <img src="images/Meeting-bro.jpg" alt="">
                    <h2>Enable healthcare providers to stay connected with pharma industry and manage their interviews virtually </h2>
                </div>
                <div class="shadow-box center shadow-box-2">
                    <img src="images/Social strategy-amico.jpg" alt="">
                    <h2>Help pharma industry to optimize their efforts and enhance quality promotion of their products remotely with their clients </h2>
                </div>
                <div class="shadow-box center shadow-box-3">
                    <img src="images/Social strategy-pana.jpg" alt="">
                    <h2>Create value for health care provider and the pharma industry </h2>
                </div>
            </div>
        </div>

        <div class="container content" style="padding-top: 50px;">
            <p class="center">We built a digital platform to connect pharma companies to Doctors</p>
            <div class="box-container flex">
                <div class="shadow-box center half-width shadow-box-4">
                    <img class="m-auto" src="images/Online Doctor-rafiki.jpg" alt="">
                    <h2>The platform supports the goal of continues care for doctors and manages value for their time and access to pharma industry by providing virtual interface with pharma companies</h2>
                </div>
                <div class="shadow-box center half-width shadow-box-5">
                    <img class="m-auto" src="images/Insurance-pana.jpg" alt="">
                    <h2>The virtual platform also supports pharma industries, marketing and sales management functions and online management for better client engagement</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-scroll bg-overlay" style="background-image: url(images/online-marketing-hIgeoQjS_iE-unsplash.jpg);">
        <div class="container content">
            <p class="banner-sub-title center" style="font-size: 32px;">Technology helps build cutting edge solutions like ProMedRep</p>
            <div class="buttons flex">
                <div class="button" style="background-color: #ED1B24;"><a href="{{url('/register')}}" style="color: white;">CREATE A NEW ACCOUNT</a></div>
            </div>
        </div>
    </div>

    @include('includes/footer')
    
</body>
@include('includes/links')

</html>