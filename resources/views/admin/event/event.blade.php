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
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h4>Events <b>Table</b></h4>

                            @if ($message = Session::get('success'))
                            <br />
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <br />
                            
                        </div>
                        <form>
                            @csrf
                        <div class="input-group rounded col-4 float-right p-2">
                            <input type="search" class="form-control rounded" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        </form>
                        @if($events->count())
                            
                        
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('event')</th>
                                    <th>@lang('doctor')</th>
                                    <th>@lang('start_date')</th>
                                    <th>@lang('end_date')</th>
                                    <th>@lang('event_request')</th>
                                    <th>@lang('action')</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $key => $event)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $event->title }}</td>
                                    @if(!is_null($event->user))
                                    <td>{{$event->user->name}}</td>
                                    @else
                                    <td>/</td>
                                    @endif
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->end }}</td>
                                    <td style="text-align: center"><a href="{{ url('/admin/request/event/'.$event->id) }}"><i class="fa fa-calendar-check-o" aria-hidden="true" style="color: black"></i></a></td>
                                     <td>
                                         <form method="POST" action="{{ url('/delete/events/admin/'.$event->id) }}">
                                             @csrf
                                             @method('Delete')
                                             <button class="fa fa-trash" type="submit" style="color: #B20404"></button>
                                         </form>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $events->links() }}
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
