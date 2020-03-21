@extends('app.frontend.layouts.content')

@section('title', 'Schedules')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Schedules</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Schedules</h2>
      <p class="section-lead">
        Keseluruhan rundown berbagai kegiatan acara dapat dengan lengkap kamu lihat disini
      </p>

      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Rundown</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>#</th>
                    <th>Nama Kegiatan</th>
                    <th>Tempat</th>
                    <th>Dari</th>
                    <th>Sampai</th>
                    <th>Status</th>
                  </tr>
                  @foreach ($data['schedules'] as $schedule)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $schedule['name'] }}</td>
                      <td>{{ $schedule['venue'] }}</td>
                      <td>{{ $schedule['from'] }}</td>
                      <td>{{ $schedule['to'] }}</td>
                      <td>
                        <div class="badge badge-{{ $schedule['status']['element'] }}">
                          {{ $schedule['status']['message'] }}
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      
    </div>
  </section>
@endsection
