@extends('layout.main')

@section('content')
    <div class="text-center mt-5 d-flex justify-content-center">
        <h2><strong>WELCOME</strong></h2>
    </div>
    <div class="container mt-5">
        <div class="shadow-lg p-5 mb-5 bg-white rounded shape d-flex mx-auto justify-content-center p-4" style="width: 700px">
            <div class="shadow-sm side-left d-flex flex-column justify-content-center me-4 align-items-center">
                <img src="{{ Storage::url('public/logo/') }}logo.png " alt="" style="height: 160px; width:300px">
            </div>
            {{--
                /
                Form Pendaftaran Akun
                /
                --}}
            <div class="register" id="side-right-register">
                <form action="{{ route('proses-user-register') }}" method="post">
                    @csrf
                    <div class="text-center">REGISTER</div>
                    <div class="mb-3">
                        <label for="name" class="form-label text-center">Nama</label>
                        <input type="text"
                            class="form-control col-lg-6 @error('name')
                            is-invalid
                        @enderror"
                            style="width: 320px" id="name" aria-describedby="helwepId" placeholder="Username"
                            name="name" value="{{ old('name') }}">

                        @error('name')
                            <div class="invalid-feedback">
                                <ul>
                                    <li> {{ $message }}</li>
                                </ul>

                            </div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-center">Email</label>
                        <input type="text"
                            class="form-control col-lg-6
                        @error('email')
                            is-invalid
                        @enderror

                        "
                            style="width: 320px" id="email" aria-describedby="helsdpId" placeholder="Email"
                            name="email" value="{{ old('email') }}">
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
                            class="form-control
                        @error('password')
                        is-invalid
                        @enderror
                        "
                            name="password" id="password" aria-describedby="helpIwd" placeholder="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                <ul>
                                    <li> {{ $message }}</li>
                                </ul>

                            </div>
                        @enderror

                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-sm btn-primary">
                        Create</button>
                    <a class="btn-back btn btn-sm btn-warning" href="{{ route('user-login') }}">Back</a>
                </form>

                <div class="text-center text-secondary mb-1">ATAU</div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-sm me-2"><i class="fa-brands fa-google"></i>Google</a>
                    <div class="btn btn-sm ms-2"><i class="fa-brands fa-facebook-f"></i>Facebook</div>
                </div>
            </div>
            {{--
                    /
                     END Form Pendaftaran
                     /
                     --}}
        </div>
    @endsection
