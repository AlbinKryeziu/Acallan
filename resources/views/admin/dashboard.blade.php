<x-app-layout>
    <x-slot name="header">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <br>
        
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ url('/doctor/view') }}">
                Doctors
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/client') }}">
                Clients
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/admin/event') }}">
                Events
            </x-jet-nav-link>
        </div>
        <style>
            .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
        </style>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                


                <div class="container">
                    <div class="row">
                    <div class="col-md-3">  
                      <div class="card-counter primary">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers">{{ $doctor->count()}}</span>
                        <span class="count-name">Doctor</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter danger">
                        <i class="fa fa-ticket"></i>
                        <span class="count-numbers">{{ $client->count()}}</span>
                        <span class="count-name">Client</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter success">
                        <i class="fa fa-database"></i>
                        <span class="count-numbers">{{ $event->count() }}</span>
                        <span class="count-name">event</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers">35</span>
                        <span class="count-name">All</span>
                      </div>
                    </div>
                  </div>
                </div>

            </div></div></div>
   
   
</x-app-layout>
