@extends('app.admin.layouts.app')

@section('title', 'Schedules')

@push('stylesheet')
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css" />
@endpush

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Schedules</h1>
      <div class="section-header-button">
        <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modal-add">
          <i class="fas fa-plus"></i> Tambah Baru
        </button>
        <a href="schedules/export" class="btn btn-success btn-icon icon-left" target="_blank">EXPORT EXCEL</a>
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
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Tempat</th>
                <th scope="col">Dari</th>
                <th scope="col">Sampai</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data['schedules'] as $schedule)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $schedule['event']['name'] }}</td>
                  <td>{{ $schedule['venue'] }}</td>
                  <td>{{ $schedule['from_short'] }}</td>
                  <td>{{ $schedule['to_short'] }}</td>
                  <td>
                    <div class="badge badge-{{ $schedule['status']['element'] }}">
                      {{ $schedule['status']['message'] }}
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                    <a href="{{ route('admin.schedules.edit', ['schedule' => $schedule['id']]) }}" class="btn btn-sm btn-warning btn-icon">
                        <i class="fas fa-check"></i> Edit
                      </a>
                      <form action="{{ route('admin.schedules.destroy', ['schedule' => $schedule['id']]) }}" method="POST">
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

  <!-- Add Schedule Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('admin.schedules.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="event_id">Kegiatan</label>
              <select id="event_id" class="form-control" name="event_id" required>
                <option hidden selected>&mdash; Pilih Kegiatan &mdash;</option>
                @foreach ($data['events'] as $event)
                  <option value="{{ $event['id'] }}">{{ $event['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="venue">Tempat</label>
              <input type="text" class="form-control" id="venue" name="venue" placeholder="Ketik nama tempat..." required />
            </div>
            <div class="form-group">
              <label for="capacity">Kapasitas</label>
              <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Jumlah kapasitas peserta..." min="0" required />
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Dari</label>
                  <input type="text" name="from" class="form-control datetimepicker" id="timepick-from" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Sampai</label>
                  <input type="text" name="to" class="form-control datetimepicker" id="timepick-to" required>
                </div>
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

@push('javascript')
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.5/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $('input[id^="timepick"]').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        singleDatePicker: true,
        startDate: moment().startOf('hour'),
        locale: {
          format: 'YYYY-MM-DD HH:mm'
        }
      });
    });
  </script>
@endpush