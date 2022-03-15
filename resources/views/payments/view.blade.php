@extends('layout.admin')
@section('title', 'Detail Pesanan')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail pesanan
                            </h4>
                            
                            <div class="float-right">
                                   
                                </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detail Pelanggan</h4>
                                    <table class="table table-bordered">
                                    <tr>
                                            <th>Nama</th>
                                            <td>{{ $payment->user->username}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telp</th>
                                            <td>{{ $payment->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $payment->address }} {{ $payment->district->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status Pesanan</th>
                                            <td>{{ $payment->status->status}}</td>
                                        </tr>
                                        @if ($payment->status_id == 1)
                                        <tr>
                                            
                                            <td>
                                               
                                                <form action="{{ route('payments.done') }}" method="post">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                                       
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" type="submit">Lakukan Pengiriman</button>
                                                        </div>
                                                    </div>
                                                </form>
                                               
                                             
                                            </td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                              
                                <div class="col-md-12">
                                    <h4>Detail Produk</h4>
                                    <table class="table table-bpaymentd table-hover">
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Warna</th>
                                            <th>Jumlah</th>
                                       
                                        </tr>
                                        @foreach ($line_item_clone as $row)
                                        <tr>
                                        <td>{{ $row->Image->product->name }}</td>
                                        <td>{{ $row->Image->warna }}</td>
                                            <td>{{ $row->quantity }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
