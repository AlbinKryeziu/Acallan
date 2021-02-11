<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/doctor/view') }}">
                Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/formular/doctor') }}">
                Create Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="">
                Client
            </x-jet-nav-link>
        </div>
    </x-slot>
    @php $i=1; @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8" style="bottom: -14px;">
                                    <h2>Doctor <b>Table</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    {{--
                                    <th>Birthday</th>
                                    <th class="text-center">History</th>
                                    <th>Sex</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                    --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctor as $key => $doctor)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>

                                    <td>
                                        <form action="" method="POST">
                                            <a href="">
                                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                            </a>

                                            @csrf @method('DELETE')
                                            <button type="submit" title="delete" style="border: none; background-color: transparent; color: #ed1b24;">
                                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
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
