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
                        <li><a href="{{ url('/clients') }}">
                                <small>Stock</small>
                            </a></li>
                        <li class="active">
                            <small>Add</small>
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
                                    <h3 class="text-center">Add a new Item</h3>
                                </div>
                                <hr>
                                {!! Form::open(['url' => url('/stock/add'), 'method' => 'post']) !!}
                                {!! Form::hidden('status', 1) !!}
                                @include('admin.stock.form')
                                {!! Form::close() !!}

                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>

            <div class="col-lg-4" >
                <div class="card" style="height: 553px;">
                    <div class="card-header">
                        <strong>Latest entries to the stock</strong>
                    </div>
                    <div class="card-body card-block">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">quantity</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stock as $goods)
                                <tr>
                                    <td>{{ $goods->goods_name }}</td>
                                    <td>{{ $goods->quantity }}</td>
                                    <td>{{ $goods->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
        <br>
        <br>

    </div>




@endsection

@section('script')

    <script>
        $(document).ready(function () {


        });
    </script>

@endsection