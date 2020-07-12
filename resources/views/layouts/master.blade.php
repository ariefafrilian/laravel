
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Master css -->
  <link rel="stylesheet" href="{{ mix('css/master.css') }}">
  @stack('styles')
</head>
<body class="hold-transition layout-top-nav pace-primary">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
    <div class="container">
      <a href="javascript:void(0);" class="navbar-brand">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
      </a>

      @if(Sentinel::guest())
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
      @endif
      
      @if(Sentinel::check())
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item @yield('home')">
            <a href="{{ url('home') }}" class="nav-link">Home</a>
          </li>

          <li class="nav-item @yield('customers')">
            <a href="{{ url('customers') }}" class="nav-link">Customers</a>
          </li>

          <li class="nav-item @yield('inventories')">
            <a href="{{ url('inventories') }}" class="nav-link">Inventories</a>
          </li>

          <li class="nav-item @yield('gifts')">
            <a href="{{ url('gifts') }}" class="nav-link">Gifts</a>
          </li>

          <li class="nav-item @yield('users')">
            <a href="{{ url('users') }}" class="nav-link">Users</a>
          </li>

          <li class="nav-item @yield('about')">
            <a href="{{ url('about') }}" class="nav-link">About</a>
          </li>

          <li class="nav-item @yield('answer')">
            <a href="{{ url('answer') }}" class="nav-link">Answer</a>
          </li>
        </ul>
      </div>
      @endif
      
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        @if(Sentinel::guest())
        <li class="nav-item">
          <a class="nav-link" href="{{ url('login') }}" role="button">
            <i class="fas fa-key"></i>
          </a>
        </li>
        @endif
        @if(Sentinel::check())
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" role="button">
            <i class="fas fa-unlock"></i>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><small>@yield('content-title')</small></h1>
          </div><!-- /.col -->
         @yield('breadcrumb')
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
       @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Made with <i class="fas fa-heart text-pink"></i> by Arief Afrilian
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@include('layouts.partials._modal')

<!-- Master js -->
<script src="{{ mix('js/master.js') }}"></script>
@stack('scripts')
</body>
</html>
