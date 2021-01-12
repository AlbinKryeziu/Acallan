<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <h1 style="font-size: 25px;">Information</h1>
                <table style="width:100%;">
                    <tr>
                        <th style="text-align: left;">Name</th>
                        <th style="text-align: left;">Email</th>
                        <th style="text-align: left;">Product</th>
                        <th style="text-align: left;">Remarks</th>
                    </tr>
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <h1 style="font-size: 25px;">History</h1>
                <table style="width:100%;">
                    <tr>
                        <th style="text-align: left;">Date of call</th>
                        <th style="text-align: left;">Duration</th>
                        <th style="text-align: left;">Product</th>
                        <th style="text-align: left;">Articles</th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>