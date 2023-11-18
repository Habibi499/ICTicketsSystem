<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Simplified Ticketing System - A user-friendly ticketing solution for Occidental Insurance Co Ltd by Robinson M. Mwaura.">
      <meta name="author" content="Robinson M. Mwaura">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
      <!--Custom css--->
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <link rel="stylesheet" href="{{asset('css/editform.css')}}">
      @yield('styles')

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
      @yield('scripts')

   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <!-- Right navbar -->
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a href="{{ route('admin.index') }}" class="nav-link">
               <i class="fa fa-home"></i>
               {{ __('Admin Home') }}
               </a>
            </li>
                <!--Dropdown Menu -->
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="{{route('printer.index')}}">
                  <i class="fas fa-print"></i>&ensp;printers
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <a href="{{route('printer.index')}}" class="dropdown-item">
                        <i class="fa fa-print mr-2"></i>&ensp;All Printers
                       
                        </a>
                     <div class="dropdown-divider"></div>
                     <a href="{{route('printer.create')}}" class="dropdown-item">
                     <i class="fa fa-user mr-2"></i>&ensp;Add Printer
         
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="{{route('printer.updatetoners')}}" class="dropdown-item">
                     <i class="fa fa-upload mr-2"></i>&ensp;Update Toner Quantities
         
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="{{route('printer.assigntoners')}}" class="dropdown-item">
                     <i class="fas fa-print mr-2"></i>&ensp; Assign Toner
                     </a>
               </li>
              <!-- Right navbar -->
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a href="{{ route('alltickets.index') }}" class="nav-link">
               <i class="fa fa-book"></i>&ensp;
               {{ __('All Tickets') }}
               </a>
            </li>
       
            <!--Dropdown Menu -->
            <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
               <i class="fas fa-users"></i>&ensp;&ensp;Users
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">&ensp; Users</span>
                  <div class="dropdown-divider"></div>
                  <a href="{{route('admin.active')}}" class="dropdown-item">
                  <i class="fa fa-user mr-2"></i>&ensp;Users Online
                  <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{route('admin.active')}}" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i>&ensp; All Users
                  </a>
            </li>
            <!-- Dropdown Menu -->
            <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fa fa-user"></i>&ensp;
            {{ Auth::user()->name }}
            </a>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item"
               onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="mr-2 fas fa-sign-out-alt"></i>
            {{ __('Log Out') }}
            </a>
            </form>
            </div>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->
      <!--Modal-->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
      <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
      <span class="brand-text font-weight-light">ITickets</span>
      </a>
      @include('layouts.adminnavigation')
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      @yield('content')
      </div>
      <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
      </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Main Footer -->
      <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
      &copy; R.
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 OIC Digital factory | ITickets Version 1.0.0</strong>
      </footer>
      </div>
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->
      @vite('resources/js/app.js')
      <!-- AdminLTE App -->
      <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
      <script src="{{ asset('js/adminformpopup.js') }}" defer></script>
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      @yield('scripts')
   </body>
</html>