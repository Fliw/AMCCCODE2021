<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pembelian Berhasil! &mdash; {{ env('APP_NAME') }}</title>
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
            <div class="card card-large-icons">
              <div class="card-icon bg-success text-white">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <div class="card-body">
                <h4>Yeay, Pembelian Berhasil!</h4>
                <p>
                    Selesaikan pembayaran kamu sebelum <strong>{{ $data['order']['due'] }}</strong>
                    <br/>
                    Cek selalu Email dan WhatsApp untuk instruksi pembayaran dan pemberitahuan
                    dari kami selanjutnya. Sampai jumpa di seminar!
                </p>
              </div>
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
