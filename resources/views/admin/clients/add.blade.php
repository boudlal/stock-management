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
                        <li class="active"><small>Add</small> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row" >


            <div class="col-lg-8" >
                <div class="card">
                    <div class="card-header">
                        <strong>Add a client</strong>
                    </div>
                    <div class="card-body card-block">
                        {!! Form::open(['url' => url('/clients/add'), 'method' => 'post']) !!}
                            {!! Form::hidden('status', 1) !!}
                            @include('admin.clients.form')
                    {!! Form::close() !!}
                    </div>

                </div>
            </div>



            <div class="col-lg-4" >
                <div class="card" style="height: 553px;">
                    <div class="card-header">
                        <strong>Latest 8 clients</strong>
                    </div>
                    <div class="card-body card-block">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">City</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->city }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection