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
                             <h4>@lang('gift') <b>@lang('table')</b>
                                    
                                <input type="search" class="form-control rounded float-right col-sm-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
                                    </form>
                                <br />
                                <br>
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('gift')</th>
                                    <th>@lang('description')</th>
                                    <th>@lang('type')</th>
                                    <th>@lang('doctor')</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $gifts as $gift)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td onclick="window.open('{{$gift->links}}', '_blank')"><a href=""><i class="fa fa-folder-open" aria-hidden="true" style="color: black"></i></a></i></td>
                                    <td>{{ $gift->description }}</td>
                                    <td>{{ $gift->type }}</td>
                                    <td>{{ $gift->doctor->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($gift->created_at)->format('d M Y') }}</td>
                                    
                                  
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     {{ $gifts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
