<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logofini.png') }}" />

</head>
<style>
    @import 'css/main.css';
    @import 'css/general.css';
</style>

<body>
    @include('includes/header')

    <div class="page-banner" style="background-image: url('../images/how-it-works/banner.jpg');">
        <div class="container">
            <h1 class="banner-title center"><span
                    class="red-text">@lang('how_it_works_step_banner_how')</span>@lang('how_it_works_step_banner_it_works')
            </h1>
        </div>
    </div>

    <div class="section section-1">
        <div class="container content">
            <h1 class="title">@lang('how_it_work-step1')</h1>
            <p class="center"></p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/how-it-works/signup.jpg" alt="">
                <div class="my-auto">
                    <h2>@lang('how_it_work-title1')</h2>
                    <h4>@lang('how_it_work-paragraf1')</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-2">
        <div class="container content">
            <h1 class="title">@lang('how_it_works_step_2')</h1>
            {{-- <p class="center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p> --}}

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/how-it-works/login.jpg" alt="">
                <div class="my-auto">
                    <h2>@lang('how_it_works_title_2')</h2>
                    <h4>@lang('how_it_works_paragraph_2')</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-3">
        <div class="container content">
            <h1 class="title">@lang('how_it_works_step_3')</h1>
            {{-- <p class="center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p> --}}

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/how-it-works/manage.jpg" alt="">
                <div class="my-auto">
                    <h2>@lang('how_it_works_title_3')</h2>
                    <h4>@lang('how_it_works_paragraph_3')</h4>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer')
</body>



</html>