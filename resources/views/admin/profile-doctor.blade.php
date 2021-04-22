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
                                                <strong> <p class="text-secondary mb-1">{{ $doctor->doctor->id_doctor }}</p></strong>
                                                <strong> <p class="text-secondary mb-1">{{ $doctor->doctor->specialty->specialty }}</p></strong>
                                                <p class="text-muted font-size-sm">{{ $doctor->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>@lang('event_name')</th>
                                                    <th>@lang('start_date')</th>
                                                    <th>@lang('end_date')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($doctor->event as $key => $event)
                                                <tr>
                                                    <td>@php echo $i++ @endphp</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ Carbon\Carbon::parse($event->start)->format('d-m-Y H:s') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($event->end)->format('d-m-Y H:s') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
