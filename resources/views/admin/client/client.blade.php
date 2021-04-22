<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />
    </x-slot>
    @php $i=1; @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table table-responsive">
                    
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8" style="bottom: -14px;">
                                    <h4>@lang('clients') <b>@lang('table')</b></h4>
                                </div>
                            </div>
                            <br />
                        </div>
                        <form>
                            @csrf
                            <input type="search" class="form-control rounded float-right col-sm-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        </form>
                        <br>
                        <br>
                        @if($clients->count())
                            
                        
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('name')</th>
                                    <th>@lang('email')</th>
                                    <th>@lang('new_event')</th>
                                    <th>@lang('access') </th>
                                    <th>@lang('details')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $key => $client)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td style="text-align: center"><a href="{{ url('/client/create/events/admin/'.$client->id) }}"><i class="fa fa-calendar" aria-hidden="true" style="color: black"></i></a></td>
                                    <td style="text-align: center;"><a href="{{ url('/client/access/'.$client->id) }}"><i class="fa fa-plus fa-lg" aria-hidden="true" style="color: black;"></i></i></a></td>
                                    <td style="text-align: center"><a href="{{ url('/client/info/'.$client->id) }}"><i class="fa fa-info-circle fa-lg" style="color:black" aria-hidden="true"></a></i></td>
                                    <td>
                                        
                                        <form action="{{ url('/admin/delete/'.$client->id) }}" method="POST">
                                          
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
                        {{ $clients->links() }}
                    </div>
                </div>
                @else
                <div class="alert alert-secondary" style="text-align: center;" role="alert">
                    @lang('no_result')
                     </div>
                @endif
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
