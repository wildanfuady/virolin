@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register Successfully</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Baru saja kami mengirimkan link verifikasi terbaru ke akun email Anda.
                        </div>
                    @endif

                    Silahkan cek <b>Inbox / Spam</b> email Anda dan lakukan verifikasi akun untuk melanjutkan register.
                    Jika Anda belum mendapatkan email dari kami, <a href="{{ route('verification.resend') }}">klik di sini</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
