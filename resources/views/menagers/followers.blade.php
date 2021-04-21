<x-app-layout>
    @include('menagers/includes/header') 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <form>
                            <div class="table-title">
                                <h4>Follow Accepted <b>Table</b>
                                    
                                <input type="search" class="form-control rounded float-right col-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
                                    </form>
                                <br />
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('name')</th>
                                    <th>@lang('email')</th>
                                    <th>Phone</th>
                                    <th>Profile</th>
                                    <th>Follow</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->following->name }}</td>
                                    <td>{{ $user->following->email }}</td>
                                    <td>{{ $user->following->phone }}</td>
                                    <td>
                                        
                                        <a href="{{ url('profile/'.$user->following->id) }}" style="color: black"><i class="fa fa-user fa-lg" aria-hidden="true"></i></a>
                                    
                                    </td>
                                    @if(Auth::user()->isFollowing($user->following->id))
                                    <td>
                                        <form action="{{ url('unfollow/'.$user->following->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark btn-sm col-12">Unfollow</button>
                                        </form>
                                    </td>
                                    @elseif(Auth::user()->isRequest($user->following->id))
                                    <td>
                                        <form action="{{ url('canelRequest/'.$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm col-12">Canel Request</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        <form action="{{ url('follow/'.$user->following->id) }}" method="POST">
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
