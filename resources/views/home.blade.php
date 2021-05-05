<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
   
    <div style="background: url('{{ asset('images/banner.jpg') }}'); height:800px; background-size: cover;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5);
    background-blend-mode: color;" class="jumbotron bg-cover text-white ">
        <div class="container py-5 text-center ">
          <br>
          <br>
          <br>

          <br>  <br>
          <br>
          <br>
          <br>
            <h1 class="display-4 font-weight-bold" ><span class="red-text">Virtual</span> ProMedRep</h1>
            <br>
            <p class=" mb-0">@lang('home_banner')
            </p>
            <br>
            <button role="button" class="btn  px-5" style="background-color: #ED1B24;"><a href="{{url('/register')}}" style="color: white;">{{__('register')}}</a></button>
            <button href="#" role="button" class="btn  px-5" style="background-color: white;"><a href="{{url('/login')}}" style="color:#0E1A35;">{{__('login')}}</a></button>
        </div>
    </div>
<div class="container p-4" style="width: 100%">
    <h1 class="title p-4">{{__('home_title')}}</h1>
            <p class="center p-4">{{__('container_tittle')}}</p>
    <div class="card-deck">
        
        <div class=" card">
          <img class="card-img-top" src="images/Meeting-bro.jpg" alt="Card image cap">
          <div class="card-body">
           
            <p class="card-text">@lang('shadow_box_1')</p>
            
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="images/Social strategy-amico.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">@lang('shadow_box_2')</p>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="images/Social strategy-pana.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">@lang('shadow_box_3')</p>
          </div>
        </div>
      </div>
</div>
<div class="container p-4" style="width: 100%">
    <p class="center p-4">@lang('shadow_box_title')</p>
    
    <div class="card-deck">
        
        <div class=" card">
          <img class="card-img-top" src="images/Online Doctor-rafiki.jpg" alt="Card image cap">
          <div class="card-body">
           
            <p class="card-text">@lang('shadow_box_4')</p>
            
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="images/Insurance-pana.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">@lang('shadow_box_5')</p>
          </div>
        </div>
        
      </div>
</div>
    

        
    </div>

    <div class="banner-scroll bg-overlay" style="background-image: url(images/online-marketing-hIgeoQjS_iE-unsplash.jpg);">
        <div class="container content">
            <p class="banner-sub-title center" style="font-size: 32px;">@lang('home_banner')</p>
            <div class="buttons flex">
                <div class="button" style="background-color: #ED1B24;"><a href="{{url('/register')}}" style="color: white;">@lang('create_new_account')</a></div>
            </div>
        </div>
    </div>

    @include('includes/footer')
    
</body>


</html>