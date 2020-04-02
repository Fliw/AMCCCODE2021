@extends('app.admin.layouts.app')

@section('title', 'Quests')

@push('base-stylesheet')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" />
  <style>
    .select2-container {
      min-width: 100%;
    }
  </style>
@endpush

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Quests</h1>
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
          <h4>Semua Quest</h4>
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
                  <th scope="col">Judul Quest</th>
                  <th scope="col">Kepada Tim</th>
                  <th scope="col">Dibuat pada</th>
                  <th scope="col">Status</th>
                  <th scope="col">Reviewer Note</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['quests'] as $quest)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $quest['title'] }}</td>
                    <td>{{ $quest['team']['name'] }}</td>
                    <td>{{ $quest['short_date'] }}</td>
                    <td>
                      <span class="badge badge-{{ $quest['state']['element'] }}">
                        {{ $quest['state']['message'] }}
                      </span>
                    </td>
                    <td>
                      {{ $quest['short_note'] }}
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.quests.edit', ['quest' => $quest['id']]) }}" class="btn btn-icon btn-sm btn-outline-warning">
                          <i class="fas fa-pen"></i>
                        </a>
                        <form action="{{ route('admin.quests.destroy', ['quest' => $quest['id']]) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-outline-danger btn-icon"><i class="fas fa-trash"></i></button>
                        </form>
                      </div>
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
        <form action="{{ route('admin.quests.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="team_id">Tim Target</label>
              <select id="team_id" class="form-control select2" name="team_id[]" multiple>
                <option hidden disabled>&mdash; Pilih Tim Tujuan &mdash;</option>
                @foreach ($data['teams'] as $team)
                  <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="title">Judul</label>
              <input type="text" id="title" class="form-control" name="title" placeholder="Ketik judul quest.." required></input>
            </div>
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea id="description" class="form-control" name="description" placeholder="Ketik deskripsi..." style="min-height: 150px;" required></textarea>
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

@push('javascript')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
@endpush