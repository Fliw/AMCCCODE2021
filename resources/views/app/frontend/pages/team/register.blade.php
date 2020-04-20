<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registrasi Tim &mdash; {{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ asset('code2020/img/logo-384.png') }}" alt="logo" width="192">
            </div>
            @if(session()->has('info'))
              <div class="alert alert-primary">
                  {{ session()->get('info') }}
              </div>
            @endif
            @if(session()->has('status'))
              <div class="alert alert-info">
                  {{ session()->get('status') }}
              </div>
            @endif
            @if($errors->any())
              <div class="alert alert-danger">
                Whoops! Terdapat form dengan data yang belum sesuai. 
                Mohon cek kembali data kamu di menu registrasi.
              </div>
            @endif

            <div class="card card-primary">
              <form id="register" action="{{ route('team.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="tab-content">
                    <!-- Welcome Message -->
                    <div class="tab-pane fade show active text-center" id="team-step-0" role="tabpanel">
                      <h5 style="color: #6777ef">Selamat datang Innovator!</h5><br/>

                      <a href="{{ route('team.login') }}" class="btn btn-light">Login Dashboard Tim</a>
                      <a href="#team-step-1" class="btn btn-primary btn-icon icon-right" data-toggle="tab" role="tab">Mulai Registrasi Tim <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <!-- First Step -->
                    <div class="tab-pane fade" id="team-step-1" role="tabpanel">
                      <h5 style="color: #6777ef">Mari mulai dengan informasi dasar tim</h5><br/>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Tim</label>
                        <div class="col-sm-10">
                          <input type="text" id="tim_nama" name="tim[nama]" class="form-control @error('tim.nama') is-invalid @enderror" value="{{ old('tim.nama') }}" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            {{ $errors->first('identity') }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Asal Institusi</label>
                        <div class="col-sm-10">
                          <input type="text" id="tim_institusi" name="tim[institusi]" class="form-control @error('tim.institusi') is-invalid @enderror" value="{{ old('tim.institusi') }}" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            {{ $errors->first('tim.institusi') }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kategori Lomba</label>
                        <div class="col-sm-10">
                          <select name="tim[kategori]" id="tim_kategori" class="form-control @error('tim.kategori') is-invalid @enderror">
                            <option hidden>&mdash; Pilih Kategori Lomba &mdash;</option>
                            @foreach ($data['categories'] as $category)
                              <option @if(old('tim.kategori') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                            {{ $errors->first('tim.kategori') }}
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="text-right">
                        <a href="#team-step-2" id="to-step-2" class="btn btn-primary btn-icon icon-right disabled" data-toggle="tab" role="tab">Ketua & Anggota <i class="fas fa-arrow-right"></i></a>
                      </div>
                    </div> <!-- End First Step -->

                    <!-- Second Step -->
                    <div class="tab-pane fade" id="team-step-2" role="tabpanel">
                      <h5 style="color: #6777ef">Selanjutnya isi data Ketua &amp; Anggota</h5><br/>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ketua</label>
                        <div class="col-sm-4">
                          <input type="text" id="ketua_nim" name="ketua[nim]" placeholder="NIM" class="form-control @error('ketua.nim') is-invalid @enderror" value="{{ old('ketua.nim') }}" required minlength="3" maxlength="30">
                          <div class="invalid-feedback">
                            {{ $errors->first('ketua.nim') }}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" id="ketua_nama" name="ketua[nama]" placeholder="Nama Lengkap" class="form-control @error('ketua.nama') is-invalid @enderror" value="{{ old('ketua.nama') }}" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            {{ $errors->first('ketua.nama') }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">WhatsApp Ketua</label>
                        <div class="col-sm-10">
                          <input type="number" id="ketua_wa" name="ketua[whatsapp]" placeholder="Nomor WhatsApp Ketua" class="form-control @error('ketua.whatsapp') is-invalid @enderror" value="{{ old('ketua.whatsapp') }}" required minlength="9" maxlength="14">
                          <div class="invalid-feedback">
                            {{ $errors->first('ketua.whatsapp') }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Anggota</label>
                        <div class="col-sm-10">
                          <select id="jumlah_anggota" class="form-control @error('member') is-invalid @enderror">
                            <option hidden>&mdash; Pilih Jumlah Anggota &mdash;</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                          <div class="invalid-feedback">
                            {{ $errors->first('member') }}
                          </div>
                        </div>
                      </div>

                      <div id="anggota"></div>

                      <hr>
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="#team-step-1" class="btn btn-default btn-icon icon-left" data-toggle="tab" role="tab"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="col-sm-6 text-right">
                          <a href="#team-step-3" id="to-step-3" class="btn btn-primary btn-icon icon-right disabled" data-toggle="tab" role="tab">Buat Akun <i class="fas fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div> <!-- End Second Step -->

                    <!-- Third Step -->
                    <div class="tab-pane fade" id="team-step-3" role="tabpanel">
                      <h5 style="color: #6777ef">Terakhir siapkan akun untuk tim kamu</h5><br/>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email Ketua</label>
                        <div class="col-sm-10">
                          <input type="email" id="third_email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" id="third_password" name="password" class="form-control @if($errors->has('password') || $errors->has('password_confirmation')) is-invalid @endif" value="{{ old('password') }}" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                          <input type="password" id="third_confirm" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="#team-step-2" class="btn btn-default btn-icon icon-left" data-toggle="tab" role="tab"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="col-sm-6 text-right">
                          <button type="submit" id="submit" class="btn btn-primary btn-icon icon-right disabled">Selesaikan Registrasi <i class="fas fa-arrow-right"></i></button>
                        </div>
                      </div>
                    </div> <!-- End Third Step -->

                  </div>
                </div>
              </form>
            </div>

            <div class="simple-footer">
              Copyright &copy; {{ config('app.name') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/register.js') }}"></script>
</body>
</html>
