@extends('app.admin.layouts.app')

@section('title', 'Newsfeeds')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Newsfeed</h1>
      <div class="section-header-button">
        <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modal-add">
            <i class="fas fa-plus"></i> Baru
        </button>
      </div>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash');
    </div>
      <div class="row">
        @foreach ($data['newsfeeds'] as $newsfeed)
        <div class="col-sm-12 col-md-8"> <!-- Start left column -->
          <div class="activities">
            <div class="activity">
              <div class="activity-icon bg-primary text-white shadow-primary">
                <i class="fas fa-bullhorn"></i>
              </div>
              <div class="activity-detail">
                <div class="mb-2">
                  <a class="text-job" href="#">[{{ implode(',', $newsfeed['channel']) }}]</a>
                  <span class="bullet"></span>
                  <a class="text-job" href="#">{{ $newsfeed['title'] }}</a>
                  <span class="bullet"></span>
                  <span class="text-job text-primary">{{ $newsfeed['date_diff'] }}</span>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('admin.newsfeeds.edit', ['newsfeed' => $newsfeed['id']]) }}" class="btn btn-icon btn-sm btn-outline-warning">
                      <i class="fas fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.newsfeeds.destroy', ['newsfeed' => $newsfeed['id']]) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-icon btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </form>
                  </div>
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

  <!-- Add Newsfeed Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('admin.newsfeeds.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Newsfeed</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Judul</label>
              <input type="text" id="title" class="form-control" name="title" placeholder="Ketik judul newsfeed.." required></input>
            </div>
            <div class="form-group">
              <label for="content">Konten</label>
              <textarea id="content" class="form-control" name="content" placeholder="Ketik konten newsfeed.." style="min-height: 150px;" required></textarea>
            </div>
            <div class="form-group">
              <label for="channel">Channel</label>
              <select id="channel" class="form-control" name="channel[]">
                <option value="all">Semua</option>
                <option value="team">Hanya Tim</option>
              </select>
            </div>
            <div class="form-group">
              <div class="control-label">Opsi</div>
              <label class="custom-switch mt-2">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1" class="custom-switch-input" checked>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Publikasi</span>
              </label>
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
