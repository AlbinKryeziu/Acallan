<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/doctor/view') }}">
                Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/client') }}">
                Client
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/event') }}">
                Event
            </x-jet-nav-link>
        </div>
    </x-slot>
    @php $i=1; @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h4>Events Request <b>Table</b></h4>

                            @if ($message = Session::get('success'))
                            <br />
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <br />
                        </div>
                        <form>
                            @csrf
                            <div class="input-group rounded col-4 float-right p-2">
                                <input type="search" class="form-control rounded" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Doctor</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $key => $event)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $event->title }}</td>
                                    @if(!is_null($event->user))
                                    <td>{{$event->user->name}}</td>
                                    @else
                                    <td>/</td>
                                    @endif
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->end }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="6" style="text-align: center;">Request</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Doctor</th>
                                    <th>Client name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventRequest as $key => $request)
                                <tr>
                                    <td>3</td>
                                    <td>{{ $request->event->title }}</td>
                                    <td>{{ $request->event->user->name }}</td>
                                    <td>{{ $request->requestClient->name }}</td>
                                    <td>
                                        @if($request->status == 1)
                                        <p style="color: green; font-weight: bold;">Accepted</p>
                                        @elseif($request->status == 2)
                                        <p style="color: red; font-weight: bold;">Rejected</p>
                                        @elseif($request->status == 0)
                                        <p style="color: #d1670a; font-weight: bold;">Sent</p>
                                        @endif
                                    </td>
                                    <td>Delete</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $eventRequest->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
