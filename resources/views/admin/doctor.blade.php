<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br>
        
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/doctor/view') }}">
                Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/formular/doctor') }}">
                Create Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/client') }}">
                Client
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br>
                <form method="POST" action="{{ url('/add/doctor') }}">
                    @csrf
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-5" style="margin-left:20px;">
                            <h4 class="card-title">Personal Details</h4>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Full Name:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="
                                    {{ old('name')}}" name="name" />
                                    @error('fullname')
                                    <label class="error" style="color: red" >{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="email" value="
                                    {{ old('email')}}"  name="email" />
                                    @error('email')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           
        
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Birthday:</label>
                                <div class="col-lg-6">
                                    <input type="date" class="form-control datetimepicker"  value="
                                    {{ old('birthday')}}" name="birthday" />
                                    @error('phNo')
                                    <label class="error" style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row gender-select">
                                <label class="col-lg-4 col-form-label">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label"> <input type="radio" name="gender" id="gender" value="male" class="form-check-input" />Male </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label"> <input type="radio" name="gender" id="gender" value="female" class="form-check-input" />Female </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">Profesion details</h4>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Department:</label>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control select" name="depart" value="
                                            {{ old('depart')}}" id="depart">
                                              
                                                <option value=""></option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @error('depart')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="phone" value="
                                    {{ old('phone')}}" id="phone" />
                                    @error('phone')
                                    <label class="error" style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bio:</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" rows="3" cols="15" value="
                                    {{ old('biography')}}"  name="biography"></textarea>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="m-b-20">
                                                <select class="form-control select" name="country">
                                                    <option value="Kosova">Kosova</option>
                                                    <option value="Albania">Albania</option>
                                                </select>
                                            </div>
                                            @error('country')
                                            <label class="error" style="color: red" >{{ $message }}</label>
                                            @enderror
                                            
                                            @error('status')
                                            <label class="error" style="color: red">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="City" class="form-control m-b-20" name="city" id="city" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right" style="top:40px:">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        
            </div>
        </div>
    </div>
    
</x-app-layout>
