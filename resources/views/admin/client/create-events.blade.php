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
                <form class="form-horizontal p-4" method="POST" action="{{ url('/client/store/events/admin/') }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Create Event for {{ $client->name }}</legend>
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
                            <input type="hidden" name="clientId" value="{{ $client->id }}">
                            <label class="col-md-12 control-label" for="name">Doctor</label>
                            <div class="col-md-12">
                                <select class="form-control input-md" id="doctor" name="doctorId">
                                    <option value="">Select Doctor</option>
                                    @foreach($doctor as $key => $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Event Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="event" placeholder="" />
                                @error('links')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Start Date</label>
                            <div class="col-md-12">
                               <input type="datetime-local" name="start" class="form-control">
                                @error('description')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">End Date</label>
                            <div class="col-md-12">
                                <input type="datetime-local" name="end" class="form-control">
                                @error('description')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Product</label>
                            <div class="col-md-12">
                                <input type="text" name="product" class="form-control">
                                @error('description')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Article</label>
                            <div class="col-md-12">
                                <input type="text" name="article" class="form-control">
                                @error('description')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
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