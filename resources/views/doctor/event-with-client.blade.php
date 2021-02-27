<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
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
                                    <h4>Accepted Events<b> Table</b></h4>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            
                           
                        </table>
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br />
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <tr></tr>  
                                <th colspan="8" style="text-align: center;">Events with {{ $user->name }} </th> 
                            </tr>
                            @if($event->count() >=1)
                            <th colspan="2">#</th>
                            <th colspan="">Event Name</th>
                            <th colspan="">Start Date</th>
                            <th colspan="">End Date</th>

                            <tbody>
                                @foreach($event as $key => $event)
                                <tr>
                                    <td colspan="2">#</td>
                                    <td colspan="">{{ $event->title }}</td>
                                    <td colspan="">{{ $event->start}}</td>
                                    <td colspan="">{{ $event->end}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                      <tr class="border border-warning">
                                <td colspan="border border-warning"><div class="alert alert-secondary" role="alert">
                                    You have no events so far
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
