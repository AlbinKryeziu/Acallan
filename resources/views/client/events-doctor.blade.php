<x-app-layout>
    @include('client/assets/header')
    @php
        $i = 1;
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="container">
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="{{ asset('images/doctor-imageprofile.jpg') }}" alt="Admin" class="rounded-circle" width="150" />
                                            <div class="mt-3">
                                                @foreach($doctor as $key => $doctor)

                                                <h4>{{ $doctor->name }}</h4>
                                                <p class="text-secondary mb-1">{{ $doctor->role->first()->name }}</p>
                                                <strong> <p class="text-secondary mb-1">{{ $doctor->doctor->specialty->specialty }}</p></strong>
                                                <p class="text-muted font-size-sm">{{ $doctor->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <div class="card mt-3">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-globe mr-2 icon-inline"
                                                >
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                                </svg>
                                                Website
                                            </h6>
                                            <span class="text-secondary">https://bootdey.com</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-github mr-2 icon-inline"
                                                >
                                                    <path
                                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                                                    ></path>
                                                </svg>
                                                Github
                                            </h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-twitter mr-2 icon-inline text-info"
                                                >
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                                                    ></path>
                                                </svg>
                                                Twitter
                                            </h6>
                                            <span class="text-secondary">@bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-instagram mr-2 icon-inline text-danger"
                                                >
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                </svg>
                                                Instagram
                                            </h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-facebook mr-2 icon-inline text-primary"
                                                >
                                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                </svg>
                                                Facebook
                                            </h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                    </ul>
                                </div>
                                --}}
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('full_name')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $doctor->name }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('email')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $doctor->email }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('phone')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $doctor->doctor->phone }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('work_address')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $doctor->doctor->work_address }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('remark')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $doctor->doctor->remark }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters-sm">
                                    <div class="col-sm-12 mb-3">
                                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>@lang('event_name')</th>
                                                    <th>@lang('start_date')</th>
                                                    <th>@lang('end_date')</th>
                                                    <th>@lang('sent')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($events as $key => $event)
                                                <tr>
                                                    <td>@php echo $i++ @endphp</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ Carbon\Carbon::parse($event->start)->format('d-m-Y H:s') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($event->end)->format('d-m-Y H:s') }}</td>
                                                
                                                       <td><i class="fa fa-clock-o acceptEvent" data-eventId="{{ $event->id }}"  aria-hidden="true"></i></td>
                                                        {{-- <input type="hidden" name="user_id" value="{{ $event->user_id }}"> --}}
                                                   
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $events->links() }}
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <form action="{{ url('/pacient/request') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header flex-column">
                            <div class="icon-box" style="border: 3px solid green;">
                                <i class="fa fa-calendar" aria-hidden="true" style="color:green"></i>
                            </div>
                            <h4 class="modal-title w-100">Sent Event </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                        </div>
                        <div class="modal-body">
                            <label style="float: left"><strong>Product</strong></label>
                           <input type="text" name="product" class="form-control ">
                           @error('product')
                               <p style="color:red">{{ $message }}</p>
                           @enderror
                           <br>
                           <label style="float: left"><strong>Article</strong></label>
                           <input type="text" name="article" class="form-control">
                           @error('article')
                               <p style="color:red">{{ $message }}</p>
                           @enderror
                         
                            <input type="hidden" name="eventId" id="eventId" />
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
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#myModal').modal('show');
    @endif
    </script>