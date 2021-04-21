<x-app-layout>
    @include('client/assets/header')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <form>
                            <div class="table-title">
                                <h4>@lang('clients') <b>@lang('table')</b>
                                    
                                {{-- <input type="search" class="form-control rounded float-right col-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4> --}}
                                    </form>
                                <br />
                            </div>
                            <br>
                            @if($followers->count())
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('name')</th>
                                    <th>@lang('email')</th>
                                    <th>@lang('phone')</th>
                                    <th>Followers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $followers as $follower)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $follower->follow->name }}</td>
                                    <td>{{ $follower->follow->email }}</td>
                                    <td>{{ $follower->follow->phone}}</td>
                                    @if($follower->status == 1)
                                    <td>
                                        <form class="p-1" action="{{ url('followers/client/'.$follower->menager_id) }}" method="POST">
                                            @csrf
                                        <button type="submit" class=" btn-primary btn-sm col-12">Accept</button>   
                                        </form>
                                        <form class="p-1">
                                            <button type="submit" class=" btn-danger btn-sm col-12">Delete</button>
                                        </form>
                                    </td>
                                    @elseif($follower->status == 2)
                                    <td>
                                    <form class="p-1" action="{{ url('followers/delete/'.$follower->menager_id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class=" btn-danger btn-sm col-12">Delete</button>
                                    </form>
                                    </td>
                                    @endif
                                    
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        
                    </div>
                </div>
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
</x-app-layout>
