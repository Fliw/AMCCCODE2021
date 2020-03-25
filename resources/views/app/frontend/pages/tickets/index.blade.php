<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E-Ticket &mdash; {{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <nav class="navbar navbar-expand-lg bg-primary">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.landing') }}">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('ticket.index') }}">E-Ticket <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <h2 class="section-title">Pilih Tiketmu</h2>
            <p class="section-lead">Tersedia berbagai tiket yang dapat kamu pilih sesuai kebutuhan</p>
            
            <div class="row">
              @foreach ($data['tickets'] as $ticket)
                <div class="col-lg-6">
                  <div class="card card-large-icons">
                    <div class="card-icon bg-secondary text-black">
                      <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="card-body">
                      <h4>{{ $ticket['name'] }}</h4>
                      <p>{{ $ticket['description'] }}</p>
                      <a href="{{ route('ticket.form', ['ticket' => $ticket['slug']])}}" class="card-cta">Beli Tiket Ini<i class="fas fa-chevron-right"></i></a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          &copy; {{ config('app.name') }}
        </div>
      </footer>
    </div>
  </div>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
