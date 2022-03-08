@extends('layout.admin')
@section('title', 'Edit Ongkos Kirim')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Ongkos Kirim</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('ongkos.update', $district->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                 
                                <div class="form-group">
                                    <label for="name">Kecamatan</label>
                                    <input type="text" name="name" class="form-control" value="{{ $district->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="price">Ongkos Kirim</label>
                                    <input type="text" name="price" class="form-control" value="{{ $district->price }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                               
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection