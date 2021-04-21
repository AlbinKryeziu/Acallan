<x-app-layout>
    @include('client/assets/header')
 @php
     $i=1;
 @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            @if($user->doctor_access)
                            <div class="float-right">
                                <button type="button" class="btn btn-info btn-sm float-righ" onclick="window.location='{{ url('/pacient/store') }}'">@lang('add_doctor')</button>
                            </div>
                            <h4>@lang('table_doctor') <b>@lang('table')</b></h4>
                            @endif
                            <br />
                            <form>
                            <input type="search" class="form-control rounded float-right col-sm-6 " name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            </form>
                            <br>
                            <br>
                        </div>
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
                        @if($doctors->count())
                            
                      
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
                                        <form action="{{ url('/pacient/delete/doctor/'.$doctor->id) }}" method="POST">
                                        
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
                    @else
                    <tr class="border border-warning">
                        <td colspan="border border-warning"><div class="alert alert-secondary" role="alert" style="text-align: center">
                         @lang('no_result')
                          </div></td>
                    </tr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
