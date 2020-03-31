@extends('app.admin.layouts.app')

@section('title', 'Payments')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Payments</h1>
    </div>
    <div class="section-body">
      @include('app.admin.partials.flash')

      <div class="card">
        <div class="card-header">
          <h4>Status Pembayaran</h4>
          <div class="card-header-action">
            <a data-collapse="#payment-method" class="btn btn-icon btn-warning" href="#"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="payment-method">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Tenggat</th>
                  <th scope="col">Dikonfirmasi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['payments'] as $payment)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $payment['attendee']['name'] }}</td>
                    <td>{{ $payment['ticket']['name'] }}</td>
                    <td>{{ $payment['amount'] }}</td>
                    <td>{{ $payment['due_short'] }}</td>
                    <td>{{ $payment['paid'] ? $payment['updated_short'] : '-' }}</td>
                    <td>
                      <span class="badge badge-{{ $payment['status']['element'] }}">
                        {{ $payment['status']['message'] }}
                      </span>
                    </td>
                    <td>
                      <form action="{{ route('admin.payments.update', ['payment' => $payment['id']]) }}" method="POST">
                        @csrf
                        @method('patch')
                        @if ($payment['paid'])
                          <input type="hidden" name="paid" value="0" />
                          <button type="submit" class="btn btn-sm btn-outline-danger btn-icon">
                            <i class="fas fa-times-circle"></i> Batalkan 
                          </button>
                        @else
                          <input type="hidden" name="paid" value="1" />
                          <button type="submit" class="btn btn-sm btn-success btn-icon">
                            <i class="fas fa-check"></i> Tandai Lunas
                          </button>
                        @endif
                      </form>
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
