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
            
            
           
        </div>
    </x-slot>
    @php
     $i=1; 
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8" style="bottom: -14px;">
                                    <h2>Doctor <b>Table</b></h2>
                                </div>
                
                                
                            </div>
                        </div>
                
                   
                        <button id="print-btn" class="btn btn-white pull-right"><i class="fa fa-print mr5"></i> Print</button>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Birthday</th>
                                    <th class="text-center">History</th>
                                    <th>Sex</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach($doctor as $key => $doctor)
                                <tr> 
                                   <td>@php echo $i++; @endphp</td>
                                   <td>{{ $doctor->name }}</td>
                                   <td>{{ $doctor->email }}</td>
                                   
                                  
                               
                                </tr>
                                @endforeach
                            </tbody>
                          
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</x-app-layout>
