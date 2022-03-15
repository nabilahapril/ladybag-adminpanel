@extends('layout.admin')
@section('title', 'Ongkos Kirim')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 mt-5">
                   
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ongkos Kirim</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <th>Ongkos Kirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($district as $val)
                                        <tr>
                                         
                                            <td>{{$val->name}}</td>
                                            <td>Rp {{ number_format($val->price)}}</td>
                                            <td>
                                               
                                                    <a href="{{ route('ongkos.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                  
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
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
</main>
@endsection
