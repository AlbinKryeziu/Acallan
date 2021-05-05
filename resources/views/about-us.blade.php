<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logofini.png') }}" />

</head>
<style>
    @import 'css/main.css';
    @import 'css/general.css';
    @import 'css/about-us.css';
</style>

<body>
    @include('includes/header')

    <div class="page-banner" style="background-image: url('../images/about-us/banner.jpg');">
        <div class="container">
            <h1 class="banner-title center"><span class="red-text">@lang('about_page_title_about')</span> @lang('about_page_title_us') </h1>
        </div>
    </div>

    <div class="section section-1">
        <div class="container content">
            <h1 class="title">@lang('about_title')</h1>
            <p class="center">@lang('about_section1') </p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/meeting-bro.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow')</h4>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Social strategy-amico.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow1')</h4>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Social strategy-pana.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow2')</h4>
            </div>
        </div>
    </div>

    <div class="section section-2">
        <div class="container content">
            <h1 class="title">@lang('about_how')</h1>
            <p class="center">@lang('shadow_box_title')</p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">@lang('shadow_box_4')</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Insurance-pana.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow_4')</h4>
            </div>
        </div>
    </div>

    <div class="section section-3">
        <div class="container content">
            <h1 class="title">@lang('about_why')</h1>
            <p class="center">@lang('about_why_desc')</p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow_5')</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Insurance-pana.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow_6')</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow_7')</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Insurance-pana.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow_8')</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">@lang('about_shadow_9')</h4>
            </div>

            <p class="center">@lang('home_banner')</p>
            <p class="center">@lang('about_this_is_why')</p>

        </div>
    </div>

    <div class="section section-4">
        <div class="container content">
            <h1 class="title">@lang('about_who')</h1>
            <p class="center"><strong>@lang('about_people')</strong></p>
            <p class="center">@lang('about_who_desc')</p>
        </div>
    </div>

    @include('includes/footer')
</body>

@include('includes/links')

</html>