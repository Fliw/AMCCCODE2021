@extends('app.admin.layouts.app')

@section('title', 'Edit Schedule')

@push('stylesheet')
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css" />
@endpush

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Edit Schedule: {{ $data['schedule']['event']['name'] }}</h1>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash')

      <div class="card">
        <form action="{{ route('admin.schedules.update', ['schedule' => $data['schedule']['id']]) }}" method="post">
          @csrf
          @method('patch')
          <div class="card-body"> 
            <div class="form-group">
              <label for="event_id">Kegiatan</label>
              <select id="event_id" class="form-control" name="event_id" required>
                <option hidden selected>&mdash; Pilih Kegiatan &mdash;</option>
                @foreach ($data['events'] as $event)
                  <option @if($data['schedule']['event_id'] == $event['id']) selected @endif value="{{ $event['id'] }}">{{ $event['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="venue">Tempat</label>
              <input type="text" class="form-control" id="venue" name="venue" placeholder="Ketik nama tempat..." value="{{ $data['schedule']['venue'] }}" required />
            </div>
            <div class="form-group">
              <label for="capacity">Kapasitas</label>
              <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Jumlah kapasitas peserta..." value="{{ $data['schedule']['capacity'] }}" min="0" required />
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Dari</label>
                  <input type="text" name="from" class="form-control datetimepicker" id="timepick-from" value="{{ $data['schedule']['from'] }}" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Sampai</label>
                  <input type="text" name="to" class="form-control datetimepicker" id="timepick-to" value="{{ $data['schedule']['to'] }}" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-default">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@push('javascript')
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.5/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $('input[id^="timepick"]').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        singleDatePicker: true,
        locale: {
          format: 'YYYY-MM-DD HH:mm:ss'
        }
      });
    });
  </script>
@endpush