@extends('app.frontend.layouts.dashboard.app')

@section('title', 'Payments')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Payments</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Payments</h2>
      <p class="section-lead">
        Lihat riwayat pembayaran kamu disini
      </p>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tr>
                <th>#</th>
                <th>Tiket</th>
                <th>Jumlah Bayar</th>
                <th>Metode</th>
                <th>Tenggat Waktu</th>
                <th>Catatan</th>
                <th>Status</th>
              </tr>
              @foreach ($data['session']['payments'] as $payment)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $payment['ticket']['name'] }}</td>
                  <td>{{ $payment['amount'] }}</td>
                  <td>{{ $payment['method']['name'] }}</td>
                  <td>{{ $payment['due'] ?? 'n/a' }}</td>
                  <td>{{ $payment['note'] ?? '-' }}</td>
                  <td>
                    <div class="badge badge-{{ $payment['status']['element'] }}">
                      {{ $payment['status']['message'] }}
                    </div>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>


      <h2 class="section-title">Metode Pembayaran</h2>
      <p class="section-lead">
        Metode pembayaran yang kami dukung
      </p>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tr>
                <th>#</th>
                <th>Metode</th>
                <th>Nomor</th>
                <th>Pemegang</th>
              </tr>
              @foreach ($data['payment_methods'] as $method)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $method['name'] }}</td>
                  <td>{{ $method['number'] ?? '-' }}</td>
                  <td>{{ $method['holder'] ?? '-' }}</td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      

      
    </div>
  </section>
@endsection
