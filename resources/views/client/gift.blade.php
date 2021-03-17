<x-app-layout>
    @include('client/assets/header')
    @php $i=1; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h4>@lang('gift') <b>@lang('table')</b></h4>
                            <br />
                        </div>
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
                                @foreach($gift as $key => $gift)
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
