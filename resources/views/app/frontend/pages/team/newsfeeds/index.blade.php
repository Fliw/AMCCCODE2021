@extends('app.frontend.layouts.dashboard.app')

@section('title', 'Berita')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Berita</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Berita</h2>
      <p class="section-lead">
        Halaman ini berisi pembaruan berita dan informasi terbaru seputar kompetisi
        yang dikhususkan untuk semua tim
      </p>

      <div class="row">
        @foreach ($data['newsfeeds'] as $newsfeed)
        <div class="col-sm-12 col-md-8">
          <div class="activities">
            <div class="activity">
              <div class="activity-icon bg-primary text-white shadow-primary">
                <i class="fas fa-bullhorn"></i>
              </div>
              <div class="activity-detail">
                <div class="mb-2">
                  <span class="text-job text-primary">{{ $newsfeed['date_diff'] }}</span>
                  <span class="bullet"></span>
                  <a class="text-job" href="#">{{ $newsfeed['title'] }}</a>
                </div>
                <p>{{ $newsfeed['content'] }}</p>
              </div>
            </div>
          </div>
        </div> <!-- End left column -->
        @endforeach
      </div>
    </div>
  </section>
@endsection
