@extends('app.admin.layouts.app')

@section('title', 'Accounts')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Accounts</h1>
      <div class="section-header-button">
        <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modal-add">
            <i class="fas fa-plus"></i> Baru
        </button>
      </div>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash')

      <div class="card">
        <div class="card-header">
          <h4>Semua Akun Admin</h4>
          <div class="card-header-action">
            <a data-collapse="#quest-review" class="btn btn-icon btn-warning" href="#"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="quest-review">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Identity</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Email</th>
                  <th scope="col">Ditambahkan Pada</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['admins'] as $admin)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $admin['identity'] }}</td>
                    <td><a href="{{ $admin['profile_pic'] }}" target="_blank">{{ $admin['name'] }}</a></td>
                    <td>{{ $admin['email'] }}</td>
                    <td>{{ $admin['short_date'] }}</td>
                    <td>
                      @if ($data['session']['identity'] != $admin['identity'])
                        <form action="{{ route('admin.accounts.destroy', ['account' => $admin['id']]) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-outline-danger btn-icon"><i class="fas fa-trash"></i></button>
                        </form>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Add Quest Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('admin.accounts.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="identity">Identity</label>
              <input type="text" id="identity" class="form-control @error('identity') is-invalid @enderror" value="{{ old('identity') }}" name="identity" placeholder="XX.XX.XXXX" required></input>
              <div class="invalid-feedback">
                {{ $errors->first('identity') }}
              </div>
            </div>
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Masukkan nama lengkap..." required></input>
              <div class="invalid-feedback">
                {{ $errors->first('name') }}
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Masukkan email..." required></input>
              <div class="invalid-feedback">
                {{ $errors->first('email') }}
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password 6+ karakter..." required></input>
              <div class="invalid-feedback">
                {{ $errors->first('password') }}
              </div>
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Ulangi password..." required></input>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection