@extends('layout.auth')


@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Silahkan Login Ke Akun Anda</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="text" 
                                    name="email"
                                    placeholder="Email Address" 
                                    value="{{ old('email') }}" 
                                    autofocus 
                                    required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="password" 
                                    name="password"
                                    placeholder="Password" 
                                    required>
                            </div>
                            <div class="row">
                                @if (session('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                                @endif

                                <div class="col-6">
                                    <button class="btn btn-primary px-4">Login</button>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center" style="margin-top:60px">
                        <img src="images/Logo.png">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
