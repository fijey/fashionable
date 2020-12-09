<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <img src="/img/user1-128x128.jpg" class="img-circle" alt="User Image" width="50px" height="50px">
              {{ auth()->user()->name }}
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="#">My Profile</a>
              <a class="dropdown-item" href="#">My stores</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Fashionable</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @can('dashboard')
            <li class="nav-item">
              <a href="/dashboard" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            @endcan
            @can('crud profiles')

            <li class="nav-item">
              <a href="/myprofile" class="nav-link ">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  My Profile
                </p>
              </a>
            </li>
            @endcan

            @can('crud products')

            <li class="nav-item">
              <a href="/myproduct" class="nav-link ">
                <i class="nav-icon fas fa-shopping-bag"></i>
                <p>
                  My Product
                </p>
              </a>
            </li>

            @endcan
            @can('management users')

            <li class="nav-item">
              <a href="/managementuser" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Management Pengguna
                </p>
              </a>
            </li>
            @endcan
            @can('management categories')

            <li class="nav-item">
              <a href="/category" class="nav-link ">
                <i class="nav-icon fas fa-tag"></i>
                <p>
                  Management Category
                </p>
              </a>
            </li>
            @endcan
            @can('logout')

            <li class="nav-item">
              <a href="/logout" class="nav-link ">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
            @endcan
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      @yield('content')
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/js/adminlte.min.js"></script>
</body>

</html>