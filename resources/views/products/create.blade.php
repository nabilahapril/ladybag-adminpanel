@extends('layout.admin')
@section('title', 'Tambah Produk')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-8 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                                    @if ($errors->has('name'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Nama produk wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" rows="5" >{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Deskripsi wajib diisi</label>
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
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Kategori wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="price_cents">Harga</label>
                                    <input type="number" name="price_cents" class="form-control" value="{{ old('price_cents') }}" >
                                    @if ($errors->has('price_cents'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Harga wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                               
                                <div class="form-group">
                                    <label for="file">Foto Model</label>
                                    <input type="file" name="model" class="form-control" value="{{ old('model') }}">
                                    @if ($errors->has('model'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Foto model wajib diisi</label>
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


