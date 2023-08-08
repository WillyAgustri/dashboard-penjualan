@extends('layout.main')

@section('content')
    <form action="{{ route('proses-edit-akun') }}" method="post" enctype="multipart/form">
        @csrf
        <div class="mt-5 mb-3 text-center">Reset Password</div>
        <div class="mb-3">
            <label for="" class="form-label">Password Lama</label>
            <input type="password" class="form-control" name="Oldpassword" id="Oldpassword" placeholder="Password lama">
        </div>

        <div class="mb-3">
            <label for="Newpassword" class="form-label">Password Baru</label>
            <input type="password" class="form-control" name="Newpassword" id="Newpassword" placeholder="Password Baru">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                placeholder="Konfirmasi Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Ganti Password</button>
        </div>
    </form>
@endsection
