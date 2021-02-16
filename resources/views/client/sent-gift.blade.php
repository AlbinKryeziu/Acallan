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
            <x-jet-nav-link href="{{ url('/pacient/store/mygift') }}">
                Gift
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/pacient/store/addgift/'.$doctor->id) }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Sent Gift </legend>
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
                            <label class="col-md-12 control-label" for="name">Doctor</label>
                            <div class="col-md-12">
                            <select class="form-control input-md" id="doctor" name="doctorId">
                                
                              <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                              
                             
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Links</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control" name="links" placeholder="wwww.example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="" name="description" rows="3"></textarea>
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