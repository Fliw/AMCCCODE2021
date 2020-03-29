@extends('app.frontend.layouts.basic.app')

@section('title', 'E-Ticket')

@section('content')
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
@endsection
