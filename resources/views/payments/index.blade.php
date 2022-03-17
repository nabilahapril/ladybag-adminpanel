@extends('layout.admin')
@section('title', 'Daftar Pesanan')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Pesanan
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form action="{{ route('payments.index') }}" method="get">
                                <div class="input-group mb-3 col-md-6 float-right">
                                    <select name="status_id" class="form-control mr-3">
                                        <option value="">Pilih Status</option>
                                        <option value="1">Process</option>
                                        <option value="2">Shipping</option>
                                        <option value="3">Success</option>
                                    </select>
                                  
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php $no = 0;?>
                                        @forelse ($payments as $row)
                                        <?php $no++ ;?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                            <td>
                                            <label><strong>Nama:</strong> {{ $row->fullname }}</label><br>
                                                <label><strong>Telp:</strong> {{ $row->phone }}</label><br>
                                                <label><strong>Alamat:</strong> {{ $row->address }} {{ $row->district->name }} </label>
                                            </td>
                                            <td>Rp {{ number_format($row->total) }}</td>
                                            
                                            <td>
                                            {{ $row->status->status }} <br>
                                               
                                            </td>
                                            <td>
                                            @if ($row->status_id == 1)
                                            <a href="{{ route('payments.done', $row->id) }}" class="btn btn-primary btn-sm">Lakukan Pengiriman</a>
                                            @elseif ($row->status_id == 2)
                                            <a href="{{ route('payments.approve_payment', $row->id) }}" class="btn btn-success btn-sm">Terima Pembayaran</a>
                                            @endif 
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdrop"  data-id="{{ $row->cart_id }}" id="detail">Lihat</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Detail Pesanan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="description">
                                        <div class="row my-3">
                                            <div class="col-5">
                                            Nama
                                            </div>
                                            <div class="col-7" id="nama">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-5">
                                            Telepon
                                            </div>
                                            <div class="col-7" id="telp">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-5">
                                            Alamat
                                            </div>
                                            <div class="col-7" id="alamat">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-5">
                                            Status Pesanan
                                            </div>
                                            <div class="col-7" id="status">
                                            
                                            </div>
                                        </div>
                                        <div id="desc">
                                        </div>
                                        <table class="table">
                                            <tr>
                                            <th>Nama Produk</th>
                                            <th>Warna</th>
                                            <th>Jumlah</th>
                                            </tr>
                                            <tbody id=descc>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer" id="modal-daftar">
                                    </div>
                                    </div>
                                </div>
                                </div>
                            {!! $payments->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
    <script type="text/javascript">
        $('body').on('click', '#detail', function (event) {

        event.preventDefault();
        var id = $(this).data('id');
        $.get('/payments/view/' + id , function (data) {
            $('#nama').text(data.payment.fullname);
            $('#telp').text(data.payment.phone);
            $('#alamat').text(data.payment.address);
            $('#status').text(data.payment.status);
            var array_desc=[];
            for (let index = 0; index < data.line_item_clone.length; index++){
             {
                array_desc.push({
                  nama:data.line_item_clone[index].product_name,
                  warna:data.line_item_clone[index].warna,
                  jumlah:data.line_item_clone[index].quantity
                })
          }
        }
          var descc;
          $.each(array_desc, function(key, value){
            descc = descc + '<tr><td>'+ value.nama +'</td><td>'+ value.warna +'</td><td>'+ value.jumlah +'</td></tr>'
          })
          $('#descc').html(descc);
        
        })
        });
</script>
@endsection
