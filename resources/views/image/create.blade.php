@extends('layout.admin')
@section('title', 'Tambah Gambar')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-8 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Gambar</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="warna">Warna</label>
                                    <input type="text" name="warna" class="form-control" value="{{ old('warna') }}" >
                                    @if ($errors->has('warna'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Warna wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                             
                                <div class="form-group">
                                    <label for="product_id">Produk</label>
                                    <select name="product_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('product_id'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Produk wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                              
                               
                                <div class="form-group">
                                    <label for="file">Foto Produk</label>
                                    <input type="file" name="uploadedFileUrl" class="form-control" value="{{ old('uploadedFileUrl') }}">
                                    @if ($errors->has('uploadedFileUrl'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Foto produk wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

