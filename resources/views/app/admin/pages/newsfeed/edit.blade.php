@extends('app.admin.layouts.app')

@section('title', 'Edit Newsfeed')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Ubah: {{ $data['newsfeed']['title'] }}</h1>
    </div>
    <div class="section-body">
      <form action="{{ route('admin.newsfeeds.update', ['newsfeed' => $data['newsfeed']['id']]) }}" method="POST">
        @csrf
        @method('patch')
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="content">Konten</label>
              <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" style="min-height: 150px;" required>{{ old('content') ?? $data['newsfeed']['content'] }}</textarea>
              <div class="invalid-feedback">
                {{ $errors->first('content') }}
              </div>
            </div>
            <div class="form-group">
              <label for="channel">Channel</label>
              <select id="channel" class="form-control @error('channel') is-invalid @enderror" name="channel[]">
                <option value="all">Semua</option>
                <option value="team">Hanya Tim</option>
              </select>
              <div class="invalid-feedback">
                {{ $errors->first('channel') }}
              </div>
            </div>
            <div class="form-group">
              <div class="control-label">Opsi</div>
              <label class="custom-switch mt-2">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1" class="custom-switch-input" checked>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Publikasi</span>
              </label>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.newsfeeds.index') }}" class="btn btn-secondary">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
