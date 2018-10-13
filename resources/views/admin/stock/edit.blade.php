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
                        <li><a href="{{ url('/') }}">
                                <small>Dashboard</small>
                            </a></li>
                        <li><a href="{{ url('/stock') }}">
                                <small>Stock</small>
                            </a></li>
                        <li class="active">
                            <small>edit</small>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <br>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">Edit a new Item</h3>
                                </div>
                                <hr>
                                {!! Form::model($stock, ['url' => url('/stock/update/'.$stock->id), 'method' => 'patch']) !!}
                                @include('admin.stock.form')
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection