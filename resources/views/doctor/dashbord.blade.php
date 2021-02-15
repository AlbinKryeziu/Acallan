<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/path/to/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>


<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    

    <div class="mt-8 text-2xl">
        Welcome Doctor
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
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ...
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

@if (auth()->user()->hasRole('client'))
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-gray-200">
    <div class="overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <table>
                <th style="text-align: left;">Available Doctors</th>
                <th style="text-align: left;"></th>
                {{-- @if(is_null(App\Models\User::getUsersByRole('doc')))
                  <p>Not </p>  
                @else
                @foreach (App\Models\User::getUsersByRole('doc') as $doctor)
                <tr>
                    <td style="width: 50%;">{{$doctor->name}}</td>
                    <td>
                        <div class="button px-4" style="background-color: #ED1B24;"><a href="{{url('/')}}"
                                style="color: white;">REQUEST A MEETING</a></div>
                    </td>
                </tr>
                @endforeach
                @endif --}}
            </table>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="bini">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
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
                        events: SITEURL + "/fullcalender",
                        displayEventTime: false,
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
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                $.ajax({
                                    url: SITEURL + "/fullcalendareventmaster/create",
                                    data: {
                                        title: title,
                                        start: start,
                                        end: end,
                                        type: 'add'
                                    },
                                    type: "POST",
                                    success: function (data) {
                                        displayMessage("Event Created Successfully");
      
                                        calendar.fullCalendar('renderEvent',
                                            {
                                                id: data.id,
                                                title: title,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            },true);
      
                                        calendar.fullCalendar('unselect');
                                    }
                                });
                            }
                        },
                        eventDrop: function (event, delta) {
                            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
      
                            $.ajax({
                                url: SITEURL + '/fullcalendareventmaster/update',
                                data: {
                                    title: event.title,
                                    start: start,
                                    end: end,
                                    id: event.id,
                                    type: 'update'
                                },
                                type: "POST",
                                success: function (response) {
                                    displayMessage("Event Updated Successfully");
                                }
                            });
                        },
                        eventClick: function (event) {
                           
                            deleteMsg = confirm("Are you sure for this")
                            if (deleteMsg) {
                                $.ajax({
                                    type: "POST",
                                    url: SITEURL + '/fullcalendareventmaster/delete',
                                    data: {
                                            id: event.id,
                                            type: 'delete'
                                    },
                                    success: function (response) {
                                        calendar.fullCalendar('removeEvents', event.id);
                                        displayMessage("Event Deleted Successfully");
                                    }
                                });
                            }
                        }
     
                    });
     
    });
     
    function displayMessage(message) {
        toastr.success(message, 'Event');
    } 
      
    </script>