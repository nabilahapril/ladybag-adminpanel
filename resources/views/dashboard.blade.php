@extends('layout.admin')
@section('title', 'Dashboard LadyBag')

@section('content')
<div class="py-3 px-5">
  <div class="row">
    <div class="col-3">
        <h5>Dashboard</h5>
        <h7 style="color:gray">Aktivitas Toko LadyBag</h7>
    </div>
    <div class="container-fluid">
        <div class="animated fadeIn">
        <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Jumlah Pendapatan</h6>
                    <h2 class="text-right"><i class="fa fa-money f-left"></i><span>Rp {{ number_format($payments)}}</span></h2>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mt-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Jumlah Produk</h6>
                    <h2 class="text-right"><i class="fa fa-shopping-bag f-left"></i><span>{{$products}}</span></h2>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mt-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Jumlah Kategori Produk</h6>
                    <h2 class="text-right"><i class="fa fa-archive f-left"></i><span>{{$categories}}</span></h2>
                    
                </div>
            </div>
        </div>
                <div class="col-md-12">
      <div class="bg-white p-3 mb-3 rounded shadow">
        <div class="text-muted btn-sm mb-3">Grafik Pendapatan {{ now()->year }}</div>
        <div>
          <canvas id="chartPendapatan"></canvas>
        </div>
      </div>
    </div>
              
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Produk Terbaru</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($product as $row)
                                        <tr>
                                            <td>
                                                <img src="{{$row->model}}"  width="100px" height="100px" alt="{{ $row->name }}">
                                            </td>
                                            <td>
                                                <strong>{{ $row->name }}</strong><br>
                                                <label>Kategori: <span class="badge badge-success">{{ $row->category->name }}</span></label><br>
                                                
                                            </td>
                                            <td>Rp {{ number_format($row->price_cents) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                     
                        </div>
                    </div>
                </div>
        
        <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Transaksi Terbaru</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php $no = 0;?>
                                        @forelse ($trans as $row)
                                        <?php $no++ ;?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                            <td>
                                            <label><strong>Nama:</strong> {{ $row->user->username }}</label><br>
                                                <label><strong>Telp:</strong> {{ $row->phone }}</label><br>
                                                <label><strong>Alamat:</strong> {{ $row->address }} {{ $row->district->name }} </label>
                                            </td>
                                            <td>Rp {{ number_format($row->total) }}</td>
                                            
                                            <td>
                                            {{ $row->status->status }} <br>
                                               
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
        </div>
</div>
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const jan = {{ $jan }};
  const feb = {{ $feb }};
  const mar = {{ $mar }};
  const apr = {{ $apr }};
  const mei = {{ $mei }};
  const jun= {{ $jun }};
  const jul = {{ $jul }};
  const ag = {{ $ag }};
  const sep = {{ $sep }};
  const okt = {{ $okt }};
  const nov = {{ $nov }};
  const des = {{ $des }};
 
  const data3 = {
  labels: [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  ],
  datasets: [{
    label: 'Grafik Pendapatan {{ now()->year }}',
    data: [ jan, feb, mar, apr, mei, jun, jul, ag, sep, okt, nov, des],
    backgroundColor: [
      '#6fa8dc',
    ],
  }]
};

  const configBarPendapatan = {
    type: 'bar',
    data: data3,
    options: {
    legend: {
        display: false
    },
    scales: {
      y: {
        beginAtZero: true
      }
    }
    },
  };


  const chartPendapatan = new Chart(
    document.getElementById('chartPendapatan'),
    configBarPendapatan
  );
</script>
@endsection
