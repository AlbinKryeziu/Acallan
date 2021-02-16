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
            <x-jet-nav-link href="{{ url('/admin/event') }}">
                Gift
            </x-jet-nav-link>
        </div>
    </x-slot>
 @php
     $i=1;
 @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h4>My Doctors <b>Table</b><button type="button" class="btn btn-info btn-sm float-right" onclick="window.location='{{ url('/pacient/store') }}'">Add Doctor</button></h4>
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th>Speacility</th>
                                    <th>Gift</th>
                                    <th>Event</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctor as $key => $doctor)
                                <tr>
                                    <td>@php
                                        echo $i++
                                    @endphp</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->doctor->specialty }}</td>
                                    
                                    <td><a href=""><i class="fa fa-gift" aria-hidden="true" style="color: black"></i></a></td>
                                    <td><a href="{{ url('/pacient/events/'.$doctor->id) }}"><i class="fa fa-calendar" aria-hidden="true" style="color: black"></a></i></td>
                                    <td>
                                        <form action="" method="POST">
                                        
                                            @csrf @method('DELETE')
                                            <button type="submit" title="delete" style="border: none; background-color: transparent; color: #ed1b24;">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
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
