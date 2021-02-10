<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table>
                    <th style="text-align: left;">Time Slot</th>
                    <th style="text-align: left; text-align: center;">Date</th>
                    
                    @foreach ($events as $event)
                    <tr>
                        <td style="width: 70%;" >{{$event->title}}</td>
                        <td>{{date('d-m-Y', strtotime($event->start))}}</td>
                        <td>{{date('H:m:s', strtotime($event->start))}} / {{date('H:m:s', strtotime($event->end))}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>