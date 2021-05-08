<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
        <br />
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/events/update/'.$event->id) }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Edit event</legend>
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
                            <label class="col-md-12 control-label" for="name">Name</label>
                            <div class="col-md-12">
                                <input id="name" name="title" type="text" placeholder="{{ $event->title }}"  value="{{ $event->title}}" class="form-control input-md" />
                                @error('title')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="event_name">Start Date</label>
                            <div class="col-md-12">
                                {{ $event->start }}
                                <input id="event_name" name="start" type="datetime-local" value="" class="form-control input-md" />
                                @error('start')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="event_name">End Date</label>
                            <div class="col-md-12">
                                {{ $event->end }}
                                <input id="event_name" name="end" type="datetime-local" placeholder="Event Name" class="form-control input-md" />
                                @error('end')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 float-right">
                                <button type="submit" class="btn btn-info float-right">Change</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
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
