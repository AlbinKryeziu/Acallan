<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/pacient/doctor') }}">
                Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/pacient/event') }}">
                Event
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/event') }}">
                Gift
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
                            <h4>My Events <b>Table</b></h4>
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Doctor Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event as $key => $event)
                                <tr>
                                    <td>@php echo $i++ @endphp</td>
                                    <td>{{ $event->event->title }}</td>
                                    <td>{{ $event->event->user->name }}</td>
                                    <td>{{ $event->event->start}}</td>
                                    <td>{{ $event->event->end}}</td>
                                    @if($event->status == 0)
                                    <td><i class="fa fa-circle-o fa-lg" aria-hidden="true" style="color: #0b51be;" data-togle="ieafnhajuefn"></i></td>
                                    @elseif($event->status == 1)
                                    <td><i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: green;"></i></td>
                                    @elseif($event->status == 2)
                                    <td><i class="fa fa-times-circle fa-lg" aria-hidden="true" style="color: #992208;"></i></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <p style="text-align: right; padding: 10px;">
                    Status: Sent: <i class="fa fa-circle-o fa-lg" aria-hidden="true" data-togle="ieafnhajuefn" style="color: #0b51be;"></i> Accepted:
                    <i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: green;"></i> Rejected: <i class="fa fa-times-circle fa-lg" aria-hidden="true" style="color: #992208;"></i>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
