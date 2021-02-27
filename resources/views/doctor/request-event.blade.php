<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />
    </x-slot>
    @php $i=1; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl p-4">
                <div class="table">
                    <div class="">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Request Event <b>Table</b></h4>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event as $key => $event)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->end }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">

                        <table class="table table-hover table-bordered">
                            <tr>
                                <th colspan="8" style="text-align: center;">Requests for appointments from clients</th>
                            </tr>
                            
                            @if($eventRequest->count() >=1)
                            <th colspan="2">#</th>
                            <th colspan="">Client Name</th>
                            <th colspan="">Product</th>
                            <th colspan="">Article</th>
                            <th colspan="">Action</th>
                            <tbody>
                                @foreach($eventRequest as $key => $request)
                                <tr>
                                    <td colspan="2">#</td>
                                    <td colspan="">{{ $request->requestClient->name }}</td>
                                    <td colspan="">{{ $request->product }}</td>
                                    <td colspan="">{{ $request->article }}</td>
                                    <td colspan="">
                                       
                                           @if($request->status == 1) 
                                            <p style="color: green">Accepted</p> 
                                          @elseif($request->status == 2)
                                          <p style="color: red">Rejected</p>
                                         @elseif($request->status == 0)
                                         <i class="fa fa-check fa-lg acceptEvent" data-evenRequstId="{{$request->id}}" data-eventId="{{ $request->event_id }}" aria-hidden="true"></i>
                                         <i class="fa fa-times fa-lg rejectedEvent"  data-eventId="{{ $request->id }}" aria-hidden="true" style="color: red;"></i>
                                          @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{ $eventRequest->links() }}
                        @else
                        <tr class="border border-warning">
                                <td colspan="border border-warning"><div class="alert alert-secondary" role="alert">
                                    No meeting request so far
                                  </div></td>
                            </tr>
                    @endif  
                     
                    </div>
                    
                </div>   
            </div>
        </div>
    </div>
 

    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form action="{{ url('/events/request/accept') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box" style="border: 3px solid green;">
                            <i class="fa fa-check" style="color: green;"></i>
                        </div>
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to accept this request for an appointment?</p>
                        <input type="hidden" name="requestId" id="requestId" />
                        <input type="hidden" name="eventid" id="eventId" />
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>

                

                @if(Session::has('success'))
                <script>
                    swal("Success", "{{Session::get('success')}}", "success", {
                        button: "ok",
                    });
                </script>
                @endif
                <script>
                    $(document).on("click", ".acceptEvent", function () {
                        var requestId = $(this).attr("data-evenRequstId");
                        var eventId = $(this).attr("data-eventId");
                        $("#requestId").val(requestId);
                        $("#eventId").val(eventId);
                        $("#myModal").modal("show");
                    });

                    $(document).on("click", ".rejectedEvent", function () {
                        var userID = $(this).attr("data-eventId");
                        $("#rejecteId").val(userID);
                        $("#rejectet").modal("show");
                    });
                </script>
            </form>
        </div>
    </div>
</x-app-layout>
<div id="rejectet" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <form action="{{ url('/events/request/rejected') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box" style="border: 3px solid red;">
                        <i class="fa fa-times" style="color: red;"></i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to cancel this appointment request?</p>
                    <input type="hidden" name="eventid" id="rejecteId" />
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
