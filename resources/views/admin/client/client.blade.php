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
                <div class="table">
                    
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8" style="bottom: -14px;">
                                    <h4>Clients <b>Table</b></h4>
                                </div>
                            </div>
                            <br />
                        </div>
                        <form>
                            @csrf
                        <div class="input-group rounded col-4 float-right">
                            <input type="search" class="form-control rounded" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        </form>
                        <br>
                        <br>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>New Event</th>
                                    <th>Access </th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client as $key => $client)
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
