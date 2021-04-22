<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br>
    </x-slot>
    <style>
        .error{
            font-size: 13px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-5xl	 mx-auto sm:px-16 lg:px-16">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br>
                <form method="POST" action="{{ url('/add/doctor') }}">
                    @csrf
                    <div class="card-box  p-7">
                        <div class="row">
                            <div class="col-md-6 ">
                                <h5 class="card-title">@lang('personal_details')</h5>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('name')</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" placeholder="" value="{{ old('name')}}" name="name" />
                                        @error('name')
                                        <label class="error" style="color: red" >{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('email')</label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="email" 
                                        value="{{ old('email')}}" name="email" />
                                        @error('email')
                                        <span class="error" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('pin')</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="pin" 
                                        value="{{ old('pin')}}" name="pin" />
                                        @error('pin')
                                        <span class="error" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('birthday'):</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="myDate" value="" name="birthday">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p">
                                <h5 class="card-title">@lang('profesional_details')</h5>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('specialties'):</label>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="form-control select" name="specialitizy" value="{{ old('specialitizy')}}" id="specialitizy">
                                                    <option value="{{ old('specialitizy')}}">Select Specialties </option>
                                                     @foreach($specializity as $key => $depart)
                                                    <option value="{{ $depart->id }}">{{ $depart->specialty }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        @error('specialitizy')
                                        <label class="error" style="color: red; font-size:12px;">{{ $message }}</label>
                                        @enderror
                                    </div>
                                   
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('phone'):</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="phone" value="" id="phone" />
                                        @error('phone')
                                        <label class="error" style="color: red">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('work_address'):</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="work_address" value="" id="work_address" />
                                        @error('phone')
                                        <label class="error" style="color: red">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">@lang('remark'):</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="remark" value="" id="remark" />
                                        @error('phone')
                                        <label class="error" style="color: red">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                               
                                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 float-right">
                                <button type="submit" class="btn btn-info float-right">@lang('save')</button>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="text-right" style="top:40px:">
                        </div>
                        </div>
                    </div>
            </form>
        </div>
        
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <script>
        swal("Success","{{Session::get('success')}}","success",{
            button:"ok",
        })
    </script>
    @endif
</x-app-layout>
