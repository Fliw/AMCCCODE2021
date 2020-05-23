@extends('app.admin.layouts.app')

@section('title', 'Edit Tim')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Ubah: {{ $data['team']['name'] }}</h1>
    </div>
    <div class="section-body">
      <form action="{{ route('admin.teams.update', ['team' => $data['team']['id']]) }}" method="POST">
        @csrf
        @method('patch')
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="team_name">Nama Tim</label>
              <input type="text" id="team_name" name="team_name" class="form-control @error('team_name') is-invalid @enderror" value="{{ old('team_name') ?? $data['team']['name'] }}" required />
              <div class="invalid-feedback">
                {{ $errors->first('team_name') }}
              </div>
            </div>

            <div class="form-group">
              <label for="institution">Asal Institusi</label>
              <input type="text" id="institution" name="institution" class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution') ?? $data['team']['institution'] }}" required />
              <div class="invalid-feedback">
                {{ $errors->first('institution') }}
              </div>
            </div>

            <div class="form-group">
              <label for="category_id">Kategori</label>
              <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                @foreach ($data['categories'] as $category)
                  <option value="{{ $category['id'] }}" @if ($data['team']['category_id'] === $category['id']) selected @endif>{{ $category['name'] }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                {{ $errors->first('category_id') }}
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="leader_identity">NIM Ketua</label>
                  <input type="text" id="leader_identity" name="leader_identity" class="form-control @error('leader_identity') is-invalid @enderror" value="{{ old('leader_identity') ?? $data['team']['leader']['identity'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('leader_identity') }}
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="leader_name">Nama Ketua</label>
                  <input type="text" id="leader_name" name="leader_name" class="form-control @error('leader_name') is-invalid @enderror" value="{{ old('leader_name') ?? $data['team']['leader']['name'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('leader_name') }}
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="leader_whatsapp">WhatsApp Ketua</label>
                  <input type="text" id="leader_whatsapp" name="leader_whatsapp" class="form-control @error('leader_whatsapp') is-invalid @enderror" value="{{ old('leader_whatsapp') ?? $data['team']['leader']['whatsapp'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('leader_whatsapp') }}
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="leader_email">Email Ketua</label>
                  <input type="text" id="leader_email" name="leader_email" class="form-control @error('leader_email') is-invalid @enderror" value="{{ old('leader_email') ?? $data['team']['leader']['email'] }}" required />
                  <div class="invalid-feedback">
                    {{ $errors->first('leader_email') }}
                  </div>
                </div>
              </div>
            </div>

            <hr>
            @foreach ($data['team']['members'] as $i => $member)
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="member[{{$i}}][nim]">NIM Anggota {{ $i }}</label>
                    <input type="text" id="member_identity" name="member[{{$i}}][nim]" class="form-control @error('member_identity') is-invalid @enderror" value="{{ old('member_identity') ?? $member['nim'] }}" required />
                    <div class="invalid-feedback">
                      {{ $errors->first('member_identity') }}
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="member[{{$i}}][name]">Nama Anggota {{ $i }}</label>
                    <input type="text" id="member_name" name="member[{{$i}}][name]" class="form-control @error('member_name') is-invalid @enderror" value="{{ old('member_name') ?? $member['name'] }}" required />
                    <div class="invalid-feedback">
                      {{ $errors->first('member_name') }}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
