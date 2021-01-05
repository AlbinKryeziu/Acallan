<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


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
            <h1 class="banner-title center"><span class="red-text">Contact</span> Us</h1>
        </div>
    </div>

    <div class="section section-1">
        <div class="container content">
            <h1 class="title">How To Reach Us</h1>
            <p class="center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>

            <div class="shadow p-3 bg-white rounded flex my-auto mb-0">
                <ul class="mx-auto">
                    <li class="flex text-sm m-4 float-left"><img src="images/icons/location.svg" alt="" width="15px"
                            class="mr-4"> West Palm Beach, FL</li>
                    <li class="flex text-sm m-4 float-left"><img src="images/icons/envelope.svg" alt="" width="15px"
                            class="mr-4"> email@domain.com</li>
                    <li class="flex text-sm m-4 float-left"><img src="images/icons/phone.svg" alt="" width="15px"
                            class="mr-4"> +1 458 7412</li>
                </ul>
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
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control"
                                            placeholder="Please enter your firstname *" required="required"
                                            data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control"
                                            placeholder="Please enter your lastname *" required="required"
                                            data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control"
                                            placeholder="Please enter your email *" required="required"
                                            data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">Please specify your need *</label>
                                        <select id="form_need" name="need" class="form-control" required="required"
                                            data-error="Please specify your need.">
                                            <option value=""></option>
                                            <option value="Request quotation">Request quotation</option>
                                            <option value="Request order status">Request order status</option>
                                            <option value="Request copy of an invoice">Request copy of an invoice
                                            </option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control"
                                            placeholder="Message for me *" rows="4" required="required"
                                            data-error="Please, leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="map rounded col-xs-6">
                    <iframe class="col-xs-6"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11987.641451913702!2d-80.06008886860934!3d26.71413606676502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d5ccb595adc1%3A0x15efc7b51fe16bde!2sWest%20Palm%20Beach%2C%20FL%2C%20USA!5e0!3m2!1sen!2s!4v1608739375881!5m2!1sen!2s"
                        width="450" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    @include('includes/footer')
</body>

@include('includes/links')

</html>