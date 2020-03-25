<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Beli E-Ticket: {{ $data['ticket']['name'] }} &mdash; {{ env('APP_NAME') }}</title>
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
            <h2 class="section-title">E-Ticket: {{ $data['ticket']['name'] }}</h2>
            <p class="section-lead">{{ $data['ticket']['description'] }}</p>

            <div class="card">
              <form action="{{ route('ticket.order') }}" method="POST">
                @csrf
                <input type="hidden" name="order[ticket_id]" value="{{ $data['ticket']['id'] }}" />
                <input type="hidden" name="order[amount]" value="{{ $data['ticket']['price'] }}" />
                <div class="card-header">
                  <h6 style="color: #6777ef">Formulir E-Ticket</h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label>Nomor Identitas (NIM, NIS, dsb.)</label>
                        <input type="text" name="attendee[identity]" class="form-control" placeholder="Ketik nomor identitas">
                      </div>
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="attendee[name]" class="form-control" placeholder="Ketik nama lengkap">
                      </div>
                      <div class="form-group">
                        <label>Asal Instansi</label>
                        <input type="text" name="attendee[institution]" class="form-control" placeholder="Ketik perguruan tinggi atau instansi asal">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="attendee[email]" class="form-control" placeholder="Ketik alamat email aktif dan valid">
                      </div>
                      <div class="form-group">
                        <label>Nomor WhatsApp</label>
                        <input type="text" name="attendee[whatsapp]" class="form-control" placeholder="Ketik nomor WhatsApp aktif">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <h6>Subtotal</h6>
                      <table style="table-layout: fixed; width: 100%">
                        <tr>
                          <td>x1 {{ $data['ticket']['name'] }}</td>
                          <td style="text-align:right"><strong>{{ $data['ticket']['price'] }}</strong></td>
                        </tr>
                      </table>

                      <hr>
                      <h6>Metode Pembayaran</h6>
                      @foreach ($data['payment_methods'] as $method)
                        <input type="radio" id="method-{{ $loop->iteration }}" name="order[method_id]" value="{{ $method['id'] }}">
                        <label for="method-{{ $loop->iteration }}">{{ $method['name'] }}</label>
                        <br>
                      @endforeach

                      <hr>
                      <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Beli E-Ticket</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
