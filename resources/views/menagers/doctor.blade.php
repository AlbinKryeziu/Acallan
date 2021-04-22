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
                                <h4>Doctors<b>Table</b>
                                    
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
                                    <th>@lang('address')</th>
                                    <th>@lang('remark')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $doctors as $doctor)
                               
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->address }}</td>
                                    <td>
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
