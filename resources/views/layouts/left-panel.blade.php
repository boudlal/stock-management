<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <br>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ getImage(sitesetting('logo')) }}" width="100px" style="margin-bottom: 19px" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ getImage(sitesetting('logo')) }}" alt="Logo"></a>
        </div>




        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <h3 class="menu-title"></h3><!-- /.menu-title -->
                <li class="">
                    <a href="{{ url('/siteSetting') }}"> <i class="menu-icon fa fa-cogs"></i>Site Settings</a>
                </li>

                <h3 class="menu-title"></h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Clients</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ url('clients') }}">All clients</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{ url('clients/add') }}">Add a new client</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>Providers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ url('providers') }}">All providers</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{ url('providers/add') }}">Add a new provider</a></li>
                    </ul>
                </li>

                <h3 class="menu-title"></h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Stock</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ url('stock') }}">Stock</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{ url('stock/add') }}">Add to the stock</a></li>
                    </ul>
                </li>

                <h3 class="menu-title"></h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Orders</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ url('orders') }}">All orders</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{ url('orders/add') }}">New order</a></li>
                    </ul>
                </li>

                <h3 class="menu-title"></h3><!-- /.menu-title -->
                <li class="">
                    <a href="{{ url('/calendar') }}"> <i class="menu-icon fa fa-calendar-check-o"></i>Calendar</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
