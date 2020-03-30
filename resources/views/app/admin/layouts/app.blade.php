@extends('app.admin.layouts.skeleton')

@section('app')
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      @include('app.admin.partials.topnav')
    </nav>
    <div class="main-sidebar">
      @include('app.admin.partials.sidebar')
    </div>

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>
    <footer class="main-footer">
      @include('app.admin.partials.footer')
    </footer>
  </div>
@endsection
