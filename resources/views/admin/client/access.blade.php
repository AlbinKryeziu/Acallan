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

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/client/access/doctor') }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Access for clients to doctors</legend>
                        @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif {{-- @foreach($acces as $key => $acces) {{ $acces }} @endforeach --}}

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Name</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="name" value="" placeholder="{{ $user->name }}" />
                                <input class="form-control" type="hidden" name="userId" value="{{ $user->id }}" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Name</label>
                            <div class="col-md-12">
                                @foreach($speciality as $key => $speciality)

                                <input type="checkbox" name="speciality[]" value="{{ $speciality->id}}" />
                                <label for="vehicle1">{{ $speciality->specialty}}</label><br />

                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 float-right">
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
