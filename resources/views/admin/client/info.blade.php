<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br />

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/doctor/view') }}">
                Doctor
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/client') }}">
                Client
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/event') }}">
                Event
            </x-jet-nav-link>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <p style="font-size: 18px;">Client Name: <strong>{{ $client->name }}</strong></p>
                <div class="card-deck" >
                    <div class="card" onclick="window.location='{{ url('/client/profile/'.$client->id) }}'" style="height:200px; bord; border-top: 1px solid #17a2b8;">
                        <i class="fa fa-user fa-5x" style="text-align: center; padding: 30px; color:#17a2b8;"></i>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;">Profile</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="card" onclick="window.location='{{ url('/client/evnts/'.$client->id) }}'" style="height: 200px; border-top: 1px solid #17a2b8;">
                        <i class="fa fa-calendar fa-5x" style="text-align: center; padding: 30px; color:#17a2b8;"></i>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;">Event</h5>
                        </div>
                    </div>
                    <div class="card" style="height: 200px; border-top: 1px solid #17a2b8;" onclick="window.location='{{ url('/client/gift/'.$client->id) }}'">
                        <i class="fa fa-gift  fa-5x" style="text-align: center; padding: 30px; color:#17a2b8;"></i>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;">Gift</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
