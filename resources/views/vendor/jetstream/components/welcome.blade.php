<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />

<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl">
        Welcome {{auth()->user()->name}}!
    </div>
    @if (auth()->user()->hasRole('admin'))
    <h1>ADMIN</h1>
    @endif

    @if (auth()->user()->hasRole('client'))
    <h1>CLIENT</h1>
    @endif

    @if (auth()->user()->hasRole('doc'))
    <h1>DOCTOR</h1>
    @endif
    <div class="mt-6 text-gray-500">
        <!-- Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
        ecosystem to be a breath of fresh air. We hope you love it. -->
    </div>
</div>
@if (auth()->user()->hasRole('doc'))
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
    <div class="p-4">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Clients</div>
        </div>

        <div class="ml-6">
            <div class="mt-2 text-sm text-gray-500">
                <ul>
                    @foreach (App\Models\User::getUsersByRole('client') as $client)
                    <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px"
                        class="mr-4"><a href="{{url('user/profile/'.$client->id)}}">{{$client->name}}</a></li>
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
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>
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
                    <li class="flex text-sm mt-4"><img src="images/icons/location.svg" alt="" width="15px" class="mr-4">
                        West Palm Beach, FL</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/focus.svg" alt="" width="15px" class="mr-4">
                        Physician</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/envelope.svg" alt="" width="15px" class="mr-4">
                        email@domain.com</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/phone.svg" alt="" width="15px" class="mr-4"> +1
                        458 7412</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="container py-4">
    <div class="response alert alert-success mt-2" style="display: none;"></div>
    <div id='calendar'></div>
</div>
@endif

@if (auth()->user()->hasRole('client'))
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-gray-200">
    <div class="overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <table>
                <th style="text-align: left;">Available Doctors</th>
                <th style="text-align: left;"></th>
                @foreach (App\Models\User::getUsersByRole('doc') as $doctor)
                <tr>
                    <td style="width: 50%;">{{$doctor->name}}</td>
                    <td>
                        <div class="button px-4" style="background-color: #ED1B24;"><a href="{{url('/')}}"
                                style="color: white;">REQUEST A MEETING</a></div>
                    </td>
                </tr>
                @endforeach
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
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL + "fullcalendar",
        displayEventTime: true,
        editable: true,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: SITEURL + "/fullcalendar/create",
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true
                );
            }
            calendar.fullCalendar('unselect');
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: SITEURL + '/fullcalendar/update',
                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                type: "POST",
                success: function (response) {
                    displayMessage("Updated Successfully");
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + '/fullcalendar/delete',
                    data: "&id=" + event._id,
                    success: function (response) {
                        if (parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }
    });
});
function displayMessage(message) {
    $(".response").html("<div class='success'>" + message + "</div>");
    setInterval(function () { $(".success").fadeOut(); }, 3000);
}

</script>