<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
        <br />
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Generate Zoom</th>
                            <th scope="col">Zoom Link</th>
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
