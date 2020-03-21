@extends('app.frontend.layouts.content')

@section('title', 'Dashboard')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h2 class="section-title" style="margin-top: 0">Tim Saya</h2>
          <p class="section-lead">Informasi Tim Kamu</p>
          <div class="card">
            <div class="card-body">
              <table>
                <tr>
                  <td width="100"><strong>Nama</strong></td>
                  <td>{{ $data['session']['team']['name'] }}</td>
                </tr>
                <tr>
                  <td><strong>Kategori</strong></td>
                  <td>{{ $data['session']['team']['category']['name'] }}</td>
                </tr>
                <tr>
                  <td><strong>Ketua</strong></td>
                  <td>{{ $data['session']['name'] }} ({{ $data['session']['identity'] }})</td>
                </tr>
                <tr style="vertical-align: top">
                  <td><strong>Anggota</strong></td>
                  <td>
                    @foreach ($data['session']['team']['members'] as $member)
                      {{ $member['name'] }} ({{ $member['nim'] }})<br/>
                    @endforeach
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <h2 class="section-title" style="margin-top: 0">Quest Menunggu</h2>
          <p class="section-lead">Quest berikut menunggu kamu untuk meresponnya</p>
          <div class="card">
            <div class="card-body">
              <ul class="list-group">
                @foreach ($data['quests'] as $quest)
                  <a href="{{ route('quests.show', ['quest' => $quest['id'] ]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span>{{ $quest['title'] }} &mdash; <small>{{ $quest['date_diff'] }}</small></span> 
                    <span class="badge badge-{{ $quest['state']['element'] }} badge-pill">
                      {{ $quest['state']['message'] }}
                    </span>
                  </a>
                @endforeach
              </ul>
            </div>
          </div>

        </div>
        <div class="col-sm-12 col-md-6">
          <h2 class="section-title" style="margin-top: 0">Pusat Bantuan</h2>
          <p class="section-lead">Perlu bantuan? kami akan membantumu melalui tautan berikut</p>
          <div class="card">
            <div class="card-body">
              <ul class="list-group">
                @foreach ($data['helpdesks'] as $helpdesk)
                  <a @if($helpdesk['is_available']) href="{{ $helpdesk['target'] }}" @endif
                    class="list-group-item d-flex justify-content-between align-items-center list-group-item-action"
                    target="_blank"
                    data-toggle="tooltip" data-placement="left" title="{{ $helpdesk['help_pretty'] }}">
                    {{ $helpdesk['name'] }}
                    
                    <span class="badge badge-{{ $helpdesk['status']['element'] }}">
                      {{ $helpdesk['status']['message'] }}
                    </span>
                  </a>
                @endforeach
              </ul>
              
              {{-- <ul>
              @foreach ($data['helpdesks'] as $helpdesk)
              
                <li>
                  {{ $helpdesk['name'] }} - 

                  <a @if($helpdesk['is_available']) href="{{ $helpdesk['target'] }}" @endif
                    type="button"
                    class="btn btn-sm btn-{{ $helpdesk['status']['element'] }}"
                    data-toggle="tooltip" data-placement="top" title="{{ $helpdesk['help_pretty'] }}">
                    {{ $helpdesk['status']['message'] }}
                  </a>
                </li>
              @endforeach
              </ul> --}}
            </div>
          </div>


          <h2 class="section-title" style="margin-top: 0">Berita Terbaru</h2>
          <p class="section-lead">Informasi terbaru akan dimunculkan disini</p>
          <div class="card">
            <div class="card-body">
              <div class="mb-2">
                <span class="text-job text-primary">{{ $data['newsfeed']['date_diff'] }}</span>
                <span class="bullet"></span>
                <a class="text-job" href="#">{{ $data['newsfeed']['title'] }}</a>
              </div>
              <p>{{ $data['newsfeed']['content'] }}</p>

            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
@endsection