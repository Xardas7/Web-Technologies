<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/admin/datepicker3.css" rel="stylesheet">
    <link href="/css/admin/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/admin/html5shiv.js"></script>
    <script src="/js/admin/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="nav-brand" href="/"><img src="{{ asset('favicon.ico')}}" alt=""></a>
        </div>

    </div><!-- /.container-fluid -->

</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="color: white">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="/img/admin.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    @if(!empty($users) or !empty($products)or !empty($adresses) or !empty($cards)or !empty($orders))
    <form role="search">
        <div class="form-group">
            @if(!empty($users))
            <input type="text" class="form-control" placeholder="Search by email" name="email">
                <input type="submit" hidden>
            @endif
                @if(!empty($products))
                <input type="text" class="form-control" placeholder="Search by code" name="code">
                <input type="submit" hidden>
                @endif
                @if(!empty($addresses))
                    <input type="text" class="form-control" placeholder="Search by email" name="email">
                    <input type="submit" hidden>
                @endif
                @if(!empty($cards))
                    <input type="text" class="form-control" placeholder="Search by email" name="email">
                    <input type="submit" hidden>
                @endif
                @if(!empty($orders))
                    <input type="text" class="form-control" placeholder="Search by email" name="email">
                    <input type="submit" hidden>
                @endif
                @if(!empty($coupons))
                    <input type="text" class="form-control" placeholder="Search by code" name="code">
                    <input type="submit" hidden>
                @endif
                @if(!empty($producers))
                    <input type="text" class="form-control" placeholder="Search by name" name="name">
                    <input type="submit" hidden>
                @endif
        </div>
    </form>
    @endif

    <ul class="nav menu" >
        @can('all')
        <li class="{{Request::getPathInfo() === '/admin' ? 'active' : 'parent'}}"><a href="/admin"  style="color: white"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li class="{{(Request::getPathInfo() ==='/admin/user/new' or Request::getPathInfo() === '/admin/users') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-1" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Users<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="/admin/user/new">
                        <span class="fa fa-arrow-right">&nbsp;</span> New user
                    </a></li>
                <li><a class="" href="/admin/users">
                        <span class="fa fa-arrow-right">&nbsp;</span> All users
                    </a></li>
            </ul>
        </li>
        <li class="{{(Request::getPathInfo() ==='/admin/product/new' or Request::getPathInfo() === '/admin/products') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-2" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Products<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="/admin/product/new">
                        <span class="fa fa-arrow-right">&nbsp;</span> New product
                    </a></li>
                <li><a class="" href="/admin/products">
                        <span class="fa fa-arrow-right">&nbsp;</span> All products
                    </a></li>
            </ul>
        </li>
        <li class="{{(Request::getPathInfo() ==='/admin/category/new' or Request::getPathInfo() === '/admin/categories') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-4" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Categories <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li><a class="" href="/admin/category/new">
                        <span class="fa fa-arrow-right">&nbsp;</span> New category
                    </a></li>
                <li><a class="" href="/admin/categories">
                        <span class="fa fa-arrow-right">&nbsp;</span> All categories
                    </a></li>
            </ul>
        </li>
        <li class="{{(Request::getPathInfo() ==='/admin/address/new' or Request::getPathInfo() === '/admin/addresses') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-3" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Addresses <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li><a class="" href="/admin/address/new">
                        <span class="fa fa-arrow-right">&nbsp;</span> New address
                    </a></li>
                <li><a class="" href="/admin/addresses">
                        <span class="fa fa-arrow-right">&nbsp;</span> All addresses
                    </a></li>
            </ul>
        </li>
        <li class="{{(Request::getPathInfo() ==='/admin/card/new' or Request::getPathInfo() === '/admin/card') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-4" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Cards <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li><a class="" href="/admin/card/new">
                        <span class="fa fa-arrow-right">&nbsp;</span> New card
                    </a></li>
                <li><a class="" href="/admin/cards">
                        <span class="fa fa-arrow-right">&nbsp;</span> All cards
                    </a></li>
            </ul>
        </li>
        <li class="{{(Request::getPathInfo() ==='/admin/order/new' or Request::getPathInfo() === '/admin/orders') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-5" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Orders <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-5">
                <li><a class="" href="/admin/order/new">
                        <span class="fa fa-arrow-right">&nbsp;</span> New order
                    </a></li>
                <li><a class="" href="/admin/orders">
                        <span class="fa fa-arrow-right">&nbsp;</span> All orders
                    </a></li>
                <li>
            </ul>
        </li>
        <li class="{{(Request::getPathInfo() ==='/admin/coupon/new' or Request::getPathInfo() ==='/admin/coupons' or Request::getPathInfo() ==='/admin/producer/new' or Request::getPathInfo() === '/admin/producers') ? 'active parent': 'parent'}}"><a data-toggle="collapse" href="#sub-item-6" style="color: white">
                <em class="fa fa-navicon">&nbsp;</em> Other <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-6">
                <li><a class="" href="/admin/coupons">
                        <span class="fa fa-arrow-right">&nbsp;</span> Coupons
                    </a></li>
                <li><a class="" href="/admin/producers">
                        <span class="fa fa-arrow-right">&nbsp;</span> Producers
                    </a></li>
                <li>
            </ul>
        </li>
            @endcan
        @can('product manage')
                <li><a class="" href="/dashboard/product/new" style="color: white">
                        <span class="fa fa-arrow-right">&nbsp;</span> New product
                    </a></li>
                <li><a class="" href="/dashboard/" style="color: white">
                        <span class="fa fa-arrow-right">&nbsp;</span> All products
                    </a></li>
                <li><a class="" href="/dashboard/" style="color: white">
                        <span class="fa fa-arrow-right">&nbsp;</span> Update Account
                    </a></li>
            @endcan
        <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
            <a href="{{ route('logout') }}"
               style="color: white"
               onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>
<!-- ***** Header Area End ***** -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">

    </div>

@yield('section')

    <script src="/js/admin/jquery-1.11.1.min.js"></script>
    <script src="/js/admin/bootstrap.min.js"></script>
</div>
</body>
</html>
