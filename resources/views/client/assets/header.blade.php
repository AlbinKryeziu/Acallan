<x-slot name="header">
    @include('admin/asset')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __( trans('welcome_Client')) }}
    </h2>
    <br />

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="{{ url('/pacient/doctor') }}">
           @lang('doctor')
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ url('/pacient/event') }}">
           @lang('event')
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ url('/pacient/store/mygift') }}">
         @lang('gift')
        </x-jet-nav-link>
    </div>
</x-slot>