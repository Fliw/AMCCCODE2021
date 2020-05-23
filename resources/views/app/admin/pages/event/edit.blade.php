@extends('app.admin.layouts.app')

@section('title', 'Edit Event')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Ubah: {{ $data['event']['name'] }}</h1>
    </div>
    <div class="section-body">
      <form action="{{ route('admin.events.update', ['event' => $data['event']['id']]) }}" method="POST">
        @csrf
        @method('patch')
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="name">Nama Event</label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $data['event']['name'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ?? $data['event']['description'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="published">Publish?</label>
                <select id="published" class="form-control @error('published') is-invalid @enderror" name="published">
                  <option @if ($data['event']['published']) selected @endif value="1">Ya</option>
                  <option @if (!$data['event']['published']) selected @endif value="0">Tidak</option>
                </select>
                <div class="invalid-feedback">
                  {{ $errors->first('published') }}
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
