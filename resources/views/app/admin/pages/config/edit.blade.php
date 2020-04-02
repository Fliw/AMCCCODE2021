@extends('app.admin.layouts.app')

@section('title', 'Edit Configuration')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Config: {{ $data['config']['key'] }}</h1>
    </div>
    <div class="section-body">
      <form action="{{ route('admin.configs.update', ['config' => $data['config']['id']]) }}" method="POST">
        @csrf
        @method('patch')
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="type">Data Type</label>
              <select class="form-control" name="type" id="type">
                @foreach ($data['types'] as $type)
                  <option @if($data['config']['key'] == $type['key']) selected @endif value="{{ $type['key'] }}">
                    {{ $type['text'] }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="value">Value</label>
              <input type="text" class="form-control" id="value" name="value" value="{{ old('value') ?? $data['config']['value'] }}" placeholder="Config Value..." required />
            </div>
            <div class="form-group">
              <label class="mt-2">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" class="custom-switch-input" value="1" @if($data['config']['active']) checked @endif>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Enable config</span>
              </label>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.configs.index') }}" class="btn btn-secondary">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
