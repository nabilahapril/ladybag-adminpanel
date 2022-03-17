@extends('layout.admin')
@section('title', 'Edit Produk')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Nama produk wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" rows="5">{{ $product->description }}</textarea>
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
                                        <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
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
                                    <input type="number" name="price_cents" class="form-control" value="{{ $product->price_cents }}" required>
                                    @if ($errors->has('price_cents'))
                                    <span class="text-danger">
                                            <label id="basic-error" class="validation-error-label" for="basic">Harga wajib diisi</label>
                                        </span>
                                        @endif
                                </div>
                               
                                <div class="form-group">
                                    <label for="file">Foto Produk</label>
                                    <br>
                                    <img src="{{$product->model}}"  width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="model" class="form-control" value="{{ old('model') }}"  >
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Update</button>
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


