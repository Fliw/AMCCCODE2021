@extends('app.admin.layouts.app')

@section('title', 'Events')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Events</h1>
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
          <h4>Events</h4>
          <div class="card-header-action">
            <a data-collapse="#event" class="btn btn-icon btn-warning" href="#"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="event">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Event</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['events'] as $event)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $event['name'] }}</td>
                    <td>{{ $event['description'] }}</td>
                    <td>
                      <span class="badge badge-{{ $event['published_info']['element'] }}">
                        {{ $event['published_info']['message'] }}
                      </span>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.events.edit', ['event' => $event['id']]) }}" class="btn btn-sm btn-warning btn-icon">
                          <i class="fas fa-check"></i> Edit
                        </a>
                        <form action="{{ route('admin.events.destroy', ['event' => $event['id']]) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-outline-danger btn-icon">
                            <i class="fas fa-trash"></i>
                          </button>
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

  <div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('admin.events.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Event</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Nama Event</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required />
              <div class="invalid-feedback">
                {{ $errors->first('name') }}
              </div>
            </div>

            <div class="form-group">
              <label for="description">Deskripsi</label>
              <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required />
              <div class="invalid-feedback">
                {{ $errors->first('description') }}
              </div>
            </div>

            <div class="form-group">
              <label for="published">Publish?</label>
              <select id="published" class="form-control @error('published') is-invalid @enderror" name="published">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
              <div class="invalid-feedback">
                {{ $errors->first('published') }}
              </div>
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