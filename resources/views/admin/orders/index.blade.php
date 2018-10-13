@extends('layouts.app')


@section('header')

    <link rel="stylesheet" href="">
    {{ Html::style('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}

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
                        <li class="active"><small>Stock</small> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Stock</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ clients()[$order->client_id] }}</td>
                                            <td>{{ $order->total }} DH</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a href="{{ url('/order/show/'.$order->id) }}"><button class="btn btn-primary btn-sm">show</button></a>
                                                <a href="{{ url('/order/delete/'.$order->id) }}"><button class="btn btn-danger btn-sm">Delete</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div>


@endsection

@section('script')
    {!!  Html::script('admin/assets/js/lib/data-table/datatables.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/dataTables.buttons.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/buttons.bootstrap.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/jszip.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/pdfmake.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/vfs_fonts.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/buttons.html5.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/buttons.print.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/buttons.colVis.min.js') !!}
    {!!  Html::script('admin/assets/js/lib/data-table/datatables-init.js') !!}


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <script src="{{ asset('js/app.js') }}"></script>


@endsection