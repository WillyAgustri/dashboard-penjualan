@extends('layout.main')

<link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/user.css">

@section('content')
    <div class="text-center mt-5 d-flex justify-content-center">
        <h2><strong>WELCOME</strong></h2>
    </div>
    <div class="container mt-5">
        <div class="shadow-lg p-5 mb-5 bg-white rounded shape d-flex mx-auto justify-content-center p-4" style="width: 700px">
            <div class="shadow-sm side-left d-flex flex-column justify-content-center me-4 align-items-center">
                <img src="{{ Storage::url('public/logo/') }}logo.png " alt="" style="height: 160px; width:300px">
            </div>

            <div class="side-right-login actives">
                <form action="{{ route('proses-user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center">LOGIN</div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-center">Email</label>
                        <input type="text"
                            class="form-control col-lg-6
                        @error('email')
                         is-invalid
                        @enderror
                        "style="width: 320px"
                            name="email" id="email" aria-describedby="helpId" placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <ul>
                                    <li> {{ $message }}</li>
                                </ul>

                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                            class="@error('password')
                            is-invalid
                        @enderror form-control"
                            name="password" id="password" aria-describedby="helpId" placeholder="Password"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                <ul>
                                    <li> {{ $message }}</li>
                                </ul>

                            </div>
                        @enderror

                        <button type="submit" name="submit" class="btn btn-sm btn-primary mt-4">Login</button>
                        <a class="btn-register btn btn-sm btn-warning mt-4" href="{{ route('register-user') }}">Daftar</a>
                </form>
                <div class="text-center text-secondary mb-1">ATAU</div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-sm me-2"><i class="fa-brands fa-google"></i>Google</a>
                    <div class="btn btn-sm ms-2"><i class="fa-brands fa-facebook-f"></i>Facebook</div>
                </div>
            </div>
            {{--
                /
                END Form Login
                /
                --}}

        </div>
    </div>
@endsection
