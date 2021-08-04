<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard- @yield('title')</title>

  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('jqueryui/jquery-ui.min.css') }}">
  <link href="{{ asset('admin/src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      @guest
      <li  class="nav-item dropdown" style="margin-top: 12px;">
          <a class="nav-link p-0" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
          <li class="nav-item dropdown">
              <a class="nav-link p-0" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif
  @else
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle p-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href=""
                 onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                  Log Out
              </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  <!-- <a href="" class="dropdown-item" >Log Out</a> -->


              </form>
          </div>
      </li>
  @endguest
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{session()->get('count')}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> {{session()->get('count')}} Orders</span>

          <div class="dropdown-divider"></div>
          @if (session()->has('orders'))
          @foreach(Session()->get('orders') as $order)
          <a href="{{url('/admin/order')}}" class="dropdown-item">
            {{-- <i class="fas fa-user-circle"></i> {{$order->user->name}} --}}

                <ul>
                    <li>
                      {{$order->subCategory->name}}
                    </li>
                </ul>

            {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
          </a>
          @endforeach
          @endif
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/landing')}}" class="brand-link">
      <img src="/assets/img/dohlogo.png" alt="Logo" class="rounded" style="width:64px; height:64px;">
      <span class="brand-text font-weight-light">Doh Canteen </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/admin/landing')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> --}}
          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/user')}}" class="nav-link">
                <i class="fas fa-user-circle nav-icon"></i>
              <p>
              User
              </p>
            </a>
            </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-utensils nav-icon"></i>
              <p>
               Menus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/subCategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SubCategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/option')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Option</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/addition')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Addition</p>
                </a>
              </li>

            </ul>
        <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-clipboard-list nav-icon"></i>
                      <p>
                    Main Options
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{url('admin/mainOption')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Mainoptions</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/mainAddition')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Mainadditions</p>
                        </a>
                      </li>
                    </li>
                    </ul>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                          <p>
                        Table
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{url('admin/table-type')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Table Types</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{url('admin/table')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Table No.</p>
                            </a>
                          </li>
                        </li>
                        </ul>

<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-hotel nav-icon"></i>
              <p>
               Canteen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/canteenOwner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Owner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/canteenInfo')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Information</p>
                </a>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/gender')}}" class="nav-link">
                <i class="fas fa-venus-mars nav-icon"></i>
              <p>
               Gender

              </p>
            </a>
            </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-user-circle nav-icon"></i>
              <p>
               Canteen Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/employeeType')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/employee')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
                </li>
            </ul>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Canteen Tables
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/tableType') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/table') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url ('admin/blog') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anniversity Events</p>
                </a>
              </li>


            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    @yield('content')
<!-- <script src="{{ asset('dist/js/jquery.js') }}"></script> -->
  <!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>



@yield('javascript')

</body>
</html>

