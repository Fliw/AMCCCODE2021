<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Akses Event &mdash; {{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-xl-6 offset-xl-3">
            <div class="login-brand">
              <img src="{{ asset('code2020/img/logo-384.png') }}" alt="logo" width="192">
            </div>
            <h4 style="text-align: center;">Akses Event</h4>

            @if(session()->has('error'))
              <div class="alert alert-warning">
                  <b>Perhatian! </b> {{ session()->get('error') }}
              </div>
            @endif

            <div class="card card-primary">
              <form action="{{ route('team.auth') }}" method="POST">
                @csrf
                <div class="card-body">
                    Hai, <strong>{{ ucwords($data['attendee']->name) }}</strong><br>
                    Ini adalah halaman untuk mengakses link acara yang ingin kamu ikuti. 
                    Link dapat diakses (diklik) ketika telah dibuka sesuai jadwalnya. 
                    Dengan mengakses acara melalui halaman ini, kamu akan ditandai mengikuti 
                    acara dan akan diarahkan menuju link acara tersebut.
                    <br/><br/>

                    @if ($data['entries']->count() === 0)
                        <div class="alert alert-danger">
                            <b>Oops!</b> Kamu perlu melunasi tiket sebelum bisa mengakses acaranya ;)
                        </div>
                    @else
                    @foreach ($data['entries'] as $entry)
                        <div>
                            <p style="font-weight: 600"><i class="fas fa-ticket-alt"></i> {{ $entry->name }}</p>
                            @foreach ($entry->events as $event)
                                <div class="list-group">
                                    @foreach ($event->schedules as $schedule)
                                        <a @if($schedule->is_accessible) href="{{ route('entrances.redirect', ['token' => $data['token'], 'schedule' => $schedule]) }}" @endif @if(! $schedule->is_accessible) style="color: #bbb" @endif class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <p style="font-weight: bold" class="mb-1">{{ $event->name }}</p>
                                                <small><span class="badge badge-{{ $schedule['status']['element'] }}">{{ $schedule['status']['message'] }}</span></small>
                                            </div>
                                            <span>
                                                {{ $schedule['venue'] }}<br>
                                                {{ $schedule['from_short'] }} - {{ $schedule['to_short'] }} (WIB)
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    @endif
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
</body>
</html>
