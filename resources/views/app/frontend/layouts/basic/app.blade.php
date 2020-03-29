@extends('app.frontend.layouts.basic.skeleton')

@section('app')
  <div class="layout-3 main-wrapper container">
    <!-- Basic Navbar -->
    @include('app.frontend.partials.navbar')

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
		</div>
		
		<!-- Footer -->
    <footer class="main-footer">
      @include('app.frontend.partials.footer')
    </footer>
  </div>
@endsection
