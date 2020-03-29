@extends('app.frontend.layouts.basic.app')

@section('title', 'Pembelian Berhasil!')

@section('content')
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
@endsection
