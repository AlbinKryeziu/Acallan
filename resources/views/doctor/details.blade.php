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
                <form class="form-horizontal p-4" method="POST" action="{{ url('change/details') }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">Edit Details</legend>
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
                            <label class="col-md-12 control-label" for="name">Work Address</label>
                            <div class="col-md-12">
                                <input id="name" name="work_address" type="text" placeholder=" {{ Auth::user()->doctor->work_address}}"  value="{{ Auth::user()->doctor->work_address}}" class="form-control input-md" />
                                @error('work_address')
                                <div class="form-group">
                                <p style="color: red">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="event_name">Phone</label>
                            <div class="col-md-12">
                                
                                <input id="phone" name="phone" type="text" value=" {{ Auth::user()->phone }}" class="form-control input-md" />
                                @error('phone')
                                <div class="form-group">
                                <p style="color: red">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="event_name">Remark</label>
                            <div class="col-md-12">
                                
                                <textarea class="form-control" name="remark" id="exampleFormControlTextarea1" rows="3">{{ Auth::user()->doctor->remark}}</textarea>
                                @error('remark')
                                <div class="form-group">
                                <p style="color: red">{{ $message }}</p>
                                </div>
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
    {{-- @if(Session::has('success'))
    <script>
        swal("Success", "{{Session::get('success')}}", "success", {
            button: "ok",
        });
    </script>
    @endif --}}
</x-app-layout>
