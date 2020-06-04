@extends('app.admin.layouts.app')

@section('title', 'Teams')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Teams</h1>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash')

      <div class="card">
        <div class="card-header">
          <h4>Tim</h4>
          <div class="card-header-action">
            <a data-collapse="#teams" class="btn btn-icon btn-warning" href="#"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="teams">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Tim</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Institusi</th>
                  <th scope="col">Ketua</th>
                  <th scope="col">Anggota</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['teams'] as $team)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $team['name'] }}</td>
                    <td>{{ $team['category']['name'] }}</td>
                    <td>{{ $team['institution'] }}</td>
                    <td>{{ $team['leader']['name'] }}</td>
                    <td>{{ count($team['members']) }}</td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.teams.edit', ['team' => $team['id']]) }}" class="btn btn-sm btn-warning btn-icon">
                          <i class="fas fa-check"></i> Edit
                        </a>
                        <a href="{{ chatWa($team['leader']['whatsapp']) }}" target="_blank" class="btn btn-sm btn-success btn-icon">
                          <i class="fab fa-whatsapp"></i> Chat WA
                        </a>
                        <form action="{{ route('admin.teams.destroy', ['team' => $team['id']]) }}" method="POST">
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
