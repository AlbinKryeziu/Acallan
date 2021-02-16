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
            <x-jet-nav-link href="{{ url('/admin/client') }}">
                Client
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/event') }}">
                Event
            </x-jet-nav-link>
        </div>
    </x-slot>
    @php $i=1; @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h4>Doctors <b>Table</b><button type="button" class="btn btn-info btn-sm float-right" onclick="window.location='{{ url('/formular/doctor') }}'">Add Doctor</button></h4>
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Specialties</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $key => $doctor)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    @if(is_null($doctor->doctor))
                                    <td>/</td>
                                    @else
                                    <td>{{ $doctor->doctor->specialty }}</td>
                                    @endif

                                    <td>
                                       
                                        <form action="{{ url('/delete/doctor/'.$doctor->id) }}" method="POST">
                                            <a href="{{ url('/doctor/profile/'.$doctor->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true" style="color: #17a2b8"></i>
                                            </a>
                                            <a href="{{ url('/update/doctor/'.$doctor->id) }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black;"></i>
                                               
                                            </a>
                                           
                                                
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
                        {{ $doctors->links() }}
                    </div>
                </div>
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
