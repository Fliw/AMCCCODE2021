@extends('app.admin.layouts.app')

@section('title', 'Configurations')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Configurations Table</h1>
      <div class="section-header-button">
        <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modal-add">
          <i class="fas fa-plus"></i> Baru
        </button>
      </div>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash')

      <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Key</th>
                <th scope="col">Type</th>
                <th scope="col">Value</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data['configs'] as $config)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $config['category'] }}</td>
                  <td>{{ $config['key'] }}</td>
                  <td>{{ $config['type'] }}</td>
                  <td>{{ $config['value_short'] }}</td>
                  <td>
                    <div class="badge badge-{{ $config['state']['element'] }}">
                      {{ $config['state']['message'] }}
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                    <a href="{{ route('admin.configs.edit', ['config' => $config['id']]) }}" class="btn btn-sm btn-warning btn-icon">
                        <i class="fas fa-check"></i> Edit
                      </a>
                      <form action="{{ route('admin.configs.destroy', ['config' => $config['id']]) }}" method="POST">
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
  </section>

  <!-- Add config Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('admin.configs.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="key">Key</label>
              <input type="text" class="form-control @error('key') is-invalid @enderror" id="key" name="key" placeholder="Config Unique Key..." value="{{ old('key') }}" required />
            </div>
            <div class="form-group">
              <label for="type">Data Type</label>
              <select class="form-control" name="type" id="type">
                @foreach ($data['types'] as $type)
                  <option @if(old('type') == $type['key']) selected @endif value="{{ $type['key'] }}">
                    {{ $type['text'] }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="value">Value</label>
              <input type="text" class="form-control" id="value" name="value" placeholder="Config Value..." required />
            </div>
            <div class="form-group">
              <label class="mt-2">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" class="custom-switch-input" value="1">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Enable config</span>
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
