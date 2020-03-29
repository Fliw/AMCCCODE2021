@extends('app.frontend.layouts.basic.app')

@section('title', 'Beli E-Ticket: ' . $data['ticket']['name'])

@section('content')
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
                  <input type="text" name="attendee[identity]" class="form-control @error('attendee.identity') is-invalid @enderror" placeholder="Ketik nomor identitas" value="{{ old('attendee.identity') }}" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('attendee.identity') }}
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="attendee[name]" class="form-control @error('attendee.name') is-invalid @enderror" placeholder="Ketik nama lengkap" value="{{ old('attendee.name') }}" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('attendee.name') }}
                  </div>
                </div>
                <div class="form-group">
                  <label>Asal Instansi</label>
                  <input type="text" name="attendee[institution]" class="form-control @error('attendee.institution') is-invalid @enderror" placeholder="Ketik perguruan tinggi atau instansi asal" value="{{ old('attendee.institution') }}" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('attendee.institution') }}
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="attendee[email]" class="form-control @error('attendee.email') is-invalid @enderror" placeholder="Ketik alamat email aktif dan valid" value="{{ old('attendee.email') }}" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('attendee.email') }}
                  </div>
                </div>
                <div class="form-group">
                  <label>Nomor WhatsApp</label>
                  <input type="text" name="attendee[whatsapp]" class="form-control @error('attendee.whatsapp') is-invalid @enderror" placeholder="Ketik nomor WhatsApp aktif" value="{{ old('attendee.whatsapp') }}" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('attendee.whatsapp') }}
                  </div>
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
                  <input type="radio" id="method-{{ $loop->iteration }}" name="order[method_id]" value="{{ $method['id'] }}" required>
                  <label for="method-{{ $loop->iteration }}">{{ $method['name'] }}</label><br>
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
@endsection
