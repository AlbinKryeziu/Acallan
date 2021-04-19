<x-app-layout>
    @include('menagers/includes/header') @php $i=1; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <div class="table-title">
                                <h4>Client <b>Table</b><input type="search" class="form-control rounded float-right col-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
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
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td></td>
                                    <td>
                                        @if(Auth::user()->isFollowing($user->id))
                                        <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-user-times fa-lg" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    @if(Auth::user()->isFollowing($user->id))
                                    <td>
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm col-6">Unfollow</button>
                                        </form>
                                    </td>
                                    @elseif(Auth::user()->isRequest($user->id))
                                    <td>
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm col-6">Canel Request</button>
                                        </form>
                                    </td>
                                    @elseif(Auth::user()->isRejected($user->id))
                                    <td>
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm col-6">Rejected</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        <form action="{{ url('follow/'.$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm col-6">Follow</button>
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
        </div>
    </div>
</x-app-layout>
