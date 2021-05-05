<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logofini.png') }}" />

</head>
<style>
    @import 'css/main.css';
    @import 'css/general.css';

    .form-control,
    .input[type="text"],
    .input[type="email"] {
        height: 35px !important;
    }

    textarea.form-control {
        height: 100px !important;
    }
</style>

<body>
    @include('includes/header')

    <div class="page-banner" style="background-image: url('../images/contact-us/banner.jpg');">
        <div class="container">
            <h1 class="banner-title center"><span class="red-text">@lang('contact_contact')</span>@lang('contact_us')
            </h1>
        </div>
    </div>

    <div class="section section-1">
        <div class="container content">
            <h1 class="title">@lang('contact_us_title')</h1>
            <p class="center">@lang('contact_desc')</p>

            <div class="shadow">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          
                            <li class="flex text-sm m-4 float-left"><img src="images/icons/location.svg" alt="" width="15px"
                                class="mr-4">Mexico,D.F
                        </li>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <li class="flex text-sm m-4 float-left"><img src="images/icons/envelope.svg" alt="" width="15px"
                                class="mr-4">rahulkashyap@promedrep.com</li>
                        </div>
                    </div>
                </div>
              
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded flex mt-5 col-xs-12">
                <div class="form col-xs-6 my-auto p-3">
                    <form id="contact-form" method="post" action="{{url('contact-us/send')}}">
                        {{ csrf_field() }}
                        <div class="messages"></div>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">@lang('contact_name')</label>
                                        <input id="form_name" type="text" name="name" class="form-control"
                                            placeholder="@lang('contact_name_placeholder')" required="required"
                                            data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">@lang('contact_email')</label>
                                        <input id="form_lastname" type="email" name="email" class="form-control"
                                            placeholder="@lang('contact_email_placeholder')" required="required"
                                            data-error="Email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">@lang('contact_phone')</label>
                                        <input id="form_email" type="tel" name="phone" class="form-control"
                                            placeholder="@lang('contact_phone_placeholder')" required="required"
                                            data-error="Valid phone is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">@lang('contact_need')</label>
                                        <select id="form_need" name="need" class="form-control" required="required"
                                            data-error="Please specify your need.">
                                            <option value=""></option>
                                            <option value="Request quotation">@lang('contact_need_option_1')</option>
                                            <option value="Request order status">@lang('contact_need_option_2')</option>
                                            <option value="Request copy of an invoice">@lang('contact_need_option_3')
                                            </option>
                                            <option value="Other">@lang('contact_need_option_4')</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">@lang('contact_message')</label>
                                        <textarea id="form_message" name="message" class="form-control"
                                            placeholder="@lang('contact_message_placeholder')" rows="4" required="required"
                                            data-error="Please, leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="@lang('contact_send')">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="map rounded col-xs-6">
                    <iframe class="col-xs-6"
                        src="https://maps.google.com/maps?q=Mexico,D.F&t=&z=13&ie=UTF8&iwloc=&output=embed" width="450"
                        height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>

        </div>

        @include('includes/footer')
</body>

@include('includes/links')

</html>