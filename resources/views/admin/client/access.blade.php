<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/client/access/doctor') }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Access to doctors</legend>
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
                        @endif

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">@lang('client') @lang('name')</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="name" disabled value="" placeholder="{{ $user->name }}" />
                                <input class="form-control" type="hidden" name="userId" value="{{ $user->id }}" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">@lang('access'):</label>
                            <div class="col-md-12">
                                @foreach($speciality as $key => $speciality) <input type="checkbox" name="speciality[]" value="{{ $speciality->id}}"  @forelse($activeAccess as $key => $a) @if($speciality->id == $a->id) checked @endif @empty checked @endforelse   
                               />

                                <label for="vehicle1">{{ $speciality->specialty}}</label><br />

                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="btn-group float-right p-1" role="group" aria-label="Third group">
                                    <button type="submit" class="btn btn-info float-right">@lang('save')</button>
                                </div>
                                <div class="btn-group float-right p-1" role="group" aria-label="Third group">
                                    <a href="{{ URL::previous() }}" class="btn btn-info float-right">@lang('back')</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
