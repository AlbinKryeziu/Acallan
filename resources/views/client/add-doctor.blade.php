<x-app-layout>
 
    @include('client/assets/header')

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/pacient/add/doctor') }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">@lang('add_doctor') </legend>
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
                            <label class="col-md-12 control-label" for="name">@lang('name')</label>
                            <div class="col-md-12">
                            <select class="form-control input-md" id="doctor" name="doctorId">
                                <option value="">Select Doctor</option>
                                @foreach($doctor as $key => $doctor)
                              <option value="{{ $doctor->user->id }}">{{ $doctor->user->name }}</option>
                              
                              @endforeach
                            </select>
                            </div>
                        </div>
                    
                       
                        
                        <div class="form-group">
                            <div class="col-md-12 float-right">
                                <button type="submit" class="btn btn-info float-right">@lang('save')</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>