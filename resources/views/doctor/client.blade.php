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
                                    <h4>Clients <b>Table</b></h4>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th>Event History</th>
                                    <th>Gift</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client as $key => $client)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $client->client->name }}</td>
                                    <td>{{ $client->client->email }}</td>
                                    <td><a href="{{ url('/doctor/client/event/accepted/'.$client->client_id)}}"><i class="fa fa-calendar " style="color: black" aria-hidden="true"></i></a>
                                        

                                    </td>
                                    <td><a href="{{ url('/doctor/gift/client/'.$client->client_id) }}" ><i class="fa fa-gift fa-lg" aria-hidden="true" style="color: black"></i></a></td>
                                </tr>

                                @endforeach 
                            </tbody>
                        </table>
                       
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
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
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
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                    <input type="hidden" name="eventid" id="rejecteId" />
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
