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
                        <li><a href="{{ url('/Providers') }}"><small>Providers</small></a></li>
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
                        <strong>Edit Provider</strong>
                    </div>
                    <div class="card-body card-block">
                        {!! Form::model($providers, ['url' => url('/provider/update/'.$providers->id), 'method' => 'patch']) !!}
                        @include('admin.providers.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


            <div class="col-lg-4" >
                <div class="card" style="height: 553px;">
                    <div class="card-header">
                        <strong>Latest 5 providers</strong>
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
                            @foreach($count as $counted)
                                <tr>
                                    <td>{{ $counted->name }}</td>
                                    <td>{{ $counted->email }}</td>
                                    <td>{{ $counted->city }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>



        </div>



@endsection