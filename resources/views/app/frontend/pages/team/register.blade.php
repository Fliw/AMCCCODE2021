<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registrasi Tim &mdash; {{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
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

            <div class="card card-primary">
              <form id="register" class="needs-validation" action="{{ route('team.register.store') }}" method="POST">
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
                          <input type="text" name="tim[nama]" class="form-control" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            Masukkan nama tim kamu
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Asal Institusi</label>
                        <div class="col-sm-10">
                          <input type="text" name="tim[institusi]" class="form-control" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            Masukkan nama institusi asal kamu
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kategori Lomba</label>
                        <div class="col-sm-10">
                          <select name="tim[kategori]" id="kategori" class="form-control">
                            <option hidden>&mdash; Pilih Kategori Lomba &mdash;</option>
                            @foreach ($data['categories'] as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <hr>
                      <div class="text-right">
                        <a href="#team-step-2" class="btn btn-primary btn-icon icon-right" data-toggle="tab" role="tab">Ketua & Anggota <i class="fas fa-arrow-right"></i></a>
                      </div>
                    </div> <!-- End First Step -->

                    <!-- Second Step -->
                    <div class="tab-pane fade" id="team-step-2" role="tabpanel">
                      <h5 style="color: #6777ef">Selanjutnya isi data Ketua &amp; Anggota</h5><br/>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ketua</label>
                        <div class="col-sm-4">
                          <input type="text" name="ketua[nim]" placeholder="NIM" class="form-control" required minlength="3" maxlength="30">
                          <div class="invalid-feedback">
                            Masukkan nim ketua tim
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="ketua[nama]" placeholder="Nama Lengkap" class="form-control" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            Masukkan nama ketua tim
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">WhatsApp Ketua</label>
                        <div class="col-sm-10">
                          <input type="number" name="ketua[whatsapp]" placeholder="Nomor WhatsApp Ketua" class="form-control" required minlength="9" maxlength="14">
                          <div class="invalid-feedback">
                            Masukkan nomor WhatsApp ketua tim
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Anggota</label>
                        <div class="col-sm-10">
                          <select id="jumlah_anggota" class="form-control">
                            <option hidden>&mdash; Pilih Jumlah Anggota &mdash;</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                        </div>
                      </div>

                      <div id="anggota"></div>

                      <hr>
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="#team-step-1" class="btn btn-default btn-icon icon-left" data-toggle="tab" role="tab"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="col-sm-6 text-right">
                          <a href="#team-step-3" class="btn btn-primary btn-icon icon-right" data-toggle="tab" role="tab">Buat Akun <i class="fas fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div> <!-- End Second Step -->

                    <!-- Third Step -->
                    <div class="tab-pane fade" id="team-step-3" role="tabpanel">
                      <h5 style="color: #6777ef">Siapkan akun untuk tim kamu</h5><br/>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email Ketua</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            Masukkan email ketua untuk registrasi akun
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            Masukkan password
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password_confirmation" class="form-control" required minlength="3" maxlength="100">
                          <div class="invalid-feedback">
                            Masukkan password yang sama
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="#team-step-2" class="btn btn-default btn-icon icon-left" data-toggle="tab" role="tab"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="col-sm-6 text-right">
                          <button type="submit" class="btn btn-primary btn-icon icon-right">Selesaikan Registrasi <i class="fas fa-arrow-right"></i></button>
                        </div>
                      </div>
                    </div> <!-- End Third Step -->

                  </div>
                </div>
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
  <script>
    $('#jumlah_anggota').on('change', function (e) {
      // Jumlah inputan anggota saat ini
      let domCount = $("div[id^='anggota-wrap-'").length

      // Kalau pilihan 0, hapus semuanya
      if (this.value == 0) {
        $('[id^=anggota-wrap-]').remove()
      }

      // Kalau input yang ditampilan < yang dipilih
      if (domCount < this.value) {
        for (i = domCount; i < this.value; ++i) {
          // Increment jumlah inputan anggota
          ++domCount

          // Tambahkan set element berikut kedalam div 'anggota'
          $('#anggota').append(`
          <div id="anggota-wrap-${domCount}" class="form-group row">
            <label class="col-sm-2 col-form-label">Anggota ${domCount}</label>
            <div class="col-sm-4">
              <input type="text" placeholder="NIM Anggota ${domCount}" name='member[${domCount}][nim]' class="form-control" required minlength="3" maxlength="100">
              <div class="invalid-feedback">
                Masukkan nim anggota ke-${domCount}
              </div>
            </div>
            <div class="col-sm-6">
              <input type="text" placeholder="Nama Anggota ${domCount}" name='member[${domCount}][name]' class="form-control" required minlength="3" maxlength="100">
              <div class="invalid-feedback">
                Masukkan nama anggota ke-${domCount}
              </div>
            </div>
          </div>
        `)
        }
      }
      // Kalau input yang ditampilan > yang dipilih
      else if (domCount > this.value) {
        for (i = domCount; i > this.value; --i) {
          $('#anggota-wrap-' + domCount).remove()
        }
      }    
    })

    // Reset status "active" button setelah berpindah tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      $(this).removeClass('active')
    })
  </script>
</body>
</html>