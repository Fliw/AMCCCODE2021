@extends('app.admin.layouts.app')

@section('title', 'Edit Quest')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Quest: {{ $data['quest']['title'] }}</h1>
    </div>
    <div class="section-body">
      <form action="{{ route('admin.quests.update', ['quest' => $data['quest']['id']]) }}" method="POST">
        @csrf
        @method('patch')
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <div class="form-group">
                  <label for="content">Judul</label>
                  <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $data['quest']['title'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" style="min-height: 150px;" required>{{ old('description') ?? $data['quest']['description'] }}</textarea>
                  <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-8">
                <div class="form-group">
                  <label for="response">Respon</label>
                  <textarea readonly id="response" name="response" class="form-control @error('response') is-invalid @enderror" style="min-height: 246px;" required>{{ old('response') ?? $data['quest']['response'] }}</textarea>
                  <div class="invalid-feedback">
                    {{ $errors->first('response') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="reviewer_note">Reviewer Note</label>
              <textarea id="reviewer_note" name="reviewer_note" class="form-control @error('reviewer_note') is-invalid @enderror" style="min-height: 100px;" placeholder="Berikan catatan (opsional)...">{{ old('reviewer_note') ?? $data['quest']['reviewer_note']}}</textarea>
              <div class="invalid-feedback">
                {{ $errors->first('reviewer_note') }}
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.quests.index') }}" class="btn btn-default">Batalkan</a>
            <button type="submit" class="btn btn-success" name="status" value="accepted">Simpan + Terima</button> 
            <button type="submit" class="btn btn-danger" name="status" value="rejected">Simpan + Tolak</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
