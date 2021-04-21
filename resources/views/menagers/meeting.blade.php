<x-app-layout>
    @include('menagers/includes/header') 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <br />
                        </div>
                        <table class="table table-hover table-bordered">
                            <form>
                            <div class="table-title">
                                <h4>Doctors<b>Table</b>
                                    </form>
                                <br />
                                <br>
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Article</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $meetings as $meeting)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $meeting->doctor->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($meeting->start_data)->format('d M Y H:s') }}</td>
                                   <td>{{ $meeting->event->requestAccepted->product }}</td>
                                   <td>{{ $meeting->event->requestAccepted->article }}</td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     {{ $meetings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
