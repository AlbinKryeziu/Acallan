<x-app-layout>
    @include('menagers/includes/header')
 @php
     $i=1;
 @endphp
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
                                    <th>Follow Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $users as $user)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $user->name }}</td>
                                       <td>{{ $user->email }}</td>
                                       <td><a href="tel:{{ $user->phone }}">{{$user->phone }}</a></td>
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
