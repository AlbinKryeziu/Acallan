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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true" style="color: black;"></i></a>
                            <div class="row">
                                <div class="col-sm-8" style="bottom: -14px;">
                                    <h4>Events <b>Table</b></h4>
                                </div>
                            </div>
                            <br />
                            <form>
                                @csrf
                            <div class="input-group rounded col-4 float-right">
                                <input type="search" class="form-control rounded" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            </form>
                        </div>
                        <br />
                        <br />

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Client Name</th>
                                    <th>Doctor Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $key => $event)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $event->event->title }}</td>
                                    <td><strong>{{ Carbon\Carbon::parse($event->event->start)->format('d-m-Y H:i') }}</strong></td>
                                    <td><strong>{{ Carbon\Carbon::parse($event->event->end)->format('d-m-Y H:i') }}</strong></td>
                                    <td>@if($event->status = 1) <span style="color: green"> Accepted</span> @elseif($event->status = 2) <span style="color: red">Rejected </span> @elseif($event->status = 0) <span style="color: #ff9900">Rejected </span>@endif</td>
                                    <td>{{ $event->requestClient->name }}</td>
                                    <td>{{ $event->event->user->name }}</td>
                                    <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i><i class="fa fa-trash" aria-hidden="true" style="color: red;"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <script>
        swal("Success", "{{Session::get('success')}}", "success", {
            button: "ok",
        });
    </script>
    @endif
</x-app-layout>
