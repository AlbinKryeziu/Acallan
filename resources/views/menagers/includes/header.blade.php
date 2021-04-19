<x-slot name="header">
    @include('admin/asset')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Welcome Menager
    </h2>
    <br />

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="{{ url('Client') }}">
          Client
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ url('/pacient/event') }}">
            Follow accepted
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ url('/pacient/store/mygift') }}">
            Follow not accepted
        </x-jet-nav-link>
    </div>
</x-slot>