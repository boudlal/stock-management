
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->


    {!! Html::style('../admin/assets/css/normalize.css') !!}
    {!! Html::style('../admin/assets/css/bootstrap.min.css') !!}
    {!! Html::style('../admin/assets/css/font-awesome.min.css') !!}
    {!! Html::style('../admin/assets/css/themify-icons.css') !!}
    {!! Html::style('../admin/assets/css/flag-icon.min.css') !!}
    {!! Html::style('../admin/assets/css/cs-skin-elastic.css') !!}
    {!! Html::style('../admin/assets/css/lib/vector-map/jqvmap.min.css') !!}
    <link href="{{ asset('admin/assets/scss/style.css') }}" rel="stylesheet" />


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @yield("header")
</head>
<body>

@include('layouts.left-panel')

<div id="right-panel" class="right-panel">

<!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">{{ count(notifications()) }}</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="notification">
                          @if(count(notifications()) > 0)
                        <p class="red">you have {{ count(notifications()) }} notifications</p>
                          @foreach(notifications() as $notification)
                        <a class="dropdown-item media" href="{{ url('stock/notification/'.$notification->id) }}">
                            <i class="fa fa-check"></i>
                            <strong>there is only {{ $notification->quantity }} of {{ $notification->goods_name }} in the stock</strong>
                        </a>
                              @endforeach
                          @elseif(count(notifications()) < 1  )
                              <a class="dropdown-item media bg-flat-color-1" href="">
                                  <strong>there is no notifications </strong>
                              </a>
                          @endif()

                      </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{ getImage(sitesetting('logo')) }}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ url('/logout') }}"><i class="fa fa-power -off"></i>Logout</a>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->



    @include('layouts.alert')

@yield('content')

</div><!-- /#right-panel -->









{!! html::script('../admin/assets/js/vendor/jquery-2.1.4.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
{!! html::script('admin/assets/js/plugins.js') !!}
{!! html::script('admin/assets/js/main.js') !!}
{!! html::script('admin/assets/js/lib/chart-js/Chart.bundle.js') !!}
{!! Html::script('admin/assets/js/lib/chart-js/chartjs-init.js') !!}
{!! html::script('admin/assets/js/dashboard.js') !!}
{!! html::script('admin/assets/js/widgets.js') !!}
{!! html::script('admin/assets/js/lib/vector-map/jquery.vmap.js') !!}
{!! html::script('admin/assets/js/lib/vector-map/jquery.vmap.min.js') !!}
{!! html::script('admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js') !!}
{!! html::script('admin/assets/js/lib/vector-map/country/jquery.vmap.world.js') !!}


<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>
@yield('script')
</body>
</html>
