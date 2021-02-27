<x-app-layout>
    <x-slot name="header">
        @include('admin/asset')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
        <br />
    </x-slot>
    @php $i=1; @endphp
    @php $countGift=1; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl p-4">
                <div class="table">
                    <div class="">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Gifts <b>Table</b></h4>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client as $key => $client)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                   
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br />
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <tr></tr>
                            <tr>
                                <th colspan="8" style="text-align: center;">Gift From Customers</th>
                            </tr>
                            @if($gifts->count() >=1)
                                
                           
                            <th colspan="2">#</th>
                            <th colspan="">Client Name</th>
                            <th colspan="">Description</th>

                            <tbody>
                                @foreach($gifts as $key => $gift)
                                <tr>
                                    <td colspan="2">@php echo $countGift++ @endphp</td>
                                    <td colspan="" onclick="window.open('{{$gift->links}}', '_blank')"><i class="fa fa-link" aria-hidden="true"></i></td>
                                    <td colspan="">{{ $gift->description}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $gifts->links() }}
                    </div>
                    @else
                      <tr class="border border-warning">
                                <td colspan="border border-warning"><div class="alert alert-secondary" role="alert">
                                    No registered gifts so far
                                  </div></td>
                            </tr>
                    @endif
                </div>
            </div>
        </div>
       
    </div>
    
</x-app-layout>

