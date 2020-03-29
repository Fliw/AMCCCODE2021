@extends('app.frontend.layouts.dashboard.app')

@section('title', 'Quests')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Quests</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Quests</h2>
      <p class="section-lead">
        Melalui halaman ini, kami sewaktu-waktu akan mengirimkan quest yang harus kamu penuhi.
        Bisa berupa pertanyaan-jawaban, pengumpulan link submisi, dan sebagainya.
      </p>

      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Quest Kamu</h4>
              <div class="card-header-action">
                <a data-collapse="#quests-issued" class="btn btn-icon btn-warning" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <div class="collapse show" id="quests-issued">
              <div class="card-body">
                <div class="list-group">
                  @foreach ($data['quests'] as $quest)
                    <a href="{{ route('quests.show', ['quest' => $quest['id'] ]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">
                          {{ $quest['title'] }}
                          <span class="badge badge-{{ $quest['state']['element'] }}">
                            {{ $quest['state']['message'] }}
                          </span>
                        </h6>
                        <small>{{ $quest['date_diff'] }}</small>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      
    </div>
  </section>
@endsection
