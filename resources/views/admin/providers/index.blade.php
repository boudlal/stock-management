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
                            <li class="active"><small>Providers</small> </li>
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
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info " >
                                        <i class="fa fa-plus-square"></i> Add one
                                    </button>
                                </div>
                                <strong class="card-title">Providers</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>CIN</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($providers as $provider)
                                    <tr>
                                        <td>{{ $provider->name }}</td>
                                        <td>{{ $provider->email }}</td>
                                        <td>{{ $provider->cin }}</td>
                                        <td>{{ $provider->phone }}</td>
                                        <td>{{ $provider->address }}</td>
                                        <td>{{ $provider->city }}</td>
                                        <td>{{ clientStatus()[$provider->status] }}</td>
                                        <td>
                                            <a href="{{ url('/provider/edit/'.$provider->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                            <a href="{{ url('/provider/delete/'.$provider->id) }}"><button class="btn btn-danger btn-sm">Delete</button></a>
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


@endsection