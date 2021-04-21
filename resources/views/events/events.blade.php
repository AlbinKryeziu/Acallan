<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Doctor Dashboard') }}
        </h2>
        <br />
    </x-slot>
    @php $i=1; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl p-4">



                <div class="table table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <form>
                            <div class="table-title">
                                <h4>@lang('events') <b>@lang('table')</b>
                                    
                                <input type="search" class="form-control rounded float-right col-sm-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
                                    </form>
                                <br />
                                <br>
                            </div>
                            @if($events->count() >= 1)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('title')</th>
                                    <th>@lang('start_date')</th>
                                    <th>@lang('end_date')</th>
                                    <th>@lang('request_event')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $key => $event)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->end }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('/events/request/event/'.$event->id) }}"><i class="fa fa-eye" style="color: black;" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/events/delete/'.$event->id) }}" method="POST">
                                            <a href="{{ url('/events/editEvent/'.$event->id) }}">
                                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                            </a>

                                            @csrf @method('DELETE')
                                            <button type="submit" title="delete" style="border: none; background-color: transparent; color: #ed1b24;">
                                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                     {{ $events->links() }}
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
