@extends('layouts.app')

@section('header')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ url('/') }}"><small>Dashboard</small></a></li>
                        <li><a href="{{ url('/clients') }}"><small>Clients</small></a></li>
                        <li class="active"><small>edit</small> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">


            <div class="col-lg-8" >
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Client</strong>
                    </div>
                    <div class="card-body card-block">
                        {!! Form::model($client, ['url' => route('clients.update', $client->id), 'method' => 'patch']) !!}
                        @include('admin.clients.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


            <div class="col-lg-4" >
                <div class="card" style="height: 553px;">
                    <div class="card-header">
                        <strong>Latest 8 sales to this client</strong>
                    </div>
                    <div class="card-body card-block">
                    @if(count($orders) < 1)
                        <br>
                        <br>
                        <div style="text-align: center">
                            <strong class="">This Client does not did any sales yet</strong>
                        </div>
                        
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->total }} DH</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    </div>

                </div>
            </div>


        </div>
    </div>



@endsection