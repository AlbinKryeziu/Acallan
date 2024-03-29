<x-app-layout>
    @include('client/assets/header')
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="table table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <form>
                            <h4>@lang('event_table') <b>@lang('table')</b><input type="search" class="form-control rounded float-right col-sm-6" name="q" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /></h4>
                            </form>
                            <br>
                            <br />
                        </div>
                        @if($events->count())
                            
                     
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('event_name')</th>
                                    <th>@lang('doctor_name')</th>
                                     <th>@lang('product')</th>
                                     <th>@lang('article')</th>
                                    <th>@lang('start_date')</th>
                                    <th>@lang('status')</th>
                                    <th>Zoom Link</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $key => $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->event->title }}</td>
                                    <td>{{ $event->event->user->name }}</td>
                                    <td>{{ $event->product}}</td>
                                    <td>{{ $event->article}}</td>
                                    <td>{{ $event->event->start}}</td>
                                    @if($event->status == 0)
                                    <td><i class="fa fa-circle-o fa-lg" aria-hidden="true" style="color: #0b51be;" data-togle="ieafnhajuefn"></i></td>
                                    @elseif($event->status == 1)
                                    <td><i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: green;"></i></td>
                                    @elseif($event->status == 2)
                                    <td><i class="fa fa-times-circle fa-lg" aria-hidden="true" style="color: #992208;"></i></td>
                                    @endif
                                    @if($event->event->zoom)
                                        
                                  
                                    <td><a href="{{ url($event->event->zoom->join_url) }} " target="_blank" style="color: black;"><i class="fa fa-meetup fa-lg"> </i></a></td>
                                    @else
                                    <td>/</td>
                                    @endif
                                    <td><a href="{{ url('/edit/event/request/'.$event->id) }}"><i class="fa fa-pencil" aria-hidden="true" style="color: black"></i>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <p style="text-align: right; padding: 10px;">
                    @lang('status'): @lang('sent'): <i class="fa fa-circle-o fa-lg" aria-hidden="true" data-togle="ieafnhajuefn" style="color: #0b51be;"></i> @lang('accepted'):
                    <i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: green;"></i> @lang('rejected'): <i class="fa fa-times-circle fa-lg" aria-hidden="true" style="color: #992208;"></i>
                </p>
                {{ $events->links() }}
            </div>
          
        </div>
        @else
        <tr class="border border-warning">
            <td colspan="border border-warning"><div class="alert alert-secondary" role="alert" style="text-align: center">
             @lang('no_result')
              </div></td>
        </tr>
        @endif
    </div>
</x-app-layout>
