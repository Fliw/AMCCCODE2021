@extends('app.admin.layouts.app')

@section('title', 'Edit Peserta')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Ubah: {{ $data['attendee']['name'] }}</h1>
    </div>
    <div class="section-body">
      <form action="{{ route('admin.attendees.update', ['attendee' => $data['attendee']['id']]) }}" method="POST">
        @csrf
        @method('patch')
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="identity">NIM</label>
                  <input type="text" id="identity" name="identity" class="form-control @error('identity') is-invalid @enderror" value="{{ old('identity') ?? $data['attendee']['identity'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('identity') }}
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="name">Nama Peserta</label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $data['attendee']['name'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $data['attendee']['email'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="institution">Asal Institusi</label>
                  <input type="text" id="institution" name="institution" class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution') ?? $data['attendee']['institution'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('institution') }}
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="whatsapp">Nomor WhatsApp</label>
                  <input type="text" id="whatsapp" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" value="{{ old('whatsapp') ?? $data['attendee']['whatsapp'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('whatsapp') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.attendees.index') }}" class="btn btn-secondary">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
