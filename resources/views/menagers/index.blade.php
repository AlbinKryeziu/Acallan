<x-app-layout>
    @include('menagers/includes/header') 
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
                                    
                                <input type="search" class="form-control rounded float-right col-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
                                    </form>
                                <br />
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('name')</th>
                                    <th>@lang('email')</th>
                                    <th>@lang('phone')</th>
                                    <th>@lang('profile')</th>
                                    <th>@lang('follow')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td></td>
                                    <td>
                                        @if(Auth::user()->isFollowing($user->id))
                                        <a href="{{ url('profile/'.$user->id) }}" style="color: black"><i class="fa fa-user fa-lg" aria-hidden="true"></i></a>
                                        @else
                                        <i class="fa fa-user-times fa-lg" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    @if(Auth::user()->isFollowing($user->id))
                                    <td>
                                        <form action="{{ url('unfollow/'.$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark btn-sm col-12">Unfollow</button>
                                        </form>
                                    </td>
                                    @elseif(Auth::user()->isRequest($user->id))
                                    <td>
                                        <form action="{{ url('canelRequest/'.$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm col-12">Canel Request</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        <form action="{{ url('follow/'.$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm col-12">Follow</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
