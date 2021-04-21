<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
        <br />
    </x-slot>

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
                             <h4>Today  Event <strong>{{ Carbon\Carbon::now()->format('Y-m-d') }}</strong> <b>@lang('table')</b>
                             
                                <input type="search" class="form-control rounded float-right col-sm-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
                                    </form>
                                <br />
                                <br>
                            </div>
                            @if($event->count())
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('event_name')</th>
                                    <th scope="col">@lang('start_date')</th>
                                    <th scope="col">@lang('client')</th>
                                    <th scope="col">@lang('generate_zoom')</th>
                                    <th scope="col">@lang('zoom_link')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event as $event )
        
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->requestEvent->first()->requestClient->name }}</td>
                                    @if(!$event->zoom)
                                    <td>
                                        <form method="POST" action="{{ url('/meetings') }}">
                                            <input type="hidden" name="start_time" value="{{$event->start  }}" />
                                            <input type="hidden" name="client_id" value="{{$event->requestEvent->first()->request_id}}" />
                                            <input type="hidden" name="event_id" value="{{$event->id  }}" />
                                            <button type="submit" class="btn btn-outline-info">Generate</button>
                                            @csrf
                                        </form>
                                    </td>
                                    @else
                                    <td>Genaratet</td>
                                    @endif @if($event->zoom)
                                    <td>
                                        <a href="{{ url($event->zoom->start_url) }} " target="_blank" style="color: black;"><i class="fa fa-meetup fa-lg"> </i></a>
                                    </td>
                                    @else
                                    <td>/</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     {{-- {{ $event->links() }} --}}
                    </div>
                    @else
                        <div class="alert alert-secondary" role="alert" style="text-align: center">
                           @lang('no_result')
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>



    
    @if(Session::has('success'))
    <script>
        swal("Success", "{{Session::get('success')}}", "success", {
            button: "ok",
        });
    </script>
    @endif
</x-app-layout>
