<x-app-layout>
    @include('client/assets/header')
    @php $i=1; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <form>
                            <h4>@lang('gifts') <b>@lang('table')</b> <input type="search" class="form-control rounded float-right col-sm-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4></h4>
                            </form>
                            <br />
                            <br> 
                            
                        </div>
                        @if($gifts->count())
                            
                      
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('gift')</th>
                                    <th>@lang('description')</th>
                                    <th>@lang('type')</th>
                                    <th>@lang('doctor')</th>
                                    <th>@lang('client')</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gifts as $key => $gift)
                                <tr>
                                    <td>@php echo $i++ @endphp</td>
                                    <td onclick="window.open('{{$gift->links}}', '_blank')"><a href=""><i class="fa fa-folder-open" aria-hidden="true" style="color: black"></i></a></i></td>
                                    <td>{{$gift->description }}</td>
                                    <td>{{$gift->type }}</td>
                                    <td>{{ $gift->doctor->name }}</td>
                                    <td>{{ $gift->client->name }}</td>
                                   
                                    </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $gifts->links() }}
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
    </div>
</x-app-layout>
