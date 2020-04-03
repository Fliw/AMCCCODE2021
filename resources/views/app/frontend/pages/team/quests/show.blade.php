@extends('app.frontend.layouts.dashboard.app')

@section('title', 'Quest Detail')

@section('content')
  <section class="section">
    <div class="section-header">
    <h1>Quest: {{ $data['quest']['title'] }}</h1>
    </div>

    <div class="section-body">
      @if(session()->has('status'))
        <div class="alert alert-{{ session()->get('status.element') }}">
            {{ session()->get('status.message') }}
        </div>
      @endif
      
      <div class="row">
        <div class="col-sm-12 col-md-8">
          <div class="card">
            <div class="card-body">
                <p>
                  <strong>Deskripsi</strong><br/>
                  {{ $data['quest']['description'] }}
                </p>
            </div>
          </div>

          @if (! empty($data['quest']['reviewer_note']))
            <div class="card">
              <div class="card-body">
                  <p>
                    <strong>Reviewer Note</strong><br/>
                    {{ $data['quest']['reviewer_note'] }}
                  </p>
              </div>
            </div>
          @endif

          <div class="card">
            <form action="{{ route('team.quests.update', ['quest' => $data['quest']['id']]) }}" method="POST">
              @csrf
              @method('patch')
              <div class="card-body">
                  <p>
                    <strong>Form Respon</strong>
                  </p>

                  <textarea class="form-control" name="response" placeholder="{{ $data['quest']['response'] ?? 'Kirim respon kamu disini' }}" @if(!$data['quest']['is_open']) readonly @endif value="{{ $data['quest']['response'] ?? '' }}" style="min-height: 75px;"></textarea>
                  
                  @if($data['quest']['is_open'])
                  <br/>
                  <div class="text-right">
                    <input type="hidden" name="status" value="submitted">
                    <button type="submit" class="btn btn-primary">Kirim Respon</button>
                  </div>
                  @endif
              </div>
            </form>
          </div>
        </div> <!-- End left column -->
        <div class="col-sm-12 col-md-4">
          <div class="card">
            <div class="card-body">
                <p>
                  <strong>Diajukan</strong><br/>
                  {{ $data['quest']['date_diff'] }}

                  <br/>
                  <strong>Terakhir diperbarui</strong><br/>
                  {{ $data['quest']['updated_at'] }}

                  <br/>
                  <strong>Status</strong><br/>
                  <span class="badge badge-{{ $data['quest']['state']['element'] }}">
                    {{ $data['quest']['state']['message'] }}
                  </span>
                </p>
            </div>
          </div>
        </div> <!-- End right column -->
      </div> <!-- End row -->
    </div>
  </section>
@endsection
