<x-app-layout>
    @include('menagers/includes/header')

    <style>
        .my-card {
            position: absolute;
            left: 40%;
            top: -20px;
            border-radius: 50%;
        }
    </style>
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
                                            <img src="{{ asset('images/avatar.png') }}" alt="Admin" class="rounded-circle" width="150" />
                                            <div class="mt-3"></div>
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
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('email')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('phone')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->phone }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('address')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->address }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">@lang('state')</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->state }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jumbotron">
                                    <div class="row w-100">
                                        <div class="col-md-4">
                                            <div class="card border-info mx-sm-1 p-3">
                                                <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-user-md" aria-hidden="true"></span></div>
                                                @if($doctors)
                                                <a href="{{ url('doctors/'.$user->id) }}"><div class="text-info text-center mt-8"><h4>@lang('doctors')</h4></div></a>
                                                @else
                                                <div class="text-info text-center mt-8"><h4>@lang('doctors')</h4></div>
                                                @endif
                                                <div class="text-info text-center mt-3"><h3>{{ $doctors }}</h3></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-success mx-sm-1 p-3">
                                                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-gift" aria-hidden="true"></span></div>
                                                @if($gifts)
                                                    
                                               
                                                <a href="{{ url('gift/'.$user->id) }}"><div class="text-success text-center mt-8"><h4>@lang('gifts')</h4></div></a>
                                                @else
                                                <div class="text-success text-center mt-8"><h4>@lang('gifts')</h4></div>
                                                @endif
                                                <div class="text-success text-center mt-3"><h3>{{ $gifts }}</h3></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-danger mx-sm-1 p-3">
                                                <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-window-restore" aria-hidden="true"></span></div>
                                                @if($meeting)
                                                    
                                           
                                                <a href="{{ url('meeting/'.$user->id) }}"><div class="text-danger text-center mt-8"><h4>@lang('meeting')</h4></div></a>
                                                @else
                                                <div class="text-danger text-center mt-8"><h4>@lang('meeting')</h4></div>
                                                @endif

                                                <div class="text-danger text-center mt-3"><h3>{{ $meeting }}</h3></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
