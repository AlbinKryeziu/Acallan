<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


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
            <h1 class="banner-title center"><span class="red-text">About</span> Us </h1>
        </div>
    </div>

    <div class="section section-1">
        <div class="container content">
            <h1 class="title">WHAT</h1>
            <p class="center">We are young and dynamic entrepreneurs with a vision to improve client and quality access to enhance pharma marketing strategies. </p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/meeting-bro.jpg" alt="">
                <h4 class="my-auto">Enable healthcare providers to stay connected with pharma industry and manage their interviews virtually </h4>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Social strategy-amico.jpg" alt="">
                <h4 class="my-auto">Help pharma industry to optimize their efforts and enhance quality promotion of their products remotely with their clients </h4>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Social strategy-pana.jpg" alt="">
                <h4 class="my-auto">Create value for health care provider and the pharma industry </h4>
            </div>
        </div>
    </div>

    <div class="section section-2">
        <div class="container content">
            <h1 class="title">HOW</h1>
            <p class="center">We built a digital platform to connect pharma companies to Doctors</p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">The platform supports the goal of continues care for doctors and manages value for their time and access to pharma industry by providing virtual interface with pharma companies</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Insurance-pana.jpg" alt="">
                <h4 class="my-auto">The virtual platform also supports pharma industries, marketing and sales management functions and online management for better client engagement</h4>
            </div>
        </div>
    </div>

    <div class="section section-3">
        <div class="container content">
            <h1 class="title">WHY</h1>
            <p class="center">Pharma industry and doctors need this because:</p>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">Pharma industry needs to be more assessable to Doctors, but at the same time does not disrupt doctor’s personal and professional time. </h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Insurance-pana.jpg" alt="">
                <h4 class="my-auto">Variation in visit may compromise service to doctors </h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">Staying on track with execution of strategies can be achieved though this digital platform </h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Insurance-pana.jpg" alt="">
                <h4 class="my-auto">Geographical coverage of pharma marketing becomes easy</h4>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex">
                <img src="images/Online Doctor-rafiki.jpg" alt="">
                <h4 class="my-auto">Increase number of pharma company visits by getting doctor’s undivided attention to establish efficient, convenient and responsive ways to communicate with doctors. </h4>
            </div>

            <p class="center">Technology helps build cutting edge solutions like <strong>ProMedRep</strong></p>
            <p class="center">This is why the best way to meet the needs of pharma companies and doctors is enable them to meet securely and in a timely fashion </p>

        </div>
    </div>

    <div class="section section-4">
        <div class="container content">
            <h1 class="title">WHO</h1>
            <p class="center"><strong>People on mission</strong></p>
            <p class="center">The Promedrep platform has been built by a dedicated and committed team to change the traditional practices of pharma sales and marketing strategies. </p>
        </div>
    </div>

    @include('includes/footer')
</body>

@include('includes/links')

</html>