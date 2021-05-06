<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home</title>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
        <link rel="icon" href="{{ asset('images/logofini.png') }}" />
    </head>
    <style>
        @import "css/main.css";
        @import "css/general.css";
        @import "css/about-us.css";
    </style>

    <body>
        @include('includes/header')

        <div
            style="background: url('{{ asset('images/banner.jpg') }}'); height:800px; background-size: cover;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5);
    background-blend-mode: color;"
            class="jumbotron bg-cover text-white"
        >
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="container py-40 text-center bg">
                <h1 class="display-4 font-weight-bold"><span class="red-text">Virtual</span> ProMedRep</h1>
                <br />
                <p class="mb-0">@lang('home_banner')</p>
                <br />

                <button role="button" class="btn px-5" style="background-color: #ed1b24;"><a href="{{url('/register')}}" style="color: white;">{{__('register')}}</a></button>
                <button href="#" role="button" class="btn px-5" style="background-color: white;"><a href="{{url('/login')}}" style="color: #0e1a35;"> {{__('login')}}</a></button>
            </div>
        </div>
        <div class="container p-4" style="width: 100%;">
            <h1 class="title p-4">{{__('home_title')}}</h1>
            <p class="center p-4">{{__('container_tittle')}}</p>
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="images/Meeting-bro.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text">@lang('shadow_box_1')</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/Social strategy-amico.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text">@lang('shadow_box_2')</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/Social strategy-pana.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text">@lang('shadow_box_3')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-4" style="width: 100%;">
            <p class="center p-4">@lang('shadow_box_title')</p>

            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="images/Online Doctor-rafiki.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text">@lang('shadow_box_4')</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/Insurance-pana.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text">@lang('shadow_box_5')</p>
                    </div>
                </div>
            </div>
        </div>

        <br />

        <div class="card card-image" style="background-image: url(images/online-marketing-hIgeoQjS_iE-unsplash.jpg); background-position: center; background-color: rgba(0, 0, 0, 0.5); background-blend-mode: color;"">
        <div class="text-white text-center rgba-stylish-strong py-5 px-4">
            <div class="py-5">
                <!-- Content -->
                <h5 class="h5 orange-text"><i class="fa fa-camera-retro"></i></h5>
                <h2 class="card-title h2 my-4 py-2">@lang('home_banner')</h2>
                <div class="buttons flex">
                    <div class="button" style="background-color: #ed1b24;"><a href="{{url('/register')}}" style="color: white;">@lang('create_new_account')</a></div>
                </div>
            </div>
        </div>
        </div>
        @include('includes/footer')
    </body>

</html>
