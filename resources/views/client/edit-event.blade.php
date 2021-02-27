<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Dashboard') }}
        </h2>
        <br />

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/pacient/doctor') }}">
                Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/pacient/event') }}">
                Event
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/pacient/store/mygift') }}">
                Gift
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/edit/update/request/'.$event->id) }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Edit Request Event </legend>
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
                            <label class="col-md-12 control-label" for="name">Event</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control" name="event" value="{{ $event->event->title }}" disabled>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Doctor</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control" name="event" value="{{ $event->event->user->name }}" disabled>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="name">Product</label>
                                <div class="col-md-12">
                                <input type="text" class="form-control" name="product" value="{{ $event->product }}">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Article</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control" name="article" value="{{ $event->article }}">
                            </select>
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