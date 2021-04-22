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
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
          
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h4>{{ $client->name }} Gifts <b>Table</b></h4>
                            <br />
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            @if($gifts->count())
                                
                         
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('client')</th>
                                    <th>@lang('gift')</th>
                                    <th>@lang('description')</th>
                                    <th>@lang('type')</th>
                                    <th>@lang('doctor')</th>
                                    <th>@lang('action')</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gifts as $key => $gift)
                                <tr>
                                    <td>@php echo $i++ @endphp</td>
                                    <td>{{ $gift->client->name }}</td>
                                    <td onclick="window.open('{{$gift->links}}')"><i class="fa fa-folder-open fa-lg" aria-hidden="true"></i></td>
                                    <td>{{$gift->description }}</td>
                                    <td>{{$gift->type }}</td>
                                    <td>{{ $gift->doctor->name }}</td>
                                    <td><form action="{{ url('/client/delete/gift/'.$gift->id) }}" method="POST">
                                          
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" title="delete" style="border: none; background-color: transparent; color: #ed1b24;">
                                         
                                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </button>
                                    </form></td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$gifts->links() }}
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
</x-app-layout>
