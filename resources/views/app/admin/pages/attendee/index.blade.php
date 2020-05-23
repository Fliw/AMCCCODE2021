@extends('app.admin.layouts.app')

@section('title', 'Peserta')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Peserta</h1>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash')

      <div class="card">
        <div class="card-header">
          <h4>Semua Peserta Seminar</h4>
          <div class="card-header-action">
            <a data-collapse="#peserta-seminar" class="btn btn-icon btn-warning" href="#"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="peserta-seminar">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Identity</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Email</th>
                  <th scope="col">WhatsApp</th>
                  <th scope="col">Mendaftar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['attendees'] as $attendee)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $attendee['identity'] }}</td>
                    <td>{{ $attendee['name'] }}</td>
                    <td>{{ $attendee['email'] }}</td>
                    <td>{{ $attendee['whatsapp'] }}</td>
                    <td>{{ $attendee['created_at'] }}</td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.attendees.edit', ['attendee' => $attendee['id']]) }}" class="btn btn-sm btn-warning btn-icon">
                          <i class="fas fa-check"></i> Edit
                        </a>
                        <form action="{{ route('admin.attendees.destroy', ['attendee' => $attendee['id']]) }}" method="POST">
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
@endsection