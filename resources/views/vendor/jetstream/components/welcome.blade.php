<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />

<script src="/path/to/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        @lang('welcome_doctor')
        <div class="mt-6 text-gray-500">
            <!-- Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
        ecosystem to be a breath of fresh air. We hope you love it. -->
        </div>
    </div>
    <style>
        body {
            font-family: "Varela Round", sans-serif;
        }
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn,
        .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }
        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }
        .modal-confirm .btn-secondary:hover,
        .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
    @if (auth()->user()->hasRole('doc'))
    <div class="float-right">
        <a href="{{ url('details') }}" style="color: black;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </a>
    </div>
   
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
        <div class="p-4">
            <div class="flex items-center">
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Clients</div>
            </div>

            <div class="ml-6">
                <div class="mt-2 text-sm text-gray-500">
                    <ul>
                        @foreach (App\Models\ClientDoctor::with('client')->where('doctor_id', Auth::id()); as $client)
                        <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px" class="mr-4" /><a href="{{ url('/doctor/client/event/accepted/'.$client->client_id) }}">{{ $client->client->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="flex items-center">
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Remarks</div>
            </div>

            <div class="ml-6">
                <div class="mt-2 text-sm text-gray-500">
                    <p style="text-align: justify;">
                        {{ Auth::user()->doctor->remark}}
                    </p>
                </div>
            </div>
        </div>

        <div class="p-4">
            <div class="flex items-center">
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Details</div>
            </div>

            <div class="ml-6">
                <div class="mt-2 text-sm text-gray-500">
                    <ul>
                        <li class="flex text-sm mt-4"><img src="images/icons/location.svg" alt="" width="15px" class="mr-4" />{{ Auth::user()->address }}</li>
                        <li class="flex text-sm mt-4"><img src="images/icons/focus.svg" alt="" width="15px" class="mr-4" />{{ Auth::user()->doctor->specialty->specialty}}</li>
                        <li class="flex text-sm mt-4"><img src="images/icons/envelope.svg" alt="" width="15px" class="mr-4" />{{ Auth::user()->email }}</li>
                        <li class="flex text-sm mt-4"><img src="images/icons/phone.svg" alt="" width="15px" class="mr-4" />{{ Auth::user()->phone }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
          
                
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box" style="border: 3px solid #60c7c1;">
                            <i class="fa fa-calendar" style="color: #60c7c1;"></i>
                        </div>
                        <h4 class="modal-title w-100">New Event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="POST" action="{{ url('/fullcalendareventmaster/store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Event Title" name="title" id="title" />
                            <small id="emailHelp" class="form-text text-muted">Please enter title for create event</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="time" class="form-control"  aria-describedby="emailHelp" name="startTime" />
                            <small id="emailHelp" class="form-text text-muted">Please enter start time for create event</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="time" class="form-control"  aria-describedby="emailHelp" name="endTime" />
                            <small id="emailHelp" class="form-text text-muted">Please enter start time for create event</small>
                        </div>
                        <input type="hidden" class="form-control"  aria-describedby="emailHelp" name="startData" id="dateStart" value=""/>
                        <input type="hidden" class="form-control"  aria-describedby="emailHelp" name="endData" id="dateEnd" value=""/>
                    

                    <div class="form-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-success" id="buttonClickId">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container py-4">
        <div class="response alert alert-success mt-2" style="display: none;"></div>
        <div id="calendar"></div>
    </div>
    @endif @if (auth()->user()->hasRole('client'))
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-gray-200">
        <div class="overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table>
                    <th style="text-align: left;">Available Doctors</th>
                    <th style="text-align: left;"></th>
                    {{-- @if(is_null(App\Models\User::getUsersByRole('doc')))
                    <p>Not</p>
                    @else @foreach (App\Models\User::getUsersByRole('doc') as $doctor)
                    <tr>
                        <td style="width: 50%;">{{$doctor->name}}</td>
                        <td>
                            <div class="button px-4" style="background-color: #ed1b24;"><a href="{{url('/')}}" style="color: white;">REQUEST A MEETING</a></div>
                        </td>
                    </tr>
                    @endforeach @endif --}}
                </table>
            </div>
        </div>
    </div>

    @endif

    <script>
        $(document).ready(function () {
            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            var calendar = $("#calendar").fullCalendar({
                editable: true,
                events: SITEURL + "/fullcalender",

                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "month,basicWeek,basicDay",
                },
                defaultView: "month",
                editable: true,

                eventRender: function (event, element, view) {
                    if (event.allDay === "true") {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,

                select: function (start, end, allDay) {
                    $("#myModal").modal("show");
                    

                    $("#dateStart").val($.fullCalendar.formatDate(start, "Y-MM-DD"));
                    $("#dateEnd").val($.fullCalendar.formatDate(start, "Y-MM-DD"));

                  

                    var title = a;

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                        $.ajax({
                            url: SITEURL + "/fullcalendareventmaster/create",
                            data: {
                                title: title,
                                start: start,
                                end: end,

                                type: "add",
                            },
                            type: "POST",

                            success: function (data) {
                                displayMessage("Event Created Successfully");

                                calendar.fullCalendar(
                                    "renderEvent",
                                    {
                                        id: data.id,
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay,
                                    },
                                    true
                                );

                                calendar.fullCalendar("unselect");
                            },
                        });
                    }
                },
            });
        });
    </script>
</div>
