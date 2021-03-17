<x-app-layout>
    @include('client/assets/header')
 @php
     $i=1;
 @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            @if($user->doctor_access)
                           
                            <h4>@lang('table_doctor') <b>@lang('table')</b><button type="button" class="btn btn-info btn-sm float-right" onclick="window.location='{{ url('/pacient/store') }}'">Add Doctor</button></h4>
                            @endif
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('name')</th>
                                    <th>@lang('email')</th>

                                    <th>@lang('specialties')</th>
                                    <th>@lang('gift')</th>
                                    <th>@lang('event')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $key => $doctor)
                                <tr>
                                    <td>@php
                                        echo $i++
                                    @endphp</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->doctor->specialty->specialty }}</td>
                                    
                                    <td><a href="{{ url('/pacient/store/gift/'.$doctor->id) }}"><i class="fa fa-gift" aria-hidden="true" style="color: black"></i></a></td>
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
                        {{ $doctors->links() }}
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
